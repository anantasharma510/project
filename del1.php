<?php
// del1.php

// Include the database connection file
include_once 'db_connect.php';

// Check if ID parameter is set
if(isset($_GET['id'])) {
    $id = $_GET['id'];

    // Delete query
    $delete_sql = "DELETE FROM attendance WHERE id = $id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Attendance record deleted successfully";
        header("Location: attendance.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter is missing";
}
?>
