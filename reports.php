<?php
//  conn.php file to establish the database connection
include 'conn.php';

// SQL queries
$sql_students = "SELECT COUNT(*) as total_students FROM student";
$sql_advisors = "SELECT COUNT(DISTINCT advisor) as total_advisors FROM student";
$sql_sections = "SELECT COUNT(DISTINCT section) as total_sections FROM student";
$sql_batches = "SELECT COUNT(DISTINCT batch) as total_batches FROM student";
$sql_appointments = "SELECT COUNT(*) as total_appointments FROM appointment";

// Queries to count students with required documents
$sql_students_with_form_137 = "SELECT COUNT(DISTINCT stud_id) as students_with_form_137 FROM student
                               WHERE stud_id IN (SELECT stud_id FROM storage WHERE filename LIKE '%Form 137%')";

$sql_students_with_birth_certificate = "SELECT COUNT(DISTINCT stud_id) as students_with_birth_certificate FROM student
                                        WHERE stud_id IN (SELECT stud_id FROM storage WHERE filename LIKE '%Birth Certificate%')";

$sql_students_with_good_moral = "SELECT COUNT(DISTINCT stud_id) as students_with_good_moral FROM student
                                 WHERE stud_id IN (SELECT stud_id FROM storage WHERE filename LIKE '%Certification of Good Moral Character%')";

// Queries to count students without required documents
$sql_form_137_missing = "SELECT COUNT(DISTINCT stud_id) as form_137_missing FROM student
                         WHERE stud_id NOT IN (SELECT stud_id FROM storage WHERE filename LIKE '%Form 137%')";
$sql_birth_certificate_missing = "SELECT COUNT(DISTINCT stud_id) as birth_certificate_missing FROM student
                                  WHERE stud_id NOT IN (SELECT stud_id FROM storage WHERE filename LIKE '%Birth Certificate%')";
$sql_good_moral_missing = "SELECT COUNT(DISTINCT stud_id) as good_moral_missing FROM student
                           WHERE stud_id NOT IN (SELECT stud_id FROM storage WHERE filename LIKE '%Certification of Good Moral Character%')";


// Query to count students with all three required documents
$sql_all_documents_present = "SELECT COUNT(DISTINCT stud_id) as all_documents_present FROM student
                              WHERE stud_id IN (
                                  SELECT stud_id FROM storage WHERE filename LIKE '%Form 137%'
                                  INTERSECT
                                  SELECT stud_id FROM storage WHERE filename LIKE '%Birth Certificate%'
                                  INTERSECT
                                  SELECT stud_id FROM storage WHERE filename LIKE '%Certification of Good Moral Character%'
                              )";

// Query to count students without all three required documents
$sql_without_all_documents = "SELECT COUNT(DISTINCT stud_id) as without_all_documents FROM student
                              WHERE stud_id NOT IN (
                                  SELECT stud_id FROM storage WHERE filename LIKE '%Form 137%'
                                  INTERSECT
                                  SELECT stud_id FROM storage WHERE filename LIKE '%Birth Certificate%'
                                  INTERSECT
                                  SELECT stud_id FROM storage WHERE filename LIKE '%Certification of Good Moral Character%'
                              )";

// Execute queries and fetch results
$result_students = $con->query($sql_students);
$result_advisors = $con->query($sql_advisors);
$result_sections = $con->query($sql_sections);
$result_batches = $con->query($sql_batches);
$result_appointments = $con->query($sql_appointments);
$result_form_137_missing = $con->query($sql_form_137_missing);
$result_birth_certificate_missing = $con->query($sql_birth_certificate_missing);
$result_good_moral_missing = $con->query($sql_good_moral_missing);
$result_all_documents_present = $con->query($sql_all_documents_present);
$result_without_all_documents = $con->query($sql_without_all_documents);
$result_students_with_form_137 = $con->query($sql_students_with_form_137);
$result_students_with_birth_certificate = $con->query($sql_students_with_birth_certificate);
$result_students_with_good_moral = $con->query($sql_students_with_good_moral);

//Fetch results
$total_students = $result_students->fetch_assoc()['total_students'];
$total_documents_present = $result_all_documents_present->fetch_assoc()['all_documents_present'];
$total_without_all_documents = $result_without_all_documents->fetch_assoc()['without_all_documents'];
$percentage_with_all_documents = ($total_documents_present / $total_students) * 100;
$percentage_without_all_documents = ($total_without_all_documents / $total_students) * 100;
$total_students_with_form_137 = $result_students_with_form_137->fetch_assoc()['students_with_form_137'];
$total_students_with_birth_certificate = $result_students_with_birth_certificate->fetch_assoc()['students_with_birth_certificate'];
$total_students_with_good_moral = $result_students_with_good_moral->fetch_assoc()['students_with_good_moral'];


