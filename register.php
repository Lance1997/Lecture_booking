<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<?php require_once 'controller/authController.php'; ?>

<style>
  body {
    background: transparent url(img/geeks.jpg) no-repeat center fixed;
  background-size: cover;
  color: white;
  margin-top: 0;
  }

  #go-home {
	position:absolute; 
	top:0;
  }
</style>

<!-- Main Content of Registration Page goes here -->
<main>
<div id="go-home">
	<a role="button" class="btn btn-info" href="index.php">Go Back Home</a>
</div>
	<div class="contaner">
	<!--Container-->
		<div class="row">
			<div class="col-md-4 offset-md-4 form-div"><!-- Form Column -->
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<h3 class="text-center">Create Account</h3>
					<p class="text-center">Get started with creating your account</p>
					<?php if (count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>
					<div class="form-group">
						<label for="userid">Staff/Student ID: </label>
						<input name="userid" class="form-control form-control-lg" type="text" placeholder="ID Number" value="<?php echo $userid ?>">
					</div>

					<div class="form-group">
						<label for="email">Email: </label>
						<input name="email" class="form-control form-control-lg" type="email" placeholder="Email" value="<?php echo $email ?>">
					</div>

					<div class="form-group">
						<label for="email">Username: </label>
						<input name="username" class="form-control form-control-lg" type="text" placeholder="Username" value="<?php echo $username ?>">
					</div>

					<div class="form-group">
						<label for="preRole">Select Your Role </label>
						<select class="preRole" name="preRole">
							<option value="association_executive">Association Executive</option>
							<option value="security_guard">Security Guard</option>
							<option value="lecturer">Lecturer</option>
						</select>
					</div>

					<div class="form-group">
						<label for="pwd">Password: </label>
						<input name="pwd" class="form-control form-control-lg" type="password" placeholder="Must be at least 6 characters.">
					</div>

					<div class="form-group">
						<label for="con_pwd">Confirm Password: </label>
						<input name="con_pwd" class="form-control form-control-lg" type="password" placeholder="confirm password">
					</div>

					<div class="form-group">
						<button type="submit" name="signup-btn" class="btn btn-primary btn-block btn-lg">Sign Up</button>
					</div>
					<p class="text-center">Already a member? <a href="/lecture_2/login.php">Sign In</a></p>


				</form>
			</div>
			<!-- End of form Column -->
		</div>
		<!-- End row -->
	</div>
	<!-- End Container -->


</main>
<!--Main End-->
