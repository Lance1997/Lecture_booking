<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>

<?php require_once 'controller/authController.php'; ?>



    <!-- Main Content goes here -->
    <main>
	<div id="home">
	 <div class="main-image" style="background-image: url('img/home_bg.jpg'); background-position: 0px 0px; width:100%;"></div>
	  <div class="home-wrapper">
			<!-- container -->
			<div class="container">
				<!-- row -->
				<div class="row">
					<!-- home content -->
					<div class="col-md-6 col-md-offset-2 mt-50">
						<div class="home-content">
							<h1>WELCOME TO LECTURE BOOKING</h1>
							<h4 class="lead">Bringing the Lecture Theatre to your doorstep.</h4>
							<p  class="text-white"> Click here to <a href="#venues-view" class="main-btn font-weight-bold"> View </a>Booked and Available Venues</p>
						</div>
					</div> <!-- /home content -->
          <!-- //home colomn -->
          </div>
					<!-- /row -->
				</div>
				<!-- /container -->
			</div>
			<!-- /home-wrapper -->
		</div>
		<!-- /home -->


    <!-- Section on Overview of Site -->
    <section class="cards-section">
  <div class="container cards-row" >
    <h1 class="text-center" style="padding:20px;">OVERVIEW OF SITE</h1>
	  <div class="row card-deck">
      <!-- Card-row -->

        <div class="card text-black text-center bg-white col-md-6 col-lg-6 col-xs-12 shadow p-3 mb-5 bg-white rounded">
          <!-- Card-->
            <div class="card-body">
              <!-- Card-body -->
                <h5 class="card-title">Viewing Booked Venues</h5>
	               <p class="card-text">Any visitor on this page is allowed to view booked and available lecture venues.</p>
	               <p class="card-text">Click on the button below to book a venue.</p>
            </div><!-- /Card-body -->
            <div class="card-footer"><!-- Card-footer -->
              <a href="#venues-view" class="btn btn-primary">View Venues</a>
            </div><!-- /Card-footer -->
        </div>
        <!-- /Card -->
        <div class="card text-black text-center bg-white col-md-6 col-lg-6 col-xs-12 shadow p-3 mb-5 bg-white rounded">
          <!-- Card -->
            <div class="card-body">
              <!-- Card-body -->
                <h5 class="card-title">Booking a venue</h5>
	              <p class="card-text">Association Executives and Senior members can book a venue after being registered.</p>
	              <p class="card-text">Click on the button below to book a venue.</p>
            </div>
            <!-- /Card-body -->
            <div class="card-footer">
              <!-- /Card-footer -->
	             <a href="login.php" class="btn btn-primary">Book Venue</a>
            </div>
            <!-- /Card-footer -->
        </div>
        <!-- /Card -->
    </div>
    <!-- /Card-row Card-deck-->

    <div class= "row card-deck"><!-- Card-row Card-deck -->
        <div class="card text-black text-center bg-white col-md-6 col-lg-6 col-xs-12 shadow p-3 mb-5 bg-white rounded">
          <!-- Card -->
            <div class="card-body"><!-- Card-body -->
                <h5 class="card-title">Who is allowed to register or book a venue?</h5>
	              <p class="card-text">Senior Members, Security Guards and Association Executives are users that are allowed to register and/or book a venue.</p>
	              <p class="card-text">Click on the button below to register.</p>
            </div>
            <div class="card-footer">
              <!-- Card-footer -->
	             <a href="register.php" class="btn btn-primary">Register</a>
            </div>
            <!-- /Card-footer -->
        </div><!-- /Card -->
        <!-- Card -->
        <div class="card text-black text-center bg-white col-md-6 col-lg-6 col-xs-12 shadow p-3 mb-5 bg-white rounded">
            <div class="card-body">
              <!-- Card-body -->
                <h5 class="card-title">Having Issues?</h5>
	              <p class="card-text"><a href="#contact">Contact the developers</a> with any issues you might have or See Freqently Asked Questions <a href="faq.php">(FAQ)</a>.</p>
	              <p class="card-text">Click on a button below to send us a message or see FAQs.</p>
            </div>
            <!-- /Card-body -->
            <div class="card-footer">
              <!-- Card-footer-->
  	           <a href="contact.php" class="btn btn-primary">Send Message</a>
               <a  id="about" href="faq.php" class="btn btn-primary">FAQs</a>
            </div>
            <!-- /Card-footer -->
        </div>
        <!-- /Card -->
    </div>
    <!-- /Card-row Card-deck -->
  </div>
  <!-- /Card-Container -->
  </section>

      <!--End of HomePage Introduction -->

      <!-- About Us -->
      <?php include './about.php' ?>


      <?php include 'venues/venues_index.php' ?>
