# FINDMYINTERIOR.COM — DATABASE SCHEMA

Version: 2.0 (Approved)
Last Updated: 2026-06-12

---

## DECISIONS

- Database: MySQL 8.0+
- Geography: Bihar only (districts + cities as proper tables)
- Auth: Laravel Sanctum (token-based)
- Polymorphic: Reviews + Inquiries use morphable pattern
- Soft Deletes: All main entities use SoftDeletes
- Timestamps: All tables have created_at + updated_at

---

## MIGRATION ORDER

Run migrations in this exact order (dependencies first):

```
001_create_users_table
002_create_districts_table
003_create_cities_table
004_create_categories_table
005_create_listings_table
006_create_listing_galleries_table
007_create_requirements_table
008_create_requirement_images_table
009_create_builders_table
010_create_builder_projects_table
011_create_builder_project_images_table
012_create_suppliers_table
013_create_supplier_products_table
014_create_supplier_product_images_table
015_create_workers_table
016_create_reviews_table
017_create_inquiries_table
018_create_blogs_table
019_create_blog_tags_table
020_create_payments_table
021_create_subscription_plans_table
022_create_user_subscriptions_table
023_create_contact_unlocks_table
024_create_seo_pages_table
025_add_fulltext_indexes
```

---

## TABLE DEFINITIONS

---

### TABLE: users

```sql
id                  BIGINT UNSIGNED PK AUTO_INCREMENT
name                VARCHAR(255) NOT NULL
email               VARCHAR(255) UNIQUE NOT NULL
phone               VARCHAR(20) NULL
password            VARCHAR(255) NOT NULL
role                ENUM('guest','customer','business','builder','supplier','worker','admin') DEFAULT 'customer'
avatar              VARCHAR(255) NULL
email_verified_at   TIMESTAMP NULL
is_active           BOOLEAN DEFAULT TRUE
deleted_at          TIMESTAMP NULL
created_at          TIMESTAMP
updated_at          TIMESTAMP

INDEX: role
INDEX: is_active
```

---

### TABLE: districts

```sql
id          BIGINT UNSIGNED PK AUTO_INCREMENT
name        VARCHAR(100) NOT NULL
slug        VARCHAR(100) UNIQUE NOT NULL
state       VARCHAR(100) NOT NULL DEFAULT 'Bihar'
is_active   BOOLEAN DEFAULT TRUE
created_at  TIMESTAMP
updated_at  TIMESTAMP

INDEX: state
INDEX: is_active
```

Bihar has 38 districts. All seeded.

---

### TABLE: cities

```sql
id           BIGINT UNSIGNED PK AUTO_INCREMENT
district_id  BIGINT UNSIGNED FK → districts(id)
name         VARCHAR(100) NOT NULL
slug         VARCHAR(100) NOT NULL
is_active    BOOLEAN DEFAULT TRUE
created_at   TIMESTAMP
updated_at   TIMESTAMP

UNIQUE: (district_id, slug)
INDEX: district_id
```

---

### TABLE: categories

```sql
id           BIGINT UNSIGNED PK AUTO_INCREMENT
name         VARCHAR(255) NOT NULL
slug         VARCHAR(255) UNIQUE NOT NULL
icon         VARCHAR(255) NULL
image        VARCHAR(255) NULL
description  TEXT NULL
parent_id    BIGINT UNSIGNED NULL FK → categories(id)
sort_order   INT DEFAULT 0
is_active    BOOLEAN DEFAULT TRUE
created_at   TIMESTAMP
updated_at   TIMESTAMP

INDEX: parent_id
INDEX: sort_order
```

Seed Data:
1. Interior Designers
2. Architects
3. Civil Contractors
4. Builders
5. Suppliers & Vendors
6. Skilled Workers
7. Modular Kitchen Experts
8. Painters
9. Electricians
10. Plumbers

---

### TABLE: listings

