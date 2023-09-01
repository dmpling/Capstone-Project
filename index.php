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
		
	</head>

    <style>
       body {background-image: url(images/bg.jpg); 
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
			background-attachment: fixed;
        }
    </style> 

</style>

<nav class="navtop-lgn">	
			<label class="navtop-logo-lgn"> <img src="images/logo.png"> LNCHS-FAS </label>
			<h4 class="navtop-logo-desc-lgn"> Lopez National Comprehensive High School | File Archiving System </h4>
</nav>		
 




		<nav class="navbar navbar-expand-lg navbar-fixed-top" >

				<div class="login">
				

					<div>
						<center>
						<h2> Welcome! </h2>
						<p> Login to start your session. </p>
						</center>
					</div>

						<form action="authenticate.php" method="post">
						
							<label for="username">
								<i class="fas fa-user"></i>
							</label>
							<input type="text" name="username" placeholder="Username" id="username" required>
							<label for="password">
								<i class="fas fa-lock"></i>
							</label>
							<input type="password" name="password" placeholder="Password" id="password" required>
							<input type="submit" value="Login">
						</form> 
						<h5> <a class="terms" href="forgot_password.php" style="color:  #ff0000"></style> Forgot Password? </a> </h5>
						<br>
						<div> 
							<center>
							<h5> By using this service, you understood and agree to the LNCHS-FAS Services </h5>
							<h5> <a class="terms" href="#" style="color:  #ff0000"></style> Terms of Use </a> </h5>
							<h5> and </h5>
							</h5> <a class="privacy" href="#" style="color:  #ff0000"> Privacy Statement </a> </h5>
							</center>
						</div>
				
				</div>			
		</nav>

	</body>
</html>