// Get the current date
$current_date = date('Y-m-d');

// Calculate the start and end dates for the current month
$start_of_month = date('Y-m-01');
$end_of_month = date('Y-m-t');

// Calculate the start and end dates for the current week (assuming the week starts on Monday)
$start_of_week = date('Y-m-d', strtotime('monday this week'));
$end_of_week = date('Y-m-d', strtotime('sunday this week'));

// Calculate the start and end dates for the current year
$start_of_year = date('Y-01-01');
$end_of_year = date('Y-12-31');

// SQL queries to count appointments within the time ranges
$sql_appointments_this_month = "SELECT COUNT(*) as total_appointments_month FROM appointment WHERE `date` BETWEEN '$start_of_month' AND '$end_of_month'";
$sql_appointments_this_week = "SELECT COUNT(*) as total_appointments_week FROM appointment WHERE `date` BETWEEN '$start_of_week' AND '$end_of_week'";
$sql_appointments_this_year = "SELECT COUNT(*) as total_appointments_year FROM appointment WHERE `date` BETWEEN '$start_of_year' AND '$end_of_year'";

// Execute queries and fetch results
$result_appointments_this_month = $con->query($sql_appointments_this_month);
$result_appointments_this_week = $con->query($sql_appointments_this_week);
$result_appointments_this_year = $con->query($sql_appointments_this_year);

// Fetch results
$total_appointments_this_month = $result_appointments_this_month->fetch_assoc()['total_appointments_month'];
$total_appointments_this_week = $result_appointments_this_week->fetch_assoc()['total_appointments_week'];
$total_appointments_this_year = $result_appointments_this_year->fetch_assoc()['total_appointments_year'];

// SQL query to count appointments for each month
$sql_appointments_per_month = "SELECT DATE_FORMAT(`date`, '%Y-%m') AS month, COUNT(*) AS total_appointments FROM appointment GROUP BY DATE_FORMAT(`date`, '%Y-%m')";

// Execute the query
$result_appointments_per_month = $con->query($sql_appointments_per_month);

// Fetch the results and store them in an associative array
$appointments_per_month = array();
while ($row = $result_appointments_per_month->fetch_assoc()) {
    $month = $row['month'];
    $count = $row['total_appointments'];

    // Extract year and month from the formatted date
    $year = substr($month, 0, 4);
    $month_number = substr($month, 5, 2);
    $month_name = date('F', mktime(0, 0, 0, $month_number, 1));

   // Store the count in the associative array with the month number
    $appointments_per_month[$month_number] = array(
    'month_name' => $month_name,
    'count' => $count
);

}

// Get the current year and month
$current_year = date('Y');
$current_month = date('m');

// Initialize an array to hold the total appointments for each month (initialize to 0)
$total_appointments_by_month = array();

// Populate the array with keys for all months of the year, starting from January (01) to December (12)
for ($month = 1; $month <= 12; $month++) {
    $month_str = str_pad($month, 2, '0', STR_PAD_LEFT); // Ensure two-digit format for month (e.g., 01, 02, ..., 12)
    $total_appointments_by_month["$current_year-$month_str"] = 0;
}

// Update the total appointments for each month based on the fetched results
foreach ($appointments_per_month as $month_number => $data) {
    $month_number_str = str_pad($month_number, 2, '0', STR_PAD_LEFT);
    $total_appointments_by_month["$current_year-$month_number_str"] = $data['count'];
}


//Display results
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

<div style="display: flex; align-items: center; justify-content: space-between;">
    <div style="display: flex; align-items: center;">
        <img src="images/logo.png" style="width: 50px; height: 50px;">
        <h4 class="navtop-logo-desc-reports" style="font-size: 24px; margin-left: 10px;">LNCHS | File Archiving System</h4>
    </div>

    <div style="display: flex; align-items: center;">
        <button class="back-btn" onclick="window.location.href = 'dashboard.php'" style="margin-right: 10px; padding: 10px 20px; background-color: #337ab7; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Back</button>
        <button class="print-btn" onclick="window.print()" style="margin-right: 50px; padding: 10px 20px; background-color: #4caf50; color: #fff; border: none; border-radius: 5px; cursor: pointer;">Print</button>
    </div>
