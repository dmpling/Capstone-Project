<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['stud_id'])) {
    header('Location: index.html');
    exit;
}

require_once 'conn.php';

// Fetch student information
$stmt = $con->prepare('SELECT stud_id, firstname, middlename, lastname, gender, batch, section, advisor, admin_id FROM student WHERE stud_id = ?');
$stmt->bind_param('s', $_SESSION['stud_id']);
$stmt->execute();
$stmt->bind_result($stud_id, $firstname, $middlename, $lastname, $gender, $batch, $section, $advisor, $admin_id);
$stmt->fetch();
$stmt->close();

// Fetch files associated with the student
$sqltran = mysqli_query($con, "SELECT * FROM `storage` WHERE `stud_id` = '$_SESSION[stud_id]'") or die(mysqli_error($con));
$arrVal = array();

while ($rowList = mysqli_fetch_array($sqltran)) {
    $name = array(
        'store_id' => $rowList['store_id'],
        'filename' => $rowList['filename'],
        'file_desc' => $rowList['file_description'],
        'file_type' => $rowList['file_type'],
        'date_up' => $rowList['date_uploaded'],
        'who_up' => $rowList['who_uploaded'],
    );

    array_push($arrVal, $name);
}

// Add the $required_documents array 
$required_documents = array(
    "Birth Certificate",
    "Form 137",
    "Certification of Good Moral"
);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LNCHS- FAS</title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
    <link type="text/css" href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
    <script src="scannerjs/scanner.js" type="text/javascript"></script>
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
		<h2> Student Profile: </h2>

		<div class="content">

			<div class="content-stud-info">

				<div class="sp-option">
					<button class="sp-option-btn"> Account Settings <span class="fa fa-cog"></span> </button>
					<div class="sp-option-content">
						<button class="sp-update-option btn-warning" data-toggle="modal" data-target="#edit_modal<?=$_SESSION['stud_id']?>" type="button"><span class="fa fa-pencil-square-o"></span> | Update </button>
						<button class="sp-delete-option btn-danger btn-delete" id="<?=$_SESSION['stud_id']?>" type="button"><span class="fa fa-trash"></span> | Delete </button>
					</div>
				</div>

        <a href="student.php" class="content-stud-info-btn-back btn-danger">
            <i class="fas fa-chevron-left"></i> Go Back
        </a>


				<h2> <span class="id-logo far fa-id-card"> STUDENT'S INFORMATION: </h2>

<!-- div for class="content-stud-info-head" -->
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

    <table>
        <tr>
            <td class="description">LRN:</td>
            <td><?= $stud_id ?></td>
        </tr>
        <tr>
            <td class="description">Full Name:</td>
            <td><?= $firstname ?> <?= $middlename ?> <?= $lastname ?></td>
        </tr>
        <tr>
            <td class="description">Gender:</td>
            <td><?= $gender ?></td>
        </tr>
        <tr>
            <td class="description">School Year:</td>
            <td><?= $batch ?></td>
        </tr>
        <tr>
            <td class="description">Section:</td>
            <td><?= $section ?></td>
        </tr>
        <tr>
            <td class="description">Advisor:</td>
            <td><?= $advisor ?></td>
        </tr>
    </table>

    <!-- Display checklist of required documents -->
<h4>Required Documents Checklist:</h4>
<ul>
    <?php foreach ($required_documents as $document) : ?>
        <li>
            <?php echo $document; ?>
            <?php if (!empty($arrVal) && is_array($arrVal) && count($arrVal) > 0) : ?>
                <?php $found = false; ?>
                <?php foreach ($arrVal as $fileData) : ?>
                    <?php if (strpos($fileData['filename'], $document) !== false) : ?>
                        <span style="color: green;">(Uploaded)</span>
                        <?php $found = true; ?>
                        <?php break; ?>
                    <?php endif; ?>
                <?php endforeach; ?>
                <?php if (!$found) : ?>
                    <span style="color: red;">(Not Yet Uploaded)</span>
                <?php endif; ?>
            <?php else : ?>
                <span style="color: red;">(Not Yet Uploaded)</span>
            <?php endif; ?>
        </li>
    <?php endforeach; ?>
