<?php

namespace App\Listeners;

use App\Events\CreatedPostEvent;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogPostListener implements ShouldQueue
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
        \Log::debug('PAYLOAD', ['data' => $event->post]);
    }
}
