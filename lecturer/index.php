<!-- HEADER -->
<?php include 'includes/adminheader.php' ?>

<!-- Graph Script -->
<script src="js/google_jsapi.js"></script>

    <div id="wrapper">



      <!-- navbar -->
      <?php include 'includes/adminnavbar.php' ?>


        <div id="page-wrapper">

            <div class="container">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Welcome
                            <small><?php echo $_SESSION['username'] ?></small>
                        </h1>
                    </div>
                </div>

                <!-- /.row -->


                <div class="row">
                <div class="col-lg-3 col-md-6">
                 <div class="panel panel-primary">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-book fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">

                               <?php

                                    $query = "SELECT * FROM timetable WHERE user_id = '{$_SESSION['id']}'";

                                    $select_query = mysqli_query($conn,$query);

                                    confirmQuery($select_query);

                                    $courses_count = mysqli_num_rows($select_query);

                                    echo "<div class='huge'>$courses_count</div>";
                                ?>
                                 <div>My Courses</div>
                             </div>
                         </div>
                     </div>
                     <a href="./courses.php?source=view_all_courses">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
                </div>

                <div class="col-lg-3 col-md-6">
                 <div class="panel panel-primary">
                     <div class="panel-heading">
                         <div class="row">
                             <div class="col-xs-3">
                                 <i class="fa fa-book fa-5x"></i>
                             </div>
                             <div class="col-xs-9 text-right">

                               <?php

                                    $query = "SELECT * FROM users WHERE rep_role = '{$_SESSION['id']}'";

                                    $select_query = mysqli_query($conn,$query);

                                    confirmQuery($select_query);

                                    $rep_count = mysqli_num_rows($select_query);

                                    echo "<div class='huge'>$rep_count</div>";
                                ?>
                                 <div>My Course Reps</div>
                             </div>
                         </div>
                     </div>
                     <a href="./users.php">
                         <div class="panel-footer">
                             <span class="pull-left">View Details</span>
                             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
                             <div class="clearfix"></div>
                         </div>
                     </a>
                 </div>
                </div>
              </div>

              
              
              

              <!-- GRAPH -->

              <?php

                  $monday = "MONDAY";

                  $query = "SELECT * FROM timetable WHERE user_id = '{$_SESSION['id']}' AND day_lect = '{$monday}'";

                  $select_query = mysqli_query($conn,$query);

                  confirmQuery($select_query);

                  $monday_count = mysqli_num_rows($select_query);

               ?>

               <?php

                  $tuesday = "TUESDAY";
                   $query = "SELECT * FROM timetable WHERE user_id = '{$_SESSION['id']}' AND day_lect = '{$tuesday}'";

                   $select_query = mysqli_query($conn,$query);

                   confirmQuery($select_query);

                   $tuesday_count = mysqli_num_rows($select_query);

                ?>

                <?php

                    $wednesday = "WEDNESDAY";
                    $query = "SELECT * FROM timetable WHERE user_id = '{$_SESSION['id']}' AND day_lect = '{$wednesday}'";

                    $select_query = mysqli_query($conn,$query);

                    confirmQuery($select_query);

                    $wednesday_count = mysqli_num_rows($select_query);

                 ?>

                 <?php

                     $thursday = "THURSDAY";
                     $query = "SELECT * FROM timetable WHERE user_id = '{$_SESSION['id']}' AND day_lect = '{$thursday}'";

                     $select_query = mysqli_query($conn,$query);

                     confirmQuery($select_query);

                     $thursday_count = mysqli_num_rows($select_query);

                  ?>

                  <?php

                      $friday = "FRIDAY";
                      $query = "SELECT * FROM timetable WHERE user_id = '{$_SESSION['id']}' AND day_lect = '{$friday}'";

                      $select_query = mysqli_query($conn,$query);

                      confirmQuery($select_query);

                      $friday_count = mysqli_num_rows($select_query);

                   ?>
              <div class="row" style="margin-top:20px;" >

                <script type="text/javascript">
                    google.charts.load('current', {'packages':['bar']});
                    google.charts.setOnLoadCallback(drawChart);

                    function drawChart() {
                      var data = google.visualization.arrayToDataTable([
                        ['DAYS', 'Number of (Count'],

                        <?php

                            $elements_text = ['MONDAY', 'TUESDAY','WEDNESDAY', 'THURSDAY', 'FRIDAY'];

                              $elements_count = [$monday_count, $tuesday_count, $wednesday_count, $thursday_count, $friday_count];

                              for ($i = 0; $i < 5; $i++) {
                                echo "['{$elements_text[$i]}'" . " ," . "{$elements_count[$i]}],";
                              }

                        ?>

                      ]);

                      var options = {
                        chart: {
                          title: 'GRAPH',
                          subtitle: 'Graph showing Number of Courses per day.',
                        }
                      };

                      var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

                      chart.draw(data, google.charts.Bar.convertOptions(options));
                    }
                  </script>





                <div id="columnchart_material" style= "width: 'auto'; height: 500px;"></div>



              </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<!-- footer -->
<?php include 'includes/adminfooter.php' ?>
