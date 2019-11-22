<?php
require_once '../vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername("lanarmah@gmail.com")
    ->setPassword("mysuccess@csafrica.com");

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmailCourseRep($user_email, $pwd, $name, $user_token)
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

        <p>'.$name.'  registered you on our site LectureBooking.com as his course rep.</p>
        <p>Please login to confirm your identity.</p>
        <hr>
        <p>Your default password is:'.$pwd.'. Please ensure that you change password after logging in to the site.</p>
        <p> Click on the link velow to verify your email and login. <p>
        <p> Thank you </p>
        <a href="http://localhost/lecture_2/rep_email.php?token=' . $user_token . '">Verify Email!</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify your email'))
        ->setFrom("lanarmah@gmail.com")
        ->setTo("lanarmah@gmail.com")
        ->setBody($body, 'text/html');

    // Send the message
    $result = $mailer->send($message);

    if ($result > 0) {
        return true;
    } else {
        return false;
    }
}
