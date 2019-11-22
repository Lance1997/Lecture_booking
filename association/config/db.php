<?php


//DB CONNECTION DETAILS
define('DB_HOST','localhost');
define('DB_USER', 'lecture');
define('DB_PASSWORD', 'funwithsql');
define('DB_NAME', 'lecture_booking');

//Establishing connection to DB
$conn = new mysqli(DB_HOST,DB_USER,DB_PASSWORD,DB_NAME);

//Checking for connection error
if($conn -> connect_error) {
    die('Connection failed'. $conn->connect_error);
}

