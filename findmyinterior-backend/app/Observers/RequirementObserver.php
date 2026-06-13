<?php

namespace App\Observers;

use App\Models\Requirement;
use App\Models\Bid;
use App\Services\VendorMetricService;
use App\Services\RecommendationEngineService;

class RequirementObserver
{
    protected VendorMetricService $metricService;

    public function __construct(VendorMetricService $metricService)
    {
        $this->metricService = $metricService;
    }

    public function created(Requirement $requirement): void
    {
        // Use RecommendationEngineService to generate matches
        app(RecommendationEngineService::class)->generateFor($requirement);
    }

    public function updated(Requirement $requirement): void
    {
        if ($requirement->wasChanged('status')) {
            // Find the awarded vendor if applicable
            $awardedBid = Bid::where('requirement_id', $requirement->id)->where('status', 'awarded')->first();
            $awardedVendorId = $awardedBid ? $awardedBid->professional_id : null;

            if ($requirement->status === 'awarded' && $awardedVendorId) {
                $this->metricService->recordProjectAwarded($awardedVendorId);
            }

            if ($requirement->status === 'completed' && $awardedVendorId) {
                $this->metricService->recordProjectCompleted($awardedVendorId);
            }
        }
    }
}
