<!-- Header file -->
<?php require_once '../api/header.php'; ?>

<!-- Navbar file -->
<?php require_once '../api/navbar.php'; ?>


 <!--Main Content goes here-->
 <main>
    <div class= " container ">
      <h1 class="text-center" style="margin-top:50px;">LECTURE THEATRE (LT)</h1>
      <p class="text-center">Select a lecture venue to view the booked times for the venue.</p>

      <div class="row class-container" style="width:80%">
      <a  href='/lecture_2/venues/venue_template.php?venue_code=CELT1' class= "btn btn-info col-md-4 col-sm-6 col-lg-4 class-row" > (LT) 1</a>
         <a  href='/lecture_2/venues/venue_template.php?venue_code=CELT2' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 2</a>
         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT3' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 3</a>
         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT4' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 4</a>
         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT5' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 5</a>


         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT6' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 6</a>
         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT7' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 7</a>
         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT8' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 8</a>
         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT9' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 9</a>
         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT10' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 10</a>


         <a href='/lecture_2/venues/venue_template.php?venue_code=CELT11' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 11</a>
         <a href='/lecture_2/venues/celt/venue_template.php?venue_code=CELT12' class="btn btn-info col-md-4 col-sm-6 col-lg-4 class-row"> (LT) 12</a>

      </div>

    </div>
  </main>

  <!-- Footer -->
  <?php include_once '../api/footer.php'; ?>


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
