<?php
include 'connect.php'; // Include the connection file

// Get form data
$reg_no = intval($_POST['reg_no']); // Ensure reg_no is an integer

$surname = mysqli_real_escape_string($conn, $_POST['surname']); // prevent SQL injection

$middle_name = mysqli_real_escape_string($conn, $_POST['middle_name']); // Sanitize

$first_name = mysqli_real_escape_string($conn, $_POST['first_name']); // Sanitize

$course = mysqli_real_escape_string($conn, $_POST['course']); // Sanitize

$age = intval($_POST['age']); // Ensure age is an integer

$guardian = mysqli_real_escape_string($conn, $_POST['guardian']); // Sanitize

$telno = mysqli_real_escape_string($conn, $_POST['telno']); // Sanitize

// check if any required field is empty
if (empty($reg_no) || empty($surname) || empty($first_name) || empty($course) || empty($age) || empty($guardian) || empty($telno)) {
    echo "Please fill out all required fields.";
} else {

  // Insert data into the database
  $sql = "INSERT INTO students (Reg_no, surname, middle_name, first_name, course, age, guardian, Telno)
          VALUES (?, ?, ?, ?, ?, ?, ?, ?)";

  $statement = mysqli_prepare($conn, $sql); // Prepare statement

  if ($statement) {
      mysqli_stmt_bind_param($statement, "ssssssss", $reg_no, $surname, $middle_name, $first_name, $course, $age, $guardian, $telno);
      if (mysqli_stmt_execute($statement)) {
          echo "Student registered successful!";
      } else {
          echo "Registration failed (" . mysqli_error($conn) . ").";
      }
      mysqli_stmt_close($statement); // Close prepared statement
  } else {
      echo "Error: Statement preparation failed (" . mysqli_error($conn) . ").";
  }
}

mysqli_close($conn); // Close connection
?>

