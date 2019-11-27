<div class="container">
    <div class="row">
      <div class="well col-xs-7">
          <h4>NOTE</h4>
          <dl>
                    <dt><strong>Remove link</strong></dt>
                    <dd>Please use <i>Remove</i> when you intend to remove a course
                       that you might have mistakenly added or donot intend
                        to show on your timetable anymore.</dd>
                        <br>
                      <dt><strong>Edit link</strong></dt>
                      <dd>Please use <i>Edit</i> to change your booking details.</dd>
          </dl>
      </div>

    </div>
</div>


<table class="table table-bordered table-hover table-responsive">

  <thead>
    <tr>
      <th>Days</th>
      <th>Course Name</th>
      <th>Course Code</th>
      <th>Venue</th>
      <th>Time</th>
      <th colspan="2">Action</th>
    </tr>
  </thead>

  <tbody>

    <?php

    $query = "SELECT * FROM timetable WHERE user_id ='{$_SESSION['id']}' ORDER BY course_name";
    $select_posts = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($select_posts)) {
      $course_id = $row['course_id'];
      $day_lect = $row['day_lect'];
      $course_name = $row['course_name'];
      $course_code = $row['course_code'];
      $venue_name = $row['venue_code'];
      $time_for_lecture = $row['time_of_lecture'];

      echo "<tr>";
      echo "<td>{$day_lect}</td>";
      echo "<td>{$course_name}</td>";
      echo "<td>{$course_code} </td>";
      echo "<td>{$venue_name} </td>";
      echo "<td>{$time_for_lecture} </td>";
      echo "<td><a href='courses.php?source=view_all_courses&removeCourse={$course_id}'>Remove course</a> </td>";
      echo "<td><a href='courses.php?source=edit_course&c_id={$course_id}'>Edit</a> </td>";
      echo "</tr>";
    }


     ?>

<?php

if(isset($_GET['removeCourse'])) {
  $rem_course_id = $_GET['removeCourse'];

  $query = "UPDATE timetable SET user_id = '0' WHERE course_id = '{$rem_course_id}' ";

  $query_conn = mysqli_query($conn, $query);

  confirmQuery($query_conn);
  header('location: ./courses.php?source=view_all_courses');
  exit();
}

?>

  </tbody>
</table>
