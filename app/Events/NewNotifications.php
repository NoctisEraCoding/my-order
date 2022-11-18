<?php

namespace App\Events;

use App\Models\Notification;
use Illuminate\Queue\SerializesModels;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewNotifications implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public int $id;
    public string $message;
    public string $date;

    public function __construct(Notification $notification)
    {
        $this->id = $notification->id;
        $this->message = $notification->text;
        $this->date = date('Y-m-d', strtotime($notification->created_at));
    }

    public function broadcastOn()
    {
        return ['new-notification'];
    }

    public function broadcastAs()
    {
        return 'add-notification';
    }
}
