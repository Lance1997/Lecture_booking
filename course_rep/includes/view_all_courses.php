<div class="container">
    <div class="row">
      <div class="well col-md-7">
          <h4>NOTE</h4>
          
                <dl>
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
      <th>Delete</th>
    </tr>
  </thead>

  <tbody>

    <?php

    $select_query = "SELECT * FROM users WHERE id ='{$_SESSION['id']}'";
    $select_query_conn = mysqli_query($conn,$select_query);
    $rowId = mysqli_fetch_assoc($select_query_conn);
    $myId = $rowId['rep_role'];

    $query = "SELECT * FROM timetable WHERE user_id ='{$myId}'";
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
      echo "<td><a href='courses.php?source=edit_course&c_id={$course_id}'>Edit</a> </td>";
      echo "</tr>";
    }


     ?>


  </tbody>
</table>
