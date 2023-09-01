<?php
require_once 'conn.php';

if (isset($_POST['edit'])) {
    $stud_id = $_POST['stud_id'];
    $firstname = $_POST['firstname'];
    $middlename = $_POST['middlename'];
    $lastname = $_POST['lastname'];
    $gender = $_POST['gender'];
    $batch = $_POST['batch'];
    $section = $_POST['section'];
    $advisor = $_POST['advisor'];

    if (empty($stud_id) || empty($firstname) || empty($lastname) || empty($gender) || empty($batch) || empty($section) || empty($advisor)) {
        echo "<script>alert('Please fill in all the required fields!'); window.history.back();</script>";
        exit; // Stop further execution
    }

    $stmt = $con->prepare("UPDATE `student` SET `firstname` = ?, `middlename` = ?, `lastname` = ?, `gender` = ?, `batch` = ?, `section` = ?, `advisor` = ? WHERE `stud_id` = ?");
    $stmt->bind_param("ssssssss", $firstname, $middlename, $lastname, $gender, $batch, $section, $advisor, $stud_id);

    try {
        if ($stmt->execute()) {
            echo "<script>alert('Successfully updated!'); window.history.back();</script>";
        } else {
            echo "<script>alert('An error occurred while updating data!'); window.history.back();</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "<script>alert('An error occurred while updating data!'); window.history.back();</script>";
    }

    $stmt->close();
}
?>
