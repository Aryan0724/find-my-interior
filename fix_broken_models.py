import os
import re

path = r'd:\find my interior\findmyinterior-backend\app\Models'

for root, dirs, files in os.walk(path):
    for file in files:
        if file.endswith('.php'):
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            original_content = content
            
            # Fix orphaned casts: => 'boolean', => 'decimal:2', => 'integer'
            # We will just remove any sequence of `=> 'type',` that doesn't have a string key before it
            # A regex that looks for `=> '[^']+',` that is preceded by `[` or `,` or whitespace, but not a `'key'` string.
            # Easiest way: just remove any `=> '([^']+)',?` that is NOT preceded by `'` or `"`
            content = re.sub(r'(?<![\'"])\s*=>\s*\'(boolean|decimal:\d+|integer|array)\',?', '', content)
            
            # Fix broken where clauses: where( true) -> where('is_active', true)
            content = content.replace('where( true)', "where('is_active', true)")
            content = content.replace('where( false)', "where('is_active', false)")
            
            if content != original_content:
                with open(filepath, 'w', encoding='utf-8') as f:
                    f.write(content)
                print(f"Fixed {file}")

print("Fix completed.")