```sql
id                BIGINT UNSIGNED PK AUTO_INCREMENT
user_id           BIGINT UNSIGNED FK → users(id)
category_id       BIGINT UNSIGNED FK → categories(id)
city_id           BIGINT UNSIGNED NULL FK → cities(id)
district_id       BIGINT UNSIGNED NULL FK → districts(id)
title             VARCHAR(255) NOT NULL
slug              VARCHAR(255) UNIQUE NOT NULL
description       TEXT NOT NULL
tagline           VARCHAR(255) NULL
cover_image       VARCHAR(255) NULL
phone             VARCHAR(20) NULL
whatsapp          VARCHAR(20) NULL
email             VARCHAR(255) NULL
website           VARCHAR(255) NULL
city              VARCHAR(100) NOT NULL
district          VARCHAR(100) NOT NULL
state             VARCHAR(100) DEFAULT 'Bihar'
address           TEXT NULL
lat               DECIMAL(10,8) NULL
lng               DECIMAL(11,8) NULL
years_experience  INT NULL
team_size         INT NULL
avg_rating        DECIMAL(3,2) DEFAULT 0.00
review_count      INT DEFAULT 0
is_verified       BOOLEAN DEFAULT FALSE
is_featured       BOOLEAN DEFAULT FALSE
is_premium        BOOLEAN DEFAULT FALSE
status            ENUM('draft','active','inactive','suspended') DEFAULT 'draft'
views_count       INT DEFAULT 0
deleted_at        TIMESTAMP NULL
created_at        TIMESTAMP
updated_at        TIMESTAMP

INDEX: user_id
INDEX: category_id
INDEX: city_id
INDEX: district_id
INDEX: status
INDEX: is_featured
INDEX: is_verified
FULLTEXT: title, description
```

---

### TABLE: listing_galleries

```sql
id          BIGINT UNSIGNED PK AUTO_INCREMENT
listing_id  BIGINT UNSIGNED FK → listings(id) ON DELETE CASCADE
image_url   VARCHAR(255) NOT NULL
caption     VARCHAR(255) NULL
sort_order  INT DEFAULT 0
created_at  TIMESTAMP
updated_at  TIMESTAMP

INDEX: listing_id
```

---

### TABLE: requirements

```sql
id            BIGINT UNSIGNED PK AUTO_INCREMENT
user_id       BIGINT UNSIGNED NULL FK → users(id)
category_id   BIGINT UNSIGNED FK → categories(id)
city_id       BIGINT UNSIGNED NULL FK → cities(id)
district_id   BIGINT UNSIGNED NULL FK → districts(id)
title         VARCHAR(255) NOT NULL
description   TEXT NOT NULL
project_type  VARCHAR(100) NOT NULL
budget_min    DECIMAL(12,2) NULL
budget_max    DECIMAL(12,2) NULL
city          VARCHAR(100) NOT NULL
district      VARCHAR(100) NOT NULL
name          VARCHAR(255) NOT NULL
phone         VARCHAR(20) NOT NULL
email         VARCHAR(255) NULL
status        ENUM('open','in_progress','closed') DEFAULT 'open'
is_verified   BOOLEAN DEFAULT FALSE
deleted_at    TIMESTAMP NULL
created_at    TIMESTAMP
updated_at    TIMESTAMP

INDEX: user_id
INDEX: category_id
INDEX: status
INDEX: city_id
INDEX: district_id
```

---

### TABLE: requirement_images

```sql
id              BIGINT UNSIGNED PK AUTO_INCREMENT
requirement_id  BIGINT UNSIGNED FK → requirements(id) ON DELETE CASCADE
image_url       VARCHAR(255) NOT NULL
created_at      TIMESTAMP
updated_at      TIMESTAMP

INDEX: requirement_id
```

---

### TABLE: builders

