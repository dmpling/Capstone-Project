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
    $date_requested = date("Y-m-d, h:i A", strtotime("+6 HOURS"));

    // Check if the LRN exists in the database
    $lrn_query = "SELECT * FROM student WHERE stud_id = '$ref_no'";
    $lrn_result = mysqli_query($con, $lrn_query);

    if (mysqli_num_rows($lrn_result) > 0) {
        // LRN exists, proceed with the appointment booking
        $query = "INSERT INTO `appointment` VALUES('', '$ref_no', '$name', '$email',
                                                   '$contact', '$type_docu', '$purpose', '$name_stud', '$date' , '$date_requested')";
        $result = mysqli_query($con, $query);

        if ($result) {
            echo "<script>alert('Successfully Added!')</script>";
            echo "<script>window.location = 'appointment-home.php'</script>";
        } else {
            $error_message = mysqli_error($con);
            echo "<script>";
            echo "alert('Error: $error_message');";
            echo '<script>window.location.href = "appointment.php";</script>';
            echo "</script>";
        }
    } else {
        // LRN does not exist, display an alert
        echo "<script>alert('LRN does not exist. Please enter a valid LRN.');</script>";
        echo '<script>window.location.href = "appointment.php";</script>';
    }
}
?>
