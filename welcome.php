<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<?php  require_once 'controller/authController.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>


<?php
  // Check if the user is logged in, if not then redirect him to login page
  if(!isset($_SESSION["userrole"])){
  header("location: login.php");
   exit();
}elseif($_SESSION['verified'] == true) {
  header("location: verified.php");
  exit();
}

?>

 <div class="container ">
     <div class="row">
         <div class="col-md-4 offset-md-4 form-div">

             <div class="alert alert-warning">
               <?php echo $_SESSION['error_message']; ?>
               <?php session_unset();
                    session_destroy();  ?>
             </div>
        
     </div>
</div>




<!-- SCRIPTS -->
<!-- JQuery -->
<script src="assets/js/jquery-3.4.1.min.js"></script>
<!-- Bootstrap tooltips popper -->
<script src="assets/js/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- My custom JavaScript -->
<script src="assets/js/main.js"></script>
</body>
</html>
