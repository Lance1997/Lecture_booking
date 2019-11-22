<footer class= "text-white">
    <div class="container-fluid">

      <div class="row">
        <div class="col-lg-12" style="margin-top: 10px;">
            <form action="" method="post">
              <div class="form-group">
                <div class="input-group">
                  <label for="suggestion" style="color:black; "><h4>Suggestions:  </h4></label>
                  <input name="message" type="text" class="form-control form-control-lg" id="suggestion" placeholder="Enter your suggestions here" style="height:40px;">
                  <span class="input-group-btn">
                  <button type="submit" name="suggestion" class="btn btn-primary" >SUBMIT</button>
                  </span>
                </div>
              </div>


            </form>
        </div>
      </div>
        <div class="copyright pull-left">
            Copyright &copy; 2019 <span>Lecture Booking.com</span>
            <span id="terms-footer"> <a href="/lecture_2/terms.php">Terms of Service</a> </span>
        </div>
</footer>


<?php if(isset($_POST['suggestion'])) {
    $conn = mysqli_connect('localhost', 'lecture', 'funwithsql', 'lecture_booking');
    $suggestion = mysqli_real_escape_string($conn,$_POST['message']);


    // Validation
    if(empty($suggestion)) {
      ?>
        <script> alert('Suggestion is empty.'); </script>;
      <?php
    } else{

      $query = "INSERT INTO suggestions (suggestion_message, suggestion_date)";
      $query .= "VALUES('{$suggestion}',now())";

      $suggestion_query = mysqli_query($conn,$query);

      if(!$suggestion_query) {
        die('QUERY FALILED' . mysqli_error($conn));
      } else {
        ?>
          <script> alert('Suggestion has been received Thank You.'); </script>;
        <?php
      }

    }


} ?>
