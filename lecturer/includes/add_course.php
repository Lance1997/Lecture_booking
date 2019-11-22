


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
      <th>Course Name</th>
      <th>Course Code</th>
    </tr>
  </thead>

  <tbody>

    <?php

    $query = "SELECT * FROM timetable";
    $select_posts = mysqli_query($conn,$query);

    while($row = mysqli_fetch_assoc($select_posts)) {
      $course_id = $row['course_id'];
      $course_name = $row['course_name'];
      $course_code = $row['course_code'];

      echo "<tr>";
      echo "<td>{$course_name}</td>";
      echo "<td>{$course_code} </td>";
      echo "<td><a href='courses.php?add_course={$course_id}'>Add to my courses</a> </td>";
      echo "</tr>";
    }


     ?>

     <?php

        if(isset($_GET['add_course'])) {
          $get_course_id = $_GET['add_course'];

          $query = "UPDATE timetable SET user_id = '{$_SESSION['id']}' WHERE course_id = '{$get_course_id}' ";

          $query_conn = mysqli_query($conn, $query);

          confirmQuery($query_conn);
          echo "<div class='alert alert-success'> Course has been successfully added.
           Click <a href= './courses.php?source=view_all_courses'>here</a> to go to your courses page or stay here and add more courses. </div>";

        }

      ?>

      <?php

        if(isset($_GET['removeCourse'])) {
          $rem_course_id = $_GET['removeCourse'];

          $query = "UPDATE timetable SET user_id = '0' WHERE course_id = '{$rem_course_id}' ";

          $query_conn = mysqli_query($conn, $query);

          confirmQuery($query_conn);

          echo "<div class='alert alert-success'> Course has been successfully removed.
           Click <a href= './courses.php?source=view_all_courses'>here</a> to go to your courses page or stay here and add more courses. </div>";
        }

       ?>



  </tbody>
</table>