```sql
id                  BIGINT UNSIGNED PK AUTO_INCREMENT
user_id             BIGINT UNSIGNED UNIQUE FK → users(id)
city_id             BIGINT UNSIGNED NULL FK → cities(id)
district_id         BIGINT UNSIGNED NULL FK → districts(id)
company_name        VARCHAR(255) NOT NULL
slug                VARCHAR(255) UNIQUE NOT NULL
tagline             VARCHAR(255) NULL
logo                VARCHAR(255) NULL
cover_image         VARCHAR(255) NULL
phone               VARCHAR(20) NOT NULL
email               VARCHAR(255) NOT NULL
website             VARCHAR(255) NULL
city                VARCHAR(100) NOT NULL
district            VARCHAR(100) NOT NULL
rera_number         VARCHAR(100) NULL
established_year    YEAR NULL
total_projects      INT DEFAULT 0
delivered_projects  INT DEFAULT 0
avg_rating          DECIMAL(3,2) DEFAULT 0.00
review_count        INT DEFAULT 0
is_verified         BOOLEAN DEFAULT FALSE
is_featured         BOOLEAN DEFAULT FALSE
status              ENUM('active','inactive') DEFAULT 'inactive'
deleted_at          TIMESTAMP NULL
created_at          TIMESTAMP
updated_at          TIMESTAMP

INDEX: city_id
INDEX: district_id
INDEX: is_featured
INDEX: is_verified
```

---

### TABLE: builder_projects

```sql
id                    BIGINT UNSIGNED PK AUTO_INCREMENT
builder_id            BIGINT UNSIGNED FK → builders(id) ON DELETE CASCADE
title                 VARCHAR(255) NOT NULL
slug                  VARCHAR(255) UNIQUE NOT NULL
description           TEXT NOT NULL
cover_image           VARCHAR(255) NULL
project_type          ENUM('residential','commercial','mixed') DEFAULT 'residential'
location              VARCHAR(255) NOT NULL
city                  VARCHAR(100) NOT NULL
bhk_options           VARCHAR(100) NULL
area_sqft_min         INT NULL
area_sqft_max         INT NULL
price_min             DECIMAL(15,2) NULL
price_max             DECIMAL(15,2) NULL
possession_date       DATE NULL
is_possession_ready   BOOLEAN DEFAULT FALSE
status                ENUM('upcoming','ongoing','completed','possession_ready') DEFAULT 'upcoming'
is_featured           BOOLEAN DEFAULT FALSE
deleted_at            TIMESTAMP NULL
created_at            TIMESTAMP
updated_at            TIMESTAMP

INDEX: builder_id
INDEX: status
INDEX: is_possession_ready
INDEX: is_featured
```

---

### TABLE: builder_project_images

```sql
id                  BIGINT UNSIGNED PK AUTO_INCREMENT
builder_project_id  BIGINT UNSIGNED FK → builder_projects(id) ON DELETE CASCADE
image_url           VARCHAR(255) NOT NULL
caption             VARCHAR(255) NULL
sort_order          INT DEFAULT 0
created_at          TIMESTAMP
updated_at          TIMESTAMP

INDEX: builder_project_id
```

---

### TABLE: suppliers

```sql
id              BIGINT UNSIGNED PK AUTO_INCREMENT
user_id         BIGINT UNSIGNED UNIQUE FK → users(id)
city_id         BIGINT UNSIGNED NULL FK → cities(id)
district_id     BIGINT UNSIGNED NULL FK → districts(id)
company_name    VARCHAR(255) NOT NULL
slug            VARCHAR(255) UNIQUE NOT NULL
tagline         VARCHAR(255) NULL
logo            VARCHAR(255) NULL
cover_image     VARCHAR(255) NULL
phone           VARCHAR(20) NOT NULL
email           VARCHAR(255) NOT NULL
website         VARCHAR(255) NULL
city            VARCHAR(100) NOT NULL
district        VARCHAR(100) NOT NULL
gst_number      VARCHAR(20) NULL
business_type   VARCHAR(100) NULL
avg_rating      DECIMAL(3,2) DEFAULT 0.00
review_count    INT DEFAULT 0
is_verified     BOOLEAN DEFAULT FALSE
is_featured     BOOLEAN DEFAULT FALSE
status          ENUM('active','inactive') DEFAULT 'inactive'
deleted_at      TIMESTAMP NULL
created_at      TIMESTAMP
updated_at      TIMESTAMP

INDEX: city_id
INDEX: district_id
INDEX: is_featured
```

