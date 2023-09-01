<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
require_once 'conn.php';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LNCHS - FAS  </title>
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
			<h2> Student List: </h2>

		<div class="content"></div>


		<div class="panel panel-success">
			<div class="panel-heading "> 
				<button class="btn btn-success" data-toggle="modal" data-target="#form_modal"><span class="glyphicon glyphicon-plus"></span> Add Student </button>
      </div>

						 
			<div class="panel-body">
				<div class="row">
					<div class="col-md-12">
					 
						<table 	id="table"
			                	data-show-columns="true"
 				                data-height="460">
						</table>
					</div>
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
    url: 'list-student.php',
    search: true,
    pagination: true,
    buttonsClass: 'primary' ,
    showFooter: true,
    minimumCountColumns: 2,
    columns: [
      {
        field: 'stud_id',
        title: 'ID',
        sortable: true,
      },
      {
        field: 'first',
        title: 'Firstname',
        sortable: true,
      },
      {
        field: 'mid',
        title: 'Middlename',
        sortable: true,
      },
      {
        field: 'last',
        title: 'Lastname',
        sortable: true,
      },
      {
        field: 'gender',
        title: 'Gender',
        sortable: true,
      },
      {
        field: 'batch',
        title: 'Batch',
        sortable: true,
      },
      {
        field: 'section',
        title: 'Section',
        sortable: true,
      },
      {
        field: 'advisor',
        title: 'Advisor',
        sortable: true,
      },
      {
        field: 'button',
        title: 'Action',
        formatter: function(value, row, index) {
          var studId = row.stud_id;
          return '<button class="view-documents btn-primary" data-stud-id="' + studId + '"> <i class="fa-solid fa-folder"></i> | View Documents </button>';
        }
      }
    ],
  });

  
  

  // Event listener for the view documents
  $(document).on('click', '.view-documents', function() {
    var studId = $(this).data('stud-id');

    // Create a session with stud_id
    $.ajax({
      type: "POST",
      url: "set_session.php",
      data: { stud_id: studId },
      success: function(response) {
        console.log("Session created with stud_id: " + studId);
        // Redirect to student_profile.php
        window.location.href = "student_profile.php";
      },
      error: function(xhr, status, error) {
        console.log("Error creating session: " + error);
      }
    });
  });
</script>

<div class="modal fade" id="form_modal" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<form method="POST" action="save_student.php">	
					<div class="modal-header">
						<h4 class="modal-title"><span class="fas fa-user-plus"></span> Add Student </h4>
					</div>

					<div class="modal-body">
						<div class="col-md-3"></div>
						<div class="col-md-6">
							<div class="form-group">
								<label> Student ID </label>
								<input type="text" name="stud_id" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label> Firstname</label>
								<input type="text" name="firstname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label> Middlename </label>
								<input type="text" name="middlename" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label> Lastname </label>
								<input type="text" name="lastname" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label> Gender </label>
								<select name="gender" class="form-control" required="required">
									<option value=""></option>
									<option value="Male">Male</option>
									<option value="Female">Female</option>
								</select>
							</div>
							<div class="form-group">
								<label> Batch </label>
								<input type="text" name="batch" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<label> Section </label>
								<input type="text" name="section" class="form-control" required="required"/>
							</div>
              <div class="form-group">
								<label> Advisor </label>
								<input type="text" name="advisor" class="form-control" required="required"/>
							</div>
							<div class="form-group">
								<input type="hidden" name="admin_id" value="<?=$_SESSION['admin_id']?>" class="form-control" required="required"/>
							</div>
							

						</div>
					</div>

					<div style="clear:both;"></div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="fas fa-times"></span> Close </button>
						<button name="save" class="btn btn-success" ><span class="fas fa-check"></span> Save </button>
					</div>

				</form>
			</div>

		</div>
	</div>

	</body>
</html>


