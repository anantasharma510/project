<?php
include 'connection.php';
$query = "DELETE FROM student WHERE rollno = '$_GET[rn]'";
$result = mysqli_query($conn, $query);
if($result){
// echo "Delete Successfully";
header('location:display.php');
}
else{
die(mysqli_error($conn));}