<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\VendorMetric;

class VendorMetricController extends Controller
{
    public function show(Request $request): JsonResponse
    {
        $user = $request->user();
        if ($user->role === 'customer') {
            return response()->json(['message' => 'Customers do not have vendor metrics.'], 403);
        }

        $metrics = VendorMetric::firstOrCreate(['vendor_id' => $user->id]);

        return response()->json($metrics);
    }
}
