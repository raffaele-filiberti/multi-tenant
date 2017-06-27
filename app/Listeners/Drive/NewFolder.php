<?php

namespace App\Listeners\Drive;

use App\Agency;
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
        $model = '';
        switch ($event->model) {
            case 'a':
                $model = Agency::findOrFail($event->model_id);
                $model->folder_id = $event->folder_id;
                break;
            case 'c':
                $model = Customer::findOrFail($event->model_id);
                $model->folder_id = $event->folder_id;
                break;
            case 'p':
                $model = Project::findOrFail($event->model_id);
                $model->folder_id = $event->folder_id;
                break;
            case 't':
                $model = Task::findOrFail($event->model_id);
                $model->folder_id = $event->folder_id;
                break;
        }
        $model->save();
    }
}
