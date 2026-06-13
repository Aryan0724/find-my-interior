const puppeteer = require('puppeteer');

(async () => {
  const browser = await puppeteer.launch();
  const page = await browser.newPage();
  
  // Set viewport for desktop
  await page.setViewport({ width: 1440, height: 900 });
  
  // Navigate to messages page
  await page.goto('http://localhost:3000/messages', { waitUntil: 'networkidle2' });
  
  // Take screenshot and save to artifacts directory
  await page.screenshot({ path: 'C:\\Users\\Aryan\\.gemini\\antigravity-ide\\brain\\98c71c13-b2c2-454d-8afa-bfc138eecea1\\real_messages_ui.png' });
  
  await browser.close();
  console.log('Screenshot saved!');
})();
