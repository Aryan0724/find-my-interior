<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Str;

$modelsPath = __DIR__ . '/app/Models';
$models = [];
foreach (glob($modelsPath . '/*.php') as $file) {
    $modelName = basename($file, '.php');
    $className = "\\App\\Models\\$modelName";
    if (class_exists($className)) {
        try {
            $reflection = new ReflectionClass($className);
            if (!$reflection->isAbstract() && $reflection->isSubclassOf(\Illuminate\Database\Eloquent\Model::class)) {
                $models[] = $className;
            }
        } catch (Exception $e) {}
    }
}

$report = "# FILLABLE AUDIT REPORT\n\n";

foreach ($models as $class) {
    $instance = new $class;
    $table = $instance->getTable();
    $fillable = $instance->getFillable();
    
    if (!Schema::hasTable($table)) {
        continue;
    }
    
    $columns = array_column(Schema::getColumns($table), 'name');
    
    // Ignore standard columns
    $ignore = ['id', 'created_at', 'updated_at', 'deleted_at', 'remember_token', 'email_verified_at'];
    $expectedFillable = array_diff($columns, $ignore);
    
    $missingFromFillable = array_diff($expectedFillable, $fillable);
    $extraInFillable = array_diff($fillable, $expectedFillable);
    
    $report .= "## Model: " . class_basename($class) . "\n";
    $report .= "- Table: `$table`\n";
    $report .= "- DB Columns: " . count($columns) . "\n";
    $report .= "- Fillable: " . count($fillable) . "\n";
    
    if (!empty($missingFromFillable)) {
        $report .= "- **Missing from Fillable:**\n";
        foreach ($missingFromFillable as $m) {
            $report .= "  - `$m`\n";
        }
    }
    
    if (!empty($extraInFillable)) {
        $report .= "- **Extra in Fillable (Not in DB):**\n";
        foreach ($extraInFillable as $e) {
            $report .= "  - `$e`\n";
        }
    }
    $report .= "\n---\n";
}

file_put_contents(__DIR__ . '/FILLABLE_AUDIT.md', $report);
echo "Fillable audit complete.\n";
