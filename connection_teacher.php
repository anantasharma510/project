<?php
// Database configuration
$servername = "localhost"; // Change this to your database servername
$username = "root"; // Change this to your database username
$password = ""; // Change this to your database password
$dbname = "teacher"; // Change this to your database name

// Create connection
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
