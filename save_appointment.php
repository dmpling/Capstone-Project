<?php
require_once 'conn.php';

if (isset($_POST['save'])) {
    $ref_no = $_POST['ref_no'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $type_docu = $_POST['type_docu'];
    $purpose = $_POST['purpose'];
    $name_stud = $_POST['name_stud'];
    $date = $_POST['date'];

    if (empty($ref_no) || empty($name) || empty($email) || empty($contact) || empty($type_docu) || empty($purpose) || empty($name_stud) || empty($date)) {
        echo "<script>alert('Please fill in all the required fields!'); window.history.back();</script>";
        exit; // Stop further execution
    }

    $query = "INSERT INTO `appointment` VALUES('', ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssssss", $ref_no, $name, $email, $contact, $type_docu, $purpose, $name_stud, $date);

    if ($stmt->execute()) {
        echo "<script>alert('Successfully Added!'); window.location = 'appointment-home.php';</script>";
    } else {
        $error_message = mysqli_error($con);
        echo "<script>";
        echo "alert('Error: $error_message');";
        echo "window.history.back();"; // Go back to the previous page
        echo "</script>";
    }

    $stmt->close();
}
?>
