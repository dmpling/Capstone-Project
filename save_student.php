<?php
require_once 'conn.php';

if (isset($_POST['save'])) {
    $stud_id = $_POST['stud_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $batch = $_POST['batch'];
    $section = $_POST['section'];
    $advisor = $_POST['advisor'];
    $admin_id = $_POST['admin_id'];

    // Perform error handling to check if required fields are empty
    if (empty($stud_id) || empty($firstname) || empty($lastname) || empty($gender) || empty($batch) || empty($section) || empty($advisor) || empty($admin_id)) {
        echo "<script>alert('Please fill in all the required fields!'); window.history.back();</script>";
        exit; // Stop further execution
    }

    // Use prepared statements to avoid SQL injection
    $stmt = $con->prepare("INSERT INTO `student` VALUES(?, ?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("sssssssss", $stud_id, $firstname, $middlename, $lastname, $gender, $batch, $section, $advisor, $admin_id);

    try {
        if ($stmt->execute()) {
            echo "<script>alert('Successfully Added!'); window.location = 'student.php';</script>";
        } else {
            echo "<script>alert('An error occurred while saving data!'); window.history.back();</script>";
        }
    } catch (mysqli_sql_exception $e) {
        // Check for specific exception: Duplicate entry for primary key
        if ($e->getCode() === 1062) {
            echo "<script>alert('Error: Student ID already exists! Please use a different ID.'); window.history.back();</script>";
        } else {
            echo "<script>alert('An error occurred while saving data!'); window.history.back();</script>";
        }
    }

    $stmt->close();
}
?>
