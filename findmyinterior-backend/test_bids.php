<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$project = \App\Models\Project::find(151);
if ($project) {
    echo "Project Status: {$project->status}\n";
    foreach($project->bids as $bid) {
        echo "Bid ID: {$bid->id}, Status: {$bid->status}, Professional ID: {$bid->professional_id}\n";
    }
}
