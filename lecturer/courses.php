<!-- HEADER -->
<?php include 'includes/adminheader.php'; ?>


    <div id="wrapper">

      <!-- navbar -->
      <?php include 'includes/adminnavbar.php' ?>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12 cols-xs-12">
                      <h1 class="page-header">
                          Welcome
                          <small><?php echo $_SESSION['username']; ?></small>
                      </h1>

                        <?php

                          if(isset($_GET['source'])) {
                            $source = $_GET['source'];
                          } else {
                            $source = '';
                          }

                            switch($source) {

                              case 'view_all_courses';
                                include "includes/view_all_courses.php";
                              break;

                              case 'edit_course';
                                include "includes/edit_course.php";
                              break;

                              default:
                                include "includes/add_course.php";
                              break;

                          }

                         ?>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<!-- footer -->
<?php include 'includes/adminfooter.php' ?>
