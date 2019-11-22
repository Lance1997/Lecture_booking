<?php
session_start();

require_once 'config/db.php';

if (isset($_GET['token'])) {
    $token = $_GET['token'];
    $sql = "SELECT * FROM users WHERE token='$token' LIMIT 1";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $user = mysqli_fetch_assoc($result);
        $query = "UPDATE users SET verified=1 WHERE token='$token'";
        if (mysqli_query($conn, $query)) {

        $_SESSION['userrole'] = $user['userrole'];
        $_SESSION['verified'] = $user['verified'];

        $_SESSION['registered_message'] = "Your email has been successfully verified. Click here to <a href='login.php'>Login</a>.";

       header('location: rep_verified.php');
        } else {
            echo "User not found";
    } 
    }else {
        echo "No token provided!";
    }
} 