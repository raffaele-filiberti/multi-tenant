<?php

namespace App\Notifications;

use App\User;
use Carbon\Carbon;
use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\BroadcastMessage;

class NewSubscriberNotification extends Notification
{
    use Queueable;

    public $user;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database','broadcast'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     */
    public function toBroadcast($notifiable)
    {
        return new BroadcastMessage([
            'title' => 'New Subscriber',
            'body' => $this->user->name . 'has requested to be subscribed',
            //TODO: problema express js da fixare
            'action_url' => 'https://laravel.com',
            'created' => Carbon::now()->toIso8601String()
        ]);
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            'title' => 'New Subscriber',
            'body' => $this->user->name . 'has requested to be subscribed',
            //TODO: problema express js da fixare
            'action_url' => 'https://laravel.com',
            'created' => Carbon::now()->toIso8601String()
        ];
    }
}
