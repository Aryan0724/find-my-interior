<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Services\RevenueAnalyticsService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class RevenueController extends Controller
{
    public function __construct(protected RevenueAnalyticsService $revenueService) {}

    /**
     * GET /api/v1/admin/revenue
     */
    public function index(Request $request): JsonResponse
    {
        // Admin-only gate
        if (!$request->user()?->isAdmin()) {
            return response()->json(['message' => 'Forbidden'], 403);
        }

        return response()->json([
            'revenue'  => $this->revenueService->getRevenueSummary(),
            'funnel'   => $this->revenueService->getFunnelMetrics(),
        ]);
    }
}
