<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<?php  require_once 'controller/bookController.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>


<?php
  // Check if the user is logged in, if not then redirect him to login page
  if(!$_SESSION['verified']){
  header("location: login.php");
   exit();
}

?>

<div class="contaner">
	<!--Container-->
		<div class="row">
			<div class="col-md-4 offset-md-4 form-div"><!-- Form Column -->
				<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
					<h3 class="text-center">Book A Venue</h3>
					<p class="text-center">Fill in the following Required fields to book a venue.</p>
                  <?php if (count($errors) > 0): ?>
                    <div class="alert alert-danger">
                      <?php foreach($errors as $error): ?>
                        <li><?php echo $error; ?></li>
                      <?php endforeach; ?>
                    </div>
                  <?php endif; ?>
                  <div class="form-group">
						            <label for="course">Select Course: </label>
                        <input list="courses" name="course_name">
                        <?php
                        $query_course = "SELECT * FROM courses";
                        $select_all_courses = mysqli_query($conn,$query_course);
                        echo "<datalist id='courses'>";
                        while ($row = mysqli_fetch_assoc($select_all_courses)) {
                            $course = $row['course_name'];
                            echo '<option value=" '.$course.'"  >';
                        }
                        echo "</datalist>";
                        ?>
					</div>

                    <div class="form-group">
						<label for="course">Select Day: </label>
                        <input list="days" name="day_lect">
                        <datalist id='days'>";
                            <option value="MONDAY">
                            <option value="TUESDAY">
                            <option value="WEDNESDAY">
                            <option value="THURSDAY">
                            <option value="FRIDAY">
                        </datalist>
					</div>

                    <div class="form-group">
						            <label for="course">Select Time: </label>

                            <select name='time_of_lecture'>";
                                <option value="6:30-7:30am"  >6:30-7:30am<option>
                                <option value="7:30-8:30am"  >7:30-8:30am<option>
                                <option value="8:30-9:30am"  >8:30-9:30am<option>
                                <option value="8:30-9:30am"  >8:30-9:30am<option>
                                <option value="9:30-10:30am"  >9:30-10:30am<option>
                                <option value="10:30-11:30am"  >10:30-11:30am<option>
                                <option value="11:30-12:30pm"  >11:30-12:30pm<option>
                                <option value="12:30-13:30pm"  >12:30-13:30pm<option>
                                <option value="13:30-14:30pm"  >13:30-14:30pm<option>
                                <option value="14:30-15:30pm"  >14:30-15:30pm<option>
                                <option value="15:30-16:30pm"  >15:30-16:30pm<option>
                                <option value="16:30-17:30pm"  >16:30-17:30pm<option>
                                <option value="17:30-18:30pm"  >17:30-18:30pm<option>
                                <option value="8:30-19:30pm"  >18:30-19:30pm<option>
                                <option value="19:30-20:30pm"  >19:30-20:30pm<option>
                            </select>
					           </div>

                    <div class="form-group">
						<label for="venue">Select Venue: </label>
                        <input list="venues" name="course_venue">
                        <?php
                        $query_venue = "SELECT * FROM venues";
                        $select_all_venues = mysqli_query($conn,$query_venue);
                        echo "<datalist id='venues'>";
                        while ($row = mysqli_fetch_assoc($select_all_venues)) {
                            $venue = $row['venue_name'];
                            echo '<option value=" '.$venue.'"  >';
                        }
                        echo "</datalist>";
                        ?>
					</div>

                    <div class="form-group">
                        <input type="submit" name="book-btn" value="Book">
                    </div>

				</form>
			</div>
			<!-- End of form Column -->
		</div>
		<!-- End row -->
	</div>
	<!-- End Container -->



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
