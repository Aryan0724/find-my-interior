import { test as setup, expect } from '@playwright/test';

setup('wipe and seed database', async ({ request }) => {
  setup.setTimeout(120000); // 120 seconds for DB reset
  console.log('Wiping and reseeding the database for E2E tests...');
  // We hit the testing route we just created on the Laravel backend
  const response = await request.post('http://localhost:8000/api/e2e/reset', { timeout: 120000 });
  if (!response.ok()) {
    console.error('Failed to reset DB:', response.status(), await response.text());
  }
  expect(response.ok()).toBeTruthy();
  const body = await response.json();
  console.log('Database reset response:', body.message);
});
