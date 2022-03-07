<?php

namespace App\Notifications;

use App\Channels\FcmChannel;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;
/**
 * Usage:
 * 
 * auth()->user()->notify(new \App\Notifications\FirebasePushNotification(
 *             [
 *                 'title' => 'title',
 *                 'body' => 'body of topic notification',
 *                 'image' => 'image',
 *             ],
 *             ['5464'],
 *             'muathye'
 *         ));
 */

class FirebasePushNotification extends Notification
{
    use Queueable;

    /**
     * The firebase push notification message.
     *
     * @var array
     */
    protected $message = [
        'title' => 'TITLE',
        'body' => 'Body of notification.',
        'image' => '',
    ];

    /**
     * The firebase devices tokens.
     *
     * @var array
     */
    protected $devices_id = [];

    /**
     * The firebase topic name.
     *
     * @var array
     */
    protected $topic = '';

    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct($message, $devices_id = [], $topic = '')
    {
        $this->message = $message;
        $this->devices_id = $devices_id;
        $this->topic = $topic;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['database', FcmChannel::class];
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        if (!empty($this->topic)) {
            return [
                // pass your fcm topic name
                'to' => '/topics//' . $this->topic ?? 'muathye',
                'notification' => $this->message
            ];
        }

        if (!empty($this->devices_id)) {
            return [
                // pass your user devices tokens
                'registration_ids' => $this->devices_id,
                'notification' => $this->message
            ];
        }
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toFcm($notifiable)
    {
        if (!empty($this->topic)) {
            return [
                // pass your fcm topic name
                'to' => '/topics//' . $this->topic ?? 'muathye',
                'notification' => $this->message
            ];
        }

        if (!empty($this->devices_id)) {
            return [
                // pass your user devices tokens
                'registration_ids' => $this->devices_id,
                'notification' => $this->message
            ];
        }
    }
}
