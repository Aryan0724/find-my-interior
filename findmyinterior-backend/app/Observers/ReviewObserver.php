<?php

namespace App\Observers;

use App\Models\Review;
use App\Services\VendorMetricService;

class ReviewObserver
{
    protected VendorMetricService $metricService;

    public function __construct(VendorMetricService $metricService)
    {
        $this->metricService = $metricService;
    }

    public function created(Review $review): void
    {
        // Review uses polymorphic reviewable (Listing, Builder, Worker, Supplier).
        // The vendor whose listing/profile was reviewed is the owner of the reviewable.
        $reviewable = $review->reviewable;
        $vendorId = $reviewable?->user_id ?? null;

        if ($vendorId && $review->rating) {
            $this->metricService->recordReview($vendorId, $review->rating);
        }
    }
}
