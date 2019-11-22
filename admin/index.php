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

                    $query = "SELECT * FROM timetable";

                    $select_query = mysqli_query($conn,$query);

                    confirmQuery($select_query);

                    $courses_count = mysqli_num_rows($select_query);

                    echo "<div class='huge'>$courses_count</div>";
                ?>
                 <div>Courses</div>
             </div>
         </div>
     </div>
     <a href="./courses.php">
         <div class="panel-footer">
             <span class="pull-left">View Details</span>
             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
             <div class="clearfix"></div>
         </div>
     </a>
 </div>
</div>
<div class="col-lg-3 col-md-6">
 <div class="panel panel-green">
     <div class="panel-heading">
         <div class="row">
             <div class="col-xs-3">
                 <i class="fa fa-comments fa-5x"></i>
             </div>
             <div class="col-xs-9 text-right">


               <?php

                    $query = "SELECT * FROM suggestions";

                    $select_query = mysqli_query($conn,$query);

                    confirmQuery($select_query);

                    $suggestions_count = mysqli_num_rows($select_query);

                    echo "<div class='huge'>$suggestions_count</div>";
                ?>

               <div>Suggestions</div>
             </div>
         </div>
     </div>
     <a href="./suggestions.php">
         <div class="panel-footer">
             <span class="pull-left">View Details</span>
             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
             <div class="clearfix"></div>
         </div>
     </a>
 </div>
</div>
<div class="col-lg-3 col-md-6">
 <div class="panel panel-yellow">
     <div class="panel-heading">
         <div class="row">
             <div class="col-xs-3">
                 <i class="fa fa-user fa-5x"></i>
             </div>
             <div class="col-xs-9 text-right">


               <?php

                    $query = "SELECT * FROM users";

                    $select_query = mysqli_query($conn,$query);

                    confirmQuery($select_query);

                    $users_count = mysqli_num_rows($select_query);

                    echo "<div class='huge'>$users_count</div>";
                ?>


                 <div> Users</div>
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
<div class="col-lg-3 col-md-6">
 <div class="panel panel-red">
     <div class="panel-heading">
         <div class="row">
             <div class="col-xs-3">
                 <i class="fa fa-phone fa-5x"></i>
             </div>
             <div class="col-xs-9 text-right">


               <?php

                    $query = "SELECT * FROM contact";

                    $select_query = mysqli_query($conn,$query);

                    confirmQuery($select_query);

                    $contact_count = mysqli_num_rows($select_query);

                    echo "<div class='huge'>$contact_count</div>";
                ?>

                  <div>Contact Us Info</div>
             </div>
         </div>
     </div>
     <a href="./contact_us.php">
         <div class="panel-footer">
             <span class="pull-left">View Details</span>
             <span class="pull-right"><i class="fa fa-arrow-circle-right"></i></span>
             <div class="clearfix"></div>
         </div>
     </a>
 </div>
</div>
</div>
         <!-- /.row -->

<?php

$lecturer = "lecturer";
$query = "SELECT * FROM users WHERE userrole = '{$lecturer}'";

$select_query = mysqli_query($conn,$query);

confirmQuery($select_query);

$lecturer_count = mysqli_num_rows($select_query);

 ?>

 <?php

 $association = "association";
 $query = "SELECT * FROM users WHERE userrole = '{$association}'";

 $select_query = mysqli_query($conn,$query);

 confirmQuery($select_query);

 $association_count = mysqli_num_rows($select_query);

  ?>

  <?php

  $security = "security";
  $query = "SELECT * FROM users WHERE userrole = '{$security}'";

  $select_query = mysqli_query($conn,$query);

  confirmQuery($select_query);

  $security_count = mysqli_num_rows($select_query);

   ?>


 <?php

 $unverified = "false";
 $query = "SELECT * FROM users WHERE verified = '{$unverified}'";

 $select_query = mysqli_query($conn,$query);

 confirmQuery($select_query);

 $unverified_count = mysqli_num_rows($select_query);

  ?>

<div class="row" style="margin-top:20px;">

  <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Data', 'Number of (Count)'],

          <?php

              $elements_text = ['Unverified Users', 'Association Users','Lecturers', 'Security Guard users'];

                $elements_count = [$unverified_count, $association_count,$lecturer_count ,$security_count];

                for ($i = 0; $i < 4; $i++) {
                  echo "['{$elements_text[$i]}'" . " ," . "{$elements_count[$i]}],";
                }

          ?>

        ]);

        var options = {
          chart: {
            title: 'GRAPH',
            subtitle: 'Graph showing User Stats',
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
