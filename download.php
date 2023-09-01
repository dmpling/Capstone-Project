<?php
require_once 'conn.php';

if (isset($_REQUEST['store_id'])) {
    $store_id = $_REQUEST['store_id'];

    $query = mysqli_query($con, "SELECT * FROM `storage` WHERE `store_id` = '$store_id'") or die(mysqli_error($con));

    if (mysqli_num_rows($query) > 0) {
        $fetch = mysqli_fetch_array($query);
        $filename = $fetch['filename'];
        $stud_id = $fetch['stud_id'];

        // Construct the file path with the correct extension
        $file_extension = pathinfo($filename, PATHINFO_EXTENSION);
        $filepath = __DIR__ . "/files/" . $stud_id . "/" . $filename;

        if (file_exists($filepath)) {
            // Set the appropriate content type for images
            if (strpos($file_extension, 'jpg') !== false || strpos($file_extension, 'jpeg') !== false) {
                header("Content-Type: image/jpeg");
            } else {
                header("Content-Type: application/octet-stream");
            }

            // Always force download by setting Content-Disposition to "attachment"
            header("Content-Disposition: attachment; filename=\"" . basename($filename) . "\"");

            // Disable caching
            header("Cache-Control: no-cache, no-store, must-revalidate");
            header("Pragma: no-cache");
            header("Expires: 0");

            // Output the file contents
            readfile($filepath);
            exit(); // Stop further execution
        } else {
            echo "<script>alert('File not found. Path: " . $filepath . "');</script>";
            die();
        }
    } else {
        echo "<script>alert('Record not found.');</script>";
        die();
    }
}
?>
