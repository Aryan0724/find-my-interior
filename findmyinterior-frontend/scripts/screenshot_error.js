const puppeteer = require('puppeteer');

(async () => {
    const browser = await puppeteer.launch({ headless: 'new' });
    const page = await browser.newPage();
    await page.setViewport({ width: 1280, height: 800 });
    
    await page.goto('http://localhost:3000', { waitUntil: 'networkidle2' });
    
    // Wait for Next.js error portal if it exists
    await new Promise(r => setTimeout(r, 2000));
    
    await page.screenshot({ path: 'C:/Users/Aryan/.gemini/antigravity-ide/brain/901c22fd-6f79-4079-ae63-dd80ba5b32de/error_overlay.png' });
    
    await browser.close();
    console.log("Screenshot saved.");
})();
