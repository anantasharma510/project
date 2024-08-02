<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['message'])) {
    $servername = "localhost";
    $username = "username"; // Your MySQL username
    $password = "password"; // Your MySQL password
    $dbname = "chatdb";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $message = $_POST['message'];
    // You may want to add validation or sanitization for the message input

    // Insert message into database
    $sql = "INSERT INTO messages (username, message, timestamp) VALUES ('User', '$message', NOW())";
    if ($conn->query($sql) === TRUE) {
        // Message inserted successfully
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
header("Location: chatmsgg.html"); // Redirect back to the chat page
?>
