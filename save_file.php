<?php

	require_once 'conn.php';
	
	if(ISSET($_POST['save'])){
		$stud_id = $_POST['stud_id'];
        $filename = $_FILES['file']['name'];
		$file_description = $_POST['file_description'] . ' , ' . $_POST['lname'] . ' , ' . $_POST['batch'] . ' , ' . $_POST['section'];
		$file_type = $_FILES['file']['type'];
		$file_temp = $_FILES['file']['tmp_name'];
		$location = "files/".$stud_id."/".$filename;
		$date_uploaded = date("Y-m-d, h:i A", strtotime("+8 HOURS"));
		$who_uploaded = $_POST['admin_id'];
		if(!file_exists("files/".$stud_id)){
			mkdir("files/".$stud_id);
		}
		
		if(move_uploaded_file($file_temp, $location)){
			mysqli_query($con, "INSERT INTO `storage` VALUES('', '$filename', '$file_description',
															  '$file_type', '$date_uploaded', '$who_uploaded', '$stud_id')") or die(mysqli_error());
		
		echo "<script>alert('Successfully Added!')</script>";
		echo "<script>window.location = 'student_profile.php'</script>";
		}
	}
?>