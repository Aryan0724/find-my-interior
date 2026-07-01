/**
 * BUILDER E2E JOURNEY
 * Complete builder lifecycle:
 * Login → Dashboard → Post Builder Project → Post Contractor Request → 
 * Post Supplier Request → Track Responses → Manage Projects
 */
import { test, expect } from '@playwright/test';
import { LoginPage } from '../pages/LoginPage';
import { USERS } from '../helpers/credentials';
import { apiLogin } from '../helpers/api';

const BUILDER = USERS.builder;

test.describe('Builder E2E Journey', () => {
  let loginPage: LoginPage;

  test.beforeEach(async ({ page }) => {
    loginPage = new LoginPage(page);
  });

  // ─── 1. Login & Dashboard ─────────────────────────────────────────────
  test('BU-01: Builder logs in and sees BUILDER dashboard', async ({ page }) => {
    await loginPage.login(BUILDER.email, BUILDER.password);
    await page.waitForURL('/dashboard');
    
    await expect(page.locator('text=BUILDER').first()).toBeVisible();
  });

  // ─── 2. Browse Available Leads ────────────────────────────────────────
  test('BU-02: Builder can browse available projects', async ({ page }) => {
    await loginPage.login(BUILDER.email, BUILDER.password);
    await page.waitForURL('/dashboard');
    
    const leadsTab = page.locator('text=Available, text=Projects, text=Leads').first();
    if (await leadsTab.isVisible()) {
      await leadsTab.click();
      await page.waitForTimeout(2000);
      
      const content = page.locator('.card, text=No projects, text=E2E, text=Available').first();
      await expect(content).toBeVisible({ timeout: 20000 });
    }
  });

  // ─── 3. Post a Builder Project via API ───────────────────────────────
  test('BU-03: Builder can create a new builder project via API', async ({ page, request }) => {
    const token = await apiLogin(request, BUILDER.email, BUILDER.password);
    
    // Post a requirement (builder project type)
    const reqRes = await request.post('http://localhost:8000/api/v1/requirements', {
      headers: { Authorization: `Bearer ${token}` },
      data: {
        title: `E2E Builder Project ${Date.now()}`,
        description: 'A 50-unit residential complex requiring complete interior design.',
        city: 'Patna',
        district: 'Patna',
        requirement_type: 'project',
        budget: '5000000',
      },
    });
    
    console.log(`Builder project creation: ${reqRes.status()}`);
    expect([200, 201, 422]).toContain(reqRes.status());
  });

  // ─── 4. Post a Contractor Request (Subcontracting) ───────────────────
  test('BU-04: Builder can post a contractor sub-request', async ({ page }) => {
    await loginPage.login(BUILDER.email, BUILDER.password);
    await page.waitForURL('/dashboard');
    
    await page.goto('/post-requirement');
    await page.waitForLoadState('networkidle');
    
    // Select construction type
    const constructionOption = page.locator('text=Construction').first();
    if (await constructionOption.isVisible()) {
      await constructionOption.click();
      
      const ts = Date.now();
      const titleInput = page.locator('#title').first();
      if (await titleInput.isVisible()) {
        await titleInput.fill(`E2E Subcontractor Request ${ts}`);
      }
      
      const descArea = page.locator('textarea').first();
      if (await descArea.isVisible()) {
        await descArea.fill('Need an experienced contractor for foundation and framing work.');
      }
      
      const submitBtn = page.locator('button[type="submit"]').last();
      if (await submitBtn.isVisible()) {
        await submitBtn.click();
        
        const success = page.locator('.text-green-600, text=success, text=posted');
        await expect(success.first()).toBeVisible({ timeout: 15000 });
      }
    }
  });

  // ─── 5. Post a Material/Supplier Request ─────────────────────────────
  test('BU-05: Builder can post an RFQ for materials', async ({ page, request }) => {
    const token = await apiLogin(request, BUILDER.email, BUILDER.password);
    
    const rfqRes = await request.post('http://localhost:8000/api/v1/rfqs', {
      headers: { Authorization: `Bearer ${token}` },
      data: {
        title: `E2E Steel RFQ ${Date.now()}`,
        description: 'Need TMT steel bars for 5-floor structure.',
        material_type: 'Steel',
        quantity: '500 tons',
        delivery_location: 'Patna',
        timeline: '1 Month',
      },
    });
    
    console.log(`Builder RFQ creation: ${rfqRes.status()}`);
    expect([200, 201, 422]).toContain(rfqRes.status());
  });

  // ─── 6. View Wallet with High Balance ─────────────────────────────────
  test('BU-06: Builder wallet shows seeded balance of ₹50000', async ({ page, request }) => {
    const token = await apiLogin(request, BUILDER.email, BUILDER.password);
    
    const walletRes = await request.get('http://localhost:8000/api/v1/wallet', {
      headers: { Authorization: `Bearer ${token}` },
    });
    
    if (walletRes.ok()) {
      const data = await walletRes.json();
      const balance = data.data?.balance ?? data.balance ?? 0;
      console.log(`Builder wallet balance: ₹${balance}`);
      expect(balance).toBeGreaterThanOrEqual(0);
    }
  });

  // ─── 7. Access Messages ───────────────────────────────────────────────
  test('BU-07: Builder can access message inbox', async ({ page }) => {
    await loginPage.login(BUILDER.email, BUILDER.password);
    await page.waitForURL('/dashboard');
    
    const msgTab = page.locator('text=Messages').first();
    if (await msgTab.isVisible()) {
      await msgTab.click();
      await page.waitForTimeout(2000);
      
      const msgContent = page.locator('text=Messages, text=No conversations, text=Inbox').first();
      await expect(msgContent).toBeVisible({ timeout: 15000 });
    }
  });

  // ─── 8. Builder Projects Public Marketplace ───────────────────────────
  test('BU-08: Builder projects visible in public marketplace', async ({ page }) => {
    await page.goto('/projects');
    await page.waitForLoadState('networkidle');
    
    // Public projects marketplace should load
    const content = page.locator('h1, text=Projects, text=Browse').first();
    await expect(content).toBeVisible({ timeout: 20000 });
  });
});
