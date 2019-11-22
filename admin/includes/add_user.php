
<?php
  $errors = array();
    if(isset($_POST['create_user'])) {
      require_once 'sendEmails.php';

      $user_id = mysqli_real_escape_string($conn,$_POST['userid']);
      $user_email = mysqli_real_escape_string($conn,$_POST['email']);
      $user_name = mysqli_real_escape_string($conn,$_POST['username']);
      $user_role = mysqli_real_escape_string($conn,$_POST['userrole']);
      $verified = 0;
      $user_token = bin2hex(random_bytes(50));
      $pwd = mysqli_real_escape_string($conn,$_POST['pwd']);
      $user_password = password_hash($pwd, PASSWORD_DEFAULT);



      // Validation
    if(empty($userid)) {
        $errors['userid'] = "User ID required";
    } else {
        $userid = test_input($_POST['userid']);

        //Checking name for only letters and numbers only
        if(!preg_match("/^[a-zA-Z0-9]*$/",$userid)) {
            $errors['userid'] = "Only Letters and Numbers allowed. Consider leaving out slashes";
        }
    }

    if(empty($username)) {
        $errors['userid'] = "Username required";
    } else {
        $username = test_input($_POST['username']);
    }


    if (empty(@email)) {
        $errors['email'] = "Email required";
    } else {
            $email = test_input($_POST['email']);

            //Checking for Valid Email
            $email = filterEmail($_POST['email']);
            if ($email == FALSE) {
                $errors['email'] = "Enter a valid email address.";
            }
        }
    if (empty($pwd)) {
        $errors['pwd'] = "Password is required";
    } else if(strlen($pwd)< 6) {
        $errors['pwd'] = "Password must be at least 6 characters";
    }


    //Checking for non existent email in db
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";

    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $email);
    $stmt->execute();
    $result = $stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['email'] = "Email already exists.";
    }

    //Checking for non existent userid in db
    $useridQuery = "SELECT * FROM users WHERE userid=? LIMIT 1";

    $stmt = $conn->prepare($useridQuery);
    $stmt-> bind_param('s', $userid);
    $stmt->execute();
    $result=$stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['userid'] = "ID already exists.";
    }

     if(count($errors)===0) {

      $query = "INSERT INTO users(userid,email,username,userrole,verified,token,pwd)";

      $query .= "VALUES('$user_id','$user_email','$user_name','$user_role','$verified','$user_token','$user_password')";

      $create_user_query = mysqli_query($conn,$query);

      //Confirm QUERY
      confirmQuery($create_user_query);
      sendVerificationEmailCourseRep($user_email, $user_token);

      echo "User Created: " . " " . "<a href='users.php'>View Users</a> ";
    }  
      else {
        $errors['db_error'] = "Database error: failed to register";
        }


    }


 ?>



 <form action="" method="post">

  <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                  <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </div>
  <?php endif; ?>

     <div class="form-group">
       <label for="userid">User ID: </label>
       <input  type="text" name="userid" class="form-control">
     </div>


     <div class="form-group">
       <label for="email">Email: </label>
       <input type="email" name="email" class="form-control">
     </div>

     <div class="form-group">
       <label for="username">Username: </label>
       <input type="text" name="username" class="form-control">
     </div>

     <div class="form-group">
       <label for="username">Password: </label>
       <input type="password" name="pwd" class="form-control">
     </div>

     <div class="form-group">
       <label for="userrole">Select Role: </label>
       <select class="userrole" name="userrole">
         <option value="student">student</option>
         <option value="admin">admin</option>
         <option value="lecturer">lecturer</option>
          <option value="security">security</option>
          <option value="association">association</option>
       </select>
     </div>

     <div class="form-group">
       <input type="submit" value="Add User" name="create_user" class="btn btn-primary">
     </div>
 </form>
