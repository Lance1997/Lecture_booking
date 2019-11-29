<?php
require_once './vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername("lecturebooking1@gmail.com")
    ->setPassword("admin12!@");

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($user_email, $user_token, $pwd)
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
          background: black;
          text-decoration: none;
          padding: 8px 15px;
          border-radius: 5px;
          color: white;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">

        <p> You have been successfully registered on LectureBooking.com. </p>
        
        <hr>
        <p> Click on the link velow to verify your email and register. <p>
        <p> Your default password is '.$pwd.'.<b>Please remember to change this after logging in.</b> <p>
        <p> Thank you </p>
        <a href="http://localhost/lecture_2/admin_email.php?token=' . $user_token . '">Verify Email!</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom("lecturebooking1@gmail.com")
        ->setTo($user_email)
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}

