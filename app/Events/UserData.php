<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Broadcasting\ShouldBroadcastNow;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserData implements ShouldBroadcastNow
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $tenantId;
    public $data;

    public function __construct($tenantId, $data)
    {
        $this->tenantId = $tenantId;
        $this->data = $data;
    }

    public function broadcastOn()
    {
        return new PrivateChannel("tenant.{$this->tenantId}");
    }

    public function broadcastWith()
    {
        return [
            'users' => $this->data,
        ];
    }
}
