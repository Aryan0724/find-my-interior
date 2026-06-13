<?php

namespace App\Observers;

use App\Models\Message;
use App\Services\VendorMetricService;

class MessageObserver
{
    protected VendorMetricService $metricService;

    public function __construct(VendorMetricService $metricService)
    {
        $this->metricService = $metricService;
    }

    public function created(Message $message): void
    {
        $conv = $message->conversation;
        if (!$conv) return;

        if ($message->user_id === $conv->vendor_id) {
            // Vendor replied
            $delay = 0;
            if ($conv->last_customer_reply_at) {
                // If there's a customer reply we base the delay on that.
                // Wait, if last_customer_reply_at was already updated by the Conversation model or controller, 
                // it might be identical to the current message if the logic ran first?
                // Actually the Conversation's last_customer_reply_at was set BEFORE this message IF the customer sent it.
                // When vendor replies, last_customer_reply_at represents the timestamp of the customer's previous message.
                $delay = $message->created_at->diffInMinutes($conv->last_customer_reply_at);
            }
            $this->metricService->recordMessageReplied($conv->vendor_id, $delay);
        } else if ($message->user_id === $conv->customer_id) {
            // Customer sent
            $this->metricService->recordMessageReceived($conv->vendor_id);
        }
    }
}
