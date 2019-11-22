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

                              case 'book_venue';
                                include "includes/book_venue.php";
                              break;

                              case 'edit_course';
                                include "includes/edit_course.php";
                              break;

                              default:
                                include "includes/view_all_courses.php";
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
