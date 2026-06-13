const puppeteer = require('puppeteer');
const fs = require('fs');
const path = require('path');

const BASE_URL = 'http://localhost:3000';

const routes = [
    { path: '/', name: 'Homepage' },
    { path: '/login', name: 'Login' },
    { path: '/register', name: 'Register' },
    { path: '/dashboard', name: 'Dashboard' },
    { path: '/post-requirement', name: 'Post Requirement' },
    { path: '/professionals', name: 'Professionals Listing' },
    { path: '/projects', name: 'Projects Listing' },
    { path: '/materials', name: 'Materials Listing' },
    { path: '/workers', name: 'Workers Listing' },
    { path: '/messages', name: 'Messages' },
    { path: '/blog', name: 'Blog Listing' },
    { path: '/admin', name: 'Admin Dashboard' }
];

(async () => {
    console.log("Starting Route Coverage Audit...");
    const browser = await puppeteer.launch({ headless: 'new' });
    
    let reportMarkdown = `# Route Coverage Report\n\n`;
    reportMarkdown += `| Route | Page Reachable | HTTP Status | Runtime Error (React Crash) |\n`;
    reportMarkdown += `| ----- | -------------- | ----------- | --------------------------- |\n`;

    for (const route of routes) {
        console.log(`Testing: ${route.path}`);
        const page = await browser.newPage();
        
        let statusCode = 'Unknown';
        let isReachable = '✗';
        let hasRuntimeError = 'No';

        // Capture console errors to detect React hydration/runtime crashes
        page.on('pageerror', err => {
            hasRuntimeError = 'Yes';
            console.error(`[PAGE ERROR] on ${route.path}: ${err.message}`);
        });

        try {
            const response = await page.goto(`${BASE_URL}${route.path}`, { 
                waitUntil: 'networkidle2', 
                timeout: 10000 
            });
            
            if (response) {
                statusCode = response.status();
                if (statusCode >= 200 && statusCode < 400) {
                    isReachable = '✓';
                }
            }
            
            // Check if standard Next.js error overlay exists (indicating a Next.js error)
            const isErrorOverlay = await page.evaluate(() => {
                return !!document.querySelector('nextjs-portal');
            });
            
            if (isErrorOverlay) hasRuntimeError = 'Yes (Next.js Error Overlay)';

        } catch (error) {
            statusCode = 'Error/Timeout';
        }

        reportMarkdown += `| ${route.path} | ${isReachable} | ${statusCode} | ${hasRuntimeError} |\n`;
        await page.close();
    }

    await browser.close();

    const reportPath = path.join('C:', 'Users', 'Aryan', '.gemini', 'antigravity-ide', 'brain', '901c22fd-6f79-4079-ae63-dd80ba5b32de', 'ROUTE_COVERAGE_REPORT.md');
    fs.writeFileSync(reportPath, reportMarkdown);
    console.log(`\nAudit complete! Report saved to ${reportPath}`);

})();
