<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<?php require_once 'controller/authController.php'; ?>

<style>
  body {
    background: transparent url(img/geeks.jpg) no-repeat center fixed;
    background-size: cover;
    color: white;
    margin-top: 0;
    position: relative;
  }

  #go-home {
	position:absolute; 
	top:0;
  }
</style>


<?php

    $roleStu = "student";
    $roleadm = "admin";
    $rolelec = "lecturer";
            // Check if the user is already logged in, if yes then redirect him to appropriate page
    if(isset($_SESSION["userrole"]) === $roleStu){
    header("location: welcome.php");
    exit();
    }
      elseif(isset($_SESSION["userrole"]) === $roleadm) {
        header("location: admin");
        exit();
      }
      elseif(isset($_SESSION["username"]) === $rolelec) {
        header("location: lecturer");
        exit();
      }
?>
      <div id="go-home">
	        <a role="button" class="btn btn-info" href="index.php">Go Back Home</a>  
      </div>

          <div class="col-md-4 form-div login bg-inherit"><!-- Form Column -->
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
              <h3 class="text-center">Login</h3>
              <div class="imgcontainer">
              <img src="img/avatar2.png" alt="Login Avatar" class="avatar">
          </div>

            <?php if (count($errors) > 0): ?>
              <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                  <li><?php echo $error; ?></li>
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

              <div class="form-group">
                <label for="username">ID or Username: </label>
                <input name="username" class="form-control form-control-lg" type="text" placeholder="ID Number/Username" value="<?php echo $username ?>">
              </div>

              <div class="form-group">
                <label for="pwd">Password: </label>
                <input name="pwd" class="form-control form-control-lg" type="password" placeholder="Password">
              </div>

              <div class="form-group">
                <button type="submit" name="login-btn" class="btn btn-primary btn-block btn-lg">Log In</button>
              </div>
              <p class="text-center">Don't have an account? <a href="register.php">Register</a>  here</p>
              <p class="text-center">Forgot your <a href="/lecture_2/forgot_password.php">password? </a></p>

            </form>
          </div>
          <!-- End of form Column -->

