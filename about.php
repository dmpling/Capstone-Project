<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in, redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
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
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
</head>

<style>
    body {
        background-image: url(images/bg0.jpg);
        background-size: cover;
        background-repeat: no-repeat;
        background-position: center;
        background-attachment: fixed;
        font-family: Arial, sans-serif;
        line-height: 1.6;
    }

 
    h2 {
        color: #337ab7;
        font-size: 36px;
        text-align: center;
        margin-bottom: 20px;
    }

    p {
        margin-bottom: 16px;
        text-align: justify;
        font-size: 18px;
    }

    ul {
        list-style-type: none;
        padding-left: 0;
    }

    ul li {
        margin-bottom: 8px;
    }

    a {
        color: #337ab7;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    .contact-list li {
        display: flex;
        align-items: center;
    }

    .contact-list li a {
        display: flex;
        align-items: center;
        color: #337ab7;
        text-decoration: none;
    }

    .contact-list li a:hover {
        text-decoration: underline;
    }

    .contact-list li a i {
        font-size: 24px;
        margin-right: 10px;
    }
</style>

<body>
    <header>
        <nav class="navtop">
            <div class="navtop-space">
                <label href="home.php" class="navtop-logo">
                <img src="images/logo.png">
                <a class="label-home" href="dashboard.php"> LNCHS-RMS </a>
                <h4 class="navtop-logo-desc"> Lopez National Comprehensive High School | Records Management System </h4>
                </label>
            </div>
            <div class="content-divider"></div>
            <div class="sidebar">
                <!-- Add your navigation links here -->
            </div>
        </nav>
    </header>

    <div class="container">
			<h2> About | LNCHS-RMS: </h2>

		<div class="content"></div>	
		
    
        <p>
            Welcome to the Lopez National Comprehensive High School - Records Management System (LNCHS-RMS).
            This system provides a convenient and efficient way for students and staff to access and manage important documents.
        </p>
        <p>
            With LNCHS-RMS, you can request and receive documents such as Form 137/SF-10, Birth Certificate, Certification of Good Moral Character, and more.
            We aim to streamline the document processing and retrieval process, ensuring that you get the documents you need in a timely manner.
        </p>
        <p>
            LNCHS-RMS is designed to provide a secure and user-friendly experience for all users. Our dedicated team is committed to continuously improving the system's functionality and usability to better serve our school community.
        </p>
        <p>
            If you have any questions or feedback regarding LNCHS-RMS, please don't hesitate to contact us via email, Facebook, Instagram, or Twitter.
            Thank you for using LNCHS-RMS!
        </p>

        <h4>Contact Us:</h4>
        <ul class="contact-list">
            <li><a href="mailto:contact@lnchs-rms.com"><i class="fa fa-envelope"></i> Email</a></li>
            <li><a href="https://www.facebook.com/LopezNCHS"><i class="fa fa-facebook"></i> Facebook</a></li>
            <!-- Add links to Instagram and Twitter if available -->
        </ul>
    </div>

  
    <script src="js/jquery-1.11.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-table.js"></script>
    <script type="text/javascript">
      
    </script>
</body>
</html>
