<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>

<?php require_once 'controller/authController.php'; ?>

	<?php 
		if(!isset($_SESSION['token']) && !isset($_SESSION['email'])) {
			header('location: login.php');
		}
	?>

	<form class="container form-div" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
		<h2 class="form-title">New password</h2>
		<?php if (count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
		</div>
		<?php endif; ?>
		<div class="form-group">
			<label>New password</label>
			<input type="password" name="new_pass">
		</div>
		<div class="form-group">
			<label>Confirm new password</label>
			<input type="password" name="new_pass_c">
		</div>
		<div class="form-group">
			<button type="submit" name="new_password" class="login-btn">Submit</button>
		</div>
    </form>







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
