<?php
    // Initializing Error Variables
      $useridErr = '';
      $emailErr = '';
      $pwdErr = '';
      $con_pwd_Err = '';

    // Initializing input variables
      $userid = '';
      $email = '';
      $pwd = '';

// Execute after submit 
if (isset($_POST['register'])) {
    require_once 'api/includes/functions.php';
    require_once 'api/includes/config.php';

    if (empty($_POST['userid'])) {
        $useridErr = "ID is required";
    } else {
        $userid = test_input($_POST['userid']);

        //Checking name for only letters and numbers only
        if(!preg_match("/^[a-zA-Z0-9]*$/",$userid)) {
            $useridErr = "Only Letters and Numbers allowed. Consider leaving out slashes";
        }
    }

    if(empty($_POST['email'])) {
        $emailErr = "Email is required";
    } else {
        $email = test_input($_POST['email']);

        //Checking for Valid Email
        $email = filterEmail($_POST['email']);
        if ($email == FALSE) {
            $emailErr = "Enter valid email address.";
        }
    }

    if (empty($_POST['pwd'])) {
        $pwdErr = "Password is required.";
    } else if (strlen($_POST['pwd']) < 6){
        $pwdErr = "Password must be at least 6 characters.";
    }
    if (empty($_POST['con_pwd'])) {
        $con_pwd_Err = "Please re-enter password";
    } else if($_POST['pwd'] !== $_POST['con_pwd']) {

        $con_pwd_Err = "Password is not a match";
    } else {

         // DATABASE  
            // Preparing data for insertion in database
        $userid = mysqli_real_escape_string($conn, $_POST['userid']);
        $email = mysqli_real_escape_string($conn, $_POST['email']);
        $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

        $sql = "SELECT * FROM users WHERE userid = '$userid';";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);
        // Validation that user is unique (appears for only one row in db)
        if ($resultCheck < 1){

        // Hashing the password
        $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
        // Insert the user into the database
        $sql = "INSERT INTO user (userid, email, pwd) VALUES('$userid',  '$email', '$hashedPwd');";
        $result = mysqli_query($conn, $sql);
            echo "New record created successfully";
            header("Location: api/includes/p-register.php"); 
            exit();
                } else {
                    echo "Error: " . $sql . "<br>" . $conn->error;
}
}

}