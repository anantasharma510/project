<?php
session_start();

// Define admin credentials
$admins = array(
    "admin1" => "password1",
    "admin2" => "password2",
    "admin3" => "password3"
);

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Check if credentials match
    if (isset($admins[$username]) && $admins[$username] == $password) {
        // Set session variable to remember logged-in admin
        $_SESSION['admin'] = $username;
        // Redirect to admin profile page
        header("Location: adminprofile.php");
        exit;
    } else {
        echo "<p>Invalid username or password.</p>";
    }
}
?>
