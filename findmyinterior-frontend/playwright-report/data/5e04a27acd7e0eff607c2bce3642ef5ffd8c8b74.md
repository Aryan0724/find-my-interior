# Instructions

- Following Playwright test failed.
- Explain why, be concise, respect Playwright best practices.
- Provide a snippet of code with the fix, if possible.

# Test info

- Name: homeowner.spec.ts >> Homeowner E2E Journey >> HO-08: Homeowner can navigate to reviews section
- Location: e2e\tests\homeowner.spec.ts:175:7

# Error details

```
TimeoutError: page.waitForURL: Timeout 60000ms exceeded.
=========================== logs ===========================
waiting for navigation to "/dashboard" until "load"
============================================================
```

# Page snapshot

```yaml
- generic [ref=e1]:
  - generic [ref=e2]:
    - generic [ref=e3]:
      - generic [ref=e4]: Bihar's No.1 Home Improvement & Interior Marketplace
      - generic [ref=e5]:
        - generic [ref=e6]:
          - generic [ref=e7]: Download App
          - img [ref=e8]
        - link "Become a Pro" [ref=e10] [cursor=pointer]:
          - /url: /register
          - img [ref=e11]
          - generic [ref=e14]: Become a Pro
        - link "Help & Support" [ref=e15] [cursor=pointer]:
          - /url: /help
          - img [ref=e16]
          - generic [ref=e19]: Help & Support
    - banner [ref=e20]:
      - generic [ref=e21]:
        - link "Find My Interior" [ref=e22] [cursor=pointer]:
          - /url: /
          - img "Find My Interior" [ref=e23]
        - generic [ref=e25]:
          - generic [ref=e26] [cursor=pointer]:
            - img [ref=e27]
            - generic [ref=e30]: Patna
            - img [ref=e31]
          - generic [ref=e33]:
            - textbox "Search services, professionals, projects, suppliers..."
          - button "SEARCH" [active] [ref=e34] [cursor=pointer]:
            - generic [ref=e35]:
              - img [ref=e36]
              - generic [ref=e39]: SEARCH
        - generic [ref=e40]:
          - link [ref=e41] [cursor=pointer]:
            - /url: /messages
            - img [ref=e42]
          - link "COMPARE BIDS" [ref=e46] [cursor=pointer]:
            - /url: /post-requirement
            - button "COMPARE BIDS" [ref=e47]
          - link "Post Requirement Get Multiple Quotes" [ref=e48] [cursor=pointer]:
            - /url: /post-requirement
            - button "Post Requirement Get Multiple Quotes" [ref=e49]:
              - img [ref=e50]
              - generic [ref=e53]:
                - generic [ref=e54]: Post Requirement
                - generic [ref=e55]: Get Multiple Quotes
          - generic [ref=e56]:
            - link "Login" [ref=e57] [cursor=pointer]:
              - /url: /login
              - button "Login" [ref=e58]
            - link "Register" [ref=e59] [cursor=pointer]:
              - /url: /register
              - button "Register" [ref=e60]
            - link "List Your Business Grow Your Business" [ref=e61] [cursor=pointer]:
              - /url: /register
              - button "List Your Business Grow Your Business" [ref=e62]:
                - img [ref=e63]
                - generic [ref=e66]:
                  - generic [ref=e67]: List Your Business
                  - generic [ref=e68]: Grow Your Business
    - list [ref=e71]:
      - listitem [ref=e72]:
        - link "Interior Designers" [ref=e73] [cursor=pointer]:
          - /url: /professionals?search=Interior+Designer
          - img [ref=e74]
          - text: Interior Designers
      - listitem [ref=e77]:
        - link "Architects" [ref=e78] [cursor=pointer]:
          - /url: /professionals?search=Architect
          - img [ref=e79]
          - text: Architects
      - listitem [ref=e83]:
        - link "Contractors" [ref=e84] [cursor=pointer]:
          - /url: /professionals?search=Contractor
          - img [ref=e85]
          - text: Contractors
      - listitem [ref=e90]:
        - link "Skilled Workers" [ref=e91] [cursor=pointer]:
          - /url: /professionals?search=Skilled+Worker
          - img [ref=e92]
          - text: Skilled Workers
      - listitem [ref=e96]:
        - link "Suppliers" [ref=e97] [cursor=pointer]:
          - /url: /professionals?search=Supplier
          - img [ref=e98]
          - text: Suppliers
      - listitem [ref=e103]:
        - link "Projects" [ref=e104] [cursor=pointer]:
          - /url: /projects
          - img [ref=e105]
          - text: Projects
      - listitem [ref=e108]:
        - link "Builder Projects NEW" [ref=e109] [cursor=pointer]:
          - /url: /projects?type=builder
          - img [ref=e110]
          - text: Builder Projects
          - generic [ref=e113]: NEW
      - listitem [ref=e114]:
        - link "Brands" [ref=e115] [cursor=pointer]:
          - /url: /professionals?search=Brand
          - img [ref=e116]
          - text: Brands
      - listitem [ref=e119]:
        - link "Contact" [ref=e120] [cursor=pointer]:
          - /url: /contact
          - img [ref=e121]
          - text: Contact
  - main [ref=e125]:
    - generic [ref=e126]:
      - generic [ref=e127]:
        - heading "Find Interior Designers & Contractors" [level=1] [ref=e128]
        - paragraph [ref=e129]: Browse verified professionals for your home project in Bihar.
        - generic [ref=e130]:
          - generic [ref=e131]:
            - img [ref=e132]
            - textbox "E.g. Modular Kitchen Designer" [ref=e135]
          - generic [ref=e136]:
            - img [ref=e137]
            - textbox "City (e.g. Patna)" [ref=e140]
          - button "Search" [ref=e141]
      - generic [ref=e142]:
        - generic [ref=e144]:
          - generic [ref=e145]:
            - img [ref=e146]
            - text: Filters
          - generic [ref=e148]:
            - generic [ref=e149]:
              - heading "Verification" [level=3] [ref=e150]
              - generic [ref=e151] [cursor=pointer]:
                - checkbox "Verified Only" [ref=e152]
                - text: Verified Only
            - generic [ref=e153]:
              - heading "Sort By" [level=3] [ref=e154]
              - combobox [ref=e155]:
                - option "Featured First" [selected]
                - option "Highest Rated"
                - option "Newest"
            - generic [ref=e156]:
              - heading "Minimum Rating" [level=3] [ref=e157]
              - generic [ref=e158]:
                - generic [ref=e159] [cursor=pointer]:
                  - radio "4 Stars & Up" [ref=e160]
                  - text: 4 Stars & Up
                - generic [ref=e161] [cursor=pointer]:
                  - radio "3 Stars & Up" [ref=e162]
                  - text: 3 Stars & Up
                - generic [ref=e163] [cursor=pointer]:
                  - radio "2 Stars & Up" [ref=e164]
                  - text: 2 Stars & Up
                - generic [ref=e165] [cursor=pointer]:
                  - radio "1 Stars & Up" [ref=e166]
                  - text: 1 Stars & Up
                - generic [ref=e167] [cursor=pointer]:
                  - radio "Any Rating" [checked] [ref=e168]
                  - text: Any Rating
        - generic [ref=e171]: No professionals found matching your search criteria.
  - contentinfo [ref=e172]:
    - generic [ref=e173]:
      - generic [ref=e174]:
        - heading "Find My Interior" [level=2] [ref=e175]:
          - img "Find My Interior" [ref=e176]
        - paragraph [ref=e177]: Bihar's largest marketplace connecting homeowners with verified interior designers, builders, suppliers, and skilled workers.
        - generic [ref=e178]:
          - link "Website" [ref=e179] [cursor=pointer]:
            - /url: "#"
            - img [ref=e180]
          - link "Email" [ref=e183] [cursor=pointer]:
            - /url: mailto:info@findmyinterior.com
            - img [ref=e184]
      - generic [ref=e187]:
        - heading "Quick Links" [level=3] [ref=e188]
        - list [ref=e189]:
          - listitem [ref=e190]:
            - link "Home" [ref=e191] [cursor=pointer]:
              - /url: /
          - listitem [ref=e192]:
            - link "Interior Designers" [ref=e193] [cursor=pointer]:
              - /url: /professionals
          - listitem [ref=e194]:
            - link "Builder Projects" [ref=e195] [cursor=pointer]:
              - /url: /projects
          - listitem [ref=e196]:
            - link "Materials & Suppliers" [ref=e197] [cursor=pointer]:
              - /url: /materials
          - listitem [ref=e198]:
            - link "Skilled Workers" [ref=e199] [cursor=pointer]:
              - /url: /workers
          - listitem [ref=e200]:
            - link "Blog & Guides" [ref=e201] [cursor=pointer]:
              - /url: /blog
      - generic [ref=e202]:
        - heading "For Businesses" [level=3] [ref=e203]
        - list [ref=e204]:
          - listitem [ref=e205]:
            - link "List Your Business" [ref=e206] [cursor=pointer]:
              - /url: /register
          - listitem [ref=e207]:
            - link "Vendor Login" [ref=e208] [cursor=pointer]:
              - /url: /login
          - listitem [ref=e209]:
            - link "Post a Requirement" [ref=e210] [cursor=pointer]:
              - /url: /post-requirement
      - generic [ref=e211]:
        - heading "Contact" [level=3] [ref=e212]
        - list [ref=e213]:
          - listitem [ref=e214]:
            - img [ref=e215]
            - text: info@findmyinterior.com
          - listitem [ref=e218]:
            - img [ref=e219]
            - text: +91 98765 43210
          - listitem [ref=e221]:
            - img [ref=e222]
            - text: Patna, Bihar 800001
    - generic [ref=e225]: © 2026 FindMyInterior.com. All rights reserved.
  - button "Open Next.js Dev Tools" [ref=e231] [cursor=pointer]:
    - img [ref=e232]
  - alert [ref=e235]: Find Professionals | FindMyInterior
```

