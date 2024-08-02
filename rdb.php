<?php
$db = mysqli_connect('localhost', 'root', '', 'register');

if (!$db) {
    die("Connection failed: " . mysqli_connect_error());
}
?>
