<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserSubscriptionResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'            => $this->id,
            'plan'          => new SubscriptionPlanResource($this->whenLoaded('plan')),
            'billing_cycle' => $this->billing_cycle,
            'status'        => $this->status,
            'starts_at'     => $this->starts_at?->toDateString(),
            'expires_at'    => $this->expires_at?->toDateString(),
            'days_remaining' => $this->daysRemaining(),
            'is_expired'    => $this->isExpired(),
        ];
    }
}