---

### TABLE: supplier_products

```sql
id           BIGINT UNSIGNED PK AUTO_INCREMENT
supplier_id  BIGINT UNSIGNED FK → suppliers(id) ON DELETE CASCADE
name         VARCHAR(255) NOT NULL
slug         VARCHAR(255) UNIQUE NOT NULL
description  TEXT NULL
cover_image  VARCHAR(255) NULL
category     VARCHAR(100) NOT NULL
unit         VARCHAR(50) NULL
price_min    DECIMAL(12,2) NULL
price_max    DECIMAL(12,2) NULL
is_active    BOOLEAN DEFAULT TRUE
deleted_at   TIMESTAMP NULL
created_at   TIMESTAMP
updated_at   TIMESTAMP

INDEX: supplier_id
INDEX: category
INDEX: is_active
```

---

### TABLE: supplier_product_images

```sql
id                   BIGINT UNSIGNED PK AUTO_INCREMENT
supplier_product_id  BIGINT UNSIGNED FK → supplier_products(id) ON DELETE CASCADE
image_url            VARCHAR(255) NOT NULL
sort_order           INT DEFAULT 0
created_at           TIMESTAMP
updated_at           TIMESTAMP

INDEX: supplier_product_id
```

---

### TABLE: workers

```sql
id                BIGINT UNSIGNED PK AUTO_INCREMENT
user_id           BIGINT UNSIGNED UNIQUE FK → users(id)
city_id           BIGINT UNSIGNED NULL FK → cities(id)
district_id       BIGINT UNSIGNED NULL FK → districts(id)
name              VARCHAR(255) NOT NULL
slug              VARCHAR(255) UNIQUE NOT NULL
avatar            VARCHAR(255) NULL
phone             VARCHAR(20) NOT NULL
city              VARCHAR(100) NOT NULL
district          VARCHAR(100) NOT NULL
skill             VARCHAR(100) NOT NULL
skills_tags       JSON NULL
experience_years  INT DEFAULT 0
daily_rate        DECIMAL(8,2) NULL
is_available      BOOLEAN DEFAULT TRUE
is_verified       BOOLEAN DEFAULT FALSE
is_featured       BOOLEAN DEFAULT FALSE
avg_rating        DECIMAL(3,2) DEFAULT 0.00
review_count      INT DEFAULT 0
bio               TEXT NULL
status            ENUM('active','inactive') DEFAULT 'inactive'
deleted_at        TIMESTAMP NULL
created_at        TIMESTAMP
updated_at        TIMESTAMP

INDEX: city_id
INDEX: district_id
INDEX: skill
INDEX: is_available
INDEX: is_featured
FULLTEXT: name, skill, bio
```

---

### TABLE: reviews

```sql
id                BIGINT UNSIGNED PK AUTO_INCREMENT
user_id           BIGINT UNSIGNED FK → users(id)
reviewable_type   VARCHAR(255) NOT NULL
reviewable_id     BIGINT UNSIGNED NOT NULL
rating            TINYINT UNSIGNED NOT NULL CHECK (rating BETWEEN 1 AND 5)
title             VARCHAR(255) NULL
body              TEXT NOT NULL
is_approved       BOOLEAN DEFAULT FALSE
deleted_at        TIMESTAMP NULL
created_at        TIMESTAMP
updated_at        TIMESTAMP

INDEX: user_id
INDEX: (reviewable_type, reviewable_id)
INDEX: is_approved
```

---

### TABLE: inquiries

```sql
id                BIGINT UNSIGNED PK AUTO_INCREMENT
user_id           BIGINT UNSIGNED NULL FK → users(id)
inquirable_type   VARCHAR(255) NOT NULL
inquirable_id     BIGINT UNSIGNED NOT NULL
name              VARCHAR(255) NOT NULL
phone             VARCHAR(20) NOT NULL
email             VARCHAR(255) NULL
message           TEXT NOT NULL
is_read           BOOLEAN DEFAULT FALSE
status            ENUM('new','contacted','closed') DEFAULT 'new'
created_at        TIMESTAMP
updated_at        TIMESTAMP

INDEX: user_id
INDEX: (inquirable_type, inquirable_id)
INDEX: status
INDEX: is_read
```

