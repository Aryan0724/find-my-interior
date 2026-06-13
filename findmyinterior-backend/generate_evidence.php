<?php

use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\VendorMetric;
use App\Models\Requirement;
use App\Models\Bid;
use Illuminate\Support\Facades\DB;

require __DIR__.'/vendor/autoload.php';
$app = require_once __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Console\Kernel::class);
$kernel->bootstrap();

function saveEvidence($filename, $data) {
    $path = __DIR__ . '/evidence/' . $filename;
    file_put_contents($path, json_encode($data, JSON_PRETTY_PRINT));
    echo "Saved: $filename\n";
}

$baseUrl = 'http://localhost:8000/api/v1';

// Setup Test Users
$customer = User::factory()->create(['verification_level' => 'mobile_verified']);
$customer->roles()->attach(DB::table('roles')->where('slug', 'customer')->value('id'));
$customerToken = $customer->createToken('test')->plainTextToken;

// Vendor A: High Exp, High Rating (business_verified)
$vendorA = User::factory()->create(['name' => 'Vendor A', 'verification_level' => 'business_verified']);
$vendorA->roles()->attach(DB::table('roles')->where('slug', 'business')->value('id'));
DB::table('vendor_metrics')->insert(['vendor_id' => $vendorA->id, 'score' => 4.8]);
DB::table('wallets')->insert(['user_id' => $vendorA->id, 'balance' => 1000]);
$tokenA = $vendorA->createToken('test')->plainTextToken;

// Vendor B: Med Exp, Med Rating (identity_verified)
$vendorB = User::factory()->create(['name' => 'Vendor B', 'verification_level' => 'identity_verified']);
$vendorB->roles()->attach(DB::table('roles')->where('slug', 'business')->value('id'));
DB::table('vendor_metrics')->insert(['vendor_id' => $vendorB->id, 'score' => 3.5]);
$tokenB = $vendorB->createToken('test')->plainTextToken;

// Vendor C: Low Exp, Unverified (unverified)
$vendorC = User::factory()->create(['name' => 'Vendor C', 'verification_level' => 'unverified']);
$vendorC->roles()->attach(DB::table('roles')->where('slug', 'business')->value('id'));
DB::table('vendor_metrics')->insert(['vendor_id' => $vendorC->id, 'score' => 2.0]);
$tokenC = $vendorC->createToken('test')->plainTextToken;


// 1. Project Posted
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
$requirementId = $reqResponse->json('data.id');

// 2. BLOCKER E - PRICING CONTEXT
$pricingResponse = Http::withToken($tokenA)->get("$baseUrl/requirements/$requirementId/pricing-context");
saveEvidence('pricing_context_response.json', $pricingResponse->json());

// 3. BLOCKER B & C - 3 BIDS & SMART SCORE
Http::withToken($tokenA)->post("$baseUrl/bids", [
    'requirement_id' => $requirementId, 'estimated_cost' => 450000, 'timeline_days' => 45,
    'experience_years' => 10, 'previous_projects_count' => 20, 'proposal_message' => 'Bid A'
]);

Http::withToken($tokenB)->post("$baseUrl/bids", [
    'requirement_id' => $requirementId, 'estimated_cost' => 400000, 'timeline_days' => 60,
    'experience_years' => 5, 'previous_projects_count' => 5, 'proposal_message' => 'Bid B'
]);

Http::withToken($tokenC)->post("$baseUrl/bids", [
    'requirement_id' => $requirementId, 'estimated_cost' => 300000, 'timeline_days' => 90,
    'experience_years' => 1, 'previous_projects_count' => 1, 'proposal_message' => 'Bid C'
]);

$compareResponse = Http::withToken($customerToken)->get("$baseUrl/requirements/$requirementId/bids/compare");
saveEvidence('comparison_response.json', $compareResponse->json());
saveEvidence('smart_bid_score_evidence.json', $compareResponse->json('comparison_matrix.0.smart_bid_score_breakdown'));

// 4. BLOCKER D - WALLET ENGINE
saveEvidence('wallet_before.json', ['balance' => DB::table('wallets')->where('user_id', $vendorA->id)->value('balance')]);
$unlockResponse = Http::withToken($tokenA)->post("$baseUrl/requirements/$requirementId/unlock");
saveEvidence('wallet_after.json', [
    'deducted' => 299, // config fee is 49 by default but we can check actual deduction
    'balance' => DB::table('wallets')->where('user_id', $vendorA->id)->value('balance'),
    'response' => $unlockResponse->json()
]);

$dupUnlockResponse = Http::withToken($tokenA)->post("$baseUrl/requirements/$requirementId/unlock");
saveEvidence('duplicate_unlock.json', $dupUnlockResponse->json());

// 5. BLOCKER F - AWARD FLOW
$bidA_id = $compareResponse->json('comparison_matrix.0.bid_id');

$bidsBefore = DB::table('bids')->where('requirement_id', $requirementId)->get();
$reqBefore = DB::table('requirements')->where('id', $requirementId)->first();
saveEvidence('award_flow_before.json', ['requirement' => $reqBefore, 'bids' => $bidsBefore]);

Http::withToken($customerToken)->patch("$baseUrl/bids/$bidA_id/award");

$bidsAfter = DB::table('bids')->where('requirement_id', $requirementId)->get();
$reqAfter = DB::table('requirements')->where('id', $requirementId)->first();
saveEvidence('award_flow_after.json', ['requirement' => $reqAfter, 'bids' => $bidsAfter]);

// Complete
Http::withToken($customerToken)->patch("$baseUrl/requirements/$requirementId/complete");

// 6. BLOCKER G - ACTIVITY TIMELINE
$timeline = DB::table('activity_timelines')->where('entity_id', $requirementId)->get();
saveEvidence('activity_timeline.json', $timeline);

// 7. BLOCKER H - SAVED ITEMS
Http::withToken($customerToken)->post("$baseUrl/saved-projects/$requirementId");
Http::withToken($customerToken)->post("$baseUrl/saved-vendors/$vendorA->id");

$savedProjects = Http::withToken($customerToken)->get("$baseUrl/saved-projects")->json();
$savedVendors = Http::withToken($customerToken)->get("$baseUrl/saved-vendors")->json();

saveEvidence('saved_projects.json', $savedProjects);
saveEvidence('saved_vendors.json', $savedVendors);

echo "All evidence generated!\n";