<!-- End of Venues Section -->

    <!--================Team Area =================-->
  <section class="team_area p_120">
        	<div class="container">
            <!-- Container -->
        		<div class="main_title">
              <!-- Main Title -->
        			<h2>Meet Our Developers</h2>
        			<p>These are the developers who built this site. They are also responsible for the management of the site.</p>
        		</div>
            <!-- /Main Title -->
        		<div class="row team_inner">
              <!-- Row team inner-->
        			<div class="col-lg-4 col-sm-6">
                <!-- Row-Cols for team member -->
        				<div class="team_item">
                  <!-- Team member item class-->
        					<div class="team_img">
                    <!-- Team member image-->
        						<img class="rounded-circle" src="img/team-1.jpg" alt="">
        						<div class="hover">
                      <!-- Team member social links-->
        							<a href="#"><i class="fab fa-facebook"></i></a>
        							<a href="#"><i class="fab fa-twitter"></i></a>
        							<a href="#"><i class="fab fa-linkedin"></i></a>
        						</div>
                    <!-- End of Team member item class-->
        					</div>
                  <!-- End of Team member social links-->
        					<div class="team_name">
                    <!-- Team member name-->
        						<h4>Elorm</h4>
        					
        					</div>
                  <!-- /team member name-->
        				</div>
                <!-- /team member item class-->
        			</div>
              <!-- /Row Col for team member-->
        			<div class="col-lg-4 col-sm-6">
                <!-- Row Col for team member-->
        				<div class="team_item">
                  <!-- Team member item class-->
        					<div class="team_img">
                    <!-- Team member image-->
        						<img class="rounded-circle" src="img/team-2.jpg" alt="">
        						<div class="hover">
                      <!-- Team member social links-->
        							<a href="#"><i class="fab fa-facebook"></i></a>
        							<a href="#"><i class="fab fa-twitter"></i></a>
        							<a href="#"><i class="fab fa-linkedin"></i></a>
        						</div>
                    <!-- End of Team member social links-->
        					</div>
                  <!-- End of Team member image-->
        					<div class="team_name">
                    <!-- Team member name-->
        						<h4>Lance</h4>
        						
        					</div>
                  <!-- /team member name-->
        				</div>
                <!-- /team member item class-->
        			</div>
              <!-- /Row Col for team member-->
        			<div class="col-lg-4 col-sm-6">
                <!-- Row Col for team member-->
        				<div class="team_item">
                  <!-- Team member item class-->
        					<div class="team_img">
                    <!-- Team member image-->
        						<img class="rounded-circle" src="img/team-3.jpg" alt="">
        						<div class="hover">
                      <!-- Team member social links-->
        							<a href="#"><i class="fab fa-facebook"></i></a>
        							<a href="#"><i class="fab fa-twitter"></i></a>
        							<a href="#"><i class="fab fa-linkedin"></i></a>
        						</div>
                    <!-- End of Team member social links-->
        					</div>
                  <!-- End of team member image-->
        					<div class="team_name">
                    <!-- Team member name-->
        						<h4>Rockson</h4>
        					
        					</div>
                  <!-- /team member name-->
        				</div>
                <!-- /team member item class-->
        			</div>
              <!-- /Row Col for team member-->
        		</div>
            <!-- /Row team inner-->
        	</div>
          <!-- /Container -->
        </section>
        <!--================End Team Area =================-->
    
      
        <section id="suggestion">
        <div class="container" >
          <div class="row">

            <div class="col-lg-12" style="margin-top: 10px;">
                <form action="" method="post">
                  <div class="form-group">
                    
                      <label for="suggestion" style="color:white; "><h4>Suggestions:  </h4></label>
                      <input name="message" type="text" class="form-control form-control-lg" id="suggestion" placeholder="Enter your suggestions here" style="height:40px;">
                      <div class="form-group">
                      <button type="submit" name="suggestion" class="btn btn-success btn-lg" >SUBMIT</button>
                      </div>

                  </div>

            </div>
          </div>
          </section> <!-- suggestion end -->

    </main>
    <!-- End of Main Content -->


  <!-- Footer -->
  <?php include_once 'api/footer.php'; ?>


    <!-- SCRIPTS -->
  <!-- JQuery -->
  
  <!-- Bootstrap tooltips popper -->
  <script src="/lecture_2/assets/js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script src="/lecture_2/assets/js/bootstrap.min.js"></script>
  <!-- My custom JavaScript -->
  <script src="/lecture_2/assets/js/main.js"></script>
  </body>
</html>
