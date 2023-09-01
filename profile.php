<?php
    session_start();

    if (!isset($_SESSION['loggedin'])) {
        header('Location: index.html');
        
        exit;
    }

    require_once 'conn.php';

    $admin_id = $_SESSION['admin_id'];

    $stmt = $con->prepare('SELECT firstname, lastname, username, email, password, employee_id, position FROM admins WHERE admin_id = ?');
    $stmt->bind_param('s', $admin_id);
    $stmt->execute();
    $stmt->bind_result( $firstname, $lastname, $username, $email, $password, $employee_id, $position);
    $stmt->fetch();
    $stmt->close();
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
		<a href="appoint.php"><i class="fa fa-inbox"></i> List of Request </a>
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
        <h2> Profile: </h2>

        <div class="content"></div>

        <div class="content-stud-info">

        <div class="sp-option">
					<button class="sp-option-btn"> Account Settings <span class="fa fa-cog"></span> </button>
					<div class="sp-option-content">
						<button class="sp-update-option btn-warning" data-toggle="modal" data-target="#edit_modal<?=$_SESSION['admin_id']?>" type="button"><span class="fa fa-pencil-square-o"></span> | Update </button>
						<button class="sp-delete-option btn-danger btn-delete" id="<?=$_SESSION['admin_id']?>" type="button"><span class="fa fa-trash"></span> | Delete </button>
					</div>
				</div>

        <div class="panel panel-primary">
            <div class="panel-heading ">
                <h4> Your account details are below: </h4>
            </div>

            <div class="panel-body">
                <div class="row">
                    <div class="col-md-12">
                        <div>
                        <style>
                        .description {
                         text-align: right;
                        padding-right: 10px;
                        }
    
                     td {
                            padding-bottom: 5px;
                        }
                        </style>

                    <table>
                     <tr>
                            <td class="description"><b>Username:</b></td>
                            <td><?php echo $_SESSION['name'] ?></td>
                        </tr>
                        <tr>
                            <td class="description"><b>Email:</b></td>
                            <td><?php echo $email ?></td>
                        </tr>
                        <tr>
                            <td class="description"><b>Position:</b></td>
                            <td><?php echo $position ?></td>
                        </tr>
                        <tr>
                            <td class="description"><b>Admin ID:</b></td>
                            <td><?php echo $admin_id ?></td>
                        </tr>
                        <tr>
                            <td class="description"><b>Employee ID:</b></td>
                            <td><?php echo $employee_id ?></td>
                        </tr>
                    </table>


                </div>

                        <table id="table" data-show-columns="false" data-height="460"></table>
                    </div>
                </div>
            </div>
        </div>
        

        <div class="panel panel-default">
            <div class="panel-heading ">
                <h4><img src="images/mission.png"> | Mission: </h4>
            </div>
            <p>A specialized secondary school with a comprehensive, academic and technology-oriented curriculum capable of
                transforming students into productive, achievement-oriented and service-oriented citizens of the land.
            </p>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading ">
                <h4><img src="images/vision.png"> | Vision: </h4>
            </div>
            <p>
                Transformation of enlightened and skilled young boys and girls into productive citizens ready to meet life's challenges
                and work towards the optimum development of themselves, their family and their community.
            </p>
        </div>
        
        <div class="panel panel-default">
            <div class="panel-heading ">
                <h4><img src="images/about.png"> | About </h4>
            </div>
            <p> LNCHS-FAS or Lopez National Comprehensive High School - File Archiving System.
            </p>
        </div>
    </div>
    </div>

    <script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>

    <div class="modal fade" id="modal_confirm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center><h4 class="text-danger">Are you sure you want to delete this account?</h4></center>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" id="btn_yes">Yes</button>
				</div>
			</div>
		</div>
	</div>

    <div class="modal fade" id="edit_modal<?=$_SESSION['admin_id']?>" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<form method="POST" action="update_user.php">	
									<div class="modal-header">
										<h4 class="modal-title">Update User</h4>
									</div>
									<div class="modal-body">
										<div class="col-md-3"></div>
										<div class="col-md-6">
							<div class="form-group">
								<label> Admin ID: </label>
								<input type="text" name="admin_id" class="form-control" value = "<?php echo $admin_id ?>"  readonly="readonly"/>
							</div>
							<div class="form-group">
								<label> Firstname</label>
								<input type="text" name="firstname" class="form-control" value = "<?php echo $firstname ?>" required="required"/>
							</div>
							<div class="form-group">
								<label> Lastname: </label>
								<input type="text" name="lastname" class="form-control" value = "<?php echo $lastname ?>" required="required"/>
							</div>
							<div class="form-group">
								<label> Username: </label>
								<input type="text" name="username" class="form-control" value = "<?php echo $username ?>" required="required"/>
							</div>
							<div class="form-group">
								<label> Email: </label>
								<input type="text" name="email" class="form-control" value = "<?php echo $email ?>" required="required"/>
							</div>
							<div class="form-group">
								<label> Password: </label>
								<input type="password" name="password" class="form-control" value = "***************" required="required"/>
							</div>
							<div class="form-group"> 
								<label> Employee ID: </label>
								<input type="text" name="employee_id" class="form-control" value = "<?php echo $employee_id ?>" required="required"/>
							</div>
							<div class="form-group">
								<label> Position: </label>
								<input type="text" name="position" class="form-control" value = "<?php echo $position ?>" required="required"/>
							</div>

						</div>
									</div>
									<div style="clear:both;"></div>
									<div class="modal-footer">
										<button type="button" class="btn btn-danger" data-dismiss="modal"><span class="glyphicon glyphicon-remove"></span> Close</button>
										<button name="edit" class="btn btn-warning" ><span class="glyphicon glyphicon-save"></span> Update</button>
									</div>
								</form>
							</div>
						</div>
					</div>
					

<script type="text/javascript">
$(document).ready(function() {
    $('.btn-delete').on('click', function() {
        var admin_id = $(this).attr('id');
        $("#modal_confirm").modal('show');
        $('#btn_yes').attr('data-admin-id', admin_id);
    });

    $('#btn_yes').on('click', function() {
        var admin_id = $(this).attr('data-admin-id');
        $.ajax({
            type: "POST",
            url: "delete_user.php",
            data: {
                admin_id: admin_id
            },
            success: function(response) {
                $("#modal_confirm").modal('hide');
                if (response === "success") {
                    alert("Deleted Successfully!");
                    window.location.href = "index.php";
                } else {
                    alert("An error occurred. Please try again.");
                }
            }
        });
    });
});
</script>
</body>
</html>
