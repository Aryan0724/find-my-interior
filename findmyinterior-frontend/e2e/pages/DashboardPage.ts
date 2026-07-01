import { Page, expect } from '@playwright/test';

export class DashboardPage {
  readonly page: Page;

  constructor(page: Page) {
    this.page = page;
  }

  async verifySidebarIsLoaded() {
    // Assert the dashboard header is visible
    const workspaceHeader = this.page.locator('text=Workspace').first();
    await expect(workspaceHeader).toBeVisible();
  }

  async verifyKPICardsVisible() {
    // There are usually multiple KPI cards on dashboards, represented by lucide icons or big numbers
    // Let's just check that at least one card is visible
    const kpiCards = this.page.locator('.rounded-xl.border.bg-card').first();
    await expect(kpiCards).toBeVisible();
  }

  async verifyRoleIsolation(expectedRoleIdentifier: string) {
    // Check for specific role text in the header
    const roleBadge = this.page.locator(`text=${expectedRoleIdentifier.toUpperCase()}`).first();
    await expect(roleBadge).toBeVisible();
  }

  async assertNoAccessTo(urlPath: string) {
    const originalUrl = this.page.url();
    await this.page.goto(urlPath);
    // It should either return 403 or redirect back to dashboard/home/login
    await this.page.waitForLoadState('networkidle');
    const newUrl = this.page.url();
    expect(newUrl).not.toContain(urlPath);
  }
}
