import os
import re

path = r'd:\find my interior\findmyinterior-backend\app\Models'
for root, dirs, files in os.walk(path):
    for file in files:
        if file.endswith('.php') and file not in ['Payment.php', 'SubscriptionPlan.php', 'SeoPage.php']:
            filepath = os.path.join(root, file)
            with open(filepath, 'r', encoding='utf-8') as f:
                content = f.read()
            
            # If we find a line like `    'some_field'` without `=>` and inside casts, we'll replace the whole casts block
            if re.search(r'^\s*\'[a-zA-Z0-9_]+\'\s*$', content, re.MULTILINE):
                new_content = re.sub(r'protected\s+\$casts\s*=\s*\[.*?\];', 'protected $casts = [];', content, flags=re.DOTALL)
                if new_content != content:
                    with open(filepath, 'w', encoding='utf-8') as f:
                        f.write(new_content)
                    print(f'Fixed {file}')
