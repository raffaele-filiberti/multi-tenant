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

    public $customer;
    public $folder_id;
    /**
     * Create a new event instance.
     *
     * @return void
     */
    public function __construct(Customer $customer, $folder_id)
    {
        $this->customer = $customer;
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
