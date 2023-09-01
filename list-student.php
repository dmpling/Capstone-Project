<?php 
	require 'conn.php';
 		
 		$sqltran = mysqli_query($con, "SELECT * FROM student ")or die(mysqli_error($con));
		$arrVal = array();
 		
		$i=1;
 		while ($rowList = mysqli_fetch_array($sqltran)) {
 								 
						$name = array(
								'stud_id' => $rowList['stud_id'],
 	 		 	 				'first'=> $rowList['firstname'],
                                'mid'=> $rowList['middlename'],
	 		 	 				'last'=> $rowList['lastname'],
                                'gender'=> $rowList['gender'],
                                'batch'=> $rowList['batch'],
                                'section'=> $rowList['section'],
								'advisor'=> $rowList['advisor']
 	 		 	 			);		


							array_push($arrVal, $name);	
			$i++;			
	 	}
	 		 echo  json_encode($arrVal);		
 

	 	mysqli_close($con);
?>   
 