
<?php

    $errors = array();

    if(isset($_POST['create_rep'])) {

      require_once 'sendEmails.php';

      $user_id = mysqli_real_escape_string($conn,$_POST['userid']);
      $user_email = mysqli_real_escape_string($conn,$_POST['email']);
      $user_name = mysqli_real_escape_string($conn,$_POST['username']);
      $user_role = 'course_rep';
      $verified = 0;
      $preRole = 'created by lecturer';
      $user_token = bin2hex(random_bytes(50));
      $pwd = '123456';
      $user_password = password_hash($pwd, PASSWORD_DEFAULT);
      $name = $_SESSION['username'];



      // Validation
    if(empty($user_id)) {
        $errors['userid'] = "User ID required";
    } else {
        $user_id = test_input($_POST['userid']);

        //Checking name for only letters and numbers only
        if(!preg_match("/^[a-zA-Z0-9]*$/",$user_id)) {
            $errors['userid'] = "Only Letters and Numbers allowed in Student ID. Consider leaving out slashes";
        }
    }

    if(empty($user_name)) {
        $errors['userid'] = "Username required";
    } else {
        $user_name = test_input($_POST['username']);
    }


    if (empty(@email)) {
        $errors['email'] = "Email required";
    } else {
            $user_email = test_input($_POST['email']);

            //Checking for Valid Email
            $user_email = filterEmail($_POST['email']);
            if ($user_email == FALSE) {
                $errors['email'] = "Enter a valid email address.";
            }
        }

    //Checking for non existent email in db
    $emailQuery = "SELECT * FROM users WHERE email=? LIMIT 1";

    $stmt = $conn->prepare($emailQuery);
    $stmt->bind_param('s', $user_email);
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
    $stmt-> bind_param('s', $user_id);
    $stmt->execute();
    $result=$stmt->get_result();
    $userCount = $result->num_rows;
    $stmt->close();

    if ($userCount > 0) {
        $errors['userid'] = "ID already exists.";
    }

     if(count($errors)===0) {

      $query = "INSERT INTO users(userid,email,username,userrole,preRole,verified,token,rep_role,pwd)";

      $query .= "VALUES('$user_id','$user_email','$user_name','$user_role','$preRole',$verified,'$user_token','{$_SESSION['id']}','$user_password')";

      $create_user_query = mysqli_query($conn,$query);

      //Confirm QUERY
      confirmQuery($create_user_query);
      sendVerificationEmailCourseRep($user_email, $pwd, $name, $user_token);

      echo "<div class='alert alert-success'>
      Course Rep Created: " . " " . "<a href='users.php'>View Course Reps</a>
      </div> ";
    }  
      


    }


 ?>


    <div class="alert alert-warning">
      <?php echo "<h3>NOTE</h3>
      <ul>
      <li>Please Inform Course Rep to verify email in order to login after adding course Rep. A default generated password will also be included in the email.</li>
      <li>In cases where user id or email already exists, unless wrong entry, it may be that another lecturer has already assigned him or her to their course(s).<br> Please select the assistant course rep or another course representative.</li>
      </ul>
      "; ?>
    </div>
 <form action="" method="post">

  <?php if (count($errors) > 0): ?>
            <div class="alert alert-danger">
                <?php foreach($errors as $error): ?>
                  <li><?php echo $error; ?></li>
                <?php endforeach; ?>
            </div>
  <?php endif; ?>

     <div class="form-group">
       <label for="userid">Student ID: </label>
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
       <input type="submit" value="Add Course Rep" name="create_rep" class="btn btn-primary">
     </div>
 </form>
