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
                          <small><?php echo $_SESSION['username'] ?></small>
                      </h1>

                        <?php

                          if(isset($_GET['users'])) {
                            $users = $_GET['users'];
                          } else {
                            $users = '';
                          }

                            switch($users) {

                              case 'add_user';
                                include "includes/add_user.php";
                              break;

                              case 'edit_user';
                                include "includes/edit_user.php";
                              break;

                              default:
                                include "includes/view_all_users.php";
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
