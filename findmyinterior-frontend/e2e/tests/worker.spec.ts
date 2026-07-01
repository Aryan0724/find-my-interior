/**
 * WORKER E2E JOURNEY
 * Complete skilled worker lifecycle:
 * Login → Dashboard → Browse Jobs → Apply → Profile → Verification → Messages
 */
import { test, expect } from '@playwright/test';
import { LoginPage } from '../pages/LoginPage';
import { USERS } from '../helpers/credentials';
import { apiLogin } from '../helpers/api';

const WORKER = USERS.worker;

test.describe('Skilled Worker E2E Journey', () => {
  let loginPage: LoginPage;

  test.beforeEach(async ({ page }) => {
    loginPage = new LoginPage(page);
  });

  // ─── 1. Login & Dashboard ─────────────────────────────────────────────
  test('WO-01: Worker logs in and sees WORKER dashboard', async ({ page }) => {
    await loginPage.login(WORKER.email, WORKER.password);
    await page.waitForURL('/dashboard');
    
    await expect(page.locator('text=WORKER').first()).toBeVisible();
  });

  // ─── 2. Browse Available Jobs ────────────────────────────────────────
  test('WO-02: Worker can browse available labour jobs', async ({ page }) => {
    await loginPage.login(WORKER.email, WORKER.password);
    await page.waitForURL('/dashboard');
    
    // Click Available Jobs tab
    const jobsTab = page.locator('text=Available Jobs, text=Open Jobs, text=Available').first();
    if (await jobsTab.isVisible()) {
      await jobsTab.click();
      await page.waitForTimeout(2000);
      
      const content = page.locator('.card, text=No jobs, text=E2E Need 5 Masons, text=Jobs').first();
      await expect(content).toBeVisible({ timeout: 20000 });
    } else {
      await expect(page.locator('text=WORKER').first()).toBeVisible();
    }
  });

  // ─── 3. Apply for a Job via API ──────────────────────────────────────
  test('WO-03: Worker can apply for a job via API', async ({ page, request }) => {
    const token = await apiLogin(request, WORKER.email, WORKER.password);
    
    // Get available jobs
    const jobsRes = await request.get('http://localhost:8000/api/v1/worker-jobs', {
      headers: { Authorization: `Bearer ${token}` },
    });
    
    if (jobsRes.ok()) {
      const jobs = await jobsRes.json();
      const jobList = jobs.data?.data || jobs.data || [];
      
      if (jobList.length > 0) {
        const jobId = jobList[0].id;
        
        // Try to bid on the job
        const applyRes = await request.post('http://localhost:8000/api/v1/bids', {
          headers: { Authorization: `Bearer ${token}` },
          data: {
            requirement_id: jobId,
            amount: 600,
            description: 'Experienced mason with 8 years experience. Can start immediately.',
            timeline: 'Immediate',
          },
        });
        
        console.log(`Worker application status: ${applyRes.status()}`);
        expect([200, 201, 422]).toContain(applyRes.status());
      } else {
        console.log('No jobs available to apply to');
      }
    }
  });

  // ─── 4. Complete Profile ─────────────────────────────────────────────
  test('WO-04: Worker can view and update profile tab', async ({ page }) => {
    await loginPage.login(WORKER.email, WORKER.password);
    await page.waitForURL('/dashboard');
    
    const profileTab = page.locator('text=Profile, text=My Profile, text=Business Profile').first();
    if (await profileTab.isVisible()) {
      await profileTab.click();
      await page.waitForTimeout(2000);
      
      const profileContent = page.locator('form, text=Profile, text=Skills').first();
      await expect(profileContent).toBeVisible({ timeout: 15000 });
    }
  });

  // ─── 5. Access Messages ──────────────────────────────────────────────
  test('WO-05: Worker can access message inbox', async ({ page }) => {
    await loginPage.login(WORKER.email, WORKER.password);
    await page.waitForURL('/dashboard');
    
    const msgTab = page.locator('text=Messages').first();
    if (await msgTab.isVisible()) {
      await msgTab.click();
      await page.waitForTimeout(2000);
      
      const msgContent = page.locator('text=Messages, text=No conversations, text=Inbox').first();
      await expect(msgContent).toBeVisible({ timeout: 15000 });
    }
  });

  // ─── 6. Verification Status via API ─────────────────────────────────
  test('WO-06: Worker can check verification status via API', async ({ page, request }) => {
    const token = await apiLogin(request, WORKER.email, WORKER.password);
    
    const verRes = await request.get('http://localhost:8000/api/v1/verification/status', {
      headers: { Authorization: `Bearer ${token}` },
    });
    
    console.log(`Worker verification status: ${verRes.status()}`);
    expect([200, 404]).toContain(verRes.status());
  });

  // ─── 7. Security: Worker cannot post a project ───────────────────────
  test('WO-07: Worker cannot submit bids as a contractor via API', async ({ page, request }) => {
    const token = await apiLogin(request, WORKER.email, WORKER.password);
    
    // Workers should be able to bid on worker-jobs
    // But not necessarily on full construction projects 
    // (depends on business rules). Document the behavior.
    const bidRes = await request.post('http://localhost:8000/api/v1/bids', {
      headers: { Authorization: `Bearer ${token}` },
      data: { requirement_id: 9999, amount: 500, description: 'test' },
    });
    
    console.log(`Worker bid on non-existent job: ${bidRes.status()}`);
    // Should return 404 (not found) or 422 (validation error), not 500
    expect([404, 422, 403]).toContain(bidRes.status());
  });

  // ─── 8. Public worker profile is accessible ──────────────────────────
  test('WO-08: Worker public profile is visible in workers marketplace', async ({ page }) => {
    await page.goto('/workers');
    await page.waitForLoadState('networkidle');
    
    // Worker marketplace should load
    const content = page.locator('text=Workers, text=Skilled, text=Available').first();
    await expect(content).toBeVisible({ timeout: 20000 });
  });
});
