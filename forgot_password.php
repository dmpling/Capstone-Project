<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'conn.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';



// Function to generate a secure random code for password reset
function generateResetCode() {
    return bin2hex(random_bytes(16));
}

// Function to display error messages as an alert
function showErrorAsAlert($message) {
    echo '<script>alert("Error: ' . $message . '");</script>';
}

// Check if the form is submitted
if (isset($_POST['submit'])) {

    // Generate and store CSRF token
    $csrf_token = bin2hex(random_bytes(32));
    $_SESSION['csrf_token'] = $csrf_token;


    // Validate email
    $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);
    if (!$email) {
        showErrorAsAlert("Invalid email address. Please enter a valid email.");
        exit;
    }

    // Prepare and execute the SQL query to check if the email exists in the database
    $stmt = $con->prepare("SELECT admin_id FROM admins WHERE email = ?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    // If the email exists in the database, generate a reset code and send it to the user's email
    if ($stmt->num_rows > 0) {
        $reset_code = generateResetCode();

        // Get the admin_id associated with the email
        $stmt->bind_result($admin_id);
        $stmt->fetch();
        $stmt->close();

        // Save the reset code and expiration time in the password_reset table
        $expiration_time = date("Y-m-d H:i:s", strtotime("+1 hour"));
        $stmt = $con->prepare("INSERT INTO password_reset (admin_id, email, verification_code, expiration_time) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("ssss", $admin_id, $email, $reset_code, $expiration_time);

        if ($stmt->execute()) {
            // Send the reset link to the user's email using PHPMailer
            $mail = new PHPMailer(true);

            $mail -> isSMTP();
            $mail -> Host = 'smtp.gmail.com';
            $mail -> SMTPAuth = 'true';
            $mail -> Username = 'lnchsrms@gmail.com';
            $mail -> Password = 'mlfzygmclkbmfbeq';
            $mail -> SMTPSecure = 'ssl';
            $mail -> Port = '465';

            $mail -> setFrom('lnchsrms@gmail.com');
            $mail->addAddress($email);
            $mail -> isHTML(true);

            $mail->Subject = 'Password Reset';
            $reset_link = "http://localhost/lnchsrms/reset_password.php?code=" . $reset_code . "&csrf_token=" . urlencode($csrf_token);
            //$reset_link = "http://localhost/lnchsrms/reset_password.php?code=" . $reset_code;
            $mail->Body = "Click the link below to reset your password:\n$reset_link";

            if (!$mail->send()) {
                showErrorAsAlert("Error sending email: " . $mail->ErrorInfo);
            } else {
                echo '<script>alert("An email with instructions to reset your password has been sent to your email address.");</script>';
                echo '<script>window.location.href = "index.php";</script>';
                
            }
        } else {
            showErrorAsAlert("Email not found in the database. Please check your email and try again.");
        }

        // Close the database connection
        $stmt->close();
        $con->close();
    } else {
        showErrorAsAlert("Email not found in the database. Please check your email and try again.");
    }
}


?>
<!DOCTYPE html>
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
						<p> Forgot Password </p>
						</center>
					</div>

						<form method="post">
							<label for="username">
								<i class="fas fa-envelope"></i>
							</label>
                            <input type="text" name="email" required placeholder = "Email"><br>
                            <input type="hidden" name="csrf_token" value="<?php echo $csrf_token; ?>">
                            <input type="submit" name="submit" value="Send Link via Email">
							
						</form> 
						
						<br>
						<div> 
							<center>
							<h5> By using this service, you understood and agree to the LNCHS-FAS Services </h5>
							<h5> <a class="terms" href="#" style="color:  #ff0000"></style> Terms of Use </a> </h5>
							<h5> and </h5>
							</h5> <a class="privacy" href="#" style="color:  #ff0000"> Privacy Statement </a> </h5>
							</center>
						</div>
				
				</div>			
		</nav>

	</body>
</html>
