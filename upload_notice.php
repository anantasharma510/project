<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notices";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Prepare and bind parameters
$stmt = $conn->prepare("INSERT INTO notices (title, content) VALUES (?, ?)");
$stmt->bind_param("ss", $notice_title, $notice_content);

// Retrieve notice data from the form
$notice_title = $_POST['notice_title'];
$notice_content = $_POST['notice_content'];

// Execute the statement
if ($stmt->execute()) {
    echo "Notice uploaded successfully";
} else {
    echo "Error: " . $stmt->error;
}

// Close statement and connection
$stmt->close();
$conn->close();
?>