---

### TABLE: blogs

```sql
id            BIGINT UNSIGNED PK AUTO_INCREMENT
author_id     BIGINT UNSIGNED FK → users(id)
title         VARCHAR(255) NOT NULL
slug          VARCHAR(255) UNIQUE NOT NULL
excerpt       TEXT NOT NULL
content       LONGTEXT NOT NULL
cover_image   VARCHAR(255) NULL
category      VARCHAR(100) NOT NULL
status        ENUM('draft','published') DEFAULT 'draft'
published_at  TIMESTAMP NULL
views_count   INT DEFAULT 0
deleted_at    TIMESTAMP NULL
created_at    TIMESTAMP
updated_at    TIMESTAMP

INDEX: author_id
INDEX: status
INDEX: published_at
INDEX: category
FULLTEXT: title, excerpt, content
```

---

### TABLE: blog_tags

```sql
id       BIGINT UNSIGNED PK AUTO_INCREMENT
blog_id  BIGINT UNSIGNED FK → blogs(id) ON DELETE CASCADE
tag      VARCHAR(100) NOT NULL

INDEX: blog_id
INDEX: tag
```

---

### TABLE: subscription_plans

```sql
id                       BIGINT UNSIGNED PK AUTO_INCREMENT
name                     VARCHAR(255) NOT NULL
slug                     VARCHAR(255) UNIQUE NOT NULL
price_monthly            DECIMAL(10,2) NOT NULL
price_yearly             DECIMAL(10,2) NOT NULL
features                 JSON NOT NULL
max_listings             INT NOT NULL DEFAULT 1
max_gallery_images       INT NOT NULL DEFAULT 10
lead_unlocks_per_month   INT NOT NULL DEFAULT 0
can_see_all_leads        BOOLEAN DEFAULT FALSE
is_featured_listing      BOOLEAN DEFAULT FALSE
is_active                BOOLEAN DEFAULT TRUE
created_at               TIMESTAMP
updated_at               TIMESTAMP
```

MVP Plans:
- Basic (free or ₹0)
- Professional (₹999/mo)
- Premium (₹2499/mo)

---

### TABLE: payments

```sql
id                   BIGINT UNSIGNED PK AUTO_INCREMENT
user_id              BIGINT UNSIGNED FK → users(id)
razorpay_order_id    VARCHAR(255) UNIQUE NOT NULL
razorpay_payment_id  VARCHAR(255) NULL
razorpay_signature   VARCHAR(255) NULL
amount               DECIMAL(10,2) NOT NULL
currency             VARCHAR(10) DEFAULT 'INR'
purpose              ENUM('subscription','premium_listing','featured_listing','lead_unlock')
status               ENUM('pending','success','failed','refunded') DEFAULT 'pending'
meta                 JSON NULL
created_at           TIMESTAMP
updated_at           TIMESTAMP

INDEX: user_id
INDEX: status
INDEX: purpose
```

---

### TABLE: user_subscriptions

```sql
id                    BIGINT UNSIGNED PK AUTO_INCREMENT
user_id               BIGINT UNSIGNED FK → users(id)
subscription_plan_id  BIGINT UNSIGNED FK → subscription_plans(id)
payment_id            BIGINT UNSIGNED NULL FK → payments(id)
billing_cycle         ENUM('monthly','yearly') DEFAULT 'monthly'
status                ENUM('active','expired','cancelled') DEFAULT 'active'
starts_at             TIMESTAMP NOT NULL
expires_at            TIMESTAMP NOT NULL
created_at            TIMESTAMP
updated_at            TIMESTAMP

INDEX: user_id
INDEX: status
INDEX: expires_at
```

---

### TABLE: contact_unlocks

