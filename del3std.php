<?php
include 'connection.php';

if(isset($_GET['rn'])) {
    $rollno = $_GET['rn'];

    $query = "DELETE FROM bca3 WHERE rollno = $rollno";
    $result = mysqli_query($conn, $query);

    if($result) {
        // echo "Record deleted successfully";
        header('location:display.php');
        exit(); // Ensure no further code execution after redirection
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
} else {
    echo "Invalid request.";
}
?>
