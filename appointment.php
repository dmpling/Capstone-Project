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
    
</head>

<style>
body {
    background-image: url(images/min-bg.jpg);
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
            <a class="label-home" href="appointment.php" style="color: #ffffff; font-size: 24px;"> LNCHS-FAS </a>
            <h4 class="navtop-logo-desc"> Lopez National Comprehensive High School | File Archiving System </h4>
            </label>
        </div>
        <div class="content-divider"></div>
        <div class="sidebar">
   
	

</div>
    </nav>
</header>	

    
    <div class="container">

    	<h2> LNCHS - FAS: iGetDocuments </h2>
            

		<div class="content"></div>	

        <button class="content-apt-btn btn-danger" onclick="redirectToAppointmentHome()">
            <a class="apt-btn-a" href="appointment-home.php"><i class="fas fa-chevron-left"></i> Go Back </a>
        </button>

        <script>
        function redirectToAppointmentHome() {
            window.location.href = "appointment-home.php";
        }
        </script>

		<div class="panel panel-primary">
			<div class="panel-heading "> Please insert your details so we can process your request.</div>
						
        <div class="content-req">  
            <center>
            <form method="POST" action="booking.php">
                
                <label> Student No. or LRN (if any): </label>
                <input type="text" name="ref_no" />

                <label> Full Name: </label>
                <input type="text" name="name" required="required"/>

                <label> Email: </label>
                <input type="text" name="email" required="required"/>

                <label> Contact No: </label>
                <input type="text" name="contact" required="required"/>

                <label> Type of Document: </label>
                <select name="type_docu" required="required">
                    <option value=""> Select Documents </option>
                    <option value="Form 137/SF-10"> Form 137/SF-10 </option>
                    <option value="Birth Certificate"> Birth Certificate </option>
                    <option value="Cerification of Good Moral Character"> Certification of Good Moral Character </option>
                    
                </select>

                <label> Purpose: </label>
                <input type="text" name="purpose" required="required"/>

                <label> Name of Student (In Case of Parent or Guardian) </label>
                <input type="text" name="name_stud" />

                <label> Date: </label>
                <input type="date" name="date" required="required"/>

               
                <br>
                <button class="submit-req btn-primary" name="save"> Confirm </button>
            </form>
            </center>

</body>
</html>