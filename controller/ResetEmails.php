<?php
require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername("lecturebooking1@gmail.com")
    ->setPassword("admin12!@");

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendResetEmails($email, $token)
{
    global $mailer;
    $body = '<!DOCTYPE html>
    <html lang="en">

    <head>
      <meta charset="UTF-8">
      <title>Test mail</title>
      <style>
        .wrapper {
          padding: 20px;
          color: #444;
          font-size: 1.3em;
        }
        a {
          background: lightgray;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: white;
        }
        .user-id {
          padding: 8px 15px;
          border-radius: 5px;
          color: black;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>HI</p>
        <hr>
        <p> You recently requested a change of your password on Lecture Booking.com. Please click on the link below to reset your password.</p>

        <a href="http://localhost/lecture_2/setToken.php?token='. $token.'">Reset</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Reset Your Password'))
        ->setFrom("lecturebooking1@gmail.com")
        ->setTo($email)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}
