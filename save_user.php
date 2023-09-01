<?php
require_once 'conn.php';

if (isset($_POST['save'])) {
    $admin_id = $_POST['admin_id'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_DEFAULT);
    $employee_id = $_POST['employee_id'];
    $position = $_POST['position'];

    // Perform error handling to check if required fields are empty
    if (empty($admin_id) || empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($_POST['password']) || empty($employee_id) || empty($position)) {
        echo "<script>alert('Please fill in all the required fields!'); window.history.back();</script>";
        exit; // Stop further execution
    }

    // Use prepared statements to avoid SQL injection
    $stmt = $con->prepare("INSERT INTO `admins` VALUES(?, ?, ?, ?, ?, ?, ?, ?)");
    $stmt->bind_param("ssssssss", $admin_id, $firstname, $lastname, $username, $email, $password, $employee_id, $position);

    try {
        if ($stmt->execute()) {
            echo "<script>alert('Successfully Added!'); window.location = 'home.php';</script>";
        } else {
            echo "<script>alert('An error occurred while saving data!'); window.history.back();</script>";
        }
    } catch (mysqli_sql_exception $e) {
        // Check for specific exception: Duplicate entry for primary key or unique constraint
        if ($e->getCode() === 1062) {
            echo "<script>alert('Error: Admin ID or Username or Email already exists! Please use different values.'); window.history.back();</script>";
        } else {
            echo "<script>alert('An error occurred while saving data!'); window.history.back();</script>";
        }
    }

    $stmt->close();
}
?>
