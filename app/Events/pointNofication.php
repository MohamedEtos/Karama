<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class pointNofication implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * Create a new event instance.
     *
     * @return void
     */

     public $userId;
     public $merchantId;
     public $usercode;
     public $price;
     public $points;
     public $type;

    public function __construct($data)
    {
        $this->userId = $data['userId'];
        $this->merchantId = $data['merchantId'];
        $this->usercode = $data['usercode'];
        $this->price = $data['price'];
        $this->points = $data['points'];
        $this->type = $data['type'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('PointsNotify');
        // return ['mychannel'];
    }

    public function broadcastAs()
    {
        return 'UserNotify';
    }
}