</div>


<style>
    @media print {
        .back-btn,
        .print-btn {
            font-size: 0;
        }
    }
</style>


</header>


<div class="line" style="border-bottom: 2.5px solid #337ab7;"> </div>



<div class="container-rpts" style="max-width: 600px; margin: 20px auto; border: 1px solid #ccc; border-radius: 10px; padding: 20px;">

    <h2 style="text-align: center; font-size: 32px; padding: 10px 0; border-bottom: 2.5px solid #000; margin-bottom: 20px;">LNCHS-FAS: Reports</h2>

<br>
    <ul style="list-style-type: none; padding: 0; font-size: 18px;">
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc; border-top: 1px solid #ccc"><b>Total Students:</b> <?php echo $total_students; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;"><b>Total Advisors:</b> <?php echo $result_advisors->fetch_assoc()['total_advisors']; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;"><b>Total Sections:</b> <?php echo $result_sections->fetch_assoc()['total_sections']; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;"><b>Total School Year:</b> <?php echo $result_batches->fetch_assoc()['total_batches']; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;"><b>Total Appointments:</b> <?php echo $result_appointments->fetch_assoc()['total_appointments']; ?></li>
        
        <br>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc; border-top: 1px solid #ccc"><b>Students with Form 137/SF-10:</b> <?php echo $total_students_with_form_137; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc"><b>Students with Birth Certificate:</b> <?php echo $total_students_with_birth_certificate; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc"><b>Students with Certification of Good Moral:</b> <?php echo $total_students_with_good_moral; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc"><b>Students with all three documents:</b> <?php echo $total_documents_present; ?> (<?php echo round($percentage_with_all_documents, 2); ?>%)</li>
       <br>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc; border-top: 1px solid #ccc"><b>Students without Form 137/SF-10:</b> <?php echo $result_form_137_missing->fetch_assoc()['form_137_missing']; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;"><b>Students without Birth Certificate:</b> <?php echo $result_birth_certificate_missing->fetch_assoc()['birth_certificate_missing']; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;"><b>Students without Certification of Good Moral:</b> <?php echo $result_good_moral_missing->fetch_assoc()['good_moral_missing']; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc"><b>Students without all three documents:</b> <?php echo $total_without_all_documents; ?> (<?php echo round($percentage_without_all_documents, 2); ?>%)</li>
    </ul>
</div>

<!-- Appointment Reports (This Month, This Week, This Year) -->
<div class="container-rpts" style="max-width: 600px; margin: 20px auto; border: 1px solid #ccc; border-radius: 10px; padding: 20px;">
      <h2 style="text-align: center; font-size: 32px; padding: 10px 0; border-bottom: 2.5px solid #000; margin-bottom: 20px;">LNCHS-FAS: Online Request</h2>
    <ul style="list-style-type: none; padding: 0; font-size: 18px;">
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc; border-top: 1px solid #ccc"><b>Total Online Request (This Week):</b> <?php echo $total_appointments_this_week; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;"><b>Total Online Request (This Month):</b> <?php echo $total_appointments_this_month; ?></li>
        <li style="padding: 10px 0; border-bottom: 1px solid #ccc;"><b>Total Online Request (This Year):</b> <?php echo $total_appointments_this_year; ?></li>
    </ul>
 
<!-- Appointment Reports for Each Month -->
   <!-- Add a form for filtering -->
<form method="get" action="">
    <label for="filter_month">Filter by Month:</label>
    <select name="filter_month" id="filter_month">
        <option value="">All Months</option>
        <?php foreach ($total_appointments_by_month as $month => $count) { ?>
            <option value="<?php echo $month; ?>"><?php echo date('F Y', strtotime($month)); ?></option>
        <?php } ?>
    </select>
    <button type="submit">Apply Filter</button>
</form>

<!-- Display the filtered results -->
<ul style="list-style-type: none; padding: 0; font-size: 18px;">
    <li style="padding: 10px 0; border-bottom: 1px solid #ccc; "></li>
    <?php
    $filter_month = isset($_GET['filter_month']) ? $_GET['filter_month'] : null;

    foreach ($total_appointments_by_month as $month => $count) {
        if ($filter_month === null || $filter_month === $month) {
    ?>
            <li style="padding: 10px 0; border-bottom: 1px solid #ccc;">
                <b>Total Online Request (<?php echo date('F Y', strtotime($month)); ?>):</b> <?php echo $count; ?>
            </li>
    <?php
        }
    }
    ?>
</ul>
</div>




</body>
</html>
