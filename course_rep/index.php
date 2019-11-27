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
              </div>

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->
<!-- footer -->
<?php include 'includes/adminfooter.php' ?>
