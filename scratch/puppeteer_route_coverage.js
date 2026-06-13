const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const routes = [
    '/',
    '/login',
    '/register',
    '/dashboard',
    '/post-requirement',
    '/professionals',
    '/projects',
    '/materials',
    '/workers',
    '/messages',
    '/blog',
    '/admin'
];

const BASE_URL = 'http://localhost:3000';
const SCREENSHOT_DIR = path.join(__dirname, '../findmyinterior-frontend/evidence/screenshots');

(async () => {
    const browser = await puppeteer.launch({ headless: 'new' });
    const page = await browser.newPage();
    
    // Set viewport
    await page.setViewport({ width: 1280, height: 800 });

    const results = [];

    for (const route of routes) {
        console.log(`Verifying route: ${route}`);
        let apiCalls = [];
        
        const requestHandler = request => {
            if (request.url().includes('localhost:8000/api')) {
                apiCalls.push(request.url());
            }
        };
        
        page.on('request', requestHandler);
        
        let status = 'Unknown';
        let dataLoads = false;
        
        try {
            const response = await page.goto(`${BASE_URL}${route}`, { waitUntil: 'networkidle2', timeout: 10000 });
            status = response.status();
            
            // Wait an extra second for any hydration
            await new Promise(r => setTimeout(r, 1000));
            
            if (status === 200 || status === 304) {
                // If there are API calls, we assume data loaded (simplistic check for this report)
                dataLoads = apiCalls.length > 0;
            }
            
            // Take screenshot
            const safeRoute = route === '/' ? 'home' : route.replace(/\//g, '_');
            await page.screenshot({ path: path.join(SCREENSHOT_DIR, `route_${safeRoute}_after.png`) });
            
        } catch (error) {
            console.error(`Error loading ${route}:`, error.message);
            status = 'Error';
            
            const safeRoute = route === '/' ? 'home' : route.replace(/\//g, '_');
            await page.screenshot({ path: path.join(SCREENSHOT_DIR, `route_${safeRoute}_error.png`) });
        } finally {
            page.off('request', requestHandler);
        }
        
        results.push({
            route,
            exists: status === 200 || status === 304 || status === 401 ? '✓' : '✗',
            reachable: status === 200 || status === 304 ? '✓' : '✗',
            dataLoads: dataLoads ? '✓' : (status === 200 ? 'No API Calls' : '✗'),
            status: status
        });
    }

    await browser.close();

    // Generate Markdown Report
    let md = '# Route Coverage Report\n\n';
    md += '| Route | Exists | Page Reachable | Data Loads | HTTP Status |\n';
    md += '| ----- | ------ | -------------- | ---------- | ----------- |\n';
    
    for (const res of results) {
        md += `| ${res.route} | ${res.exists} | ${res.reachable} | ${res.dataLoads} | ${res.status} |\n`;
    }

    fs.writeFileSync(path.join(__dirname, '../findmyinterior-frontend/ROUTE_COVERAGE_REPORT.md'), md);
    console.log('Done! Generated ROUTE_COVERAGE_REPORT.md');
})();
