<?php
$servername = "localhost";
$username = "root";
$password = ""; // Assuming you have no password set
$dbname = "bcanotices"; // Name of your database containing the 'notices' table

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // If connection fails, display an error message
    die("Connection failed: " . $conn->connect_error);
}

// Check if form was submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

    // Close statement
    $stmt->close();
}

// Close connection
$conn->close();
?>