```sql
id              BIGINT UNSIGNED PK AUTO_INCREMENT
user_id         BIGINT UNSIGNED FK → users(id)
requirement_id  BIGINT UNSIGNED FK → requirements(id)
payment_id      BIGINT UNSIGNED NULL FK → payments(id)
created_at      TIMESTAMP
updated_at      TIMESTAMP

UNIQUE: (user_id, requirement_id)
INDEX: user_id
INDEX: requirement_id
```

---

### TABLE: seo_pages

```sql
id                BIGINT UNSIGNED PK AUTO_INCREMENT
title             VARCHAR(255) NOT NULL
slug              VARCHAR(255) UNIQUE NOT NULL
meta_title        VARCHAR(255) NULL
meta_description  VARCHAR(500) NULL
schema_json       JSON NULL
is_active         BOOLEAN DEFAULT TRUE
created_at        TIMESTAMP
updated_at        TIMESTAMP

INDEX: slug
INDEX: is_active
```

Use case: Admin can override meta tags for specific pages (homepage, category pages).

---

## RELATIONSHIPS SUMMARY

```
users           ──< listings          (hasMany)
users           ──< requirements      (hasMany)
users           ──< reviews           (hasMany)
users           ──< inquiries         (hasMany)
users           ──< payments          (hasMany)
users           ──o builders          (hasOne)
users           ──o suppliers         (hasOne)
users           ──o workers           (hasOne)
users           ──o user_subscriptions (hasOne active)

districts       ──< cities            (hasMany)
cities          ──< listings          (hasMany)
cities          ──< builders          (hasMany)
cities          ──< suppliers         (hasMany)
cities          ──< workers           (hasMany)

categories      ──< listings          (hasMany)
categories      ──< requirements      (hasMany)

listings        ──< listing_galleries (hasMany)
listings        ──< reviews           (morphMany)
listings        ──< inquiries         (morphMany)

builders        ──< builder_projects  (hasMany)
builder_projects ──< builder_project_images (hasMany)
builders        ──< reviews           (morphMany)
builders        ──< inquiries         (morphMany)

suppliers       ──< supplier_products (hasMany)
supplier_products ──< supplier_product_images (hasMany)
suppliers       ──< reviews           (morphMany)
suppliers       ──< inquiries         (morphMany)

workers         ──< reviews           (morphMany)
workers         ──< inquiries         (morphMany)

requirements    ──< requirement_images (hasMany)
requirements    ──< contact_unlocks   (hasMany)

blogs           ──< blog_tags         (hasMany)

subscription_plans ──< user_subscriptions (hasMany)
payments           ──o user_subscriptions (hasOne)
payments           ──o contact_unlocks   (hasOne)
```

---

## SEED DATA PLAN

### Bihar Districts (38)
All 38 Bihar districts seeded in districts table.

Key districts: Patna, Gaya, Bhagalpur, Muzaffarpur, Darbhanga,
Nalanda, Vaishali, Saran, Siwan, Madhubani, Sitamarhi,
Purnia, Katihar, Samastipur, Begusarai, Munger, Jamui,
Banka, Bhojpur, Buxar, Rohtas, Kaimur, Aurangabad,
Arwal, Jehanabad, Nawada, Sheikhpura, Lakhisarai,
Khagaria, Saharsa, Supaul, Madhepura, Araria, Kishanganj,
Sheohar, West Champaran, East Champaran, Gopalganj

### Cities (50+)
Major cities per district. Focus on tier-1 Bihar cities:
Patna, Gaya, Muzaffarpur, Bhagalpur, Darbhanga,
Purnia, Arrah, Bihar Sharif, Begusarai, Katihar,
Munger, Chapra, Motihari, Hajipur, Sasaram

### Professionals (50 Listings)
Mix across all 10 categories. Patna-heavy (25), rest of Bihar (25).

### Builders (20)
5 projects each. Mix of ongoing + possession ready.

### Suppliers (20)
5 products each. Categories: tiles, cement, marble, wood, hardware.

### Workers (50)
Mix: Painters (12), Plumbers (8), Electricians (8),
Carpenters (8), Masons (8), Welders (6)

### Blogs (10)
Topics: Interior design tips, builder guide, renovation costs,
vastu tips, home decor ideas.

END OF DOCUMENT
