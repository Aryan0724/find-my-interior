import os
import glob

MIGRATIONS_DIR = r"d:\find my interior\findmyinterior-backend\database\migrations"

SCHEMAS = {
    "roles": """
            $table->id();
            $table->string('name', 100);
            $table->string('slug', 100)->unique();
            $table->timestamps();
""",
    "user_roles": """
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('role_id')->constrained('roles')->onDelete('cascade');
            $table->unique(['user_id', 'role_id']);
""",
    "wallets": """
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade')->unique();
            $table->decimal('balance', 12, 2)->default(0.00);
            $table->timestamps();
""",
    "wallet_transactions": """
            $table->id();
            $table->foreignId('wallet_id')->constrained('wallets')->onDelete('cascade');
            $table->enum('type', ['credit', 'debit']);
            $table->decimal('amount', 12, 2);
            $table->string('description', 255);
            $table->string('reference_type', 255)->nullable();
            $table->unsignedBigInteger('reference_id')->nullable();
            $table->timestamps();
            
            $table->index('type');
            $table->index(['reference_type', 'reference_id']);
""",
    "notifications": """
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->string('type', 100);
            $table->string('title', 255);
            $table->text('message');
            $table->json('data')->nullable();
            $table->boolean('is_read')->default(false);
            $table->timestamps();
            
            $table->index('is_read');
""",
    "vendor_metrics": """
            $table->id();
            $table->foreignId('vendor_id')->constrained('users')->onDelete('cascade')->unique();
            $table->decimal('response_rate', 5, 2)->default(0.00);
            $table->decimal('win_rate', 5, 2)->default(0.00);
            $table->integer('completed_projects')->default(0);
            $table->decimal('score', 5, 2)->default(0.00);
            $table->timestamps();
""",
    "advertisements": """
            $table->id();
            $table->string('location', 100);
            $table->string('banner_url', 255);
            $table->string('link', 255)->nullable();
            $table->integer('priority')->default(0);
            $table->timestamp('starts_at')->nullable();
            $table->timestamp('ends_at')->nullable();
            $table->boolean('is_active')->default(true);
            $table->timestamps();
            
            $table->index('location');
            $table->index('is_active');
""",
    "conversations": """
            $table->id();
            $table->foreignId('user_one_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('user_two_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('requirement_id')->nullable()->constrained('requirements')->onDelete('set null');
            $table->timestamps();
""",
    "messages": """
            $table->id();
            $table->foreignId('conversation_id')->constrained('conversations')->onDelete('cascade');
            $table->foreignId('sender_id')->constrained('users')->onDelete('cascade');
            $table->text('body');
            $table->boolean('is_read')->default(false);
            $table->timestamps();
""",
    "labour_requirements": """
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->string('title', 255);
            $table->text('description');
            $table->json('skills_required');
            $table->integer('workers_needed');
            $table->decimal('daily_wage', 8, 2)->nullable();
            $table->integer('duration_days')->nullable();
            $table->enum('status', ['open', 'fulfilled', 'cancelled'])->default('open');
            $table->timestamps();
            
            $table->index('status');
""",
    "labour_applications": """
            $table->id();
            $table->foreignId('labour_requirement_id')->constrained('labour_requirements')->onDelete('cascade');
            $table->foreignId('worker_id')->constrained('users')->onDelete('cascade');
            $table->enum('status', ['pending', 'accepted', 'rejected'])->default('pending');
            $table->timestamps();
            
            $table->index('status');
""",
    "tenders": """
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade');
            $table->foreignId('city_id')->constrained('cities')->onDelete('cascade');
            $table->string('title', 255);
            $table->text('description');
            $table->decimal('budget_estimate', 15, 2)->nullable();
            $table->date('deadline_date');
            $table->string('document_url', 255)->nullable();
            $table->enum('status', ['open', 'evaluating', 'awarded', 'closed'])->default('open');
            $table->timestamps();
            
            $table->index('status');
""",
    "tender_quotes": """
            $table->id();
            $table->foreignId('tender_id')->constrained('tenders')->onDelete('cascade');
            $table->foreignId('supplier_id')->constrained('users')->onDelete('cascade');
            $table->decimal('amount', 15, 2);
            $table->text('proposal');
            $table->integer('delivery_days');
            $table->enum('status', ['pending', 'shortlisted', 'awarded', 'rejected'])->default('pending');
            $table->timestamps();
            
            $table->index('status');
""",
    "activity_timelines": """
            $table->id();
            $table->string('entity_type', 255);
            $table->unsignedBigInteger('entity_id');
            $table->foreignId('user_id')->nullable()->constrained('users')->onDelete('set null');
            $table->string('action', 255);
            $table->text('description');
            $table->json('meta_data')->nullable();
            $table->timestamps();
            
            $table->index(['entity_type', 'entity_id']);
""",
    "saved_projects": """
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('requirement_id')->constrained('requirements')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['user_id', 'requirement_id']);
""",
    "saved_vendors": """
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('vendor_id')->constrained('users')->onDelete('cascade');
            $table->timestamps();
            
            $table->unique(['user_id', 'vendor_id']);
"""
}

def inject_schema(table_name, schema_content):
    files = glob.glob(os.path.join(MIGRATIONS_DIR, f"*_create_{table_name}_table.php"))
    if not files:
        print(f"Skipping {table_name}, file not found")
        return
    filepath = files[0]
    
    with open(filepath, "r", encoding="utf-8") as f:
        content = f.read()
    
    start_str = f"Schema::create('{table_name}', function (Blueprint $table) {{"
    end_str = "        });"
    
    start_idx = content.find(start_str)
    if start_idx == -1:
        print(f"Start string not found for {table_name}")
        return
    start_idx += len(start_str)
    end_idx = content.find(end_str, start_idx)
    if end_idx == -1:
        print(f"End string not found for {table_name}")
        return
        
    new_content = content[:start_idx] + "\n" + schema_content + content[end_idx:]
    
    with open(filepath, "w", encoding="utf-8") as f:
        f.write(new_content)
    
    print(f"Injected schema for {table_name}")

for table, schema in SCHEMAS.items():
    inject_schema(table, schema)
