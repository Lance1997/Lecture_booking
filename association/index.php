<!-- HEADER -->
<?php include 'includes/adminheader.php' ?>

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
                                 <div>My Meetings</div>
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
              </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<!-- footer -->
<?php include 'includes/adminfooter.php' ?>
