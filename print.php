<?php
require_once 'conn.php';

if (isset($_REQUEST['store_id'])) {
    $store_id = $_REQUEST['store_id'];

    $query = mysqli_query($con, "SELECT * FROM `storage` WHERE `store_id` = '$store_id'") or die(mysqli_error($con));

    if (mysqli_num_rows($query) > 0) {
        $fetch = mysqli_fetch_array($query);
        $filename = $fetch['filename'];
        $stud_id = $fetch['stud_id'];

        // Add the ".jpeg" extension to the $filename variable
        $filename_with_extension = $filename . ".jpeg";

        $filepath = __DIR__ . "/files/" . $stud_id . "/" . $filename_with_extension;

        if (file_exists($filepath)) {
            // Set the appropriate content type for the file
            $file_info = finfo_open(FILEINFO_MIME_TYPE);
            $mime_type = finfo_file($file_info, $filepath);
            finfo_close($file_info);
            header("Content-Type: " . $mime_type);

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
