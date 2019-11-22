
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
                              <th>Course Name</th>
                              <th>Course Code</th>
                            </tr>
                          </thead>

                          <tbody>


                        <?php

                          while($row = mysqli_fetch_assoc($search_query)) {
                            $course_id = $row['course_id'];
                            $course_name = $row['course_name'];
                            $course_code = $row['course_code'];

                            echo "<tr>";
                            echo "<td>{$course_name}</td>";
                            echo "<td>{$course_code} </td>";
                            echo "<td><a href='courses.php?add_course={$course_id}'>Add to my courses</a> </td>";
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
