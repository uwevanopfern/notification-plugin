<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/12/2019
 * Time: 8:58 AM
 */

namespace Notifications;

require __DIR__ . '/twilio-php-master/Twilio/autoload.php';

use Twilio\Rest\Client;


class HelperClass
{
    public function sendWebPushNotification($content, $title){

        $contents = $content;

        $content = array(
            "en" => $contents
        );

        $headings = array(
            "en" => $title
        );

        $fields = array(
            'app_id' => "e429ed8d-3738-4b16-914a-015b6340bd76",
            'included_segments' => array('All'),
            'contents' => $content,
            'headings' => $headings

        );

        $fields = json_encode($fields);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic NDQyYmU3ZjctYTczMi00OWI3LThiM2MtZjkwZjMyMGIyNDUw'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_exec($ch);

        return $fields;
    }

    public function sendNotificationOnSingleDevice($content, $title, $device){

        $contents = $content;

        $content = array(
            "en" => $contents
        );

        $headings = array(
            "en" => $title
        );

        $fields = array(
            'app_id' => "405b375c-1c90-4ad6-94ad-3e792c7be572",
            'include_player_ids' => array($device),
            'contents' => $content,
            'headings' => $headings

        );

        $fields = json_encode($fields);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic MTMyNGFmY2QtY2U5OC00YmRmLWJkNzgtMTRkNTA3NjU4ZmE0'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_exec($ch);

        return $fields;
    }

    public function sendNotificationOnAllDevices($content, $title){

        $contents = $content;

        $content = array(
            "en" => $contents
        );

        $headings = array(
            "en" => $title
        );

        $fields = array(
            'app_id' => "405b375c-1c90-4ad6-94ad-3e792c7be572",
            'included_segments' => array('All'),
            'contents' => $content,
            'headings' => $headings

        );

        $fields = json_encode($fields);


        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, "https://onesignal.com/api/v1/notifications");
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Content-Type: application/json; charset=utf-8',
            'Authorization: Basic MTMyNGFmY2QtY2U5OC00YmRmLWJkNzgtMTRkNTA3NjU4ZmE0'
        ));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($ch, CURLOPT_HEADER, FALSE);
        curl_setopt($ch, CURLOPT_POST, TRUE);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $fields);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);

        curl_exec($ch);

        return $fields;
    }

    public function sendEmailNotification($recipient, $message, $subject, $sender_name, $sender_email){

        $headers = "";

        $headers = "From: $sender_name<$sender_email>" . "\r\n" .
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

        return mail($recipient, $subject, $message, $headers);
    }

    public function sendSMS($to, $body){

        // Find your Account Sid and Auth Token at twilio.com/console
        $sid    = "AC729949d85a9734d96a6a920e7e679cd0";
        $token  = "999eda303b47801f2f0d14c34f237949";
        $twilio = new Client($sid, $token);

        // "to" parameter is phone number and format of it is 078.....or 072.... 0r 073....
        $message = $twilio->messages
            ->create("+25$to", // to
                array(
                    "body" => $body,
                    "from" => "+12019034677" // will be change to company once account is not trial
                )
            );

        return $message->sid;
    }
}