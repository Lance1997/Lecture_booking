
<?php

    if(isset($_GET['u_id'])) {
        $get_user_id = $_GET['u_id'];

        $query = "SELECT * FROM users WHERE id = '$get_user_id'";
        $select_users = mysqli_query($conn,$query);

        while($row = mysqli_fetch_assoc($select_users)) {
          $user_id = $row['userid'];
          $user_email = $row['email'];
          $user_name = $row['username'];
    }

?>

    

    <?php

    $errors = '';

    if(isset($_POST['update_user'])) {


       $user_id = test_input($_POST['userid']);
       $user_email = test_input($_POST['email']);
       $user_name = test_input($_POST['username']);

      $user_id = mysqli_real_escape_string($conn,$_POST['userid']);
      $user_email = mysqli_real_escape_string($conn,$_POST['email']);
      $user_name = mysqli_real_escape_string($conn,$_POST['username']);

      $email = test_input($_POST['email']);

       //Checking for Valid Email
       $user_email = filterEmail($_POST['email']);
       if ($user_email == FALSE) {
             $errors = "Email invalid.";
          }

      if(count($errors)==0) {
      $query = "UPDATE users SET ";
      $query .="userid = '{$user_id}', ";
      $query .="email = '{$user_email}', ";
      $query .="username ='{$user_name}', ";
      $query .="WHERE id = '{$get_user_id}'";

      $update_user = mysqli_query($conn,$query);
      confirmQuery($update_user);

      if ($update_user) {
        echo '<div class="alert alert-success">
          Update successful
        </div>';
      }
    } // End Errors check 
      else {
        echo '<div class="alert alert-warning">
        Update unsuccessful
      </div>';
      }
  } // End Update users

} // If GET
 else { // Display this if GET value is not in url
   header('location: index.php');
  }

 ?>


<form action="" method="post">

    <div class="form-group">
      <label for="userid">User ID: </label>
      <input value = "<?php echo $user_id; ?>"  type="text" name="userid" class="form-control" required>
    </div>


    <div class="form-group">
      <label for="email">Email: </label>
      <input value = "<?php echo $user_email; ?>" type="text" name="email" class="form-control" required>
      <span class="help-block"><?php echo "<div class= 'text-warning'>".$errors."</div>"; ?></span>
    </div>

    <div class="form-group">
      <label for="username">Username: </label>
      <input value = "<?php echo $user_name; ?>" type="text" name="username" class="form-control" required>
    </div>

    <div class="form-group">
      <input type="submit" value="Update" name="update_user" class="btn btn-primary">
    </div>
</form>
