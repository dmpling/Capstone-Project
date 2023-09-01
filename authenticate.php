<?php
session_start();

require_once 'conn.php';

// Now we check if the data from the login form was submitted, isset() will check if the data exists.
if ( !isset($_POST['username'], $_POST['password']) ) {
	// Could not get the data that should have been sent.
	exit('Please fill both the username and password fields!');
}

// Prepare our SQL, preparing the SQL statement will prevent SQL injection.
if ($stmt = $con->prepare('SELECT admin_id, password FROM admins WHERE username = ?')) {
	// Bind parameters 
	$stmt->bind_param('s', $_POST['username']);
	$stmt->execute();
	// Store the result so we can check if the account exists in the database.
	$stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($admin_id, $password); 
        $stmt->fetch();
        // Account exists, now we verify the password.
        
        if (password_verify($_POST['password'], $password)) {
            // Verification success! User has logged-in!
            // Create sessions, so we know the user is logged in.
            session_regenerate_id();
            $_SESSION['loggedin'] = TRUE;
            $_SESSION['name'] = $_POST['username'];
            $_SESSION['admin_id'] = $admin_id;
            header('Location: dashboard.php');
        } else {
            // Incorrect password
            echo "<script>alert('Wrong Password!')</script>";
		    echo "<script>window.location = 'index.php'</script>";
        }
    } else {
        // Incorrect username
        echo "<script>alert('Wrong Username!')</script>";
		echo "<script>window.location = 'index.php'</script>";
    }
	$stmt->close();

    
}
?>