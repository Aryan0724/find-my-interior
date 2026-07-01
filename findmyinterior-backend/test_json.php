<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::first();
if ($project) {
    // Attempt 1: Direct property
    $project->professional_id = 123;
    
    // Attempt 2: setAttribute
    $project2 = clone $project;
    $project2->setAttribute('test_attr', 456);

    echo "Attempt 1 (Direct Property):\n";
    echo json_encode($project) . "\n\n";

    echo "Attempt 2 (setAttribute):\n";
    echo json_encode($project2) . "\n\n";
}
