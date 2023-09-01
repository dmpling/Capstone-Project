<?php 
	require 'conn.php';
 		
 		$sqltran = mysqli_query($con, "SELECT * FROM reports ")or die(mysqli_error($con));
		$arrVal = array();
 		
		$i=1;
 		while ($rowList = mysqli_fetch_array($sqltran)) {
 								 
						$name = array(
								'report_id' => $rowList['report_id'],
                                'ref_no'=> $rowList['ref_no'],
 	 		 	 				'name'=> $rowList['name'],
                                'email'=> $rowList['email'],
	 		 	 				'contact'=> $rowList['contact'],
                                'type_docu'=> $rowList['type_docu'],
                                'purpose'=> $rowList['purpose'],
                                'name_stud'=> $rowList['name_stud'],
                                'appointment_date'=> $rowList['appointment_date'],
								'received_date' => $rowList['received_date'],
								'appointment_id' => $rowList['appointment_id']
								
 	 		 	 			);		


							array_push($arrVal, $name);	
			$i++;			
	 	}
	 		 echo  json_encode($arrVal);		
 

	 	mysqli_close($con);
?>   
 