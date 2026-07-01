import { Page, expect } from '@playwright/test';

export class PostRequirementPage {
  readonly page: Page;

  constructor(page: Page) {
    this.page = page;
  }

  async startWizard() {
    // Navigate to post requirement page or click the CTA
    await this.page.goto('/post-requirement');
    await this.page.waitForLoadState('networkidle');
  }

  async selectType(type: 'project' | 'rfq' | 'job') {
    // We assume there are cards or radio buttons for selection
    let textToFind = '';
    if (type === 'project') textToFind = 'Interior Project';
    if (type === 'rfq') textToFind = 'Material RFQ';
    if (type === 'job') textToFind = 'Labour Job';

    const option = this.page.locator(`text=${textToFind}`).first();
    await option.click();
    
    // Click Next or Continue
    const nextBtn = this.page.locator('button:has-text("Next"), button:has-text("Continue")');
    if (await nextBtn.isVisible()) {
        await nextBtn.click();
    }
  }

  async fillDetails(title: string, description: string) {
    await this.page.fill('#title, input[placeholder*="title" i]', title);
    await this.page.fill('#description, textarea[placeholder*="describe" i]', description);
  }

  async submitRequirement() {
    const submitBtn = this.page.locator('button[type="submit"], button:has-text("Post"), button:has-text("Submit")');
    await submitBtn.click();
    
    // Wait for success
    await expect(this.page.locator('.toast, .bg-green-50, text="success" i').first()).toBeVisible({ timeout: 10000 });
  }
}
