const puppeteer = require('puppeteer');

const BASE_URL = 'http://localhost:3000';

(async () => {
    const browser = await puppeteer.launch({ headless: 'new' });
    const page = await browser.newPage();
    await page.setViewport({ width: 1280, height: 800 });

    let results = [];

    const verifyClick = async (actionName, selector, expectedPath, isText = false) => {
        try {
            console.log(`Testing: ${actionName}`);
            await page.goto(BASE_URL, { waitUntil: 'networkidle2' });
            
            if (isText) {
                // Find element by text and click it using evaluate
                const clicked = await page.evaluate((textToFind) => {
                    const elements = Array.from(document.querySelectorAll('button, a, span'));
                    const el = elements.find(e => e.textContent && e.textContent.includes(textToFind));
                    if (el) {
                        el.click();
                        return true;
                    }
                    return false;
                }, selector);
                
                if (!clicked) throw new Error('Element not found');
            } else {
                await page.waitForSelector(selector, { timeout: 2000 });
                await page.click(selector);
            }

            // Wait for navigation
            await page.waitForNavigation({ waitUntil: 'networkidle2', timeout: 5000 }).catch(() => {});
            
            const currentUrl = page.url();
            if (currentUrl.includes(expectedPath)) {
                results.push(`✅ PASS: ${actionName} -> successfully navigated to ${expectedPath}`);
            } else {
                results.push(`❌ FAIL: ${actionName} -> stayed on ${currentUrl} (expected ${expectedPath})`);
            }
        } catch (e) {
            results.push(`❌ FAIL: ${actionName} -> Exception: ${e.message}`);
        }
    };

    try {
        await verifyClick('COMPARE NOW Button', 'COMPARE NOW', '/professionals', true);
        await verifyClick('Post Your Requirement Button', 'Post Your Requirement', '/post-requirement', true);
        await verifyClick('List Your Business Button', 'List Your Business', '/register', true);
        await verifyClick('Interior Designers SubNav', 'Interior Designers', '/professionals', true);
        await verifyClick('SEARCH PROS Search Bar', 'SEARCH PROS', '/professionals', true);
        await verifyClick('POST NOW Hero Button', "POST NOW (It's Free)", '/post-requirement', true);
        
        console.log('\n--- VERIFICATION RESULTS ---');
        console.log(results.join('\n'));
        console.log('----------------------------\n');

    } catch (e) {
        console.error("Critical error:", e);
    } finally {
        await browser.close();
    }
})();
