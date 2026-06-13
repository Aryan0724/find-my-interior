import os
import glob
import re

MIGRATIONS_DIR = r"d:\find my interior\findmyinterior-backend\database\migrations"

def process_file(pattern, old_text, new_text):
    files = glob.glob(os.path.join(MIGRATIONS_DIR, pattern))
    if not files:
        print(f"File matching {pattern} not found.")
        return
    file_path = files[0]
    with open(file_path, "r", encoding="utf-8") as f:
        content = f.read()
    
    # We will do simple string replacements or regex
    if callable(old_text):
        new_content = old_text(content)
    else:
        new_content = content.replace(old_text, new_text)
        
    with open(file_path, "w", encoding="utf-8") as f:
        f.write(new_content)
    print(f"Updated {os.path.basename(file_path)}")

# 1. Update Requirements
def update_req(c):
    # remove is_verified, add awarded fields
    c = c.replace(
        "$table->enum('status', ['open', 'in_progress', 'closed'])->default('open');",
        "$table->enum('status', ['open', 'bidding', 'shortlisted', 'awarded', 'completed', 'expired'])->default('open');\n            $table->foreignId('awarded_vendor_id')->nullable()->constrained('users');\n            $table->foreignId('awarded_bid_id')->nullable();\n            $table->decimal('award_value', 12, 2)->nullable();\n            $table->timestamp('awarded_at')->nullable();"
    )
    c = c.replace("$table->boolean('is_verified')->default(false);", "")
    return c
process_file("*_create_requirements_table.php", update_req, None)

# 2. Update Bids
def update_bids(c):
    c = c.replace(
        "$table->decimal('amount', 10, 2);",
        "$table->string('company_name')->nullable();\n            $table->string('contact_person')->nullable();\n            $table->string('category')->nullable();\n            $table->integer('experience_years')->default(0);\n            $table->decimal('estimated_cost', 12, 2);\n"
    )
    c = c.replace(
        "$table->integer('timeline_days');",
        "$table->integer('timeline_days');\n            $table->integer('warranty_months')->default(0);\n            $table->boolean('material_included')->default(false);\n            $table->boolean('labour_included')->default(false);\n            $table->boolean('design_included')->default(false);\n            $table->boolean('supervision_included')->default(false);\n            $table->json('portfolio_urls')->nullable();\n            $table->integer('previous_projects_count')->default(0);"
    )
    c = c.replace(
        "$table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');",
        "$table->text('proposal_message');\n            $table->decimal('smart_bid_score', 5, 2)->default(0.00);\n            $table->enum('status', ['pending', 'shortlisted', 'accepted', 'rejected'])->default('pending');"
    )
    c = c.replace("$table->text('proposal');", "")
    return c
process_file("*_create_bids_table.php", update_bids, None)

# 3. Update Listings
def update_listings(c):
    c = c.replace(
        "$table->boolean('is_verified')->default(false);",
        ""
    )
    c = c.replace(
        "$table->boolean('is_premium')->default(false);",
        "$table->boolean('is_premium')->default(false);\n            $table->timestamp('sponsored_until')->nullable();\n            $table->integer('sponsored_rank')->default(0);"
    )
    c = c.replace(
        "$table->enum('status', ['draft', 'active', 'inactive', 'suspended'])->default('draft');",
        "$table->enum('status', ['pending', 'active', 'inactive', 'suspended'])->default('pending');"
    )
    return c
process_file("*_create_listings_table.php", update_listings, None)

# 4. Update Builders
def update_builders(c):
    c = c.replace("$table->boolean('is_verified')->default(false);", "")
    c = c.replace(
        "$table->boolean('is_featured')->default(false);",
        "$table->boolean('is_featured')->default(false);\n            $table->timestamp('sponsored_until')->nullable();\n            $table->integer('sponsored_rank')->default(0);"
    )
    c = c.replace(
        "$table->enum('status', ['active', 'inactive'])->default('inactive');",
        "$table->enum('status', ['pending', 'active', 'inactive'])->default('pending');"
    )
    return c
process_file("*_create_builders_table.php", update_builders, None)

# 5. Update Suppliers
def update_suppliers(c):
    c = c.replace("$table->boolean('is_verified')->default(false);", "")
    c = c.replace(
        "$table->boolean('is_featured')->default(false);",
        "$table->boolean('is_featured')->default(false);\n            $table->timestamp('sponsored_until')->nullable();\n            $table->integer('sponsored_rank')->default(0);"
    )
    c = c.replace(
        "$table->enum('status', ['active', 'inactive'])->default('inactive');",
        "$table->enum('status', ['pending', 'active', 'inactive'])->default('pending');"
    )
    return c
process_file("*_create_suppliers_table.php", update_suppliers, None)

# 6. Update Workers
def update_workers(c):
    c = c.replace("$table->boolean('is_verified')->default(false);", "")
    c = c.replace(
        "$table->enum('status', ['active', 'inactive'])->default('inactive');",
        "$table->enum('status', ['pending', 'active', 'inactive'])->default('pending');"
    )
    return c
process_file("*_create_workers_table.php", update_workers, None)

# 7. Update Payments
def update_payments(c):
    c = c.replace(
        "$table->enum('purpose', ['subscription', 'premium_listing', 'featured_listing', 'lead_unlock']);",
        "$table->enum('purpose', ['wallet_recharge', 'subscription', 'premium_listing', 'featured_listing']);"
    )
    return c
process_file("*_create_payments_table.php", update_payments, None)

# 8. Update Contact Unlocks
def update_unlocks(c):
    c = c.replace(
        "$table->foreignId('payment_id')->nullable()->constrained();",
        "$table->foreignId('wallet_transaction_id')->nullable();"
    )
    return c
process_file("*_create_contact_unlocks_table.php", update_unlocks, None)
