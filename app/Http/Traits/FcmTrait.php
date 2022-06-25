<?php
namespace App\Http\Traits;

use Illuminate\Support\Facades\Http;

trait FcmTrait {

    public function sendToTopic($model,$topikName) {
            // API access key from Google API's Console
            define( 'API_ACCESS_KEY', 'AAAAWFfOXR8:APA91bGOvjbSV0uZ5B3RZwhpFyU5B0TwmAx-zDET_t_XZDL_Gj7Zxu3vizI0QbS2lVBNZLqUbjTBQfmeu_mAFCw7ZOwpLO1fTR3MBw6dZAEv9_SWmDLd04ld2N-kopDRWGGqxvVSjul6' );
            // prep the bundle
            $msg = array(
                'body'      =>  $model->description,
                'title'     =>  $model->title,
                'image'     => "http://157.175.99.93{$model->main_image}",  
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

    public function generateDeebLink($slug){
        $url = "https://firebasedynamiclinks.googleapis.com/v1/shortLinks?key=AIzaSyCsm-mhH_hHGi1NdRW9jG5PraAqPx_0mTI";
            $curl = curl_init($url);
            curl_setopt($curl, CURLOPT_URL, $url);
            curl_setopt($curl, CURLOPT_POST, true);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $headers = array(
            "Content-Type: application/json",
            );
            curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);

            $data = <<<DATA
            {
              "dynamicLinkInfo": {
                "domainUriPrefix": "https://matbakhmisk.page.link",
                "link": "http://ibraihmis.online/recipe_id?id={$slug}",
                "androidInfo": {
                "androidPackageName": "com.matbakhmisk.matbakhmisk"
                },
                "iosInfo": {
                "iosBundleId": "com.matbakhmisk.matbakhmisk"
                }
            }
            }
            DATA;

            curl_setopt($curl, CURLOPT_POSTFIELDS, $data);

            //for debug only!
            curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, false);

            $resp = curl_exec($curl);
            curl_close($curl);
            return json_decode($resp)->shortLink;

    }
    
}