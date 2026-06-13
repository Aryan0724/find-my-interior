<?php
require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

use Illuminate\Support\Facades\Http;
use App\Models\User;

$vendorA = User::where('name', 'Vendor A')->first();
$tokenA = $vendorA->createToken('test')->plainTextToken;

$reqId = 5; // The requirement ID from the last run

$response = Http::withToken($tokenA)->post("http://localhost:8000/api/v1/bids", [
    'requirement_id' => $reqId, 'amount' => 450000, 'timeline_days' => 45,
    'experience_years' => 10, 'previous_projects_count' => 20, 'proposal_message' => 'Bid A'
]);

echo "Status: " . $response->status() . "\n";
echo "Response: " . $response->body() . "\n";
