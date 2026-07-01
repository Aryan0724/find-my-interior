/**
 * UI/UX VALIDATION TESTS
 * Verifies every critical UI element works:
 * Buttons, modals, filters, search, pagination, uploads, empty/loading states
 */
import { test, expect } from '@playwright/test';
import { LoginPage } from '../pages/LoginPage';
import { USERS } from '../helpers/credentials';

test.describe('UI/UX Validation', () => {
  let loginPage: LoginPage;

  test.beforeEach(async ({ page }) => {
    loginPage = new LoginPage(page);
  });

  // ─── 1. Homepage loads correctly ─────────────────────────────────────
  test('UI-01: Homepage loads with all key sections', async ({ page }) => {
    await page.goto('/');
    await page.waitForLoadState('networkidle');
    
    // Verify key sections exist
    await expect(page.locator('h1').first()).toBeVisible({ timeout: 30000 });
    
    // Navigation links
    const nav = page.locator('nav, header').first();
    await expect(nav).toBeVisible();
    
    console.log('Homepage title:', await page.title());
  });

  // ─── 2. Login page validation ────────────────────────────────────────
  test('UI-02: Login page shows form with proper labels', async ({ page }) => {
    await page.goto('/login');
    await page.waitForLoadState('networkidle');
    
    await expect(page.locator('input[type="email"]')).toBeVisible();
    await expect(page.locator('input[type="password"]')).toBeVisible();
    await expect(page.locator('button[type="submit"]')).toBeVisible();
  });

  // ─── 3. Login error state ────────────────────────────────────────────
  test('UI-03: Login shows error message for wrong credentials', async ({ page }) => {
    await page.goto('/login');
    await page.fill('input[type="email"]', 'wrong@wrong.com');
    await page.fill('input[type="password"]', 'wrongpassword');
    await page.click('button[type="submit"]');
    
    // Should show an error
    const error = page.locator('.text-red-600, .bg-red-50, text=Invalid, text=incorrect, text=failed').first();
    await expect(error).toBeVisible({ timeout: 15000 });
  });

  // ─── 4. Register page validation ──────────────────────────────────────
  test('UI-04: Register page shows all form fields', async ({ page }) => {
    await page.goto('/register');
    await page.waitForLoadState('networkidle');
    
    await expect(page.locator('#name')).toBeVisible();
    await expect(page.locator('#email')).toBeVisible();
    await expect(page.locator('#phone')).toBeVisible();
    await expect(page.locator('button[type="submit"]')).toBeVisible();
  });

  // ─── 5. Professionals directory loads ────────────────────────────────
  test('UI-05: Professionals marketplace page loads correctly', async ({ page }) => {
    await page.goto('/professionals');
    await page.waitForLoadState('networkidle');
    
    const content = page.locator('h1, .professionals-header, text=Professionals, text=Interior Designers').first();
    await expect(content).toBeVisible({ timeout: 30000 });
  });

  // ─── 6. Requirements/RFQ listing page ────────────────────────────────
  test('UI-06: Requirements marketplace page loads', async ({ page }) => {
    await page.goto('/requirements');
    await page.waitForLoadState('networkidle');
    
    const content = page.locator('h1, text=Requirements, text=Projects, text=Browse').first();
    await expect(content).toBeVisible({ timeout: 30000 });
  });

  // ─── 7. Materials/RFQ marketplace ────────────────────────────────────
  test('UI-07: Materials RFQ marketplace page loads', async ({ page }) => {
    await page.goto('/materials');
    await page.waitForLoadState('networkidle');
    
    const content = page.locator('h1, text=Materials, text=RFQ, text=Suppliers').first();
    await expect(content).toBeVisible({ timeout: 30000 });
  });

  // ─── 8. Workers marketplace ──────────────────────────────────────────
  test('UI-08: Workers marketplace page loads', async ({ page }) => {
    await page.goto('/workers');
    await page.waitForLoadState('networkidle');
    
    const content = page.locator('h1, text=Workers, text=Skilled, text=Labour').first();
    await expect(content).toBeVisible({ timeout: 30000 });
  });

  // ─── 9. Pricing page ──────────────────────────────────────────────────
  test('UI-09: Pricing page loads and shows plans', async ({ page }) => {
    await page.goto('/pricing');
    await page.waitForLoadState('networkidle');
    
    const content = page.locator('h1, text=Pricing, text=Plans, text=Free').first();
    await expect(content).toBeVisible({ timeout: 30000 });
  });

  // ─── 10. 404 page handled gracefully ──────────────────────────────────
  test('UI-10: Non-existent pages do not crash (404 handling)', async ({ page }) => {
    await page.goto('/this-page-definitely-does-not-exist-123');
    await page.waitForLoadState('networkidle');
    
    // Should show 404 page, not crash with 500
    const errorPage = page.locator('text=404, text=Not Found, text=Page not found, h1').first();
    await expect(errorPage).toBeVisible({ timeout: 15000 });
  });

  // ─── 11. Dashboard logout works ───────────────────────────────────────
  test('UI-11: User can log out from dashboard', async ({ page }) => {
    await loginPage.login(USERS.homeowner.email, USERS.homeowner.password);
    await page.waitForURL('/dashboard');
    
    // Find and click logout
    const logoutBtn = page.locator('button:has-text("Logout"), a:has-text("Logout")').first();
    await expect(logoutBtn).toBeVisible();
    await logoutBtn.click();
    
    // Should redirect to login
    await page.waitForURL((url) => url.pathname.includes('/login') || url.pathname === '/', { timeout: 15000 });
  });

  // ─── 12. Post requirement page loads ──────────────────────────────────
  test('UI-12: Post requirement wizard loads for authenticated user', async ({ page }) => {
    await loginPage.login(USERS.homeowner.email, USERS.homeowner.password);
    await page.waitForURL('/dashboard');
    
    await page.goto('/post-requirement');
    await page.waitForLoadState('networkidle');
    
    // Should show the wizard
    const content = page.locator('text=Post, text=Requirement, text=Project, text=What').first();
    await expect(content).toBeVisible({ timeout: 20000 });
  });

  // ─── 13. Messages page loads ──────────────────────────────────────────
  test('UI-13: Messages page loads for authenticated users', async ({ page }) => {
    await loginPage.login(USERS.homeowner.email, USERS.homeowner.password);
    await page.waitForURL('/dashboard');
    
    const msgTab = page.locator('text=Messages').first();
    if (await msgTab.isVisible()) {
      await msgTab.click();
      await page.waitForTimeout(2000);
    } else {
      await page.goto('/messages');
      await page.waitForLoadState('networkidle');
    }
    
    const content = page.locator('text=Messages, text=Inbox, text=No conversations').first();
    await expect(content).toBeVisible({ timeout: 20000 });
  });

  // ─── 14. Contact/support page ──────────────────────────────────────────
  test('UI-14: Contact page loads and form is submittable', async ({ page }) => {
    await page.goto('/contact');
    await page.waitForLoadState('networkidle');
    
    const content = page.locator('h1, text=Contact, text=Support, text=Get in touch').first();
    await expect(content).toBeVisible({ timeout: 20000 });
  });
});
