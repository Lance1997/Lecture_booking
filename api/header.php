<?php session_start(); ?>

<?php //logout

if (isset($_GET['logout'])) {
  if (isset($_GET['logout'])) {
    session_unset();
    session_destroy();
    header("location: ./index.php");
  exit();
}
}

 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <title>Homepage</title>

    <!-- Meta Information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">

    <!-- STYLES -->
    <!-- Bootstrap core CSS -->
    <link href="/lecture_2/assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="/lecture_2/assets/css/all.css" rel="stylesheet">
    <!-- My custom styles -->
    <link href="/lecture_2/assets/css/style.css" rel="stylesheet">

	<!-- FAVICON -->
	<link rel="apple-touch-icon" sizes="57x57" href="/lecture_2/favico/apple-icon-57x57.png">
	<link rel="apple-touch-icon" sizes="60x60" href="/lecture_2/favico/apple-icon-60x60.png">
	<link rel="apple-touch-icon" sizes="72x72" href="/lecture_2/favico/apple-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="76x76" href="/lecture_2/favico/apple-icon-76x76.png">
	<link rel="apple-touch-icon" sizes="114x114" href="/lecture_2/favico/apple-icon-114x114.png">
	<link rel="apple-touch-icon" sizes="120x120" href="/lecture_2/favico/apple-icon-120x120.png">
	<link rel="apple-touch-icon" sizes="144x144" href="/lecture_2/favico/apple-icon-144x144.png">
	<link rel="apple-touch-icon" sizes="152x152" href="/lecture_2/favico/apple-icon-152x152.png">
	<link rel="apple-touch-icon" sizes="180x180" href="/lecture_2/favico/apple-icon-180x180.png">
	<link rel="icon" type="image/png" sizes="192x192"  href="/lecture_2/favico/android-icon-192x192.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/lecture_2/favico/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="96x96" href="/lecture_2/favico/favicon-96x96.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/lecture_2/favico/favicon-16x16.png">
	<link rel="manifest" href="/lecture_2/favico/manifest.json">
	<meta name="msapplication-TileColor" content="#ffffff">
	<meta name="msapplication-TileImage" content="/lecture_2/favico/ms-icon-144x144.png">
	<meta name="theme-color" content="#ffffff">


    <script src="node_modules/sweetalert/dist/sweetalert.min.js"> </script>
    <script src="/lecture_2/assets/js/jquery-3.4.1.min.js"></script>
    <script>
    
// Wait for window load
	$(document).ready(function() {
		// Animate loader off screen
    $("#loader").fadeOut("slow");
	});
    </script>
  </head>
  <body id= "bg-img">
    <div id="loader">
      <img src="img/ucc_logo.png" style=" margin: 0;position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);" class="" id="pageLoader">
    </div>
  