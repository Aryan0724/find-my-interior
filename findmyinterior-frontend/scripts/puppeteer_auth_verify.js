const puppeteer = require('puppeteer');

const BASE_URL = 'http://localhost:3000';

(async () => {
    const browser = await puppeteer.launch({ headless: 'new' });
    const page = await browser.newPage();
    await page.setViewport({ width: 1280, height: 800 });

    let results = [];

    try {
        console.log("Testing Registration & Dashboard Redirect Flow...");
        await page.goto(`${BASE_URL}/register`, { waitUntil: 'networkidle2' });

        // Fill out registration form
        await page.select('select', 'business');
        await page.type('input#name', 'Test Vendor');
        await page.type('input#phone', '9998887776');
        
        const randomEmail = `vendor_${Date.now()}@test.com`;
        await page.type('input#email', randomEmail);
        
        await page.type('input#password', 'password123');
        await page.type('input#password_confirmation', 'password123');

        // Click register
        await Promise.all([
            page.click('button[type="submit"]'),
            page.waitForNavigation({ waitUntil: 'networkidle2' })
        ]);

        const currentUrl = page.url();
        if (currentUrl.includes('/dashboard')) {
            results.push(`✅ PASS: Registration successful & redirected to /dashboard`);
        } else {
            results.push(`❌ FAIL: Registration failed or did not redirect. Current URL: ${currentUrl}`);
            throw new Error("Failed to reach dashboard");
        }

        console.log("Testing Wallet Tab...");
        // Find and click the "My Wallet" button by text
        const clicked = await page.evaluate(() => {
            const elements = Array.from(document.querySelectorAll('button'));
            const el = elements.find(e => e.textContent && e.textContent.includes('My Wallet'));
            if (el) {
                el.click();
                return true;
            }
            return false;
        });

        if (clicked) {
            // Wait a moment for React state to update and render the wallet component
            await new Promise(r => setTimeout(r, 1000));
            
            // Check if "My Wallet Balance" text is visible
            const isWalletVisible = await page.evaluate(() => {
                return document.body.innerText.includes('My Wallet Balance');
            });

            if (isWalletVisible) {
                results.push(`✅ PASS: Wallet Tab clicked and rendered successfully`);
            } else {
                results.push(`❌ FAIL: Wallet Tab clicked but content didn't render`);
            }
        } else {
            results.push(`❌ FAIL: Could not find "My Wallet" button`);
        }

    } catch (e) {
        results.push(`❌ CRITICAL ERROR: ${e.message}`);
    } finally {
        console.log('\n--- VERIFICATION RESULTS ---');
        console.log(results.join('\n'));
        console.log('----------------------------\n');
        await browser.close();
    }
})();
