<?php
namespace App\Http\Traits;

trait FcmTrait {

    public function sendToTopic($model,$topikName) {
            // API access key from Google API's Console
            define( 'API_ACCESS_KEY', 'AAAAWFfOXR8:APA91bGOvjbSV0uZ5B3RZwhpFyU5B0TwmAx-zDET_t_XZDL_Gj7Zxu3vizI0QbS2lVBNZLqUbjTBQfmeu_mAFCw7ZOwpLO1fTR3MBw6dZAEv9_SWmDLd04ld2N-kopDRWGGqxvVSjul6' );
            // prep the bundle
            $msg = array(
                'body'      => $model->description,
                'title'     =>  $model->title,
                'image'     => 'http://157.175.99.93/uploads/photos/recipes/main_images/2022-05-24/rxkQgowojpzboERH.jpg'  
            );

            $fields = array
            (
                'to'  => '/topics/'.$topikName,
                'notification'          => $msg
            );

            $headers = array(
                'Authorization: key=' . API_ACCESS_KEY,
                'Content-Type: application/json'
            );

            $ch = curl_init();
            curl_setopt( $ch,CURLOPT_URL, 'https://fcm.googleapis.com/fcm/send' );
            curl_setopt( $ch,CURLOPT_POST, true );
            curl_setopt( $ch,CURLOPT_HTTPHEADER, $headers );
            curl_setopt( $ch,CURLOPT_RETURNTRANSFER, true );
            curl_setopt( $ch,CURLOPT_SSL_VERIFYPEER, false );
            curl_setopt( $ch,CURLOPT_POSTFIELDS, json_encode( $fields ) );
            $result = curl_exec($ch );
            curl_close( $ch );
              
    }
    
}