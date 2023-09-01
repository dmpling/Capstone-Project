<?php 
session_start();
	require 'conn.php';
 		
 		$sqltran = mysqli_query($con, "SELECT * FROM `storage` WHERE `stud_id` = '$_SESSION[stud_id]'")or die(mysqli_error($con));
		$arrVal = array();
 		
		$i=1;
 		while ($rowList = mysqli_fetch_array($sqltran)) {
 								 
						$name = array(
								'store_id' => $rowList['store_id'],
 	 		 	 				'filename'=> $rowList['filename'],
                                'file_desc'=> $rowList['file_description'],
	 		 	 				'file_type'=> $rowList['file_type'],
                                'date_up'=> $rowList['date_uploaded'],
                                'who_up'=> $rowList['who_uploaded'],
                                
 	 		 	 			);		


							array_push($arrVal, $name);	
			$i++;			
	 	}
	 		 echo  json_encode($arrVal);		
 

	 	mysqli_close($con);
?>   