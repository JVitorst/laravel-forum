<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use App\Reply;

class NewReply implements ShouldBroadcast
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $reply;

    public function __construct(Reply $reply)
    {
        $this->reply = $reply;
    }


    public function broadcastOn()
    {
        return new Channel('new.reply.' . $this->reply->thread_id);
    }
}
