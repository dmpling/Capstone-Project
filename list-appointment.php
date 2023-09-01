<?php 
	require 'conn.php';
 		
 		$sqltran = mysqli_query($con, "SELECT * FROM appointment ")or die(mysqli_error($con));
		$arrVal = array();
 		
		$i=1;
 		while ($rowList = mysqli_fetch_array($sqltran)) {
 								 
						$name = array(
								'appointment_id' => $rowList['appointment_id'],
                                'ref_no'=> $rowList['ref_no'],
 	 		 	 				'name'=> $rowList['name'],
                                'email'=> $rowList['email'],
	 		 	 				'contact'=> $rowList['contact'],
                                'type_docu'=> $rowList['type_docu'],
                                'purpose'=> $rowList['purpose'],
                                'name_stud'=> $rowList['name_stud'],
                                'date'=> $rowList['date'],
								'date_requested' => $rowList['date_requested']
 	 		 	 			);		


							array_push($arrVal, $name);	
			$i++;			
	 	}
	 		 echo  json_encode($arrVal);		
 

	 	mysqli_close($con);
?>   
 