import os

path = r'd:\find my interior\findmyinterior-backend\app\Models'

for file in ['Builder.php', 'Supplier.php', 'Worker.php']:
    filepath = os.path.join(path, file)
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()

    # Revert scopes incorrectly changed to is_approved
    content = content.replace("public function scopeFeatured($query)\n    {\n        return $query->where('is_approved', true);\n    }", 
                              "public function scopeFeatured($query)\n    {\n        return $query->where('is_featured', true);\n    }")
    content = content.replace("public function scopeVerified($query)\n    {\n        return $query->where('is_approved', true);\n    }", 
                              "public function scopeVerified($query)\n    {\n        return $query->where('is_verified', true);\n    }")
    content = content.replace("public function scopePremium($query)\n    {\n        return $query->where('is_approved', true);\n    }", 
                              "public function scopePremium($query)\n    {\n        return $query->where('is_premium', true);\n    }")

    # Revert activeProducts / activeProjects
    if 'activeProducts' in content:
        content = content.replace("return $this->hasMany(SupplierProduct::class)->where('is_approved', true);",
                                  "return $this->hasMany(SupplierProduct::class)->where('is_active', true);")
    if 'activeProjects' in content:
        content = content.replace("return $this->hasMany(BuilderProject::class)->where('is_approved', true);",
                                  "return $this->hasMany(BuilderProject::class)->where('is_active', true);")

    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)

print('Done fixing scopes')
