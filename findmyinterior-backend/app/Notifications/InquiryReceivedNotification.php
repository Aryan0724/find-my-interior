<?php

namespace App\Notifications;

use App\Models\Inquiry;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class InquiryReceivedNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public function __construct(
        public readonly Inquiry $inquiry
    ) {}

    public function via(object $notifiable): array
    {
        // Both WhatsApp (custom channel) and email
        return ['mail'];
        // When WhatsApp provider is configured, add: WhatsAppChannel::class
    }

    public function toMail(object $notifiable): MailMessage
    {
        return (new MailMessage)
            ->subject('New Inquiry Received — FindMyInterior')
            ->greeting('Hello ' . $notifiable->name . ',')
            ->line('You have received a new inquiry through FindMyInterior.com:')
            ->line('**From:** ' . $this->inquiry->name)
            ->line('**Phone:** ' . $this->inquiry->phone)
            ->line('**Message:** ' . $this->inquiry->message)
            ->action('View Inquiry in Dashboard', url('/dashboard'))
            ->line('Please respond within 24 hours for the best conversion.')
            ->salutation('Team FindMyInterior');
    }
}
