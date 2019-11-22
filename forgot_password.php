<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>

<?php require_once 'controller/authController.php'; ?>




<form class="container form-div" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<h2 class="form-title">Reset password</h2>
		<?php if (count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div>
		<?php endif; ?>
		<div class="form-group">
			<label>Your email address: </label>
			<input type="email" name="email">
		</div>
		<div class="form-group">
			<button type="submit" name="reset-password" class="login-btn">Submit</button>
		</div>
</form>




<!-- Footer -->
<?php include_once 'api/footer.php'; ?>

  
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