<?php
require_once 'conn.php';

if (isset($_POST['received_report_id'])) {

    $report_id = $_POST['received_report_id'];
    $received_date = date("Y-m-d, h:i A", strtotime("+8 HOURS"));

    if (empty($received_date)) {
        echo "<script>alert('Please fill in all the required fields!'); window.history.back();</script>";
        exit; // Stop further execution
    }

    $stmt = $con->prepare("UPDATE `reports` SET `received_date` = ? WHERE `report_id` = ?");
    $stmt->bind_param("ss", $received_date, $report_id);

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

if (isset($_POST['not_received_report_id'])) {
   $report_id = $_POST['not_received_report_id'];
    $received_date = 'Not Received';

    if (empty($received_date)) {
        echo "<script>alert('Please fill in all the required fields!'); window.history.back();</script>";
        exit; // Stop further execution
    }

    $stmt = $con->prepare("UPDATE `reports` SET `received_date` = ? WHERE `report_id` = ?");
    $stmt->bind_param("ss", $received_date, $report_id);

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
