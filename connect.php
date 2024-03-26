<?php
$servername = "localhost";
$username = "root";
$password = "sintrix";
$dbname = "KCA";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection is successful
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
else{
    echo "Connected successfully";
}
?>
