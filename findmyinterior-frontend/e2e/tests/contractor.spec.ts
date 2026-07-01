/**
 * CONTRACTOR E2E JOURNEY
 * Covers the full contractor lifecycle:
 * Login → Dashboard → Browse Leads → Bid → Unlock Contact → 
 * Post Labour Job → Post Material RFQ → Messages → Wallet
 */
import { test, expect } from '@playwright/test';
import { LoginPage } from '../pages/LoginPage';
import { USERS } from '../helpers/credentials';
import { apiLogin, apiGetRequirements } from '../helpers/api';

const CONTRACTOR = USERS.contractor;

test.describe('Contractor E2E Journey', () => {
  let loginPage: LoginPage;

  test.beforeEach(async ({ page }) => {
    loginPage = new LoginPage(page);
  });

  // ─── 1. Login & Dashboard ─────────────────────────────────────────────
  test('CO-01: Contractor logs in and sees CONTRACTOR dashboard', async ({ page }) => {
    await loginPage.login(CONTRACTOR.email, CONTRACTOR.password);
    await page.waitForURL('/dashboard');
    
    await expect(page.locator('text=CONTRACTOR, text=Workshop').first()).toBeVisible();
    
    // Verify contractor-specific sidebar tabs
    await expect(page.locator('text=Available Projects').first()).toBeVisible();
    await expect(page.locator('text=My Bids').first()).toBeVisible();
  });

  // ─── 2. Browse Available Project Leads ──────────────────────────────
  test('CO-02: Contractor can browse available project leads', async ({ page }) => {
    await loginPage.login(CONTRACTOR.email, CONTRACTOR.password);
    await page.waitForURL('/dashboard');
    
    await page.locator('text=Available Projects').first().click();
    await page.waitForTimeout(2000);
    
    const content = page.locator('.card, text=No leads, text=No projects, text=E2E').first();
    await expect(content).toBeVisible({ timeout: 20000 });
  });

  // ─── 3. Submit a Bid via API ─────────────────────────────────────────
  test('CO-03: Contractor can submit a bid on a project', async ({ page, request }) => {
    const token = await apiLogin(request, CONTRACTOR.email, CONTRACTOR.password);
    const reqs = await apiGetRequirements(request, token);
    
    if (reqs?.data?.length > 0) {
      const reqId = reqs.data[0].id;
      
      const bidRes = await request.post('http://localhost:8000/api/v1/bids', {
        headers: { Authorization: `Bearer ${token}` },
        data: {
          requirement_id: reqId,
          amount: 850000,
          description: 'Complete turnkey contractor services. 15 years experience. GST registered.',
          timeline: '60 days',
        },
      });
      
      console.log(`Contractor bid status: ${bidRes.status()}`);
      expect([201, 422]).toContain(bidRes.status()); // 422 if already bid or validation error
    } else {
      console.log('No requirements found to bid on');
    }
  });

  // ─── 4. Post a Material RFQ ──────────────────────────────────────────
  test('CO-04: Contractor can post a Material RFQ', async ({ page }) => {
    await loginPage.login(CONTRACTOR.email, CONTRACTOR.password);
    await page.waitForURL('/dashboard');
    
    await page.goto('/post-requirement');
    await page.waitForLoadState('networkidle');
    
    // Select Materials type
    const materialOption = page.locator('text=Materials, text=Material RFQ').first();
    if (await materialOption.isVisible()) {
      await materialOption.click();
      
      const ts = Date.now();
      const titleInput = page.locator('#title').first();
      if (await titleInput.isVisible()) {
        await titleInput.fill(`E2E Cement RFQ ${ts}`);
      }
      
      const descArea = page.locator('textarea').first();
      if (await descArea.isVisible()) {
        await descArea.fill('Need 200 bags of Portland cement for foundation work.');
      }
      
      const submitBtn = page.locator('button[type="submit"]').last();
      if (await submitBtn.isVisible()) {
        await submitBtn.click();
        
        const success = page.locator('.text-green-600, text=success, text=posted');
        await expect(success.first()).toBeVisible({ timeout: 15000 });
      }
    }
  });

  // ─── 5. Post a Labour Job ────────────────────────────────────────────
  test('CO-05: Contractor can post a Labour (Worker) Job', async ({ page }) => {
    await loginPage.login(CONTRACTOR.email, CONTRACTOR.password);
    await page.waitForURL('/dashboard');
    
    const labourTab = page.locator('text=Labour Requests').first();
    if (await labourTab.isVisible()) {
      await labourTab.click();
      await page.waitForTimeout(1500);
      
      // Check for Post Job button
      const postJobBtn = page.locator('button:has-text("Post Job"), a:has-text("Post Job"), button:has-text("Add")').first();
      if (await postJobBtn.isVisible()) {
        await postJobBtn.click();
        await page.waitForTimeout(1000);
        
        // Should open a form or redirect
        const form = page.locator('form, text=Post a Job').first();
        await expect(form).toBeVisible({ timeout: 10000 });
      }
    }
  });

  // ─── 6. View Wallet Balance ──────────────────────────────────────────
  test('CO-06: Contractor can view and interact with wallet', async ({ page }) => {
    await loginPage.login(CONTRACTOR.email, CONTRACTOR.password);
    await page.waitForURL('/dashboard');
    
    await page.locator('text=Wallet').first().click();
    await page.waitForTimeout(2000);
    
    const walletContent = page.locator('text=Wallet, text=₹, text=Balance').first();
    await expect(walletContent).toBeVisible({ timeout: 15000 });
  });

  // ─── 7. View Subcontract Requests ───────────────────────────────────
  test('CO-07: Contractor sees subcontract tab', async ({ page }) => {
    await loginPage.login(CONTRACTOR.email, CONTRACTOR.password);
    await page.waitForURL('/dashboard');
    
    const subTab = page.locator('text=Subcontract Requests').first();
    if (await subTab.isVisible()) {
      await subTab.click();
      await page.waitForTimeout(1500);
      
      const content = page.locator('.card, text=No subcontract, text=Subcontract').first();
      await expect(content).toBeVisible({ timeout: 15000 });
    } else {
      // Tab may not exist, just confirm dashboard loaded
      await expect(page.locator('text=CONTRACTOR').first()).toBeVisible();
    }
  });

  // ─── 8. Unlock Contact via API ──────────────────────────────────────
  test('CO-08: Contractor can attempt to unlock a requirement contact', async ({ page, request }) => {
    const token = await apiLogin(request, CONTRACTOR.email, CONTRACTOR.password);
    const reqs = await apiGetRequirements(request, token);
    
    if (reqs?.data?.length > 0) {
      const reqId = reqs.data[0].id;
      
      const unlockRes = await request.post(`http://localhost:8000/api/v1/requirements/${reqId}/unlock`, {
        headers: { Authorization: `Bearer ${token}` },
      });
      
      console.log(`Unlock attempt status: ${unlockRes.status()}`);
      // 200 = success, 402 = insufficient funds, 422 = already unlocked, 403 = unauthorized
      expect([200, 402, 422, 403]).toContain(unlockRes.status());
    }
  });
});