</ul>
</div><!-- div for class="content-stud-info-head" -->


				<h4> Upload/Import File: </h4>
 
				<form method="POST" enctype="multipart/form-data" action="save_file.php">
					<input type="file" name="file" size="10" style="background-color: white ;" required="required" />
					<label> Description. </label>
					<input type="hidden" name="stud_id" value="<?=$_SESSION['stud_id']?>" />
					<input type="hidden" name="admin_id" value="<?=$_SESSION['admin_id']?>" />
         
          <br>
					<select type="text" name="file_description" class="form-control" required="required" placeholder="Insert Description">
                    <option value="Form 137">Form 137</option>
                    <option value="Birth Certificate">Birth Certificate</option>
                    <option value="Certification of Good Moral Character">Certification of Good Moral Character</option>
                    <option value="Others">Others</option>
          </select>
					<br>
          <input type="hidden" name="lname" value="<?=$lastname?>"/>
          <input type="hidden" name="batch" value="<?=$batch?>"/>
          <input type="hidden" name="section" value="<?=$section?>"/>
					<button class="btn btn-success" name="save"><span class="fas fa-paper-plane-o"></span> | Add File </button>
					<button onclick="redirectToScanPage()" class="btn btn-primary"><span class="fa fa-print"></span> | Scan </button>
				</form>

				<table id="table" data-show-columns="false" data-height="450"></table>
			</div><!-- div for class="content-stud-info" -->
		</div><!-- div for class="content" -->
	</div><!-- div for class="container" -->

	<script>
		function redirectToScanPage() {
			window.location.href = "scan.php";
		}
	</script>

	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/bootstrap-table.js"></script>

	<script type="text/javascript">
  var $table = $('#table');
  $table.bootstrapTable({
    url: 'list-file.php',
    search: true,
    pagination: true,
    buttonsClass: 'primary',
    showFooter: true,
    minimumCountColumns: 2,
    columns: [
      {
        field: 'store_id',
        title: 'Store ID',
        sortable: true,
      },
      {
        field: 'filename',
        title: 'File Name',
        sortable: true,
      },
      {
        field: 'file_desc',
        title: 'File Description',
        sortable: true,
      },
      {
        field: 'file_type',
        title: 'File Type',
        sortable: true,
      },
      {
        field: 'date_up',
        title: 'Date Uploaded',
        sortable: true,
      },
      {
        field: 'who_up',
        title: 'Who Uploaded',
        sortable: true,
      },
      {
        field: 'actions',
        title: 'Actions',
        formatter: function(value, row, index) {
          var storeId = row.store_id;
          var view_downloadButton = '<button class="view-download btn-primary" data-store-id="' + storeId + '"> <i class="fa-solid fa-file-arrow-down"></i> | View / Download </button>';
          var removeButton = '<button class="remove btn-danger" data-store-id="' + storeId + '"> <i class="fa-solid fa-trash"></i> | Remove </button>';
          return view_downloadButton + '' + removeButton ;
        },
        events: {
          'click .view-download': function(e, value, row, index) {
            var storeId = row.store_id;
            // Perform file view-download
            window.open('print.php?store_id=' + storeId, '_blank');
          },
          'click .remove': function(e, value, row, index) {
            var $button = $(e.target);
            var storeId = $button.data('store-id');
            var $row = $button.closest('tr');

            // Display a confirmation dialog
            var confirmDelete = confirm('Are you sure you want to remove the file?');

            if (confirmDelete) {
              // Fade out the row
              $row.fadeOut(500, function() {
                // Perform the deletion and display the result
                $.ajax({
                  type: 'POST',
                  url: 'delete_file.php',
                  data: { store_id: storeId }, 
                  success: function(response) {
                    // Show success message
                    alert('Deletion successful.');
                    location.reload();
                    // You can perform additional actions or update the table as needed.
                  },
                  error: function(xhr, status, error) {
                    // Show error message
                    alert('Deletion failed. Please try again.');
                    console.log('Error deleting data: ' + error);
                    // Fade in the row in case of error
                    $row.fadeIn();
                  }
                });
              });
            }
          }
        }
      }
    ],
  });
</script>




<div class="modal fade" id="edit_modal<?=$_SESSION['stud_id']?>" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<form method="POST" action="update_student.php">	
									<div class="modal-header">
										<h4 class="modal-title">Update User</h4>
									</div>
									<div class="modal-body">
										<div class="col-md-3"></div>
										<div class="col-md-6">
							<div class="form-group">
								<label> Student ID: </label>
								<input type="text" name="stud_id" class="form-control" value = "<?php echo $stud_id ?>"  readonly="readonly"/>
							</div>
							<div class="form-group">
								<label> Firstname</label>
								<input type="text" name="firstname" class="form-control" value = "<?php echo $firstname ?>" required="required"/>
							</div>
							<div class="form-group">
								<label> Middlename: </label>
								<input type="text" name="middlename" class="form-control" value = "<?php echo $middlename ?>" required="required"/>
							</div>
							<div class="form-group">
								<label> Lastname: </label>
								<input type="text" name="lastname" class="form-control" value = "<?php echo $lastname ?>" required="required"/>
							</div>
							<div class="form-group">
    							<label>Gender:</label>
    								<select name="gender" class="form-control" required="required">
       								<option value="Male" <?php if ($gender === 'Male') echo 'selected'; ?>>Male</option>
       								<option value="Female" <?php if ($gender === 'Female') echo 'selected'; ?>>Female</option>
    								</select>
							</div>
							<div class="form-group">
								<label> Batch: </label>
								<input type="text" name="batch" class="form-control" value = "<?php echo $batch?>" required="required"/>
							</div>
							<div class="form-group"> 
								<label> Section: </label>
								<input type="text" name="section" class="form-control" value = "<?php echo $section ?>" required="required"/>
							</div>
							<div class="form-group">
								<label> Advisor: </label>
								<input type="text" name="advisor" class="form-control" value = "<?php echo $advisor ?>" required="required"/>
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
					
	<div class="modal fade" id="modal_confirm" aria-hidden="true">
		<div class="modal-dialog modal-dialog-centered">
			<div class="modal-content">
				<div class="modal-header">
					<h3 class="modal-title">System</h3>
				</div>
				<div class="modal-body">
					<center>
						<h4 class="text-danger">All files of the student will also be deleted.</h4>
					</center>
					<center>
						<h3 class="text-danger">Are you sure you want to delete this data?</h3>
					</center>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					<button type="button" class="btn btn-success" id="btn_yes">Yes</button>
				</div>
			</div>
		</div>
	</div>




	
</body>

</html>
