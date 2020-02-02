<?php

namespace App\Events;

use App\Post;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class CreatedPostEvent
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $post;

    public $email;

    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Post $post, $email)
    {
        $this->post = $post;
        $this->email = $email;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
