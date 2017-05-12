<?php

namespace App\Listeners\Users;

use App\Events\Users\NewSubscriber;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewSubscriberNotification
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
     * @param  NewSubscriber  $event
     * @return void
     */
    public function handle(NewSubscriber $event)
    {
        //
    }
}
