<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class SendPaperToReviewer extends Notification
{
    use Queueable;

    public $notificationData;
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
            ->subject('New Paper Review')
            ->greeting('Dear ' . $this->notificationData['name'])
            ->line('How are you? I hope you\'re having a wonderful day.')
            ->line('We have selected you as a reviewer of paper SUBM-' . $this->notificationData['subm_id'] . '. The details of this paper are as follows: <br>')
            ->line('<b>Presenter : </b> ' . $this->notificationData['presenter'] . '<br>
            <b>Title : </b> ' . $this->notificationData['title'] . '<br>
            <b>Topic : </b> ' . $this->notificationData['topic'] . '<br>
            <b>File : </b> ' . $this->notificationData['file'] . '<br>')
            ->line('Thank you for your attention');
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
