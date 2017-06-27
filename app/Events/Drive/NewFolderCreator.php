<?php

namespace App\Events\Drive;

use App\Customer;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class NewFolderCreator
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $model;
    public $model_id;
    public $folder_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct($model, $model_id, $folder_id)
    {
        $this->model_id = $model_id;
        $this->model = $model;
        $this->folder_id = $folder_id;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
