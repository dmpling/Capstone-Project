<?php
require_once 'conn.php';

if (isset($_POST['stud_id'])) {
    $stud_id = $_POST['stud_id'];
    $query = mysqli_query($con, "SELECT * FROM `student` WHERE `stud_id` = '$stud_id'") or die(mysqli_error($con));
    $fetch = mysqli_fetch_array($query);

    if ($fetch) {
        if (file_exists("../files/".$stud_id)) {
            removeDir("../files/".$stud_id);
        }

        mysqli_query($con, "DELETE FROM `storage` WHERE `stud_id` = '$stud_id'") or die(mysqli_error($con));
        mysqli_query($con, "DELETE FROM `student` WHERE `stud_id` = '$stud_id'") or die(mysqli_error($con));
        
        echo "success";
    } else {
        echo "failure";
    }
}

function removeDir($dir) {
    $items = scandir($dir);
    foreach ($items as $item) {
        if ($item === '.' || $item === '..') {
            continue;
        }
        $path = $dir.'/'.$item;
        if (is_dir($path)) {
            removeDir($path);
        } else {
            unlink($path);
        }
    }
    rmdir($dir);
}
?>
