<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'conn.php';
require 'PHPMailer/src/Exception.php';
require 'PHPMailer/src/PHPMailer.php';
require 'PHPMailer/src/SMTP.php';

if(isset($_POST["send"])){

    $ref_no = $_POST['ref_no'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $contact = $_POST['contact'];
    $type_docu = $_POST['type_docu'];
    $purpose = $_POST['purpose'];
    $name_stud = $_POST['name_stud'];
    $date = $_POST['date'];
    $received_date = $_POST['received_date'];
    $appointment_id = $_POST['appointment_id'];

    // if (empty($ref_no) || empty($name) || empty($email) || empty($contact) || empty($type_docu) || empty($purpose) || empty($name_stud) || empty($date) || empty($received_date) || empty($appointment_id)) {
    //     echo "<script>alert('Please fill in all the required fields!'); window.history.back();</script>";
    //     exit; // Stop further execution
    // }

    $query = "INSERT INTO `reports` VALUES('', ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $con->prepare($query);
    $stmt->bind_param("ssssssssss", $ref_no, $name, $email, $contact, $type_docu, $purpose, $name_stud, $date, $received_date, $appointment_id);
    if ($stmt->execute()) {

    
    $mail = new PHPMailer(true);

    $mail -> isSMTP();
    $mail -> Host = 'smtp.gmail.com';
    $mail -> SMTPAuth = 'true';
    $mail -> Username = 'lnchsrms@gmail.com';
    $mail -> Password = 'mlfzygmclkbmfbeq';
    $mail -> SMTPSecure = 'ssl';
    $mail -> Port = '465';
    
    $mail -> setFrom('lnchsrms@gmail.com');

    $mail -> addAddress($_POST["email"]);

    $mail -> isHTML(true);
   
    $mail -> Subject = $_POST["subject"];
    $mail -> Body = 'Your appointment request has been disapproved <br>' 
                        . '<br>'
                        . '<br>'
                        . 'Due to:'
                        . '<br>'
                        . $_POST["message"] 
                        . '<br>'
                        . '<br> Have a Good Day. Thank You.' 
                        . '<br>'
                        . '<br>'
                        . '<br> This is a system-generated message. Do not reply to this email address.' ;
    $mail -> send();


    
    
    
    

    echo
    "
    <script>
    alert ('Sent Successully!');
    document.location.href = 'appoint.php';
    </script>
    ";
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