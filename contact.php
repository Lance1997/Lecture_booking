<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>

<?php require_once 'controller/authController.php'; ?>


<section id="contact-us-form">
<div class="container contact">
<h2 class="text-center">Contact Us</h2>
	<div class="row">
		<div class="col-md-3">
			<div class="contact-info">
				<i class="fas fa-envelope"></i>
				
                <h4>We would love to hear from you. !</h4>
                <p><a href="#contact">Click here</a> to see our call information </p>
			</div>
		</div>
		<div class="col-md-9">
			<div class="contact-form">
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" accept-charset="utf-8">


					<?php if (count($errors) > 0): ?>
						<div class="alert alert-danger">
							<?php foreach($errors as $error): ?>
								<li><?php echo $error; ?></li>
							<?php endforeach; ?>
						</div>
					<?php endif; ?>

				<div class="form-group">
				  <label class="control-label col-sm-2" for="name">Author:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="name" placeholder="Enter Name" name="name">
				  </div>
				</div>

				<div class="form-group">
				  <label class="control-label col-sm-2" for="email">Email:</label>
				  <div class="col-sm-10">
					<input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
				  </div>
				</div>

				<div class="form-group">
				  <label class="control-label col-sm-2" for="subject">Subject:</label>
				  <div class="col-sm-10">
					<input type="text" class="form-control" id="text" placeholder="Enter subject" name="subject">
				  </div>
				</div>

				<div class="form-group">
                <label class="control-label col-sm-2" for="comment">Message:</label>
				  <div class="col-sm-10">
					<textarea class="form-control" rows="5" id="comment" name="message"></textarea>
				  </div>
				</div>

				<div class="form-group">
				  <div class="col-sm-offset-2 col-sm-10">
					<input type="submit" name="contact_us" class="btn btn-primary" value="Send">
				  </div>
				</div>

			</form>
			</div>
		</div>
	</div>
</div>
</section>


  <!-- Footer -->
  <?php include_once 'api/footer.php'; ?>


    <!-- SCRIPTS -->
  <!-- JQuery -->
  <script src="/lecture_2/assets/js/jquery-3.4.1.min.js"></script>
  <!-- Bootstrap tooltips popper -->
  <script src="/lecture_2/assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="/lecture_2/assets/js/bootstrap.min.js"></script>
  <!-- My custom JavaScript -->
  <script src="/lecture_2/assets/js/main.js"></script>
  </body>
</html>