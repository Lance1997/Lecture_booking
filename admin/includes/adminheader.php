<?php ob_start() ?>
<?php session_start(); ?>

<!-- DB Require -->
<?php require_once 'config/db.php'; ?>

<!-- DB Require -->
<?php require_once 'functions.php'; ?>

<?php //logout

if (isset($_GET['logout'])) {
  session_unset();
  session_destroy();
  header("location: ../index.php");
  exit();
}

 ?>

<?php

$time_to_unset = (60*15);
if (!isset($_SESSION['timeout_idle'])) {
    $_SESSION['timeout_idle'] = time() + ($time_to_unset);
} else {
    if ($_SESSION['timeout_idle'] < time()) {   
        //destroy session
        session_unset();
        session_destroy();
        header('location: ../login.php');
    } else {
        $_SESSION['timeout_idle'] = time() + ($time_to_unset);
    }
}
?>


<?php
$roleadm = "admin";
if($_SESSION["userrole"] !== $roleadm){
header("location: ../login.php");
exit();
} elseif (!$_SESSION['verified']) {
header('location:../ welcome.php');
exit();
}
 ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Lecture Booking</title>


    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
        <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>

<body>
