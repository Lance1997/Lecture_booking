<?php

session_start();

require_once 'config/db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);
    $user_email = $user['email'];
    $user_token = $user['token'];
        $_SESSION['token'] = $user_token;
        $_SESSION['email'] = $user_email;
        $_SESSION['tok'] = "Your have successfully changed your password;";
        $_SESSION['alert-class'] = 'alert-success';
        header("location: new_pass.php");
        exit(0);
}else {
    echo "Token expired or wrong please contact admin for more info or click on link sent to your email again.";
}

?>
