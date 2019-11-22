<?php

require 'constants.php';

//Establishing connection to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//Checking for connection error
if($conn -> connect_error) {
    die('Connection failed'. $conn->connect_error);
}

