<?php
require_once 'conn.php';

if (isset($_POST['file'])) {
    $stud_id = $_POST['stud_id'];
    $file_data = $_POST['file'];
    $filename = $_POST['filename'];
    $file_description = $_POST['file_description'] . ' , ' . $_POST['lname'] . ' , ' . $_POST['batch'] . ' , ' . $_POST['section'];
    $file_type = $_POST['file_type'];
    $date_uploaded = date("Y-m-d, h:i A", strtotime("+6 HOURS"));
    $who_uploaded = $_POST['admin_id'];

    if (!file_exists("files/" . $stud_id)) {
        mkdir("files/" . $stud_id, 0777, true); 
    }

    
    $filename_with_extension = $filename . ".jpeg";

    $location = "files/" . $stud_id . "/" . $filename_with_extension;

   
    $file_data = str_replace('data:image/jpeg;base64,', '', $file_data);

    
    $decoded_data = base64_decode($file_data);

    if (file_put_contents($location, $decoded_data)) {
        mysqli_query($con, "INSERT INTO `storage` VALUES('', '$filename', '$file_description', '$file_type', '$date_uploaded', '$who_uploaded', '$stud_id')") or die(mysqli_error());

        echo "Successfully Added!";
    } else {
        echo "Error uploading file.";
    }
} else {
    echo "No file uploaded.";
}
?>
