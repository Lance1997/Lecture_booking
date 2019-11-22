
<?php

    if(isset($_GET['u_id'])) {
        $get_user_id = $_GET['u_id'];

        $query = "SELECT * FROM users WHERE id = '$get_user_id'";
        $select_users = mysqli_query($conn,$query);

        while($row = mysqli_fetch_assoc($select_users)) {
          $user_id = $row['userid'];
          $user_email = $row['email'];
          $user_name = $row['username'];
          $user_role = $row['userrole'];
          $verified = $row['verified'];
          $user_token = $row['token'];
          $user_password = $row['pwd'];
    }

    ?>

    

    <?php

    $errors = '';

    if(isset($_POST['update_user'])) {


       $user_id = test_input($_POST['userid']);
       $user_email = test_input($_POST['email']);
       $user_name = test_input($_POST['username']);
       $user_role = test_input($_POST['userrole']);
       $verified = test_input($_POST['verified']);
       $user_password = test_input($_POST['pwd']);

      $user_id = mysqli_real_escape_string($conn,$_POST['userid']);
      $user_email = mysqli_real_escape_string($conn,$_POST['email']);
      $user_name = mysqli_real_escape_string($conn,$_POST['username']);
      $user_role = mysqli_real_escape_string($conn,$_POST['userrole']);
      $verified = mysqli_real_escape_string($conn,$_POST['verified']);
      $user_password = mysqli_real_escape_string($conn,$_POST['pwd']);

      $email = test_input($_POST['email']);

       //Checking for Valid Email
       $user_email = filterEmail($_POST['email']);
       if ($user_email == FALSE) {
             $errors = "Email invalid.";
          }

      if(!empty($user_password) && empty($errors)) {
        $query_pwd = "SELECT pwd FROM users WHERE id = $get_user_id";
        $check_pwd_query = mysqli_query($conn, $query_pwd);
         confirmQuery($check_pwd_query);

        $row = mysqli_fetch_array($check_pwd_query);

        $db_user_pwd = $row['pwd'];

        if($db_user_pwd != $user_password) {
          $hashed_pwd = password_hash($user_password, PASSWORD_DEFAULT);
        } else {
          $hashed_pwd = $db_user_pwd;
        }


      $query = "UPDATE users SET ";
      $query .="userid = '{$user_id}', ";
      $query .="email = '{$user_email}', ";
      $query .="username ='{$user_name}', ";
      $query .="userrole ='{$user_role}', ";
      $query .="verified ='{$verified}', ";
      $query .="pwd ='{$hashed_pwd}' ";
      $query .="WHERE id = '{$get_user_id}'";

      $update_user = mysqli_query($conn,$query);
      confirmQuery($update_user);

      if ($update_user) {
        echo '<div class="alert alert-success">
          Update successful
        </div>';
      }
    } // End password check
  } // End Update users

} // If GET
 else { // Display this if GET value is not in url
   header('location: index.php');
  }

 ?>


<form action="" method="post">

    <div class="form-group">
      <label for="userid">User ID: </label>
      <input value = "<?php echo $user_id; ?>"  type="text" name="userid" class="form-control">
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
      <label for="username">Password: </label>
      <input value = "<?php echo $user_password; ?>" type="password" name="pwd" class="form-control" required>
    </div>

    <div class="form-group">
      <label for="userrole">Select Role: </label>
      <select class="userrole" name="userrole">
        <option value="<?php echo $user_role ?>"><?php echo $user_role ?></option>

        <?php 

          if($user_role == 'lecturer') {
            echo '<option value="admin">Admin</option>';
            echo '<option value="security">Security Guard</option>';
            echo '<option value="association">Association Executive</option>';
            echo '<option value="student">Student</option>';
          } elseif($user_role == 'admin') {
            echo '<option value="lecturer">Lecturer</option>';
            echo ' <option value="security">Security Guard</option>';
            echo '<option value="association">Association Executive</option>';
            echo '<option value="student">Student</option>';
          }
          elseif($user_role == 'association') {
            echo '<option value="lecturer">Lecturer</option>';
            echo ' <option value="security">Security Guard</option>';
            echo '<option value="admin">Admin</option>';
            echo '<option value="student">Student</option>';
          }
          elseif($user_role == 'security') {
            echo '<option value="lecturer">Lecturer</option>';
            echo ' <option value="association">Association Executive</option>';
            echo '<option value="admin">Admin</option>';
            echo '<option value="student">Student</option>';
          } else {
            echo '<option value="lecturer">Lecturer</option>';
            echo ' <option value="association">Association Executive</option>';
            echo '<option value="admin">Admin</option>';
            echo ' <option value="security">Security Guard</option>';
          }

         ?>
      </select>
    </div>

    <div class="form-group">
      <label for="verified">Select Verification: </label>
      <select class="verify" name="verified">
        <option value="<?php echo $verified ?>"><?php echo $verified ?></option>
        <?php 

            if($verified == '0') {
              echo '<option value="1">1</option>';
            } else {
              echo '<option value="0">0</option>';
            }

         ?>   
      </select>
    </div>

    <div class="form-group">
      <input type="submit" value="Update" name="update_user" class="btn btn-primary">
    </div>
</form>
