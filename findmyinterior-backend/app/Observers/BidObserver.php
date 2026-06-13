<?php

namespace App\Observers;

use App\Models\Bid;
use App\Services\VendorMetricService;

class BidObserver
{
    protected VendorMetricService $metricService;

    public function __construct(VendorMetricService $metricService)
    {
        $this->metricService = $metricService;
    }

    public function created(Bid $bid): void
    {
        $this->metricService->recordBid($bid->professional_id);

        \Illuminate\Support\Facades\DB::table('requirement_recommendations')
            ->where('requirement_id', $bid->requirement_id)
            ->where('vendor_id', $bid->professional_id)
            ->update([
                'bid_submitted_at' => now(),
                'updated_at' => now(),
            ]);
    }

    public function updated(Bid $bid): void
    {
        if ($bid->wasChanged('status') && $bid->status === 'awarded') {
            $this->metricService->recordBidAwarded($bid->professional_id);
        }
    }
}
