<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendLoa extends Notification
{
    use Queueable;

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
            ->subject('Successfully Submit')
            ->greeting('Dear ' . $this->notificationData['name'])
            ->line('Dear author, We are pleased to announce the acceptance of the final paper submission to the International Conference on Earth Science, Minerals, and Energy (ICEMINE) 2021. Here we attach an announcement of acceptance letter (LOA).')
            ->attach($this->notificationData['path'])
            ->line('You can contact us via this email if you have any questions regarding this matter. Congratulations on the successful submission of your Final Paper. We look forward to seeing you at ICEMINE 2022.');
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
