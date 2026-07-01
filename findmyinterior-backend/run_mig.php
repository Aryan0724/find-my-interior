<?php
$pdo = new PDO('pgsql:host=dpg-d8luoscvikkc73bu2pd0-a.oregon-postgres.render.com;port=5432;dbname=findmyinterior_db', 'findmyinterior_db_user', 'WIBm9aTAekpE9C8EqcBFaklLTJRUO6LD');
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
try {
    $pdo->exec('ALTER TABLE projects ADD COLUMN IF NOT EXISTS image VARCHAR(255);');
    echo "Added image to projects\n";
} catch (Exception $e) { echo $e->getMessage() . "\n"; }

try {
    $pdo->exec('ALTER TABLE worker_jobs ADD COLUMN IF NOT EXISTS image VARCHAR(255);');
    echo "Added image to worker_jobs\n";
} catch (Exception $e) { echo $e->getMessage() . "\n"; }

try {
    $pdo->exec('ALTER TABLE rfqs ADD COLUMN IF NOT EXISTS image VARCHAR(255);');
    echo "Added image to rfqs\n";
} catch (Exception $e) { echo $e->getMessage() . "\n"; }

echo 'Done';
