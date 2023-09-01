<?php
require_once 'conn.php';

if (isset($_POST['edit'])) {
    $admin_id = $_POST['admin_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $employee_id = $_POST['employee_id'];
    $position = $_POST['position'];

    if (empty($admin_id) || empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($_POST['password']) || empty($employee_id) || empty($position)) {
        echo "<script>alert('Please fill in all the required fields!'); window.history.back();</script>";
        exit; // Stop further execution
    }

    $stmt = $con->prepare("UPDATE `admins` SET `firstname` = ?, `lastname` = ?, `username` = ?, `email` = ?, `password` = ?, `employee_id` = ?, `position` = ? WHERE `admin_id` = ?");
    $stmt->bind_param("ssssssss", $firstname, $lastname, $username, $email, $password, $employee_id, $position, $admin_id);

    try {
        if ($stmt->execute()) {
            echo "<script>alert('Successfully Updated!'); window.history.back();</script>";
        } else {
            echo "<script>alert('An error occurred while updating data!'); window.history.back();</script>";
        }
    } catch (mysqli_sql_exception $e) {
        echo "<script>alert('An error occurred while updating data!'); window.history.back();</script>";
    }

    $stmt->close();
}
?>
