
<?php

    if(isset($_GET['c_id'])) {
        $get_course_id = $_GET['c_id'];

        $query = "SELECT * FROM timetable WHERE course_id = $get_course_id";
        $select_courses_by_id = mysqli_query($conn,$query);

          while($row = mysqli_fetch_assoc($select_courses_by_id)) {
            $course_name =$row['course_name'];
            $course_code =$row['course_code'];
            $venue_name =$row['venue_code'];
            $day_lect =$row['day_lect'];
            $time_of_lecture =$row['time_of_lecture'];

    }

    ?>

    <?php
    if(isset($_POST['update_course'])) {

      $course_name = mysqli_real_escape_string($conn,trim($_POST['course_name']));
      $course_code = mysqli_real_escape_string($conn,trim($_POST['course_code']));
      $venue_name = mysqli_real_escape_string($conn,trim($_POST['venue_code']));
      $day_lect = mysqli_real_escape_string($conn,trim($_POST['day_lect']));
      $time_of_lecture = mysqli_real_escape_string($conn,trim($_POST['time_of_lecture']));


         $select_query = "SELECT * FROM timetable WHERE day_lect = '{$day_lect}' AND time_of_lecture = '{$time_of_lecture}' AND venue_code = '{$venue_name}'";
      $select_query_conn = mysqli_query($conn,$select_query);
      confirmQuery($select_query_conn);

      $numRows = mysqli_num_rows($select_query_conn);

      if($numRows > 0) {
        echo "<div class='alert alert-warning'>Please Check Timetable Again. It is either You selected the same time and venue or the Venue is occupied!</div>";
      }
      else {


      $query = "UPDATE timetable SET ";
      $query .= "course_name = '{$course_name}',";
      $query .="course_code ='{$course_code}', ";
      $query .="venue_code ='{$venue_name}', ";
      $query .="day_lect ='{$day_lect}', ";
      $query .="time_of_lecture ='{$time_of_lecture}' ";
      $query .="WHERE course_id = '{$get_course_id}'";

      $update_courses = mysqli_query($conn,$query);

      confirmQuery($update_courses);

      if($update_courses) {
        echo '<div class="alert alert-success">
          Update successful
        </div>';
      }
    }

    }
  } else { // Display this if GET value is not in url
    header('location: index.php');
   }

 ?>



<form action="" method="post">

  <div class="form-group">
    <label for="title">Course Name</label>
    <input value="<?php echo $course_name ?>" type="text" name="course_name" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_author">Course Code</label>
    <input value = "<?php echo $course_code ?>" type="text" name="course_code" class="form-control">
  </div>

  <div class="form-group">
    <label for="post_status">Venue Name<br> <small>Please ensure that name entered is in the following format: ie. G1, LT4, CELT5, AS. Venues entered in different formats will not display on timetable.</small></label>
    <input value = "<?php echo $venue_name ?>" type="text" name="venue_code" class="form-control">
  </div>

  <div class="form-group">
    <labelday for="">Choose Day</label>
    <select name="day_lect" id="days">
      <option value="<?php echo $day_lect ?>"><?php echo $day_lect ?></option>
      <?php

        if($day_lect == 'MONDAY')
        {
          echo '<option value="TUESDAY">TUESDAY</option>';
          echo '<option value="WEDNESDAY">WEDNESDAY</option>';
          echo '<option value="THURSDAY">THURSDAY</option>';
          echo '<option value="FRIDAY">FRIDAY</option>';
        } elseif($day_lect == 'TUESDAY')
          {
            echo '<option value="MONDAY">MONDAY</option>';
          echo '<option value="WEDNESDAY">WEDNESDAY</option>';
          echo '<option value="THURSDAY">THURSDAY</option>';
          echo '<option value="FRIDAY">FRIDAY</option>';
          }
          elseif($day_lect == 'WEDNESDAY')
          {
            echo '<option value="MONDAY">MONDAY</option>';
          echo '<option value="TUESDAY">TUESDAY</option>';
          echo '<option value="THURSDAY">THURSDAY</option>';
          echo '<option value="FRIDAY">FRIDAY</option>';
          }
          elseif($day_lect == 'THURSDAY')
          {
            echo '<option value="MONDAY">MONDAY</option>';
            echo '<option value="TUESDAY">TUESDAY</option>';
          echo '<option value="WEDNESDAY">WEDNESDAY</option>';
          echo '<option value="FRIDAY">FRIDAY</option>';
          }
          elseif($day_lect == 'FRIDAY')
          {
            echo '<option value="MONDAY">MONDAY</option>';
            echo '<option value="TUESDAY">TUESDAY</option>';
          echo '<option value="WEDNESDAY">WEDNESDAY</option>';
          echo '<option value="THURSDAY">THURSDAY</option>';
        }

       ?>
    </select>
  </div>

  <div class="form-group">
    <label for="time">Choose Time:  </label>
    <select name="time_of_lecture" id="time">
      <option value="<?php echo $time_of_lecture ?>"><?php echo $time_of_lecture ?></option>
              <?php


            if($time_of_lecture == '6:30-7:30am') {
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo ' <option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30am"  >10:30-11:30am</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo '<option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
            } elseif($time_of_lecture == '7:30-8:30am')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30am"  >10:30-11:30am</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo '<option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '8:30-9:30am')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30am"  >10:30-11:30am</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo '<option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '9:30-10:30am')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="10:30-11:30am"  >10:30-11:30am</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo '<option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '10:30-11:30am')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo '<option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '11:30-12:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo '<option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '12:30-13:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo '<option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '13:30-14:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '14:30-15:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo ' <option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '15:30-16:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo ' <option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '16:30-17:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo ' <option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo '<option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '17:30-18:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo ' <option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo '<option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '18:30-19:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am</option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am</option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am</option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am</option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm</option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm</option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm</option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm</option>';
              echo ' <option value="14:30-15:30pm"  >14:30-15:30pm</option>';
              echo '<option value="15:30-16:30pm"  >15:30-16:30pm</option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm</option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm</option>';
              echo '<option value="19:30-20:30pm"  >19:30-20:30pm</option>';
              }
              elseif($time_of_lecture == '19:30-20:30pm')
              {
              echo ' <option value="6:30-7:30am"  >6:30-7:30am<option>';
              echo ' <option value="7:30-8:30am"  >7:30-8:30am<option>';
              echo '<option value="8:30-9:30am"  >8:30-9:30am<option>';
              echo '<option value="9:30-10:30am"  >9:30-10:30am<option>';
              echo '<option value="10:30-11:30pm"  >10:30-11:30pm<option>';
              echo '<option value="11:30-12:30pm"  >11:30-12:30pm<option>';
              echo '<option value="12:30-13:30pm"  >12:30-13:30pm<option>';
              echo '<option value="13:30-14:30pm"  >13:30-14:30pm<option>';
              echo ' <option value="14:30-15:30pm"  >14:30-15:30pm<option>';
              echo '<option value="15:30-16:30pm"  >15:30-16:30pm<option>';
              echo '<option value="16:30-17:30pm"  >16:30-17:30pm<option>';
              echo '<option value="17:30-18:30pm"  >17:30-18:30pm<option>';
              echo '<option value="18:30-19:30pm"  >18:30-19:30pm<option>';
              }


         ?>

    </select>
  </div>


    <div class="form-group">
      <input type="submit" value="Update Timetable" name="update_course" class="btn btn-primary">
    </div>
</form>
