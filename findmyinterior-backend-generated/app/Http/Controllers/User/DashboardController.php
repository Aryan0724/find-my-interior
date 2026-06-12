<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\RequirementResource;
use App\Http\Resources\ReviewResource;
use App\Http\Resources\PaymentResource;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    /**
     * GET /api/v1/user/dashboard
     * Returns everything needed to render the business/homeowner dashboard.
     */
    public function __invoke(Request $request): JsonResponse
    {
        $user = $request->user()->load(['activeSubscription.plan']);

        $data = [
            'user' => [
                'id'           => $user->id,
                'name'         => $user->name,
                'role'         => $user->role,
                'subscription' => $user->activeSubscription?->plan?->name ?? 'Basic (Free)',
            ],
        ];

        // Homeowner — show their posted requirements
        if ($user->role === 'customer') {
            $data['requirements'] = RequirementResource::collection(
                $user->requirements()->with(['category', 'images'])->latest()->get()
            );
            $data['total_requirements'] = $user->requirements()->count();
        }

        // Business/Builder/Supplier — show their leads and reviews
        if (in_array($user->role, ['business', 'builder', 'supplier', 'worker'])) {
            $listing = $user->listing;

            $data['listing_count']   = $user->listings()->count();
            $data['total_inquiries'] = $listing?->inquiries()->count() ?? 0;
            $data['total_reviews']   = $listing?->approvedReviews()->count() ?? 0;
            $data['avg_rating']      = $listing?->avg_rating ?? 0;
            $data['total_views']     = $user->listings()->sum('views_count');

            $data['recent_inquiries'] = $listing?->inquiries()
                ->latest()
                ->take(5)
                ->get()
                ->map(fn($i) => [
                    'id'         => $i->id,
                    'name'       => $i->name,
                    'phone'      => $i->phone,
                    'message'    => $i->message,
                    'status'     => $i->status,
                    'is_read'    => $i->is_read,
                    'created_at' => $i->created_at?->diffForHumans(),
                ]) ?? [];

            $data['recent_reviews'] = ReviewResource::collection(
                $listing?->approvedReviews()->with('user')->latest()->take(5)->get() ?? collect()
            );

            $data['recent_payments'] = PaymentResource::collection(
                $user->payments()->latest()->take(5)->get()
            );
        }

        return response()->json([
            'success' => true,
            'data'    => $data,
        ]);
    }
}
