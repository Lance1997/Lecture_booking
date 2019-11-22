<!-- Header file -->
<?php include_once 'includes/adminheader.php'; ?>

<!-- Navbar file -->
<?php include_once 'includes/adminnavbar.php'; ?>



<?php

// Define variables and initialize with empty values
$new_pwd = $con_pwd = $old_pwd = "";
$new_pwd_Err = $con_pwd_Err = "";
$old_pwd_Err = array();

// Processing form data when form is submitted
if(isset($_POST['change_password'])){

    if(empty(trim($_POST["old_pwd"]))) {
        $old_pwd_Err['no_pass'] = "Please enter your old password";
    }

    $sql = "SELECT * FROM users WHERE id=? LIMIT 1" ;

        $userid = $_SESSION['id'];

        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s',$userid);
        $stmt->execute();
        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

    if (!password_verify($_POST['old_pwd'], $user['pwd'])) {
        $old_pwd_Err['wrong_pass'] = "Old Password wrong";
    }

    // Validate new password
    if(empty(trim($_POST["new_pwd"]))){
        $new_pwd_Err = "Please enter the new password.";
    } elseif(strlen(trim($_POST["new_pwd"])) < 6){
        $new_pwd_Err = "Password must have at least 6 characters.";
    } else{
        $new_pwd = trim($_POST["new_pwd"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["con_pwd"]))){
        $con_pwd_Err = "Please confirm the password.";
    } else{
        $con_pwd = trim($_POST["con_pwd"]);
        if(empty($new_pwd_Err) && ($new_pwd != $con_pwd)){
            $con_pwd_Err = "Password did not match.";
        }
    }



    // Check input errors before updating the database
    if(empty($new_pwd_Err) && empty($con_pwd_Err) && empty($old_pwd_Err)){
        // Prepare an update statement
        $new_pwd = mysqli_real_escape_string($conn,$_POST['new_pwd']);

        $sql = "UPDATE users SET pwd = ? WHERE id = ?";
        $stmt = $conn->prepare($sql);

        // Set parameters
        $param_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
        $param_id = $_SESSION["id"];
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_pwd, $param_id);


            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Close statement
                $stmt->close();
                
               echo "<div class='alert alert-success text-center' >Password has been successfully changed.</div>";
            } else{
                echo "Oops! Something went wrong. Please try again later.";
        }

    }
}
?>


<!-- Main Content of Reset Password goes here -->
<main>
    <div class="form-div container text-center" style="width: 50%; background-color: white; margin-top:100px;">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Form starts here -->
            <div class="form-group">
                <label>Old Password</label>
                <input type="password" name="old_pwd" class="form-control">
                    <span class="help-block"> 
                        <?php if (count($old_pwd_Err) > 0): ?>
                            <div class="text-warning">
                                <?php foreach($old_pwd_Err as $error): ?>
                                <?php echo "<li>".$error."</li>"; ?>
                                <?php endforeach; ?>
                            </div>
                        <?php endif; ?>
                    </span>
            </div>
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_pwd" class="form-control">
                <span class="help-block"><?php echo "<div class= 'text-warning'>".$new_pwd_Err."</div>"; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="con_pwd" class="form-control">
                <span class="help-block"><?php echo "<div class= 'text-warning'>". $con_pwd_Err."</div>"; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit" name="change_password">
                <a class="btn btn-link" href="index.php">Cancel</a>
            </div>
        </form> <!-- Form ends here -->
    </div>  <!-- End of Wrapper class -->
</main>
<!-- End of Main -->




<!-- Footer -->
<?php include_once 'includes/adminfooter.php'; ?>