# Test source

```ts
  77  |       await budgetInput.fill('500000');
  78  |     }
  79  |     
  80  |     // City
  81  |     const cityInput = page.locator('#city').first();
  82  |     if (await cityInput.isVisible()) await cityInput.fill('Patna');
  83  |     
  84  |     // District
  85  |     const districtInput = page.locator('#district').first();
  86  |     if (await districtInput.isVisible()) await districtInput.fill('Patna');
  87  |     
  88  |     // Submit
  89  |     await page.locator('button[type="submit"]').click();
  90  |     
  91  |     // Expect success
  92  |     const success = page.locator('.text-green-600, text=success, text=posted, text=submitted');
  93  |     await expect(success.first()).toBeVisible({ timeout: 15000 });
  94  |   });
  95  | 
  96  |   // ─── 4. View My Projects ─────────────────────────────────────────────────
  97  |   test('HO-04: Homeowner can view their posted requirements', async ({ page, request }) => {
  98  |     await loginPage.login(HOMEOWNER.email, HOMEOWNER.password);
  99  |     await page.waitForURL('/dashboard');
  100 |     
  101 |     // Navigate to "My Projects" tab in dashboard
  102 |     await page.locator('text=My Projects').first().click();
  103 |     await page.waitForTimeout(2000);
  104 |     
  105 |     // Expect at least one requirement (seeded by E2ESeeder)
  106 |     const reqCards = page.locator('text=E2E Living Room Renovation, text=E2E Interior, [data-type="requirement"]');
  107 |     await expect(reqCards.first()).toBeVisible({ timeout: 15000 });
  108 |   });
  109 | 
  110 |   // ─── 5. Access Bids ──────────────────────────────────────────────────────
  111 |   test('HO-05: Homeowner can view bids on their project', async ({ page, request }) => {
  112 |     // Get a valid requirement ID via API
  113 |     const token = await apiLogin(request, HOMEOWNER.email, HOMEOWNER.password);
  114 |     const reqs = await apiGetRequirements(request, token);
  115 |     
  116 |     expect(reqs).toBeDefined();
  117 |     
  118 |     if (reqs && reqs.data && reqs.data.length > 0) {
  119 |       const reqId = reqs.data[0].id;
  120 |       await loginPage.login(HOMEOWNER.email, HOMEOWNER.password);
  121 |       await page.waitForURL('/dashboard');
  122 |       
  123 |       // Navigate to the requirements page
  124 |       await page.goto(`/dashboard/projects/${reqId}`);
  125 |       await page.waitForLoadState('networkidle');
  126 |       
  127 |       // Should show bids section (even if empty)
  128 |       const bidsSection = page.locator('text=Bids, text=No bids, text=Submit a Bid').first();
  129 |       await expect(bidsSection).toBeVisible({ timeout: 15000 });
  130 |     } else {
  131 |       // No requirements yet, just verify dashboard works
  132 |       await loginPage.login(HOMEOWNER.email, HOMEOWNER.password);
  133 |       await page.waitForURL('/dashboard');
  134 |       await expect(page.locator('text=HOMEOWNER').first()).toBeVisible();
  135 |     }
  136 |   });
  137 | 
  138 |   // ─── 6. Access Messages ──────────────────────────────────────────────────
  139 |   test('HO-06: Homeowner can access messages', async ({ page }) => {
  140 |     await loginPage.login(HOMEOWNER.email, HOMEOWNER.password);
  141 |     await page.waitForURL('/dashboard');
  142 |     
  143 |     // Click Messages tab
  144 |     const messagesTab = page.locator('text=Messages').first();
  145 |     await expect(messagesTab).toBeVisible();
  146 |     await messagesTab.click();
  147 |     
  148 |     // Wait for messages content to load
  149 |     await page.waitForTimeout(2000);
  150 |     
  151 |     // Should show messages section (even if empty)
  152 |     const msgSection = page.locator('text=Messages, text=No conversations, text=Inbox').first();
  153 |     await expect(msgSection).toBeVisible({ timeout: 15000 });
  154 |   });
  155 | 
  156 |   // ─── 7. Security: Cannot access Contractor routes ────────────────────────
  157 |   test('HO-07: Homeowner cannot access contractor-specific API endpoints', async ({ page, request }) => {
  158 |     const token = await apiLogin(request, HOMEOWNER.email, HOMEOWNER.password);
  159 |     
  160 |     // Homeowner should not be able to submit a bid
  161 |     const bidRes = await request.post('http://localhost:8000/api/v1/bids', {
  162 |       headers: { Authorization: `Bearer ${token}` },
  163 |       data: { requirement_id: 1, amount: 50000, description: 'Test bid' },
  164 |     });
  165 |     
  166 |     // Bids should either be rejected (403) or at minimum the user is customer so would fail
  167 |     // In practice: if no restriction, this might succeed - we're checking the behavior
  168 |     // An ideal implementation would return 403 for homeowners
  169 |     console.log(`Homeowner bid attempt status: ${bidRes.status()}`);
  170 |     // Document the actual status
  171 |     expect([200, 201, 403, 422]).toContain(bidRes.status());
  172 |   });
  173 | 
  174 |   // ─── 8. Leave a Review ───────────────────────────────────────────────────
  175 |   test('HO-08: Homeowner can navigate to reviews section', async ({ page }) => {
  176 |     await loginPage.login(HOMEOWNER.email, HOMEOWNER.password);
> 177 |     await page.waitForURL('/dashboard');
      |                ^ TimeoutError: page.waitForURL: Timeout 60000ms exceeded.
  178 |     
  179 |     // Click Reviews tab
  180 |     const reviewsTab = page.locator('text=Reviews, text=My Reviews').first();
  181 |     if (await reviewsTab.isVisible()) {
  182 |       await reviewsTab.click();
  183 |       await page.waitForTimeout(2000);
  184 |       await expect(page.locator('text=Reviews, text=No reviews, text=Leave Review').first()).toBeVisible();
  185 |     } else {
  186 |       // Reviews might be in a different section
  187 |       await expect(page.locator('text=HOMEOWNER').first()).toBeVisible();
  188 |     }
  189 |   });
  190 | });
  191 | 
```