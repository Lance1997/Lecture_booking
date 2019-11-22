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
    <script src="node_modules/sweetalert/dist/sweetalert.min.js"> </script>
  </head>
  <body id= "bg-img">
