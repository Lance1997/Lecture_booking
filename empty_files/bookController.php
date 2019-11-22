<?php

//Connections
require '../config/db.php';

//errors
$errors = array();

if (isset($_POST['book-btn'])) {

    $time_of_lecture = $_POST['time_of_lecture'];
    $course_name = $_POST['course_name'];
    $day_lect = $_POST['day_lect'];
    $venue_name = $_POST['course_venue'];
    $course_code = '';

    if (empty($time_of_lecture) || empty($course_name) || empty($day_lect) || empty($venue_name)) {
      $error['non_empty_lecture'] = "Please do not leave any field empty";
    }

      //Checking for non existent email in db
      $time_of_lecture_Query = "SELECT * FROM courses WHERE course_name=? AND course_code=? AND venue_code=? AND day_lect=? AND time_of_lecture=? LIMIT 1";

      $stmt = $conn->prepare($time_of_lecture_Query);
      $stmt->bind_param('sssss', $course_name,$course_code,$venue_name,$day_lect,$time_of_lecture);
      $stmt->execute();
      $result = $stmt->get_result();
      $venueCount = $result->num_rows;
      $stmt->close();

      if ($venueCount > 0) {
          $errors['occupied'] = "Venue is occupied.";
      }
      if(count($errors)===0) {

         $sql = "INSERT INTO courses (course_name,course_code,venue_code,day_lect,time_of_lecture) VALUES(?,?,?,?,?)";
         $stmt = $conn->prepare($sql);
         $stmt-> bind_param('sssss', $course_name,$course_code,$venue_name,$day_lect,$time_of_lecture);
         if($stmt->execute()) {
             //login user
             $stmt->close();

        echo "Booking Successful. Click here to check <a href='venues/venue_template.php?{$venue_name}'> Venue </a> or enter values to make another booking.";
    } else {
      echo "Booking Unsuccessful. Please try again later.";
      }
    }



$conn->close();
}
