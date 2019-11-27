
<?php

    if(isset($_POST['book_venue'])) {
      $course_name = mysqli_real_escape_string($conn,trim($_POST['course_name']));
      $course_code = 'Association';
      $venue_name =mysqli_real_escape_string($conn,trim($_POST['venue_code']));
      $day_lect =mysqli_real_escape_string($conn,trim($_POST['day_lect']));
      $purpose_for_lecture =mysqli_real_escape_string($conn,trim($_POST['purpose']));
      $time_of_lecture =mysqli_real_escape_string($conn,trim($_POST['time_of_lecture']));


      $query = "INSERT INTO timetable(user_id,course_name,course_code,venue_code,purpose,day_lect,time_of_lecture)";

      $query .= "VALUES('{$_SESSION['id']}','{$course_name}','{$course_code}','{$venue_name}','{$purpose_for_lecture}','{$day_lect}','{$time_of_lecture}')";

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
    <label for="course_name">Association Name</label>
    <input type="text" name="course_name" class="form-control">
  </div>

    <div class="form-group">
      <labelday for="">Choose Purpose</label>
      <select name="purpose" id="purpose">
        <option value="association meeting">Assocation Meeting</option>
      </select>
    </div>

    <div class="form-group">
      <label for="day">Choose Venue</label>
      <select name="venue_code" id="days">
        <option value="LT1">LT1</option>
        <option value="LT2">LT2</option>
        <option value="LT3">LT3</option>
        <option value="LT4">LT4</option>
        <option value="LT5">LT5</option>
        <option value="LT6">LT6</option>
        <option value="LT7">LT7</option>
        <option value="LT8">LT8</option>
        <option value="LT9">LT9</option>
        <option value="LT10">LT10</option>
        <option value="LT11">LT11</option>
        <option value="LT12">LT12</option>
        <option value="LT13">LT13</option>
        <option value="LT14">LT14</option>
        <option value="LT15">LT15</option>
        <option value="LT16">LT16</option>
        <option value="LT17">LT17</option>
        <option value="LT18">LT18</option>
        <option value="LT19">LT19</option>
        <option value="LT20">LT20</option>
        <option value="LT21">LT21</option>
        <option value="LT22">LT22</option>
        <option value="CELT1">CELT1</option>
        <option value="CELT2">CELT2</option>
        <option value="CELT3">CELT3</option>
        <option value="CELT4">CELT4</option>
        <option value="CELT5">CELT5</option>
        <option value="CELT6">CELT6</option>
        <option value="CELT7">CELT7</option>
        <option value="CELT8">CELT8</option>
        <option value="CELT9">CELT9</option>
        <option value="CELT10">CELT10</option>
        <option value="CELT11">CELT11</option>
        <option value="CELT12">CELT12</option>
        <option value="G11">G11</option>
        <option value="G12">G12</option>
        <option value="G13">G13</option>
        <option value="G14">G14</option>
        <option value="G15">G15</option>
        <option value="G16">G16</option>
      </select>
    </div>


    <div class="form-group">
      <label for="day">Choose Day:  </label>
      <select name="day_lect" id="days">
        <option value="MONDAY">MONDAY</option>
        <option value="TUESDAY">TUESDAY</option>
        <option value="WEDNESDAY">WEDNESDAY</option>
        <option value="THURSDAY">THURSDAY</option>
        <option value="FRIDAY">FRIDAY</option>
      </select>
    </div>

    <div class="form-group">
      <label for="time">Choose Time:  </label>
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
