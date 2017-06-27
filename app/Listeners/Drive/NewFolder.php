<?php

namespace App\Listeners\Drive;

use App\Customer;
use App\Events\Drive\NewFolderCreator;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class NewFolder
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
     * @param  NewFolderCreator  $event
     * @return void
     */
    public function handle(NewFolderCreator $event)
    {

        $customer = Customer::findOrFail($event->customer->id);
        $customer->folder_id = $event->folder_id;
        $customer->save();
    }
}
