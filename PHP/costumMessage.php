<?php

$conn = require "database.php";
require_once '../vendor/twilio-php-main/src/Twilio/autoload.php';
use Twilio\Rest\Client;

if (isset($_POST['message'])) {

    $phone_number = $_POST['number'];
    $messagee = $_POST['message'];


    //message
    // Your Twilio Account SID and Auth Token from twilio.com/console
    $account_sid = 'ACe34b4d1a06505841d4cae39fac4e868e';
    $auth_token = '8d30b88e16771d03c0c2527e5eb1011a';
    // Set your Twilio phone number
    $twilio_number = '+15855221230';

    // Create message content
    $message = $messagee;

    // Create a Twilio client object
    $client = new Client($account_sid, $auth_token);

    try {
        // Send the SMS message using Twilio API
        $message = $client->messages->create(
            $phone_number,
            // Recipient's phone number
            [
                'from' => $twilio_number,
                'body' => $message
            ]
        );
        echo "SMS sent successfully to $phone_number";
    } catch (Exception $e) {
        echo "Error sending SMS: " . $e->getMessage();
    }
} else {
}


$conn->close();
?>