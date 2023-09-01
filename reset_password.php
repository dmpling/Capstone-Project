<?php
session_start();
require 'conn.php'; // Include the conn.php file to establish the database connection


$_SESSION['csrf_token'] = $_GET['csrf_token'];

// Proceed with the password reset process
if (isset($_GET['code'])) {
    $reset_code = filter_var($_GET['code'], FILTER_SANITIZE_STRING); // Sanitize the reset code

    // Check if the reset code exists and is not expired
    $stmt = $con->prepare("SELECT admin_id, expiration_time FROM password_reset WHERE verification_code = ?");
    $stmt->bind_param("s", $reset_code);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $expiration_time);
        $stmt->fetch();
        $stmt->close();

        // Check if the reset code is not expired
        if (strtotime($expiration_time) < time()) {
            echo '<p>Sorry, the reset code has expired. Please try again.</p>';
        } else {
            // Display password reset form
            echo '<!DOCTYPE html>
<html>
	<head>
	<meta charset="utf-8">
		<title>LNCHS - FAS</title>
		<link href="css/style.css" rel="stylesheet" type="text/css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    	<link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
		<link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
		<link type="text/css" href="css/font-awesome.css" rel="stylesheet">
		
	</head>

    <style>
       body {background-image: url(images/bg.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
			background-attachment: fixed;
        }
    </style> 

</style>

<nav class="navtop-lgn">	
			<label class="navtop-logo-lgn"> <img src="images/logo.png"> LNCHS-FAS </label>
			<h4 class="navtop-logo-desc-lgn"> Lopez National Comprehensive High School | File Archiving System </h4>
</nav>		
 




		<nav class="navbar navbar-expand-lg navbar-fixed-top" >

				<div class="login">
				

					<div>
						<center>
						<h2> </h2>
						<p> Reset Password </p>
						</center>
					</div>

						<form method="post">
                        <label for="password">
                        <i class="fas fa-lock"></i>
                        </label>
                        <input type="password" name="new_password" placeholder = "New Password" required><br>
                        <label for="password">
                        <i class="fas fa-lock"></i>
                        </label>
                        <input type="password" name="confirm_password" placeholder = "Confirm New Password" required><br>
                            <input type="hidden" name="csrf_token" value="' . $_SESSION['csrf_token'] . '">
                            <input type="submit" name="submit" value="Reset Password">
							
						</form> 
						
						<br>
						<div> 
							<center>
							<h5> By using this service, you understood and agree to the LNCHS-RMS Services </h5>
							<h5> <a class="terms" href="#" style="color:  #ff0000"></style> Terms of Use </a> </h5>
							<h5> and </h5>
							</h5> <a class="privacy" href="#" style="color:  #ff0000"> Privacy Statement </a> </h5>
							</center>
						</div>
				
				</div>			
		</nav>

	</body>
</html>';

            if (isset($_POST['submit'])) {
                // Validate CSRF token
                if (!isset($_POST['csrf_token']) || !hash_equals($_POST['csrf_token'], $_SESSION['csrf_token'])) {
                    echo '<p style="color: red;">CSRF token validation failed. Please try again.</p>';
                } else {
                    // Validate and update the new password
                    $new_password = $_POST['new_password'];
                    $confirm_password = $_POST['confirm_password'];

                    // Password strength requirements
                    $min_length = 8;
                    if (strlen($new_password) < $min_length || !preg_match("/\d/", $new_password) || !preg_match("/[A-Za-z]/", $new_password)) {
                        echo '<script>alert("Password must be at least ' . $min_length . ' characters long and contain both letters and numbers.");</script>';
                       
                    } else {
                        if ($new_password !== $confirm_password) {
                            echo '<script>alert("Passwords do not match. Please try again.");</script>';
                          
                        } else {
                            // Securely hash the new password
                            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);
                            $stmt = $con->prepare("UPDATE admins SET password = ? WHERE admin_id = ?");
                            $stmt->bind_param("ss", $hashed_password, $admin_id);
                            $stmt->execute();

                            // Delete the used reset code from the password_reset table
                            $stmt_delete = $con->prepare("DELETE FROM password_reset WHERE verification_code = ?");
                            $stmt_delete->bind_param("s", $reset_code);
                            $stmt_delete->execute();

                            echo '<script>alert("Password reset successful. You can now log in with your new password.");</script>';
                            echo '<script>window.location.href = "index.php";</script>';
                        }
                    }
                }
            }
        }
    } else {
        echo '<script>alert("Invalid reset code. Please try the password reset link again.");</script>';
   
    }
} else {
    echo '<script>alert("Invalid reset code. Please try the password reset link again.");</script>';
  
}

// Close the database connection
$con->close();
?>
