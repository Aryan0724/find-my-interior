<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;

// In Laravel 11, getTables() returns an array of arrays with 'name' key, or objects.
$tablesInfo = Schema::getTables();
$data = [];

foreach ($tablesInfo as $tableInfo) {
    $table = is_array($tableInfo) ? $tableInfo['name'] : $tableInfo['name'];
    
    if (in_array($table, ['migrations', 'cache', 'cache_locks', 'jobs', 'failed_jobs'])) continue;
    
    $columns = Schema::getColumns($table);
    $indexes = Schema::getIndexes($table);
    $fks = Schema::getForeignKeys($table);
    
    $data[$table] = [
        'columns' => $columns,
        'indexes' => $indexes,
        'fks' => $fks
    ];
}

file_put_contents(__DIR__ . '/schema_output_2.json', json_encode($data, JSON_PRETTY_PRINT));
echo "Schema exported.\n";
