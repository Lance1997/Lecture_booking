<?php
require_once 'vendor/autoload.php';

// Create the Transport
$transport = (new Swift_SmtpTransport('smtp.gmail.com', 465, 'ssl'))
    ->setUsername("lanarmah@gmail.com")
    ->setPassword("mysuccess@csafrica.com");

// Create the Mailer using your created Transport
$mailer = new Swift_Mailer($transport);

function sendVerificationEmail($email, $token)
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

        <p> Thanks for registering on our site LectureBooking.com. </p>
        <p> Please note that since you did not register directly with the admins of the site, further actions would have to taken to verify your identity before you are granted access to the system. </p>
        <p> Thank you </p>
        <hr>
        <p> Click on the link velow to verify your email and wait for verification, upon verification you will be allowed to access the system per your role <p>
        <a href="http://localhost/lecture_2/verify_email.php?token=' . $token . '">Verify Email!</a>
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


function sendVerificationEmailToAdmin($email, $userid, $preRole, $username)
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
        .user-id {
          text-decoration: underline;
          color: blue;
        }
      </style>
    </head>

    <body>
      <div class="wrapper">
        <p>A user is trying to sign Up on Lecture Booking.com.</p>
        <p>The user has already verified his or her email address.</p>
        <p> The user\'s ID is: <span class= "user-id">'.$userid. '</span>, has email <span>' .$email. '</span>, Username: <span class= "user-id">'.$username. '</span> and
        wants to be assigned a <span class="user-id">'.$preRole.'</span> role.</p>
        <p> Please Visit Site, confirm User upon verification and assign the user a role. </p>
        <hr>

        <a href="http://localhost/lecture_2/login.php">Login to Site!</a>
      </div>
    </body>

    </html>';

    // Create a message
    $message = (new Swift_Message('Verify User'))
        ->setFrom($email)
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
