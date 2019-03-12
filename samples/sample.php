<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 3/12/2019
 * Time: 9:40 PM
 */
require_once __DIR__ . '/../vendor/autoload.php'; // Autoload files using Composer autoload

use Notifications\HelperClass;

// Instantiate the above class
// 1. Call sendWebPushNotification method(function) which  will need content and title as arguments
echo HelperClass::sendWebPushNotification("I am sample content", "I am sample title");


// Instantiate the above class
// Call sendEmailNotification method(function) which  will need four arguments as follows
// 1. recipient : receiver email
// 2. message : content you want to send to user
// 3. sender_name : Name of From (where email is coming from specifically from your server name or Company name)
// 4. sender_email : Email of From (where email is coming from specifically from your server email)
//
//echo HelperClass::sendEmailNotification("uweaime@gmail.com", "I am sample message",
//    "Sample subject", "RwandaBuild Ltd", "rwandabuild@sample.com");