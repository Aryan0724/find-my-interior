<?php

namespace App\Services;

use App\Models\VendorMetric;
use App\Models\User;

class VendorMetricService
{
    /**
     * Get or create metrics for a vendor.
     */
    protected function getMetrics(int $vendorId): VendorMetric
    {
        return VendorMetric::firstOrCreate(['vendor_id' => $vendorId]);
    }

    /**
     * Record a new bid placed by the vendor.
     */
    public function recordBid(int $vendorId): void
    {
        $this->getMetrics($vendorId)->increment('total_bids');
        $this->updateLastActive($vendorId);
    }

    /**
     * Record an awarded bid (win).
     */
    public function recordBidAwarded(int $vendorId): void
    {
        $this->getMetrics($vendorId)->increment('successful_bids');
    }

    /**
     * Record an awarded requirement to a vendor.
     */
    public function recordProjectAwarded(int $vendorId): void
    {
        $this->getMetrics($vendorId)->increment('award_count');
    }

    /**
     * Record a completed requirement.
     */
    public function recordProjectCompleted(int $vendorId): void
    {
        $this->getMetrics($vendorId)->increment('projects_completed');
    }

    /**
     * Record a message received by the vendor.
     */
    public function recordMessageReceived(int $vendorId): void
    {
        $this->getMetrics($vendorId)->increment('messages_received');
    }

    /**
     * Record a vendor's reply and tracking response time.
     */
    public function recordMessageReplied(int $vendorId, int $responseMinutesDelay): void
    {
        $metrics = $this->getMetrics($vendorId);
        $metrics->increment('messages_replied');
        
        // Track the response time facts
        $metrics->increment('response_count');
        $metrics->increment('total_response_minutes', $responseMinutesDelay);
        
        $this->updateLastActive($vendorId);
    }

    /**
     * Record a review received by the vendor.
     */
    public function recordReview(int $vendorId, int $rating): void
    {
        $metrics = $this->getMetrics($vendorId);
        $metrics->increment('review_count');
        $metrics->increment('review_sum', $rating);
    }

    /**
     * Record a contact unlock on the vendor.
     */
    public function recordContactUnlock(int $vendorId): void
    {
        $this->getMetrics($vendorId)->increment('unlock_count');
    }

    /**
     * Update the last active timestamp for the vendor.
     */
    public function updateLastActive(int $vendorId): void
    {
        $this->getMetrics($vendorId)->update(['last_active_at' => now()]);
    }
}
