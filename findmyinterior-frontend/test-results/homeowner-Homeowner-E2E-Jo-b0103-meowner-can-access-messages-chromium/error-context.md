# Instructions

- Following Playwright test failed.
- Explain why, be concise, respect Playwright best practices.
- Provide a snippet of code with the fix, if possible.

# Test info

- Name: homeowner.spec.ts >> Homeowner E2E Journey >> HO-06: Homeowner can access messages
- Location: e2e\tests\homeowner.spec.ts:139:7

# Error details

```
TimeoutError: page.waitForURL: Timeout 60000ms exceeded.
=========================== logs ===========================
waiting for navigation until "load"
============================================================
```

```
Tearing down "context" exceeded the test timeout of 180000ms.
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
    - generic [ref=e127]:
      - generic [ref=e128]:
        - generic [ref=e129]: Welcome back
        - generic [ref=e130]: Enter your email and password to login to your account.
      - generic [ref=e131]:
        - generic [ref=e132]:
          - generic [ref=e133]:
            - generic [ref=e134]: Email
            - textbox "Email" [ref=e135]:
              - /placeholder: m@example.com
              - text: homeowner@e2e.test
          - generic [ref=e136]:
            - generic [ref=e137]:
              - generic [ref=e138]: Password
              - link "Forgot password?" [ref=e139] [cursor=pointer]:
                - /url: /forgot-password
            - generic [ref=e140]:
              - textbox "Password" [ref=e141]: password
              - button [ref=e142]:
                - img [ref=e143]
        - generic [ref=e146]:
          - button "Login" [ref=e147]
          - generic [ref=e148]:
            - text: Don't have an account?
            - link "Register here" [ref=e149] [cursor=pointer]:
              - /url: /register
  - contentinfo [ref=e150]:
    - generic [ref=e151]:
      - generic [ref=e152]:
        - heading "Find My Interior" [level=2] [ref=e153]:
          - img "Find My Interior" [ref=e154]
        - paragraph [ref=e155]: Bihar's largest marketplace connecting homeowners with verified interior designers, builders, suppliers, and skilled workers.
        - generic [ref=e156]:
          - link "Website" [ref=e157] [cursor=pointer]:
            - /url: "#"
            - img [ref=e158]
          - link "Email" [ref=e161] [cursor=pointer]:
            - /url: mailto:info@findmyinterior.com
            - img [ref=e162]
      - generic [ref=e165]:
        - heading "Quick Links" [level=3] [ref=e166]
        - list [ref=e167]:
          - listitem [ref=e168]:
            - link "Home" [ref=e169] [cursor=pointer]:
              - /url: /
          - listitem [ref=e170]:
            - link "Interior Designers" [ref=e171] [cursor=pointer]:
              - /url: /professionals
          - listitem [ref=e172]:
            - link "Builder Projects" [ref=e173] [cursor=pointer]:
              - /url: /projects
          - listitem [ref=e174]:
            - link "Materials & Suppliers" [ref=e175] [cursor=pointer]:
              - /url: /materials
          - listitem [ref=e176]:
            - link "Skilled Workers" [ref=e177] [cursor=pointer]:
              - /url: /workers
          - listitem [ref=e178]:
            - link "Blog & Guides" [ref=e179] [cursor=pointer]:
              - /url: /blog
      - generic [ref=e180]:
        - heading "For Businesses" [level=3] [ref=e181]
        - list [ref=e182]:
          - listitem [ref=e183]:
            - link "List Your Business" [ref=e184] [cursor=pointer]:
              - /url: /register
          - listitem [ref=e185]:
            - link "Vendor Login" [ref=e186] [cursor=pointer]:
              - /url: /login
          - listitem [ref=e187]:
            - link "Post a Requirement" [ref=e188] [cursor=pointer]:
              - /url: /post-requirement
      - generic [ref=e189]:
        - heading "Contact" [level=3] [ref=e190]
        - list [ref=e191]:
          - listitem [ref=e192]:
            - img [ref=e193]
            - text: info@findmyinterior.com
          - listitem [ref=e196]:
            - img [ref=e197]
            - text: +91 98765 43210
          - listitem [ref=e199]:
            - img [ref=e200]
            - text: Patna, Bihar 800001
    - generic [ref=e203]: © 2026 FindMyInterior.com. All rights reserved.
  - button "Open Next.js Dev Tools" [ref=e209] [cursor=pointer]:
    - generic [ref=e212]:
      - text: Rendering
      - generic [ref=e213]:
        - generic [ref=e214]: .
        - generic [ref=e215]: .
        - generic [ref=e216]: .
  - alert [ref=e217]
```