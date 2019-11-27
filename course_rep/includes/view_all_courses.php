

<!-- Blog Search Well -->
<div class="well">
    <h4>Course Search</h4>
    <small>Type in your course to view information in the table below.</small>
    <form class="" action="search.php" method="post">
    <div class="input-group">
        <input name="search" type="text" class="form-control">
        <span class="input-group-btn">
            <button name="search_course" class="btn btn-default" type="submit">
                <span class="glyphicon glyphicon-search"></span>
        </button>
        </span>
    </div>
  </form> <!-- search Form -->
    <!-- /.input-group -->
</div>


<table class="table table-bordered table-hover table-responsive">

  <thead>
    <tr>
      <th>Days</th>
      <th>Course Name</th>
      <th>Course Code</th>
      <th>Venue</th>
      <th>Time</th>
      <th>Action</th>
    </tr>
  </thead>

  <tbody>

    <?php

    $query = "SELECT * FROM timetable ORDER BY course_name";
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