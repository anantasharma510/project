<?php
include 'connection_teacher.php'; // Include your database connection file

// Check if teacher_code is provided in the URL
if(isset($_GET['code'])) {
    $teacher_code = $_GET['code'];

    // Prepare DELETE query
    $delete_query = "DELETE FROM teacher WHERE teacher_code='$teacher_code'";

    // Execute query
    if (mysqli_query($conn, $delete_query)) {
        // If deletion successful, redirect to teacher list page
        header("Location: teacher.php");
        exit();
    } else {
        // If deletion fails, display error message
        echo "Error deleting record: " . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
} else {
    // If teacher_code is not provided in the URL, redirect to teacher list page
    header("Location: teacher.php");
    exit();
}
?>
