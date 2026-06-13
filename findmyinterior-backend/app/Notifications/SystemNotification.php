<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;

class SystemNotification extends Notification implements ShouldQueue
{
    use Queueable;

    public $message;
    public $type;
    public $priority;

    public function __construct($message, $type, $priority = 'normal')
    {
        $this->message = $message;
        $this->type = $type;
        $this->priority = $priority;
    }

    public function via($notifiable)
    {
        return ['database'];
    }

    public function toDatabase($notifiable)
    {
        return [
            'message' => $this->message,
            'type' => $this->type,
            'priority' => $this->priority
        ];
    }
}
