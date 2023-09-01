<?php
// We need to use sessions, so you should always start sessions using the below code.
session_start();
// If the user is not logged in redirect to the login page...
if (!isset($_SESSION['loggedin'])) {
	header('Location: index.php');
	exit;
}
?>

<?php
// Include the conn.php file for MySQL database connection
require_once 'conn.php';


// Analyze the number of students per advisor
$advisorQuery = "SELECT advisor, COUNT(*) AS studentCount FROM student GROUP BY advisor";
$advisorResult = $con->query($advisorQuery);
$advisorData = array();

while ($row = $advisorResult->fetch_assoc()) {
    $advisorData[] = array(
        'advisor' => $row['advisor'],
        'studcount' => $row['studentCount']
    );
}

// Analyze the number of students per batch
$batchQuery = "SELECT batch, COUNT(*) AS studentCount FROM student GROUP BY batch";
$batchResult = $con->query($batchQuery);
$batchData = array();

while ($row = $batchResult->fetch_assoc()) {
    $batchData[] = array(
        'batch' => $row['batch'],
        'studcount' => $row['studentCount']
    );
}

// Analyze the number of students per section
$sectionQuery = "SELECT section, COUNT(*) AS studentCount FROM student GROUP BY section";
$sectionResult = $con->query($sectionQuery);
$sectionData = array();

while ($row = $sectionResult->fetch_assoc()) {
    $sectionData[] = array(
        'section' => $row['section'],
        'studcount' => $row['studentCount']
    );
}

// Analyze the number of students per gender
$genderQuery = "SELECT gender, COUNT(*) AS studentCount FROM student GROUP BY gender";
$genderResult = $con->query($genderQuery);
$genderData = array();

while ($row = $genderResult->fetch_assoc()) {
    $genderData[] = array(
        'gender' => $row['gender'],
        'studcount' => $row['studentCount']
    );
}

// Get the overall count of students
$overallCountQuery = "SELECT COUNT(*) AS overallCount FROM student";
$overallCountResult = $con->query($overallCountQuery);
$overallCountData = $overallCountResult->fetch_assoc();

// Close the MySQL connection
$con->close();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>LNCHS - FAS </title>
    <link href="css/style.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer">
    <link type="text/css" href="css/bootstrap.min.css" rel="stylesheet">
    <link type="text/css" href="css/bootstrap-table.css" rel="stylesheet">
    <link type="text/css" href="css/font-awesome.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.css" />
    
</head>

