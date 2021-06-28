<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;

class FinalDecision extends Notification
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
        if ($this->notificationData['decision'] == 1) {
            return (new MailMessage)
                ->subject('Final Decision')
                ->greeting('Dear ' . $this->notificationData['name'])
                ->line('How are you? I hope you\'re having a wonderful day.')
                ->line('Congratulations, your paper with submission id SUBM-' . $this->notificationData['subm_id'] . ' has reached final approval by the committe.<br>Please login to submit the final paper. <br>' . route('login'))
                ->line('Thank you for your attention');
        } else {
            return (new MailMessage)
                ->subject('Final Decision')
                ->greeting('Dear ' . $this->notificationData['name'])
                ->line('How are you? I hope you\'re having a wonderful day.')
                ->line('Thankyou for you\'r participation but, we are sorry. Your paper with submission id SUBM-' . $this->notificationData['subm_id'] . ' has been rejected by the committee.
Please contact the committee or you can login to get more information.<br>' . route('login'))
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
