<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class PricingController extends Controller
{
    /**
     * Get dynamic pricing context for a requirement (e.g. unlock fee)
     */
    public function getPricingContext(Request $request, int $requirementId): JsonResponse
    {
        $requirement = Requirement::findOrFail($requirementId);
        
        // Example dynamic logic:
        // Could be based on requirement budget, or vendor subscription plan
        // For now, let's say base fee is 299 for verified, 499 for unverified.
        $vendor = $request->user();
        
        $unlockFee = 499.00; // default
        
        if ($vendor && in_array($vendor->verification_level, ['business_verified', 'site_verified'])) {
            $unlockFee = 299.00;
        }

        return response()->json([
            'success' => true,
            'requirement_id' => $requirement->id,
            'unlock_fee' => $unlockFee,
            'currency' => 'INR',
            'vendor_verification' => $vendor->verification_level ?? 'unverified'
        ]);
    }
}
