<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use App\Models\Requirement;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class RecommendationController extends Controller
{
    /**
     * GET /api/v1/requirements/{id}/recommendations
     * Returns the top pre-calculated vendor recommendations for a requirement.
     */
    public function index(int $requirementId): JsonResponse
    {
        $requirement = Requirement::findOrFail($requirementId);

        // Fetch recommendations from DB
        $recs = DB::table('requirement_recommendations')
            ->where('requirement_id', $requirementId)
            ->orderByDesc('match_score')
            ->get();

        // Load vendors with metrics and category
        $vendorIds = $recs->pluck('vendor_id');
        $vendors = User::with(['vendorMetric', 'listing.category'])
            ->whereIn('id', $vendorIds)
            ->get()
            ->keyBy('id');

        $recommendations = $recs->map(function ($rec) use ($vendors) {
            $vendor = $vendors->get($rec->vendor_id);
            if (!$vendor) return null;

            // Ensure metric exists even if empty
            $metric = $vendor->vendorMetric ?? new \App\Models\VendorMetric();

            return [
                'id' => $rec->id ?? null,
                'vendor_id' => $rec->vendor_id,
                'match_score' => $rec->match_score,
                'invited_at' => $rec->invited_at,
                'vendor' => [
                    'id' => $vendor->id,
                    'name' => $vendor->name,
                    'avatar' => $vendor->avatar,
                    'category' => $vendor->listing?->category,
                    'vendorMetric' => $metric,
                ]
            ];
        })->filter()->values();

        return response()->json([
            'success' => true,
            'data'    => $recommendations,
        ]);
    }
}
