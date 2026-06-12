<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PaymentResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id'                  => $this->id,
            'razorpay_order_id'   => $this->razorpay_order_id,
            'razorpay_payment_id' => $this->razorpay_payment_id,
            'amount'              => $this->amount,
            'formatted_amount'    => $this->formatted_amount,
            'currency'            => $this->currency,
            'purpose'             => $this->purpose,
            'status'              => $this->status,
            'created_at'          => $this->created_at?->toDateTimeString(),
        ];
    }
}
