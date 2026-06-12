import os
import shutil

src = r"d:\find my interior\findmyinterior-backend-generated"
dst = r"d:\find my interior\findmyinterior-backend"

directories_to_merge = [
    r"app\Models",
    r"app\Http\Controllers",
    r"app\Http\Resources",
    r"app\Http\Requests",
    r"app\Http\Middleware",
    r"app\Notifications",
    r"app\Providers",
    r"database\migrations",
    r"database\seeders",
    r"database\factories"
]

files_to_merge = [
    r"routes\api.php"
]

def merge_directory(src_dir, dst_dir):
    if not os.path.exists(src_dir):
        print(f"Skipping {src_dir}, does not exist.")
        return
    if not os.path.exists(dst_dir):
        os.makedirs(dst_dir)
    for root, dirs, files in os.walk(src_dir):
        # Create corresponding directories in destination
        rel_path = os.path.relpath(root, src_dir)
        target_dir = os.path.join(dst_dir, rel_path) if rel_path != "." else dst_dir
        if not os.path.exists(target_dir):
            os.makedirs(target_dir)
        for file in files:
            src_file = os.path.join(root, file)
            dst_file = os.path.join(target_dir, file)
            # Exclude default files that might conflict if needed, but we want to force overwrite for now
            shutil.copy2(src_file, dst_file)
            print(f"Merged: {rel_path}\\{file}")

for d in directories_to_merge:
    merge_directory(os.path.join(src, d), os.path.join(dst, d))

for f in files_to_merge:
    src_file = os.path.join(src, f)
    dst_file = os.path.join(dst, f)
    if os.path.exists(src_file):
        os.makedirs(os.path.dirname(dst_file), exist_ok=True)
        shutil.copy2(src_file, dst_file)
        print(f"Merged File: {f}")
    else:
        print(f"Skipping file {f}, does not exist.")

print("Merge Complete.")
