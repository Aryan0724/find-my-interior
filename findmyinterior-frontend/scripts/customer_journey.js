const puppeteer = require('puppeteer');

const BASE_URL = 'http://localhost:3000';

(async () => {
    console.log("=== CUSTOMER JOURNEY ===");
    const browser = await puppeteer.launch({ headless: 'new' });
    const page = await browser.newPage();
    await page.setViewport({ width: 1280, height: 800 });
    page.setDefaultTimeout(60000);
    
    let step = 1;
    let passed = true;
    let failReason = "";

    try {
        // Step 1: Register
        console.log(`Step ${step++}: Registering new customer`);
        await page.goto(`${BASE_URL}/register`, { waitUntil: 'networkidle2' });
        
        await page.select('select', 'customer');
        await page.type('input#name', 'Test Customer');
        await page.type('input#phone', '9998887771');
        
        const email = `customer_${Date.now()}@test.com`;
        await page.type('input#email', email);
        
        await page.type('input#password', 'password123');
        await page.type('input#password_confirmation', 'password123');

        await page.click('button[type="submit"]');
        await page.waitForFunction(() => window.location.pathname.includes('/dashboard'), { timeout: 60000 });

        if (!page.url().includes('/dashboard')) throw new Error("Did not route to /dashboard after registration");

        // Step 2: Navigate to Post Requirement
        console.log(`Step ${step++}: Navigating to Post Requirement`);
        await page.goto(`${BASE_URL}/post-requirement`, { waitUntil: 'networkidle2' });

        // Step 3: Post Requirement
        console.log(`Step ${step++}: Filling Requirement Form`);
        const reqTitle = `Need full house painting ${Date.now()}`;
        await page.type('input#title', reqTitle);
        await page.type('textarea#description', 'Need to paint 3BHK house within 2 weeks.');
        await page.type('input#city', 'Patna');
        await page.type('input#district', 'Patna');
        await page.type('input#name', 'Test Customer');
        await page.type('input#phone', '9998887771');
        
        // Wait for success message after submitting
        await page.click('button[type="submit"]');
        await page.waitForFunction(() => {
            return document.body.innerText.includes('Requirement Posted!');
        }, { timeout: 60000 });

        // Step 4: Click 'Go to Dashboard'
        console.log(`Step ${step++}: Returning to Dashboard`);
        await page.click('button:has-text("Go to Dashboard")');
        await page.waitForFunction(() => window.location.pathname.includes('/dashboard'), { timeout: 60000 });

        // Step 5: Verify Requirement is in the DB / Dashboard
        console.log(`Step ${step++}: Verifying DB/UI update in Dashboard`);
        
        // Wait for the dashboard to fetch data
        await new Promise(r => setTimeout(r, 2000));

        const isRequirementVisible = await page.evaluate((reqTitle) => {
            return document.body.innerText.includes(reqTitle);
        }, reqTitle);

        if (!isRequirementVisible) {
            throw new Error(`The newly created requirement "${reqTitle}" is not visible in the dashboard. DB or State failure.`);
        }

        console.log(`Step ${step++}: Journey Complete! Full E2E flow successful.`);

    } catch (e) {
        passed = false;
        failReason = e.message;
        console.error(`❌ FAILED at Step ${step-1}: ${failReason}`);
        await page.screenshot({ path: 'customer_fail.png' });
    } finally {
        await browser.close();
        if (passed) {
            console.log("✅ CUSTOMER JOURNEY: PASS");
        }
    }
})();
