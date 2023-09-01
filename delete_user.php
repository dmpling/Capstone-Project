<?php
    require_once 'conn.php';

    if (isset($_POST['admin_id'])) {
        mysqli_query($con, "DELETE FROM `admins` WHERE `admin_id` = '$_POST[admin_id]'") or die(mysqli_error($con));
    echo "success";
    } else {
        echo "failure";
    }
?>
