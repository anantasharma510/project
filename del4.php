<?php
include_once 'conn.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $delete_sql = "DELETE FROM attendance4 WHERE id = $id";

    if ($conn->query($delete_sql) === TRUE) {
        echo "Attendance record deleted successfully";
        header("Location: attendance4.php");
        exit();
    } else {
        echo "Error deleting record: " . $conn->error;
    }
} else {
    echo "ID parameter is missing";
}
?>
