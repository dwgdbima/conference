<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class ActionNewUser extends Notification
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
        if ($this->notificationData['action'] == 1) {
            return (new MailMessage)
                ->subject('Registration Approval')
                ->greeting('Dear ' . $this->notificationData['name'])
                ->line('Thank you for registering in the icemine event.')
                ->line('Congratulations, your data has been approved by the admin. Please login to make a submission.')
                ->line('Thank you for your attention');
        } else {
            return (new MailMessage)
                ->subject('Registration Approval')
                ->greeting('Dear ' . $this->notificationData['name'])
                ->line('Thank you for registering in the icemine event.')
                ->line('Sorry, your data was rejected by the admin. Please re-register using valid data.')
                ->line('Thank you for your attention');
        }
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
