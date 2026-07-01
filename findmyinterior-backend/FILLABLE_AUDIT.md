# FILLABLE AUDIT REPORT

## Model: ActivityLog
- Table: `activity_logs`
- DB Columns: 9
- Fillable: 0
- **Missing from Fillable:**
  - `user_id`
  - `subject_type`
  - `subject_id`
  - `event_type`
  - `description`
  - `properties`

---
## Model: Bid
- Table: `bids`
- DB Columns: 24
- Fillable: 15
- **Missing from Fillable:**
  - `is_awarded`
  - `awarded_at`
  - `revision_count`
  - `withdrawn_at`
  - `rejection_reason`

---
## Model: Blog
- Table: `blogs`
- DB Columns: 14
- Fillable: 8
- **Missing from Fillable:**
  - `status`
  - `views_count`

---
## Model: BlogTag
- Table: `blog_tags`
- DB Columns: 3
- Fillable: 2

---
## Model: Builder
- Table: `builders`
- DB Columns: 34
- Fillable: 23
- **Missing from Fillable:**
  - `avg_rating`
  - `review_count`
  - `is_featured`
  - `sponsored_until`
  - `sponsored_rank`
  - `status`
  - `is_verified`

---
## Model: BuilderProject
- Table: `builder_projects`
- DB Columns: 21
- Fillable: 15
- **Missing from Fillable:**
  - `status`
  - `is_featured`

---
## Model: BuilderProjectImage
- Table: `builder_project_images`
- DB Columns: 7
- Fillable: 4

---
## Model: Category
- Table: `categories`
- DB Columns: 11
- Fillable: 7
- **Missing from Fillable:**
  - `is_active`

---
## Model: City
- Table: `cities`
- DB Columns: 7
- Fillable: 3
- **Missing from Fillable:**
  - `is_active`

---
## Model: ContactUnlock
- Table: `contact_unlocks`
- DB Columns: 7
- Fillable: 4

---
## Model: Conversation
- Table: `conversations`
- DB Columns: 17
- Fillable: 15
- **Extra in Fillable (Not in DB):**
  - `project_type`

---
## Model: District
- Table: `districts`
- DB Columns: 7
- Fillable: 3
- **Missing from Fillable:**
  - `is_active`

---
## Model: Inquiry
- Table: `inquiries`
- DB Columns: 14
- Fillable: 10
- **Missing from Fillable:**
  - `status`

---
## Model: Listing
- Table: `listings`
- DB Columns: 46
- Fillable: 37
- **Missing from Fillable:**
  - `avg_rating`
  - `review_count`
  - `sponsored_until`
  - `sponsored_rank`
  - `views_count`

---
## Model: ListingGallery
- Table: `listing_galleries`
- DB Columns: 7
- Fillable: 4

---
## Model: Message
- Table: `messages`
- DB Columns: 9
- Fillable: 6

---
## Model: MessageAttachment
- Table: `message_attachments`
- DB Columns: 8
- Fillable: 5

---
## Model: OpportunityType
- Table: `opportunity_types`
- DB Columns: 6
- Fillable: 3

---
## Model: Payment
- Table: `payments`
- DB Columns: 12
- Fillable: 9

---
## Model: Project
- Table: `projects`
- DB Columns: 34
- Fillable: 25
- **Missing from Fillable:**
  - `awarded_vendor_id`
  - `awarded_bid_id`
  - `award_value`
  - `awarded_at`
  - `image`

---
## Model: Requirement
- Table: `projects`
- DB Columns: 34
- Fillable: 27
- **Missing from Fillable:**
  - `district_id`
  - `awarded_vendor_id`
  - `awarded_bid_id`
  - `award_value`
  - `awarded_at`
- **Extra in Fillable (Not in DB):**
  - `sub_category_id`
  - `timeline_days`

---
## Model: RequirementImage
- Table: `requirement_images`
- DB Columns: 5
- Fillable: 2

---
## Model: Review
- Table: `reviews`
- DB Columns: 15
- Fillable: 11

---
## Model: Rfq
- Table: `rfqs`
- DB Columns: 23
- Fillable: 18
- **Missing from Fillable:**
  - `image`

---
## Model: Role
- Table: `roles`
- DB Columns: 5
- Fillable: 3
- **Extra in Fillable (Not in DB):**
  - `description`

---
## Model: SavedProject
- Table: `saved_projects`
- DB Columns: 6
- Fillable: 3

---
## Model: SavedVendor
- Table: `saved_vendors`
- DB Columns: 5
- Fillable: 2

---
## Model: SeoPage
- Table: `seo_pages`
- DB Columns: 9
- Fillable: 5
- **Missing from Fillable:**
  - `is_active`

---
## Model: Shortlist
- Table: `shortlists`
- DB Columns: 6
- Fillable: 3

---
## Model: SubscriptionPlan
- Table: `subscription_plans`
- DB Columns: 14
- Fillable: 10
- **Missing from Fillable:**
  - `is_active`

---
## Model: Supplier
- Table: `suppliers`
- DB Columns: 32
- Fillable: 21
- **Missing from Fillable:**
  - `avg_rating`
  - `review_count`
  - `is_featured`
  - `sponsored_until`
  - `sponsored_rank`
  - `status`
  - `is_verified`

---
## Model: SupplierProduct
- Table: `supplier_products`
- DB Columns: 14
- Fillable: 9
- **Missing from Fillable:**
  - `is_active`

---
## Model: SupplierProductImage
- Table: `supplier_product_images`
- DB Columns: 6
- Fillable: 3

---
## Model: User
- Table: `users`
- DB Columns: 20
- Fillable: 14

---
## Model: UserDocument
- Table: `user_documents`
- DB Columns: 10
- Fillable: 7

---
## Model: UserSubscription
- Table: `user_subscriptions`
- DB Columns: 10
- Fillable: 7

---
## Model: VendorMetric
- Table: `vendor_metrics`
- DB Columns: 19
- Fillable: 16

---
## Model: Worker
- Table: `workers`
- DB Columns: 30
- Fillable: 21
- **Missing from Fillable:**
  - `is_featured`
  - `avg_rating`
  - `review_count`
  - `status`
  - `is_verified`

---
## Model: WorkerJob
- Table: `worker_jobs`
- DB Columns: 21
- Fillable: 16
- **Missing from Fillable:**
  - `image`

---
