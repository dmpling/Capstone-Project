<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.html');
	exit;
}
require_once 'conn.php';

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LNCHS - FAS </title>
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
        <h2>Appointment List:</h2>
		
		<div class="content"></div>

		<div class="panel panel-success">
			<div class="panel-heading"> 
				
			</div>
						 
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
						<table id="table"
			                   data-show-columns="true"
 				               data-height="460">
						</table>
					</div>
				</div>
			</div>				
		</div>
	</div>


<script src="js/jquery-1.11.1.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/bootstrap-table.js"></script>

<script type="text/javascript">
  var $table = $('#table');
  $table.bootstrapTable({
    url: 'list-appointment.php',
    search: true,
    pagination: true,
    buttonsClass: 'primary',
    showFooter: true,
    minimumCountColumns: 2,
    columns: [
      {
        field: 'appointment_id',
        title: 'ID',
        sortable: true,
      },
      {
        field: 'ref_no',
        title: 'Reference No. or LRN',
        sortable: true,
      },
      {
        field: 'name',
        title: 'Name',
        sortable: true,
      },
      {
        field: 'email',
        title: 'Email',
        sortable: true,
      },
      {
        field: 'contact',
        title: 'Contact',
        sortable: true,
      },
      {
        field: 'type_docu',
        title: 'Type of Document',
        sortable: true,
      },
      {
        field: 'purpose',
        title: 'Purpose',
        sortable: true,
      },
      {
        field: 'name_stud',
        title: 'Name of Student',
        sortable: true,
      },
      {
        field: 'date_requested',
        title: 'Date Requested',
        sortable: true,
      },
      {
        field: 'date',
        title: 'Date of Appointment',
        sortable: true,
      },
      {
        field: 'button',
        title: 'Action',
        formatter: function(value, row, index) {
          var appointmentId = row.appointment_id;
          var approved = '<button class="approved btn btn-sm btn-success" data-appointment-id="' + appointmentId + '">Approve</button>';
          var disapproved = '<button class="disapproved btn btn-sm btn-danger" data-appointment-id="' + appointmentId + '">Disapprove</button>';
          return approved + ' ' + disapproved;
        }
      }
    ],
  });

 // Event listener for the approved
$(document).on('click', '.approved', function() {
  var appointmentId = $(this).data('appointment-id');

  // Create a session with unique appointment_id
  $.ajax({
    type: "POST",
    url: "set_session_mail.php",
    data: { approved_appointment_id: appointmentId }, // Use a unique session variable name
    success: function(response) {
      console.log("Approved " + appointmentId);
    
      // Redirect to approved.php
      window.location.href = "approved.php";
    },
    error: function(xhr, status, error) {
      console.log("Error creating session: " + error);
    }
  });
});

// Event listener for the disapproved
$(document).on('click', '.disapproved', function() {
  var appointmentId = $(this).data('appointment-id');

  // Create a session with unique appointment_id
  $.ajax({
    type: "POST",
    url: "set_session_mail.php",
    data: { disapproved_appointment_id: appointmentId }, // Use a unique session variable name
    success: function(response) {
      console.log("Disapproved " + appointmentId);
    
      // Redirect to disapproved.php
      window.location.href = "disapproved.php";
    },
    error: function(xhr, status, error) {
      console.log("Error creating session: " + error);
    }
  });
});
    

</script>

</body>
</html>
