<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class NewReviewer extends Notification
{
    use Queueable;

    private $notificationData;

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($notificationData)
    {
        $this->notificationData = $notificationData;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['mail'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toMail($notifiable)
    {
        return (new MailMessage)
            ->subject('Reviewer Invitation')
            ->greeting('Dear ' . $this->notificationData['name'])
            ->line('Thank you very much for your dedication to support ' . config('app.name') . '.<br>Here is the access for your reviewer page at ' . config('app.name') . ' web system.')
            ->line('Email : <strong>' . $this->notificationData['email'] . '</strong> <br>Password : <strong>' . $this->notificationData['password'] . '</strong>')
            ->line('This is the link to going to reviewer system<br>' . route('login'))
            ->line('Once again, thank you very much and have a nice day.');
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
            //
        ];
    }
}
