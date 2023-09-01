<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['approved_appointment_id'])) {
	header('Location: appoint.php');
	exit;
}
require_once 'conn.php';
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT appointment_id, ref_no, name, email, contact, type_docu, purpose, name_stud, date FROM appointment WHERE appointment_id = ?');
// In this case, we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['approved_appointment_id']);
$stmt->execute();
$stmt->bind_result($appointment_id, $ref_no, $name, $email, $contact, $type_docu, $purpose, $name_stud, $date);
$stmt->fetch();
$stmt->close();
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
    background-image: url(images/svg.png);
    background-size: cover;
    background-repeat: no-repeat;
    background-position: center;
    background-attachment: fixed;
}
</style>
<body>
<header>    
    <nav class="navtop">
    <div class="navtop-space">
            <label href="home.php" class="navtop-logo">
            <img src="images/logo.png">
            <a class="label-home" href="dashboard.php" style="color: #ffffff; font-size: 24px;"> LNCHS-FAS </a>
            <h4 class="navtop-logo-desc"> Lopez National Comprehensive High School | File Archiving System </h4>
            </label>
        </div>
        <div class="content-divider"></div>
        <div class="sidebar">
   
		
        <a href="home.php"><i class="fa fa-user"></i> User Accounts </a> 
		<a href="student.php"><i class="fa fa-list-alt"></i> Student Table </a>
		<a href="appoint.php"><i class="fa fa-inbox"></i> List of Request  </a>
        <a href="logbook.php"><i class="fa fa-inbox"></i> History </a>
		<a href="dashboard.php"><i class="fa fa-bar-chart"></i> Dashboard </a>
        

		<div class="dropdown-navopt">
			<div class="navopt-container">
				<a class="dropbtn-navopt"><i class="fa fa-user-circle"></i> <?php echo $_SESSION['name'] ?><i class="fas fa-caret-down"></i></a>
				<div class="dropdown-content-navopt">
					<a href="profile.php"><i class="fas fa-user-circle"></i> Profile </a>
                    <a href="reports.php"> <i class="fa fa-print"></i> Reports </a>
					<a href="logout.php" onclick="return confirm('Are you sure you want to log out?')"><i class="fas fa-sign-out-alt"></i> Logout </a>
			</div>
		</div>

</div>
    </nav>
</header> 

	<div class="container">
		<h2> <i class="fa-regular fa-face-smile"></i></i> | Approve Online Document Request: </h2>

		<div class="content">

			<div class="content-stud-info">
            <div class="msgs-ui">

                <a href="appoint.php" class="content-stud-info-btn-back btn-danger">
                        <i class="fas fa-chevron-left"></i> Go Back
                </a>	
                
                <h2> <span class="id-logo far fa-id-card"> STUDENT'S INFORMATION: </h2>
            </div> 

<div class="content-stud-info-head">
	<style>
    td {
        padding-bottom: 5px;
    }
    
    .description {
        text-align: right;
        padding-right: 10px;
    }
    </style>


<div class="apt-box">

    <table>
        <tr>
            <td class="description">Appointment ID:</td>
            <td><?=$appointment_id?></td>
        </tr>
        <tr>
            <td class="description">Full Name:</td>
            <td><?=$name?> </td>
        </tr>
        <tr>
            <td class="description">Email:</td>
            <td><?=$email?></td>
        </tr>
        <tr>
            <td class="description">Contact:</td>
            <td><?=$contact?></td>
        </tr>
        <tr>
            <td class="description">Purpose:</td>
            <td><?=$purpose?></td>
        </tr>
        <tr>
            <td class="description">Type of Document:</td>
            <td><?=$type_docu?></td>
        </tr>
    </table>

    

</div>
</div><!-- div for class="content-stud-info-head" -->

<div class="content"> </div>
<h4> <i class="fa-solid fa-pen"></i> Compose: </h4>

<form class="custom-form" action="send_approved.php" method="post">
    <label> Email: </label>
    <input type="email" name="email" value="<?=$email?>"> <br>
    <label> Subject: </label>
    <input type="text" name="subject" value="LNCHS-FAS iGetDocuments"> <br>
    <label> Message: (click send if none) </label>
    <input type="text" name="message" value=""> <br>

    <input type="hidden" name="ref_no" value="<?=$ref_no?>"/>
    <input type="hidden" name="name" value="<?=$name?>"/>
    <input type="hidden" name="contact" value="<?=$contact?>"/>
    <input type="hidden" name="type_docu" value="<?=$type_docu?>"/>
    <input type="hidden" name="purpose" value="<?=$purpose?>"/>
    <input type="hidden" name="name_stud" value="<?=$name_stud?>"/>
    <input type="hidden" name="date" value="<?=$date?>"/>
    <input type="hidden" name="received_date" value="Pending"/>
    <input type="hidden" name="appointment_id" value="<?=$appointment_id?>"/>
    

    <button class="btn-send btn-success" type="submit" name="send">Send</button>
</form>


</div><!-- div for class="content-stud-info" -->
</div><!-- div for class="content" -->
</div><!-- div for class="container" -->








	
</body>
</html>
