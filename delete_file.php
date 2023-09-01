<?php
require_once 'conn.php';
	if(ISSET($_POST['store_id'])){
		$store_id = $_POST['store_id'];
		$query = mysqli_query($con, "SELECT * FROM `storage` WHERE `store_id` = '$store_id'") or die(mysqli_error($con));
		$fetch  = mysqli_fetch_array($query);
		$filename = $fetch['filename'];
		$stud_id = $fetch['stud_id'];
		if(unlink("files/".$stud_id."/".$filename)){
			mysqli_query($con, "DELETE FROM `storage` WHERE `store_id` = '$store_id'") or die(mysqli_error($con));
		}
	}
?>