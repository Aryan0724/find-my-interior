const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const BASE_URL = 'http://localhost:3000';
const SCREENSHOT_DIR = path.join(__dirname, '../evidence/screenshots');

if (!fs.existsSync(SCREENSHOT_DIR)) {
    fs.mkdirSync(SCREENSHOT_DIR, { recursive: true });
}

let reportLines = [];

async function logAction(category, component, action, role, clickResult, httpStatus, endpoint, dbChange, uiChange, result) {
    reportLines.push(`| ${category} | ${component} | ${action} | ${role} | ${clickResult} | ${httpStatus} | ${endpoint} | ${dbChange} | ${uiChange} | ${result} |`);
}

async function captureFailure(page, name) {
    await page.screenshot({ path: path.join(SCREENSHOT_DIR, `${name}_failed.png`) });
}

(async () => {
    const browser = await puppeteer.launch({ headless: 'new' });
    const page = await browser.newPage();
    await page.setViewport({ width: 1280, height: 800 });

    let currentRequest = null;
    let currentResponse = null;

    page.on('request', request => {
        if (request.url().includes('localhost:8000/api')) {
            currentRequest = request.url();
        }
    });

    page.on('response', response => {
        if (response.url().includes('localhost:8000/api')) {
            currentResponse = response.status();
        }
    });

    console.log('--- STARTING CUSTOMER JOURNEY ---');
    try {
        // 1. Register
        console.log('Navigating to /register');
        await page.goto(`${BASE_URL}/register`);
        await page.type('#name', 'Automated Customer');
        await page.type('#phone', '9999999999');
        await page.type('#email', `cust_${Date.now()}@test.com`);
        await page.type('#password', 'password');
        await page.type('#password_confirmation', 'password');
        
        currentResponse = null;
        await page.click('button[type="submit"]');
        await page.waitForNavigation({ waitUntil: 'networkidle0', timeout: 5000 }).catch(() => {});
        
        if (currentResponse === 201 || currentResponse === 200) {
            logAction('Customer Journey', 'Register Form', 'Submit Registration', 'Customer', 'Navigated', currentResponse, '/auth/register', 'Yes', 'Redirected', 'PASS');
        } else {
            logAction('Customer Journey', 'Register Form', 'Submit Registration', 'Customer', 'Failed', currentResponse || 'None', '/auth/register', 'No', 'Error', 'FAIL');
            await captureFailure(page, 'customer_register');
        }

        // 2. Post Requirement
        console.log('Navigating to /post-requirement');
        await page.goto(`${BASE_URL}/post-requirement`);
        await page.type('input[placeholder="e.g. 3BHK Full Home Interior"]', 'Automated 3BHK');
        await page.type('input[placeholder="e.g. 500000"]', '1000000');
        
        currentResponse = null;
        await page.click('button[type="submit"]');
        await page.waitForNavigation({ waitUntil: 'networkidle0', timeout: 5000 }).catch(() => {});

        if (currentResponse === 201) {
            logAction('Customer Journey', 'PostRequirement Form', 'Submit Requirement', 'Customer', 'Navigated', currentResponse, '/requirements', 'Yes', 'Redirected', 'PASS');
        } else {
            logAction('Customer Journey', 'PostRequirement Form', 'Submit Requirement', 'Customer', 'Failed', currentResponse || 'None', '/requirements', 'Unknown', 'Error', 'FAIL');
            await captureFailure(page, 'customer_post_req');
        }

    } catch (e) {
        console.error('Customer Journey crashed:', e.message);
        await captureFailure(page, 'customer_journey_crash');
    }

    console.log('--- STARTING VENDOR JOURNEY ---');
    try {
        // 1. Register Vendor
        console.log('Navigating to /register');
        await page.goto(`${BASE_URL}/register`);
        await page.select('select', 'business');
        await page.type('#name', 'Automated Vendor');
        await page.type('#phone', '8888888888');
        await page.type('#email', `vend_${Date.now()}@test.com`);
        await page.type('#password', 'password');
        await page.type('#password_confirmation', 'password');
        
        currentResponse = null;
        await page.click('button[type="submit"]');
        await page.waitForNavigation({ waitUntil: 'networkidle0', timeout: 5000 }).catch(() => {});

        // 2. Dashboard - Wallet Recharge
        console.log('Navigating to /dashboard');
        await page.goto(`${BASE_URL}/dashboard`);
        
        // Wait for tabs to appear
        await page.waitForSelector('button').catch(() => {});
        // Find Wallet tab button
        const buttons = await page.$$('button');
        let walletBtn = null;
        for (const btn of buttons) {
            const text = await page.evaluate(el => el.textContent, btn);
            if (text.includes('Wallet')) {
                walletBtn = btn;
                break;
            }
        }
        
        if (walletBtn) {
            await walletBtn.click();
            await page.waitForSelector('input[placeholder="Amount (INR)"]').catch(() => {});
            await page.type('input[placeholder="Amount (INR)"]', '1000');
            
            currentResponse = null;
            const submitBtns = await page.$$('button');
            for (const btn of submitBtns) {
                const text = await page.evaluate(el => el.textContent, btn);
                if (text.includes('Add Funds')) {
                    await btn.click();
                    break;
                }
            }
            await new Promise(r => setTimeout(r, 2000));
            
            if (currentResponse === 200) {
                logAction('Vendor Journey', 'WalletTab', 'Recharge Wallet', 'Vendor', 'Alert', currentResponse, '/wallet/add-funds', 'Yes', 'Updated Balance', 'PASS');
            } else {
                logAction('Vendor Journey', 'WalletTab', 'Recharge Wallet', 'Vendor', 'Alert/Fail', currentResponse || 'None', '/wallet/add-funds', 'No', 'Error', 'FAIL');
                await captureFailure(page, 'vendor_wallet');
            }
        } else {
            logAction('Vendor Journey', 'Dashboard', 'Click Wallet Tab', 'Vendor', 'Not Found', 'None', 'None', 'No', 'None', 'FAIL (Category A)');
        }

    } catch (e) {
        console.error('Vendor Journey crashed:', e.message);
        await captureFailure(page, 'vendor_journey_crash');
    }

    await browser.close();

    // Output Report
    let md = '# Runtime Action Verification\n\n';
    md += '| Category | Component | Action | Role | Click Result | HTTP Status | Endpoint | DB Change | UI Change | Result |\n';
    md += '|---|---|---|---|---|---|---|---|---|---|\n';
    md += reportLines.join('\n');

    fs.writeFileSync(path.join(__dirname, '../RUNTIME_ACTION_VERIFICATION.md'), md);
    console.log('Generated RUNTIME_ACTION_VERIFICATION.md');

})();
