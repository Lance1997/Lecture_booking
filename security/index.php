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

                                    $query = "SELECT * FROM timetable WHERE purpose = 'lecture'";

                                    $select_query = mysqli_query($conn,$query);

                                    confirmQuery($select_query);

                                    $lecture_count = mysqli_num_rows($select_query);

                                    echo "<div class='huge'>$lecture_count</div>";
                                ?>
                                 <div>Purpose of Venue: Lectures</div>
                             </div>
                         </div>
                     </div>
                 </div>
                </div>

              <div class="col-lg-3 col-md-6">
               <div class="panel panel-primary">
                   <div class="panel-heading">
                       <div class="row">
                           <div class="col-xs-3">
                               <i class="fa fa-building fa-5x"></i>
                           </div>
                           <div class="col-xs-9 text-right">

                             <?php
                                  $assoc = "association meeting";
                                  $query = "SELECT * FROM timetable WHERE purpose = '{$assoc}'";

                                  $select_query = mysqli_query($conn,$query);

                                  confirmQuery($select_query);

                                  $association_meeting_count = mysqli_num_rows($select_query);

                                  echo "<div class='huge'>$association_meeting_count</div>";
                              ?>
                               <div>Purpose of Venue: Association Meetings</div>
                           </div>
                       </div>
                   </div>
               </div>
              </div>
            </div>

                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<!-- footer -->
<?php include 'includes/adminfooter.php' ?>
