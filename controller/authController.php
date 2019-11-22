<?php


//Connections
require_once 'config/functions.php';
require_once 'config/db.php';
require 'sendEmails.php';
require 'ResetEmails.php';

//Error Array
$errors = array();
$userid = '';
$email = '';
$username='';
$message='';
$subject='';
$name='';

//Checking for Submit login event

if (isset($_POST['signup-btn'])) {


    $userid = $_POST['userid'];
    $email = $_POST['email'];
    $preRole = $_POST['preRole'];
    $username = $_POST['username'];
    $pwd = $_POST['pwd'];
    $con_pwd = $_POST['con_pwd'];

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
    if ($pwd !== $con_pwd) {
        $errors['pwd'] = "Passwords do not match";
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
        $pwd = password_hash($pwd, PASSWORD_DEFAULT);
        $token = bin2hex(random_bytes(50));
        $verified = false;

        $sql = "INSERT INTO users (userid,email,username,verified,token,preRole,pwd) VALUES(?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql);
        $stmt-> bind_param('sssbsss', $userid,$email,$username,$verified,$token,$preRole,$pwd);
        if($stmt->execute()) {
            //login user
            $stmt->close();

            // TO DO: send verification email to user
            sendVerificationEmail($email, $token);

            $userrole_query = "SELECT userrole FROM users WHERE userid='{$userid}'";
            $select_userrole_query = mysqli_query($conn,$userrole_query);

            $row = mysqli_fetch_array($select_userrole_query);

            $_SESSION['username'] = $username;
            $_SESSION['verified'] = $verified;
            $_SESSION['userrole'] = $row['userrole'];

            //Flash message

            $_SESSION['error_message'] = "A mail has been sent to your email account from <b>lanarmah@gmail.com</b>.
            Please verrify your account from your email.";
            $_SESSION['registered_message'] = "Your email has been successfully verified.";
            $_SESSION['wait_message'] = "Please wait as admin verifies your identity and assign you a role as per the preferred user role you chose. An email will be sent to you upon successful verification. Click on it to login.";

            header('Location: welcome.php');
            exit();
        } else {
        $errors['db_error'] = "Database error: failed to register";
        }
     }
}

// LOGIN IN
if (isset($_POST['login-btn'])) {


    $username = $_POST['username'];
    $pwd = $_POST['pwd'];

    // Validation
    if(empty($username)) {
        $errors['username'] = "User ID or Email required";
    } else {
        $username = test_input($_POST['username']);
    }
    if (empty($pwd)) {
        $errors['pwd'] = "Password is required";
    }

    if (count($errors)=== 0) {

        $sql = "SELECT * FROM users WHERE userid=? OR username =? LIMIT 1" ;

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss',$username,$username);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if (password_verify($pwd, $user['pwd'])) {
            // login success
            $_SESSION['userrole'] = $user['userrole'];
            $_SESSION['verified'] = $user['verified'];
            $_SESSION['username'] = $user['username'];
            $_SESSION['id'] = $user['id'];

            //Flash message
            $_SESSION['error_message'] = "A mail has been sent to your email account from <b>lanarmah@gmail.com</b>.
            Please verrify your account from your email.";
            $_SESSION['registered_message'] = "Your email has been successfully verified.";
            $_SESSION['wait_message'] = "Please wait as admin verifies your identity and assign you a role as per the preferred user role you chose. An email will be sent to you upon successful verification. Click on it to login.";

            $student = "student";
            $admin= "admin";
            $lecturer = "lecturer";
            $association = "association";
            $security = "security";
            $course_rep = "course_rep";

            if($_SESSION["userrole"] === $student){
            header("location: welcome.php");
            exit();
          } elseif($_SESSION["userrole"] === $admin) {
            header("location: admin");
           exit();
         } elseif($_SESSION["userrole"] === $lecturer) {
           header("location: lecturer");
           exit();
         } elseif($_SESSION["userrole"] === $association) {
            header("location: association");
            exit();
          } elseif($_SESSION["userrole"] === $security) {
              header("location: security");
              exit();
             } elseif($_SESSION["userrole"] === $course_rep) {
              header("location: course_rep");
              exit();
             }

        } else {
            $errors['login-fail'] = "Wrong Credentials.";
        }
}// Ending Counting of Errors
} // Ending Query to login