<style>
body {
    background-image: url(images/bg0.jpg);
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
					<a href="reports.php"> <i class="fa fa-print"></i> Reports </a>
					<a href="logout.php" onclick="return confirm('Are you sure you want to log out?')"><i class="fas fa-sign-out-alt"></i> Logout </a>
			</div>
		</div>

</div>
    </nav>
</header> 



<div class="container">
    <h2> <i class="fa-solid fa-users"></i> | Number of Students per Advisor</h2>
    <div class="content"></div>
    <canvas id="advisorChart"></canvas>
</div>

<div class="container">
    <h2> <i class="fa-solid fa-building-columns"></i> | Number of Students per School Year</h2>
    <div class="content"></div>
    <canvas id="batchChart"></canvas>
</div>

<div class="container">
    <h2><i class="fa-solid fa-chalkboard"></i> | Number of Students per Section</h2>
    <div class="content"></div>
    <canvas id="sectionChart"></canvas>
</div>

<div class="container">
    <h2><i class="fa-solid fa-venus-mars"></i> | Number of Students per Gender</h2>
    <div class="content"></div>
    <canvas id="genderChart"></canvas>
</div>

<div class="container">
    <h2><i class="fa-solid fa-users"></i> | Total Number of Students</h2>
    <div class="content"></div>
    <canvas id="totalStudentsChart"></canvas>
</div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
<script>


    // PHP data for the first bar chart (Students per Advisor)
    var advisorLabels = <?php echo json_encode(array_column($advisorData, 'advisor')); ?>;
    var advisorCounts = <?php echo json_encode(array_column($advisorData, 'studcount')); ?>;
    
    // Create data for the first bar chart (Students per Advisor)
    var advisorData = {
        labels: advisorLabels,
        datasets: [{
            label: 'Students per Advisor',
            data: advisorCounts,
            backgroundColor: '#ACB1D6',
            borderColor: '#8294C4',
            borderWidth: 2
        }]
    };

    // Create the first bar chart (Students per Advisor)
    var ctxAdvisor = document.getElementById('advisorChart').getContext('2d');
    var advisorChart = new Chart(ctxAdvisor, {
        type: 'bar',
        data: advisorData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });

    // Prepare data for the second bar chart (Students per Batch)
    var batchLabels = <?php echo json_encode(array_column($batchData, 'batch')); ?>;
    var batchCounts = <?php echo json_encode(array_column($batchData, 'studcount')); ?>;
    
    // Create data for the second bar chart (Students per Batch)
    var batchData = {
        labels: batchLabels,
        datasets: [{
            label: 'Students per School Year',
            data: batchCounts,
            backgroundColor: '#FFD89C',
            borderColor: '#F1C27B',
            borderWidth: 2
        }]
    };

    // Create the second bar chart (Students per Batch)
    var ctxBatch = document.getElementById('batchChart').getContext('2d');
    var batchChart = new Chart(ctxBatch, {
        type: 'bar',
        data: batchData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });

       // Prepare data for the third bar chart (Students per Section)
       var sectionLabels = <?php echo json_encode(array_column($sectionData, 'section')); ?>;
    var sectionCounts = <?php echo json_encode(array_column($sectionData, 'studcount')); ?>;
    
    // Create data for the third bar chart (Students per Section)
    var sectionData = {
        labels: sectionLabels,
        datasets: [{
            label: 'Students per Section',
            data: sectionCounts,
            backgroundColor: '#C3EDC0',
            borderColor: '#AAC8A7',
            borderWidth: 2
        }]
    };

    // Create the third bar chart (Students per Section)
    var ctxSection = document.getElementById('sectionChart').getContext('2d');
    var sectionChart = new Chart(ctxSection, {
        type: 'bar',
        data: sectionData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });

    // Prepare data for the fourth bar chart (Students per Gender)
    var genderLabels = <?php echo json_encode(array_column($genderData, 'gender')); ?>;
    var genderCounts = <?php echo json_encode(array_column($genderData, 'studcount')); ?>;
    
    // Create data for the fourth bar chart (Students per Gender)
    var genderData = {
        labels: genderLabels,
        datasets: [{
            label: 'Students per Gender',
            data: genderCounts,
            backgroundColor: ['#FF6384', '#36A2EB'], // Red for Female, Blue for Male
            borderColor: ['#FF6384', '#36A2EB'],
            borderWidth: 2
        }]
    };

   // Prepare data for the fourth bar chart (Students per Gender)
   var genderLabels = <?php echo json_encode(array_column($genderData, 'gender')); ?>;
    var genderCounts = <?php echo json_encode(array_column($genderData, 'studcount')); ?>;
    
    // Create data for the fourth bar chart (Students per Gender)
    var genderData = {
        labels: genderLabels,
        datasets: [{
            label: 'Students per Gender',
            data: genderCounts,
            backgroundColor: ['#FF6384', '#36A2EB'], // Red for Female, Blue for Male
            borderColor: ['#FF6384', '#36A2EB'],
            borderWidth: 2
        }]
    };

    // Create the fourth bar chart (Students per Gender)
    var ctxGender = document.getElementById('genderChart').getContext('2d');
    var genderChart = new Chart(ctxGender, {
        type: 'bar',
        data: genderData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });

    // Prepare data for the fifth bar chart (Total Number of Students)
    var totalStudentsLabels = ['Total Students'];
    var totalStudentsCounts = [<?php echo $overallCountData['overallCount']; ?>];
    
    // Create data for the fifth bar chart (Total Number of Students)
    var totalStudentsData = {
        labels: totalStudentsLabels,
        datasets: [{
            label: 'Total Number of Students',
            data: totalStudentsCounts,
            backgroundColor: '#ACB1D6',
            borderColor: '#8294C4',
            borderWidth: 2
        }]
    };

    // Create the fifth bar chart (Total Number of Students)
    var ctxTotalStudents = document.getElementById('totalStudentsChart').getContext('2d');
    var totalStudentsChart = new Chart(ctxTotalStudents, {
        type: 'bar',
        data: totalStudentsData,
        options: {
            scales: {
                y: {
                    beginAtZero: true,
                    precision: 0
                }
            }
        }
    });
    
</script>
</body>
</html>
