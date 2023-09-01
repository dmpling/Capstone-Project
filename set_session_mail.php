<?php

// Start the session
session_start();

// Check if the "approved_appointment_id" or "disapproved_appointment_id" parameter exists
if (isset($_POST['approved_appointment_id'])) {
  $appointmentId = $_POST['approved_appointment_id'];

  // Check if a session exists for the approved action
  if (isset($_SESSION['approved_appointment_id'])) {
    // Unset the existing session for the approved action
    unset($_SESSION['approved_appointment_id']);
  }

  // Store the approved_appointment_id value in the session
  $_SESSION['approved_appointment_id'] = $appointmentId;

  // Return a success response
  echo json_encode(['success' => true]);
} elseif (isset($_POST['disapproved_appointment_id'])) {
  $appointmentId = $_POST['disapproved_appointment_id'];

  // Check if a session exists for the disapproved action
  if (isset($_SESSION['disapproved_appointment_id'])) {
    // Unset the existing session for the disapproved action
    unset($_SESSION['disapproved_appointment_id']);
  }

  // Store the disapproved_appointment_id value in the session
  $_SESSION['disapproved_appointment_id'] = $appointmentId;

  // Return a success response
  echo json_encode(['success' => true]);
} else {
  // Return an error response if the parameter is missing
  echo json_encode(['success' => false, 'message' => 'Parameter is missing']);
}
?>
