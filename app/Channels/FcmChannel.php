<?php

namespace App\Channels;

use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\Log;

class FcmChannel
{
    /**
     * Send the given notification.
     *
     * @param  mixed  $notifiable
     * @param  \Illuminate\Notifications\Notification  $notification
     * @return void
     */
    public function send($notifiable, Notification $notification)
    {
        $message = $notification->toFcm($notifiable);

        // Send notification to the $notifiable instance...

        //API URL of FCM
        $url = 'https://fcm.googleapis.com/fcm/send';

        /*api_key available in:
        Firebase Console -> Project Settings -> CLOUD MESSAGING -> Server key*/
        $api_key = env('FIREBASE_SERVER_KEY');

        if (isset($message['registration_ids'])) {
            $fields = array (
                'registration_ids' => array (
                    $message['registration_ids']
                ),
                'notification' => array (
                    'title' => $message['notification']['title'] ?? 'Notification Title',
                    'body' => $message['notification']['body'] ?? 'This is the message for your app client.',
                    'image' => $message['notification']['image'] ?? '',
                )
            );
        }
        else if (isset($message['to'])) {
            $fields = array (
                'to' => $message['to'] ?? '/topics/muathye',
                'notification' => array (
                    'title' => $message['notification']['title'] ?? 'Notification Title',
                    'body' => $message['notification']['body'] ?? 'This is the message for your app client.',
                    'image' => $message['notification']['image'] ?? '',
                )
            );
        }


        //header includes Content type and api key
        $headers = array(
            'Content-Type:application/json',
            'Authorization:key='.$api_key
        );

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, env('APP_ENV') == 'local' ? false : true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($fields));
        $result = curl_exec($ch);
        if ($result === FALSE) {
            Log::emergency('FCM Send Error: ' . curl_error($ch));
        }
        curl_close($ch);
        return $result;
    }
}
