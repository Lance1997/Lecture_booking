
<!-- Header -->
<?php include 'includes/adminheader.php'?>

<!-- Navbar -->
<?php include 'includes/adminnavbar.php'?>


<div id="wrapper">

    <div id="page-wrapper">
    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Entries Column -->
            <div class="col-lg-12 cols-xs-1">
                <h1>SEARCH RESULTS</h1>

              <?php
                  if(isset($_POST['search_course'])) {
                      $search = $_POST['search'];

                      $query = "SELECT * FROM timetable WHERE course_name LIKE '%$search%'";

                      $search_query = mysqli_query($conn,$query);

                      if(!$search_query) {
                        die("QUERY FAILED" . mysqli_error($search_query));
                      }

                      $count = mysqli_num_rows($search_query);

                      if($count == 0) {
                        echo "<h2> No Results </h2>";
                      }
                      else {
                        ?>

                        <table class="table table-bordered table-hover table-responsive">

                          <thead>
                            <tr>
                              <th>Days</th>
                              <th>Course Name</th>
                              <th>Course Code</th>
                              <th>Venue</th>
                              <th>Time</th>
                            </tr>
                          </thead>

                          <tbody>


                        <?php

                          while($row = mysqli_fetch_assoc($search_query)) {
                            $course_id = $row['course_id'];
                            $course_name = $row['course_name'];
                            $course_code = $row['course_code'];
                            $venue_name = $row['venue_code'];
                              $day_lect = $row['day_lect'];
                            $time_for_lecture = $row['time_of_lecture'];


                                  echo "<tr>";
                                  echo "<td>{$day_lect}</td>";
                                  echo "<td>{$course_name}</td>";
                                  echo "<td>{$course_code} </td>";
                                  echo "<td>{$venue_name} </td>";
                                  echo "<td>{$time_for_lecture} </td>";
                                  echo "<td><a href='courses.php?source=edit_course&c_id={$course_id}'>Edit</a> </td>";
                                  echo "<td><a href='courses.php?deleteCourse={$course_id}'>Delete</a> </td>";
                                  echo "</tr>";


                           }

                      }
                    }


               ?>
             </tbody>
           </table>



            </div>
          </div>
        </div>
      </div>
    </div>

            <!-- Navbar -->
            <?php include 'includes/adminfooter.php'?>
