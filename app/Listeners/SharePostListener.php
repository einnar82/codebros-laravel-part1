<?php

namespace App\Listeners;

use App\Events\CreatedPostEvent;
use App\Mail\SendCreatedPost;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SharePostListener implements ShouldQueue
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  CreatedPostEvent  $event
     * @return void
     */
    public function handle(CreatedPostEvent $event)
    {
        \Mail::to($event->email)->send(new SendCreatedPost($event->post));
    }
}
