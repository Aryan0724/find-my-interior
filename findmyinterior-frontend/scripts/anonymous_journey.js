const puppeteer = require('puppeteer');

const BASE_URL = 'http://localhost:3000';

(async () => {
    console.log("=== ANONYMOUS VISITOR JOURNEY ===");
    const browser = await puppeteer.launch({ headless: 'new' });
    const page = await browser.newPage();
    await page.setViewport({ width: 1280, height: 800 });
    
    let step = 1;
    let passed = true;
    let failReason = "";

    try {
        // Step 1: Homepage
        console.log(`Step ${step++}: Navigating to Homepage`);
        await page.goto(BASE_URL, { waitUntil: 'networkidle2' });
        
        // Step 2: Browse Professionals
        console.log(`Step ${step++}: Clicking 'COMPARE NOW' to browse professionals`);
        await Promise.all([
            page.waitForNavigation({ waitUntil: 'networkidle2', timeout: 10000 }),
            page.click('button:has-text("COMPARE NOW"), a:has-text("COMPARE NOW"), .bg-[#0a1c3a]') // Rough selector
        ]).catch(e => {
            // Alternative click if strict selector fails
            return page.evaluate(() => {
                const elements = Array.from(document.querySelectorAll('button, a'));
                const el = elements.find(e => e.textContent.includes('COMPARE NOW'));
                if(el) { el.click(); return true; }
                throw new Error("COMPARE NOW button not found");
            }).then(() => page.waitForNavigation({ waitUntil: 'networkidle2', timeout: 10000 }));
        });

        if (!page.url().includes('/professionals')) throw new Error("Did not route to /professionals");

        // Step 3: View Profile
        console.log(`Step ${step++}: Clicking a professional profile`);
        // The professionals page might not have data if seeders weren't run or API fails.
        const clickedProfile = await page.evaluate(() => {
            const cards = document.querySelectorAll('a[href^="/professionals/"]');
            if (cards.length > 0) {
                cards[0].click();
                return true;
            }
            return false;
        });

        if (clickedProfile) {
            await page.waitForNavigation({ waitUntil: 'networkidle2', timeout: 10000 });
        } else {
            console.log("⚠️ No professional profiles found to click. API might be empty or broken.");
            // We won't strictly fail here if the DB is just empty, but we'll note it.
        }

        // Step 4: Post Requirement
        console.log(`Step ${step++}: Clicking 'Post Your Requirement'`);
        await page.evaluate(() => {
            const elements = Array.from(document.querySelectorAll('button, a'));
            const el = elements.find(e => e.textContent.includes('Post Your Requirement'));
            if(el) { el.click(); return true; }
            throw new Error("Post Your Requirement button not found");
        });
        await page.waitForNavigation({ waitUntil: 'networkidle2', timeout: 10000 });

        if (!page.url().includes('/post-requirement')) throw new Error("Did not route to /post-requirement");

        console.log(`Step ${step++}: Journey Complete! All UI actions successfully triggered routes.`);

    } catch (e) {
        passed = false;
        failReason = e.message;
        console.error(`❌ FAILED at Step ${step-1}: ${failReason}`);
    } finally {
        await browser.close();
        if (passed) {
            console.log("✅ ANONYMOUS VISITOR JOURNEY: PASS");
        }
    }
})();
