<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>




  <!--Main Content goes here-->
  <main>
    <div class= "container text-center venue-container">
      <h1 class="text-black venue-header">LECTURE VENUES</h1>
      <p class="text-black">Select a lecture venue to view the booked times for the venue.</p>

      <div class="row venue-row"> <!-- Main Venues div-->
         <button class= "venue-btn btn  btn-info col-md-12 col-lg-12 col-sm-12" onClick="window.location.href='/lecture_2/venues/lecture-theatre.php'">LECTURE THEATRE (LT)</button>
         <button class= "venue-btn btn  btn-info col-md-12 col-lg-12 col-sm-12" onClick="window.location.href='/lecture_2/venues/g-block.php'">G-BLOCK</button>
         <button class= "venue-btn btn  btn-info col-md-12 col-lg-12 col-sm-12" onClick="window.location.href='/lecture_2/venues/celt.php'">CELT</button>
         <button class= "venue-btn btn  btn-info col-md-12 col-lg-12 col-sm-12" onClick="window.location.href='/lecture_2/venues/venue_template.php?venue_code=AS'">ASSEMBLY HALL</button>
      </div> <!-- End of main venues div -->
    </div> <!-- End of Container Class -->
  </main>
  <!-- Main Content ends here -->



  <!-- Footer file -->
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
