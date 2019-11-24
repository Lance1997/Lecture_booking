
<?php

    if(isset($_POST['book_venue'])) {
      $id = $_SESSION['id'];

      $course_name =mysqli_real_escape_string($conn,trim($_POST['course_name']));
      $course_code =mysqli_real_escape_string($conn,trim($_POST['course_code']));
      $venue_name =mysqli_real_escape_string($conn,trim($_POST['venue_code']));
      $day_lect =mysqli_real_escape_string($conn,trim($_POST['day_lect']));
      $purpose_for_lecture =mysqli_real_escape_string($conn,trim($_POST['purpose']));

      $time_of_lecture =mysqli_real_escape_string($conn,trim($_POST['time_of_lecture']));

      $query = "INSERT INTO timetable(user_id,course_name,course_code,venue_code,purpose,day_lect,time_of_lecture)";

      $query .= "VALUES('{$id}','{$course_name}','{$course_code}','{$venue_name}','{$purpose_for_lecture}','{$day_lect}','{$time_of_lecture}') ";

      $book_venue_query = mysqli_query($conn,$query);

      //Confirm QUERY
      confirmQuery($book_venue_query);

      if($book_venue_query) {
        echo "Venue Booked: " . " " . "<a href='courses.php'>View Booked Venues</a> ";
      }

    }


?>



<form action="" method="post">

    <div class="form-group">
      <label for="course_name">Course Name</label>
      <input type="text" name="course_name" class="form-control">
    </div>

    <div class="form-group">
      <label for="course_code">Course Code</label>
      <input type="text" name="course_code" class="form-control">
    </div>

    <div class="form-group">
      <labelday for="">Choose Purpose</label>
      <select name="purpose" id="purpose">
        <option value="lecture">Lecture</option>
        <option value="association meeting">Assocation Meeting</option>
      </select>
    </div>

    <div class="form-group">
      <label for="venue_name">Venue Name<br> <small>Please ensure that name entered is in the following format: ie. G1, LT4, CELT5, AS. Venues entered in different formats will not display on timetable.</small></label>
      <input type="text" name="venue_code" class="form-control">
    </div>

    <div class="form-group">
      <label for="day">Choose Day</label>
      <select name="day_lect" id="days">
        <option value="MONDAY">MONDAY</option>
        <option value="TUESDAY">TUESDAY</option>
        <option value="WEDNESDAY">WEDNESDAY</option>
        <option value="THURSDAY">THURSDAY</option>
        <option value="FRIDAY">FRIDAY</option>
      </select>
    </div>

    <div class="form-group">
      <label for="time">Choose Time</label>
      <select name="time_of_lecture" id="time">
        <option value="6:30-7:30am"  >6:30-7:30am</option>
        <option value="7:30-8:30am"  >7:30-8:30am</option>
        <option value="8:30-9:30am"  >8:30-9:30am</option>
        <option value="8:30-9:30am"  >8:30-9:30am</option>
        <option value="9:30-10:30am"  >9:30-10:30am</option>
        <option value="10:30-11:30am"  >10:30-11:30am</option>
        <option value="11:30-12:30pm"  >11:30-12:30pm</option>
        <option value="12:30-13:30pm"  >12:30-13:30pm</option>
        <option value="13:30-14:30pm"  >13:30-14:30pm</option>
        <option value="14:30-15:30pm"  >14:30-15:30pm</option>
        <option value="15:30-16:30pm"  >15:30-16:30pm</option>
        <option value="16:30-17:30pm"  >16:30-17:30pm</option>
        <option value="17:30-18:30pm"  >17:30-18:30pm</option>
        <option value="8:30-19:30pm"  >18:30-19:30pm</option>
        <option value="19:30-20:30pm"  >19:30-20:30pm</option>
      </select>
    </div>

    <div class="form-group">
      <input type="submit" value="Book Venue" name="book_venue" class="btn btn-primary">
    </div>
</form>
