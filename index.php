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
