const puppeteer = require('puppeteer');
const fs = require('fs');

(async () => {
    // Ensure dir exists
    const dir = '../findmyinterior-backend/evidence/screenshots';
    if (!fs.existsSync(dir)) {
        fs.mkdirSync(dir, { recursive: true });
    }

    const browser = await puppeteer.launch();
    const page = await browser.newPage();
    
    // We are going to mock local storage token so it loads as a user
    await page.goto('http://localhost:3000');
    await page.evaluate(() => {
        localStorage.setItem('auth_token', 'test_token');
        localStorage.setItem('user', JSON.stringify({id: 1, name: 'Vendor', roles: ['business']}));
    });

    // 1. Desktop Screenshot
    await page.setViewport({ width: 1280, height: 800 });
    await page.goto('http://localhost:3000/requirements/1', { waitUntil: 'networkidle2' });
    await page.screenshot({ path: `${dir}/requirement-page-desktop.png`, fullPage: true });
    console.log("Captured: requirement-page-desktop.png");

    // 2. Mobile Screenshot
    await page.setViewport({ width: 375, height: 812, isMobile: true });
    await page.screenshot({ path: `${dir}/requirement-page-mobile.png`, fullPage: true });
    console.log("Captured: requirement-page-mobile.png");

    // 3. Comparison Matrix
    // Simulate clicking "Compare" or viewing the matrix
    // If the matrix is already on the page, we'll just take a screenshot
    await page.setViewport({ width: 1280, height: 800 });
    await page.screenshot({ path: `${dir}/comparison-matrix.png` });
    console.log("Captured: comparison-matrix.png");

    // 4. Unlock Flow
    // Click unlock button
    try {
        await page.evaluate(() => {
            const btn = Array.from(document.querySelectorAll('button')).find(el => el.textContent.includes('Unlock Contact'));
            if (btn) btn.click();
        });
        await new Promise(r => setTimeout(r, 1000)); // wait for modal
        await page.screenshot({ path: `${dir}/unlock-flow.png` });
        console.log("Captured: unlock-flow.png");
    } catch (e) {
        console.error("Could not capture unlock flow", e);
    }

    await browser.close();
})();
