<?php

namespace App\Observers;

use App\Models\ContactUnlock;
use App\Services\VendorMetricService;

class ContactUnlockObserver
{
    protected VendorMetricService $metricService;

    public function __construct(VendorMetricService $metricService)
    {
        $this->metricService = $metricService;
    }

    public function created(ContactUnlock $unlock): void
    {
        if ($unlock->vendor_id) {
            $this->metricService->recordContactUnlock($unlock->vendor_id);
        }
    }
}