//RESETTING PASSWORD
/*
  Accept email of user whose password is to be reset
  Send email to user to reset their password
*/
if (isset($_POST['reset-password'])) {
    $email = mysqli_real_escape_string($conn,$_POST['email']);
    // ensure that the user exists on our system
    $query = "SELECT email FROM users WHERE email='$email'";
    $results = mysqli_query($conn,$query);

    if (empty($email)) {
      array_push($errors, "Your email is required");
    }else if(mysqli_num_rows($results) <= 0) {
      array_push($errors, "Sorry, no user exists on our system with that email");
    }
    // generate a unique random token of length 100
    $token = bin2hex(random_bytes(50));

    if (count($errors) == 0) {
      // store or update token in users table against the user's email
      $sql = "UPDATE users SET token = '{$token}' WHERE email = '{$email}'";
      $results = mysqli_query($conn, $sql);

        // TO DO: send Reset Password email to user
        sendResetEmails($email, $token);
      header('location: pending.php?email=' . $email);
    }
  }

  // ENTER A NEW PASSWORD
  if (isset($_POST['new_password'])) {
    $new_pass = mysqli_real_escape_string($conn,trim($_POST['new_pass']));
    $new_pass_c = mysqli_real_escape_string($conn,trim($_POST['new_pass_c']));

    // Grab to token that came from the email link
    $token = $_SESSION['token'];
    $email = $_SESSION['email'];
    if (empty($new_pass) || empty($new_pass_c)) array_push($errors, "Password is required");
    if ($new_pass !== $new_pass_c) array_push($errors, "Password do not match");
    if (count($errors) == 0) {
      // select email address of user from the user table

      $sql = "SELECT * FROM users WHERE token =? AND email =?" ;

      $stmt = $conn->prepare($sql);
      $stmt->bind_param('ss',$token,$email);
      $stmt->execute();
      $result = $stmt->get_result();
      $user = $result->fetch_assoc();
      $userid = $user['userid'];

        $new_pass = password_hash($new_pass, PASSWORD_DEFAULT);
        $sql = "UPDATE users SET pwd='$new_pass' WHERE userid='$userid'";
        $results = mysqli_query($conn,$sql);
        if($results) {
          echo '<div class="alert'.$_SESSION['alert-class'].'">'.$_SESSION['tok'].'</div>';

        }else {
          echo "Error: Password could not be changed!";        }
      }
    }



// CONTACT FORM

    if(isset($_POST['contact_us'])) {
      $name = mysqli_real_escape_string($conn,$_POST['name']);
      $email = mysqli_real_escape_string($conn,$_POST['email']);
      $messages = mysqli_real_escape_string($conn,$_POST['message']);
      $subject = mysqli_real_escape_string($conn,$_POST['subject']);

      // Validation
      if(empty($name)) {
          $errors['name'] = "Name is required";
      } else {
          $name = test_input($_POST['name']);

          //Checking name for only letters and numbers only
          if(!preg_match("/^[a-zA-Z]*$/",$name)) {
              $errors['userid'] = "Please ensure your name has only letters.";
          }
      }

      if(empty($messages)) {
          $errors['message'] = "Please enter a message to send";
      } else {
          $messages = test_input($_POST['message']);
      }

      if(empty($subject)) {
        $errors['subject'] = "Please enter a subject of the message";
    } else {
        $subject = test_input($_POST['subject']);
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

          if(count($errors) == 0) {
          // $query = "INSERT INTO contact (contact_author, contact_email,contact_subject,contact_content,contact_date)";
          // $query .= "VALUES('$name','$email','$subject','$messages', now())";

          // $contact_query = mysqli_query($conn,$query);

          $sql = "INSERT INTO contact (contact_author, contact_email,contact_subject,contact_content,contact_date) VALUES(?,?,?,?,now())";
        $stmt = $conn->prepare($sql);
        $stmt-> bind_param('ssss', $name,$email,$subject,$messages);
        if($stmt->execute()) {
            //login user
            $stmt->close();

            echo "<script>";
            echo "swal('Thank you.!', 'Message successfully sent!', 'success');";
            echo "</script>";
        } else {
          $errors['db_error'] = "Database error: failed to send";
        }
        }
    }


    //SUGGESTION FORM
    if(isset($_POST['suggestion'])) {
      $conn = mysqli_connect('localhost', 'lecture', 'funwithsql', 'lecture_booking');
      $suggestion = mysqli_real_escape_string($conn,$_POST['message']);


      // Validation
      if(empty($suggestion)) {
        echo "<script>";
        echo "swal('Try Again.!', 'Suggestion box is empty!', 'warning');";
        echo "</script>";
      } else{

        $query = "INSERT INTO suggestions (suggestion_message, suggestion_date)";
        $query .= "VALUES('{$suggestion}',now())";

        $suggestion_query = mysqli_query($conn,$query);

        if(!$suggestion_query) {
          die('QUERY FALILED' . mysqli_error($conn));
        } else {
          echo "<script>";
          echo "swal('Thank you.!', 'Suggestion successfully sent!', 'success');";
          echo "</script>";
        }

      }


  }