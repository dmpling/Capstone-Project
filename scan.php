<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['stud_id'])) {
    header('Location: index.html');
    exit;
}
require_once 'conn.php';
// We don't have the password or email info stored in sessions, so instead, we can get the results from the database.
$stmt = $con->prepare('SELECT stud_id, firstname, middlename, lastname, gender, batch, section FROM student WHERE stud_id = ?');
// In this case, we can use the account ID to get the account info.
$stmt->bind_param('s', $_SESSION['stud_id']);
$stmt->execute();
$stmt->bind_result($stud_id, $firstname, $middlename, $lastname, $gender, $batch, $section);
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
    <script src="scannerjs/scanner.js" type="text/javascript"></script>

		<script>
        /** Initiates a scan */
        function scanToJpg() {
            scanner.scan(displayImagesOnPage,
                    {
                        "output_settings": [
                            {
                                "type": "return-base64",
                                "format": "jpg"
                            }
                        ]
                    }
            );
        }

        /** Processes the scan result */
        function displayImagesOnPage(successful, mesg, response) {
            if (!successful) { // On error
                console.error('Failed: ' + mesg);
                return;
            }

            if (successful && mesg != null && mesg.toLowerCase().indexOf('user cancel') >= 0) { // User cancelled.
                console.info('User cancelled');
                return;
            }

            var scannedImages = scanner.getScannedImages(response, true, false); // returns an array of ScannedImage
            for (var i = 0; (scannedImages instanceof Array) && i < scannedImages.length; i++) {
                var scannedImage = scannedImages[i];
                processScannedImage(scannedImage);
            }
        }

        /** Images scanned so far. */
        var imagesScanned = [];

        function processScannedImage(scannedImage) {
            imagesScanned.push(scannedImage);
            var elementImg = scanner.createDomElementFromModel({
                'name': 'img',
                'attributes': {
                    'class': 'scanned',
                    'src': scannedImage.src
                }
            });
            document.getElementById('images').appendChild(elementImg);

            // Set the values of hidden input fields for submission
            var hiddenFileInput = document.getElementById('file');
            hiddenFileInput.value = scannedImage.src; // Set the scanned image source as the file value

            var fileTypeInput = document.getElementById('file_type');
            fileTypeInput.value = "image/jpeg"; // Set the file type as "image/jpeg"
        }

        /** Upload scanned images by submitting the form */
        function submitFormWithScannedImages() {
            if (imagesScanned.length > 0) {
                var scannedImage = imagesScanned[0];
                document.getElementById('file').value = scannedImage.src; // Set the file input value to the scanned image source

                if (scanner.submitFormWithImages('form1', imagesScanned, function(xhr) {
                    if (xhr.readyState == 4) { // 4: request finished and response is ready
                        if (xhr.status == 200) { // Successful response from server
                            alert("Response from the server:\n" + xhr.responseText);
                            document.getElementById('images').innerHTML = ''; // clear images
                            imagesScanned = [];
                            document.getElementById('form1').reset(); // Reset the form
                        } else {
                            alert("Error: " + xhr.status);
                        }
                    }
                })) {
                    document.getElementById('server_response').innerHTML = "Submitting, please stand by ...";
                } else {
                    document.getElementById('server_response').innerHTML = "Form submission cancelled. Please scan first.";
                }
            } else {
                document.getElementById('server_response').innerHTML = "No images scanned.";
            }
        }
    </script>
    

    <style>
        img.scanned {
            height: 200px; /** Sets the display size */
            margin-right: 12px;
        }

        div#images {
            margin-top: 20px;
        }
    </style>
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
					<a href="reports.php"> <i class="fa fa-print"></i> Generate Reports </a>
					<a href="logout.php" onclick="return confirm('Are you sure you want to log out?')"><i class="fas fa-sign-out-alt"></i> Logout </a>
			</div>
		</div>

</div>
    </nav>
    
<div class="container">
    <h2> i-Scan: (Scan JPG to Form and then Submit) </h2>

    <div class="content"></div>	
    <div class="scanner-ui">

        <a href="student_profile.php" class="scanner-btn-back btn-danger">
            <i class="fas fa-chevron-left"></i> Go Back
        </a>

        <br>
        
        <button class="scanner-btn-scan btn-primary" type="button" onclick="scanToJpg();"><span class="fa fa-print"></span >  | Scan </button>

        <center><div id="images"></div></center>

        <form id="form1" action="scan_file.php" method="POST" enctype="multipart/form-data" target="_blank">
            <center>
                <input type="hidden" name="file" id="file" value="images">
                <label style="color: black; font-weight: bold; margin-bottom: 10px; font-size: 14px"> Filename: </label>
                <br>    
                <select name="filename" id="filename" style="width: 26%; padding: 10px; margin-bottom: 15px; border: 1.5px solid rgb(10, 137, 222); border-radius: 5px; color: black;" required="required" placeholder="Select document type">
                    <option value="Form 137">Form 137</option>
                    <option value="Birth Certificate">Birth Certificate</option>
                    <option value="Certification of Good Moral Character">Certification of Good Moral Character</option>
                    <option value="Others">Others</option>
                </select>


                <input type="hidden" name="file_type" id="file_type" value="">
                <input type="hidden" name="stud_id" value="<?=$_SESSION['stud_id']?>"/>
                <input type="hidden" name="admin_id" value="<?=$_SESSION['admin_id']?>"/>
                <input type="hidden" name="lname" value="<?=$lastname?>"/>
                <input type="hidden" name="batch" value="<?=$batch?>"/>
                <input type="hidden" name="section" value="<?=$section?>"/>
                <input type="text" name="file_description" class="form-control" required="required" value="" placeholder="Insert File Description"/>
                <input  type="button" class="fas fa-light fa-note-sticky btn-primary" value="Submit" onclick="submitFormWithScannedImages();"></span> 
            </center>
        </form>
        
        
        <style>
            .asprise-footer, .asprise-footer a:visited { font-family: Arial, Helvetica, sans-serif; color: #999; font-size: 13px; }
            .asprise-footer a {  text-decoration: none; color: #999; }
            .asprise-footer a:hover {  padding-bottom: 2px; border-bottom: solid 1px #9cd; color: #06c; }
        </style>
    </div>    
</div>


</div>
</body>
</html>
