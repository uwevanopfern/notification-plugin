<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/12/2019
 * Time: 8:58 AM
 */

namespace Notifications;


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

    public function sendEmailNotification($recipient, $message, $subject, $sender_name, $sender_email){

        $headers = "";

        $headers = "From: $sender_name<$sender_email>" . "\r\n" .
        $headers .= 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-Type: text/html; charset=ISO-8859-1' . "\r\n";

        return mail($recipient, $subject, $message, $headers);
    }
}