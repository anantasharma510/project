<?php
include 'config.php'; // Include your database configuration file

// Handle file upload
if(isset($_POST["upload"])) {
    $username = $_POST["username"];

    // File upload logic here
    if(isset($_FILES["file"])) {
        $file_name = $_FILES["file"]["name"];
        $file_tmp = $_FILES["file"]["tmp_name"];
        $file_type = $_FILES["file"]["type"];
        $file_size = $_FILES["file"]["size"];

        // Specify the directory where you want to store uploaded files
        $target_dir = "uploads/";

        // Move uploaded file to the specified directory
        $target_file = $target_dir . basename($file_name);

        if(move_uploaded_file($file_tmp, $target_file)) {
            // File uploaded successfully, insert data into database
            $query = "INSERT INTO assignments (username, file_path) VALUES ('$username', '$target_file')";
            if(mysqli_query($connection, $query)) {
                echo "File uploaded successfully.";
            } else {
                echo "Error uploading file: " . mysqli_error($connection);
            }
        } else {
            echo "Error uploading file.";
        }
    }
}
?>
