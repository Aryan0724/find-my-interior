<?php

use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Requirement;
use App\Models\Bid;
use Illuminate\Support\Facades\DB;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

$output = [];

// 1. Check Database Counts
$output['Database Verification'] = [
    'Users' => DB::table('users')->count(),
    'Requirements' => DB::table('requirements')->count(),
    'Bids' => DB::table('bids')->count(),
    'Wallets' => DB::table('wallets')->count(),
    'Listings' => DB::table('listings')->count(),
    'Builders' => DB::table('builders')->count(),
    'Suppliers' => DB::table('suppliers')->count(),
    'Workers' => DB::table('workers')->count(),
];

// 2. Perform Golden Flow
echo "Starting Golden Flow Test...\n";

// A. Create Customer & Vendor manually for test
$customer = User::factory()->create(['verification_level' => 'mobile_verified']);
$customer->roles()->attach(DB::table('roles')->where('slug', 'customer')->value('id'));

$vendor = User::factory()->create(['verification_level' => 'business_verified']);
$vendor->roles()->attach(DB::table('roles')->where('slug', 'business')->value('id'));
DB::table('wallets')->insert(['user_id' => $vendor->id, 'balance' => 100]); // Initial balance

// Generate Tokens
$customerToken = $customer->createToken('test-customer')->plainTextToken;
$vendorToken = $vendor->createToken('test-vendor')->plainTextToken;

$baseUrl = 'http://localhost:8000/api/v1';

try {
    // 1. Customer Posts Requirement
    echo "1. Posting Requirement...\n";
    $reqResponse = Http::withToken($customerToken)->post("$baseUrl/requirements", [
        'title' => 'Need Interior Designer for 3BHK',
        'description' => 'Full furnishing needed.',
        'budget' => '500000',
        'city' => 'Mumbai',
        'district' => 'Mumbai Suburban',
        'city_id' => 1,
        'category_id' => 1,
        'name' => 'Test Customer',
        'phone' => '9999999999'
    ]);
    $output['API Tests']['POST /requirements'] = ['status' => $reqResponse->status(), 'response' => $reqResponse->json()];
    $requirementId = $reqResponse->json('data.id');

    // 2. Vendor Places Bid
    echo "2. Placing Bid...\n";
    $bidResponse = Http::withToken($vendorToken)->post("$baseUrl/bids", [
        'requirement_id' => $requirementId,
        'amount' => 450000,
        'timeline_days' => 45,
        'proposal_message' => 'We can do this perfectly.',
    ]);
    $output['API Tests']['POST /bids'] = ['status' => $bidResponse->status(), 'response' => $bidResponse->json()];
    $bidId = $bidResponse->json('data.id');

    // 3. Customer Compares Bids
    echo "3. Comparing Bids...\n";
    $compareResponse = Http::withToken($customerToken)->get("$baseUrl/requirements/$requirementId/bids/compare");
    $output['API Tests']['GET /bids/compare'] = ['status' => $compareResponse->status(), 'response' => $compareResponse->json()];

    // 4. Vendor Unlocks Contact
    echo "4. Unlocking Contact...\n";
    $walletBefore = DB::table('wallets')->where('user_id', $vendor->id)->value('balance');
    $unlockResponse = Http::withToken($vendorToken)->post("$baseUrl/requirements/$requirementId/unlock");
    $walletAfter = DB::table('wallets')->where('user_id', $vendor->id)->value('balance');
    
    $output['Wallet Tests']['Contact Unlock'] = [
        'status' => $unlockResponse->status(),
        'response' => $unlockResponse->json(),
        'balance_before' => $walletBefore,
        'balance_after' => $walletAfter,
        'deducted' => $walletBefore - $walletAfter
    ];

    // 5. Duplicate Unlock Prevention
    echo "5. Testing Duplicate Unlock...\n";
    $dupUnlockResponse = Http::withToken($vendorToken)->post("$baseUrl/requirements/$requirementId/unlock");
    $output['Wallet Tests']['Duplicate Unlock Prevention'] = [
        'status' => $dupUnlockResponse->status(),
        'response' => $dupUnlockResponse->json()
    ];

    // 6. Customer Awards Project
    echo "6. Awarding Project...\n";
    $awardResponse = Http::withToken($customerToken)->patch("$baseUrl/bids/$bidId/award");
    $output['API Tests']['PATCH /award'] = ['status' => $awardResponse->status(), 'response' => $awardResponse->json()];

    // 7. Authorization Test: Vendor attempts to Award their own bid
    echo "7. Authorization Test...\n";
    $authResponse = Http::withToken($vendorToken)->patch("$baseUrl/bids/$bidId/award");
    $output['Authorization Tests']['Vendor awarding project'] = ['status' => $authResponse->status(), 'response' => $authResponse->json()];

    // 8. Customer Completes Project
    echo "8. Completing Project...\n";
    $completeResponse = Http::withToken($customerToken)->patch("$baseUrl/requirements/$requirementId/complete");
    $output['API Tests']['PATCH /complete'] = ['status' => $completeResponse->status(), 'response' => $completeResponse->json()];

} catch (\Exception $e) {
    echo "Error: " . $e->getMessage() . "\n";
}

// Write report to JSON
file_put_contents(__DIR__.'/golden_flow_report.json', json_encode($output, JSON_PRETTY_PRINT));
echo "Testing complete. Report saved to golden_flow_report.json\n";
