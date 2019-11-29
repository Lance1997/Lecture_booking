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
                        <dt><strong>Approve and Unapprove Link</strong></dt>
                      <dd>Please keep an eye on Approval and use <i>Enable Or Disable</i> to either remove course from timetable or display it on the timetable. Also, after your <b>Course Representative</b> edits the course, this option will be set to disabled and till you enable, it will not show on the timetable.</dd>
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
      <th>Approval</th>
      <th colspan="4">Action</th>
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
      $approval = $row['approval'];
      $time_for_lecture = $row['time_of_lecture'];

      echo "<tr>";
      echo "<td>{$day_lect}</td>";
      echo "<td>{$course_name}</td>";
      echo "<td>{$course_code} </td>";
      echo "<td>{$venue_name} </td>";
      echo "<td>{$time_for_lecture} </td>";
      echo "<td>{$approval}</td>";
      echo "<td><a href='courses.php?source=view_all_courses&unapprove={$course_id}'>Disable</a> </td>";
      echo "<td><a href='courses.php?source=view_all_courses&approve={$course_id}'>Enable</a> </td>";
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

<?php

if(isset($_GET['approve'])) {
  $app_course_id = $_GET['approve'];
  $approve = 'enabled';

  $query = "UPDATE timetable SET approval = '{$approve}' WHERE course_id = '{$app_course_id}' ";

  $query_conn = mysqli_query($conn, $query);

  confirmQuery($query_conn);
  header('location: ./courses.php?source=view_all_courses');
  exit();
}

?>

<?php

if(isset($_GET['unapprove'])) {
  $app_course_id = $_GET['unapprove'];

  $query = "UPDATE timetable SET approval = 'disabled' WHERE course_id = '{$app_course_id}' ";

  $query_conn = mysqli_query($conn, $query);

  confirmQuery($query_conn);
  header('location: ./courses.php?source=view_all_courses');
  exit();
}

?>

  </tbody>
</table>
