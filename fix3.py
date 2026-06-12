import os
import re

path = r'd:\find my interior\findmyinterior-backend\app\Models'
for file in ['Supplier.php', 'Worker.php', 'Listing.php']:
    filepath = os.path.join(path, file)
    with open(filepath, 'r', encoding='utf-8') as f:
        content = f.read()
    
    # Replace the broken array inside recalculateRating
    # [=> round($stats->avg ?? 0, 2),=> $stats->cnt ?? 0,
    content = re.sub(
        r'\[=>\s*round\(\$stats->avg\s*\?\?\s*0,\s*2\),=>\s*\$stats->cnt\s*\?\?\s*0,',
        r"['avg_rating' => round($stats->avg ?? 0, 2), 'review_count' => $stats->cnt ?? 0,",
        content
    )
    
    with open(filepath, 'w', encoding='utf-8') as f:
        f.write(content)
