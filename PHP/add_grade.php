<?php
session_start();





$conn = require "database.php";
require_once '../vendor/twilio-php-main/src/Twilio/autoload.php';
use Twilio\Rest\Client;

if (isset($_POST['add_grade'])) {

    $course = $_POST['course'];
    $student = $_POST['student'];
    $value = $_POST['value'];
    $phone_number = $_POST['number'];

    $query = "SELECT * from course WHERE ID = '$course'";
    $result = mysqli_query($conn, $query);

    $row = $result->fetch_assoc();

    $coursename = $row["Name"];


    $sql = "INSERT INTO grade(Course_ID,Student_ID,Value)
  VALUES ('$course','$student','$value')";

    if ($conn->query($sql) === TRUE) {
        //message
        // Your Twilio Account SID and Auth Token from twilio.com/console
        $account_sid = 'ACe34b4d1a06505841d4cae39fac4e868e';
        $auth_token = '8d30b88e16771d03c0c2527e5eb1011a';
        // Set your Twilio phone number
        $twilio_number = '+15855221230';

        // Create message content
        $message = "You have been graded in $coursename with the grade $value";

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
            $_SESSION["message"] = "The message has been sent";
            header("Location: ../view/professor/grade.php");
        } catch (Exception $e) {
            $_SESSION["message_error"] = "The message failed to be sent";
            header("Location: ../view/professor/grade.php");
        }
    } else {
        $_SESSION["message_error"] = "The message failed to be sent";
        header("Location: ../view/professor/grade.php");
    }
}

$conn->close();
?>