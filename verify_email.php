<?php
session_start();

require_once 'config/db.php';

require_once 'controller/sendEmails.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET verified=1 WHERE token='$token'";

        if (mysqli_query($conn, $query)) {
            $email = $user['email'];
            $username = $user['username'];
            $preRole = $user['preRole'];
            $userid = $user['userid'];
            sendVerificationEmailToAdmin($email, $userid, $preRole, $username);
            $_SESSION['username'] = $user['username'];
            $_SESSION['userrole'] = $user['userrole'];
            $_SESSION['verified'] = true;
            $_SESSION['error_message'] = "A mail has been sent to your email account from <b>lanarmah@gmail.com</b>.
            Please verrify your account from your email.";
            $_SESSION['registered_message'] = "Your email has been successfully verified.";
            $_SESSION['wait_message'] = "Please wait as admin verifies your identity and assign you a role as per the preferred user role you chose. An email will be sent to you upon successful verification. Click on it to login.";

            $_SESSION['alert-class'] = "alert-warning";
            

            header("location: verified.php");
    } else {
        echo "User not found!";
    }
} else {
    echo "No token provided!";
}
}