<!-- Header file -->
<?php include_once 'api/header.php'; ?>

<!-- Navbar file -->
<?php include_once 'api/navbar.php'; ?>

<?php

// Check if the user has token and email set, if not then redirect to login page
if(!isset($_GET["token"])){
    header("location: login.php");
    exit();
}

// Include config file
require_once "config/db.php";

// Define variables and initialize with empty values
$new_pwd = $con_pwd = "";
$new_pwd_Err = $con_pwd_Err = "";

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

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
    if(empty($new_pwd_Err) && empty($con_pwd_Err)){
        // Prepare an update statement
        $sql = "UPDATE users SET pwd = ? WHERE userid = ?";
        $stmt = $conn->prepare($sql);

        // Set parameters
        $param_pwd = password_hash($new_pwd, PASSWORD_DEFAULT);
        $param_id = $_SESSION["userid"];
            // Bind variables to the prepared statement as parameters
            $stmt->bind_param("ss", $param_pwd, $param_id);


            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Close statement
                $stmt->close();
                // Password updated successfully. Destroy the session, and redirect to login page
                session_destroy();
                unset($_SESSION['userid']);
                unset($_SESSION['email']);
                unset($_SESSION['verified']);
                unset($_SESSION['token']);
                header("location: login.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
        }

    }
}
?>


<!-- Main Content of Reset Password goes here -->
<main>
    <div class="form-div container text-center " style="width: 50%;">
        <h2>Reset Password</h2>
        <p>Please fill out this form to reset your password.</p>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <!-- Form starts here -->
            <div class="form-group">
                <label>New Password</label>
                <input type="password" name="new_pwd" class="form-control">
                <span class="help-block"><?php echo $new_pwd_Err; ?></span>
            </div>
            <div class="form-group">
                <label>Confirm Password</label>
                <input type="password" name="con_pwd" class="form-control">
                <span class="help-block"><?php echo $con_pwd_Err; ?></span>
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-primary" value="Submit">
                <a class="btn btn-link" href="welcome.php">Cancel</a>
            </div>
        </form> <!-- Form ends here -->
    </div>  <!-- End of Wrapper class -->
</main>
<!-- End of Main -->




<!-- Footer -->
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
