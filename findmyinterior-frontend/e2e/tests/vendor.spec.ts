import { test, expect } from '@playwright/test';
import { LoginPage } from '../pages/LoginPage';
import { DashboardPage } from '../pages/DashboardPage';

test.describe('Vendor (Contractor/Supplier) E2E Journey', () => {
  let loginPage: LoginPage;
  let dashboardPage: DashboardPage;

  test.beforeEach(async ({ page }) => {
    loginPage = new LoginPage(page);
    dashboardPage = new DashboardPage(page);
  });

  test('Contractor can view business dashboard', async ({ page }) => {
    await loginPage.login('contractor@e2e.test', 'password');
    await dashboardPage.verifySidebarIsLoaded();
    
    // Vendor specific checks
    await dashboardPage.verifyRoleIsolation('Contractor');
    
    // Check if tabs exist
    const leadsTab = page.locator('text=Available Projects').first();
    await expect(leadsTab).toBeVisible();
  });

  test('Supplier cannot post Labour Jobs but can Bid on RFQs', async ({ page }) => {
    await loginPage.login('supplier@e2e.test', 'password');
    await dashboardPage.verifySidebarIsLoaded();
    await dashboardPage.verifyRoleIsolation('Supplier');
    
    // Suppliers usually don't post labour jobs, test role isolation
    await dashboardPage.assertNoAccessTo('/post-requirement/job');
    
    // But they should have a tab for Available RFQs or Projects
    const leadsTab = page.locator('text=Available').first();
    await expect(leadsTab).toBeVisible({ timeout: 15000 });
  });
});
