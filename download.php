<?php
include 'config.php'; // Include your database configuration file

// Establish database connection
$connection = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
}

// Query to fetch uploaded assignments from the database
$sql = "SELECT * FROM assignments";
$result = mysqli_query($connection, $sql);

// Check if any assignments were found
if (mysqli_num_rows($result) > 0) {
    // Displaying the fetched assignments
    while ($row = mysqli_fetch_assoc($result)) {
        echo '<a href="' . $row['file_path'] . '" class="download-btn">' . $row['filename'] . '</a>';
    }
} else {
    echo 'No assignments uploaded yet.';
}

// Close the database connection
mysqli_close($connection);
?>
