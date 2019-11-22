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

       header('location: login.php');
        } else {
            echo "User not found";
    } 
    }else {
        echo "No token provided!";
    }
} 