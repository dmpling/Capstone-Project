<?php

// Start the session
session_start();

// Check if the "stud_id" parameter exists
if (isset($_POST['stud_id'])) {
  $studId = $_POST['stud_id'];

  // Store the stud_id value in the session
  $_SESSION['stud_id'] = $studId;

  // Return a success response
  echo json_encode(['success' => true]);
} else {
  // Return an error response
  echo json_encode(['success' => false, 'message' => ' parameter is missing']);
}
?>
