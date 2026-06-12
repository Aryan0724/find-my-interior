<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReviewResource;
use App\Models\Review;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    /**
     * POST /api/v1/user/reviews
     * Authenticated users can submit reviews for any entity.
     */
    public function store(Request $request): JsonResponse
    {
        $data = $request->validate([
            'reviewable_type' => ['required', 'in:listing,builder,supplier,worker'],
            'reviewable_id'   => ['required', 'integer'],
            'rating'          => ['required', 'integer', 'min:1', 'max:5'],
            'title'           => ['nullable', 'string', 'max:255'],
            'body'            => ['required', 'string', 'min:20', 'max:2000'],
        ]);

        $morphMap = [
            'listing'  => \App\Models\Listing::class,
            'builder'  => \App\Models\Builder::class,
            'supplier' => \App\Models\Supplier::class,
            'worker'   => \App\Models\Worker::class,
        ];

        // Prevent duplicate reviews from the same user
        $existing = Review::where('user_id', $request->user()->id)
            ->where('reviewable_type', $morphMap[$data['reviewable_type']])
            ->where('reviewable_id', $data['reviewable_id'])
            ->first();

        if ($existing) {
            return response()->json([
                'success' => false,
                'message' => 'You have already reviewed this listing.',
            ], 422);
        }

        Review::create([
            'user_id'         => $request->user()->id,
            'reviewable_type' => $morphMap[$data['reviewable_type']],
            'reviewable_id'   => $data['reviewable_id'],
            'rating'          => $data['rating'],
            'title'           => $data['title'] ?? null,
            'body'            => $data['body'],
            'is_approved'     => false, // Admin must approve
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Review submitted. It will be published after moderation.',
        ], 201);
    }

    /**
     * GET /api/v1/user/reviews
     * List the authenticated user's own reviews.
     */
    public function myReviews(Request $request): JsonResponse
    {
        $reviews = Review::where('user_id', $request->user()->id)
            ->latest()
            ->get();

        return response()->json([
            'success' => true,
            'data'    => ReviewResource::collection($reviews),
        ]);
    }
}
