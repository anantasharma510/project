<!DOCTYPE html>
<html>
<head>
    <title>Notices</title>
</head>
<body>

<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notices"; // Specify the database name

// Create connection
$admin_db_connection = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($admin_db_connection->connect_error) {
    die("Connection failed: " . $admin_db_connection->connect_error);
}

// Retrieve notices from the admin section's database
$sql = "SELECT * FROM notices"; // Query the notices table in the admin section's database
$result = $admin_db_connection->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<div>";
        echo "<h2>Title: " . $row["title"]. "</h2>";
        echo "<p>Content: " . $row["content"]. "</p>";
        echo "</div>";
    }
} else {
    echo "No notices found";
}

$admin_db_connection->close();
?>

</body>
</html>
