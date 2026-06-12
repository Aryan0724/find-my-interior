import os

path = r'd:\find my interior\findmyinterior-backend\app\Models'
for file in ['Listing.php', 'Builder.php', 'Supplier.php', 'Worker.php', 'Review.php']:
    filepath = os.path.join(path, file)
    if not os.path.exists(filepath):
        continue
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    orig = content
    # For Review.php scopeApproved
    content = content.replace("where('is_active', true)", "where('is_approved', true)")
    
    # In Listing, Builder, Supplier, Worker, if they have approvedReviews that use 'is_active'
    # we already covered it above, but just in case:
    # Actually wait, `is_featured`, `is_premium`, `is_verified` were using `is_active` in Listing.php!
    # I already manually fixed Listing.php using replace_file_content earlier.
    # What about Builder, Supplier, Worker? Did I fix their scopeFeatured, scopePremium, scopeVerified?
    # I will fix them right here if they are broken!
    
    if file != 'Review.php':
        content = content.replace("public function scopeFeatured($query)\n    {\n        return $query->where('is_active', true);\n    }", 
                                  "public function scopeFeatured($query)\n    {\n        return $query->where('is_featured', true);\n    }")
        content = content.replace("public function scopePremium($query)\n    {\n        return $query->where('is_active', true);\n    }", 
                                  "public function scopePremium($query)\n    {\n        return $query->where('is_premium', true);\n    }")
        content = content.replace("public function scopeVerified($query)\n    {\n        return $query->where('is_active', true);\n    }", 
                                  "public function scopeVerified($query)\n    {\n        return $query->where('is_verified', true);\n    }")

    if content != orig:
        with open(filepath, 'w', encoding='utf-8') as f:
            f.write(content)
        print(f"Fixed {file}")
