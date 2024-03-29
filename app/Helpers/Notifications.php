<?php


namespace App\Helpers;


use LaravelFCM\Facades\FCM;
use LaravelFCM\Message\OptionsBuilder;
use LaravelFCM\Message\PayloadDataBuilder;
use LaravelFCM\Message\PayloadNotificationBuilder;

class Notifications
{
    public static function addNotification($token, $fcm_title, $fcm_message, $fcm_data =null) {

        $optionBuilder = new OptionsBuilder();
        $optionBuilder->setTimeToLive(60*20);

//            $notificationBuilder = new PayloadNotificationBuilder('my title');
        $notificationBuilder = new PayloadNotificationBuilder($fcm_title);
//            $notificationBuilder->setBody('Hello world')
//                ->setSound('default');
        $notificationBuilder->setBody($fcm_message)
            ->setSound('default');
        $dataBuilder = new PayloadDataBuilder();
//            $dataBuilder->addData(['a_data' => 'my_data']);
        $dataBuilder->addData(['a_data' => $fcm_data]);

        $option = $optionBuilder->build();
        $notification = $notificationBuilder->build();
        $data = $dataBuilder->build();

//            $token = "a_registration_from_your_database";

        $downstreamResponse = FCM::sendTo($token, $option, $notification, $data);

        $downstreamResponse->numberSuccess();
        $downstreamResponse->numberFailure();
        $downstreamResponse->numberModification();


//// return Array - you must remove all this tokens in your database
            $downstreamResponse->tokensToDelete();
//
//// return Array (key : oldToken, value : new token - you must change the token in your database)
            $downstreamResponse->tokensToModify();
//
//// return Array - you should try to resend the message to the tokens in the array
            $downstreamResponse->tokensToRetry();
//
//// return Array (key:token, value:error) - in production you should remove from your database the tokens
            $downstreamResponse->tokensWithError();


        return $downstreamResponse;
    }


}
