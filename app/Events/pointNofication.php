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

    public $reseverId;
    public $senderName;
    public $senderImg;
    public $senderId;
    public $messages;
    public $price;
    public $points;
    public $type;
    public $time;
    // public $OTP;

    public function __construct($data)
    {
        $this->reseverId = $data['reseverId'];
        $this->senderName = $data['senderName'];
        $this->senderImg = $data['senderImg'];
        $this->senderId = $data['senderId'];
        $this->messages = $data['messages'];
        $this->price = $data['price'];
        $this->points = $data['points'];
        $this->type = $data['type'];
        $this->time = $data['time'];
        // $this->OTP = $data['OTP'];
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new Channel('PointsNotify'.$this->reseverId );
        // return ['mychannel'];
    }

    public function broadcastAs()
    {
        return 'UserNotify';
    }
}
