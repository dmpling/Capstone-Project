<?php 
	require 'conn.php';
 		
 		$sqltran = mysqli_query($con, "SELECT * FROM admins ")or die(mysqli_error($con));
		$arrVal = array();
 		
		$i=1;
 		while ($rowList = mysqli_fetch_array($sqltran)) {
 								 
						$name = array(
								'num' => $rowList['admin_id'],
 	 		 	 				'first'=> $rowList['firstname'],
	 		 	 				'last'=> $rowList['lastname'],
                                'user'=> $rowList['username'],
                                'email'=> $rowList['email'],
                                'position'=> $rowList['position']
 	 		 	 			);		


							array_push($arrVal, $name);	
			$i++;			
	 	}
	 		 echo  json_encode($arrVal);		
 

	 	mysqli_close($con);
?>   
 