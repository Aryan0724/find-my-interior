<?php
require 'vendor/autoload.php';
$app = require_once 'bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

echo "Bids requirement_type:\n";
echo json_encode(\App\Models\Bid::pluck('requirement_type')->unique());
echo "\n";
echo "ContactUnlocks requirement_type:\n";
echo json_encode(\App\Models\ContactUnlock::pluck('requirement_type')->unique());
echo "\n";
