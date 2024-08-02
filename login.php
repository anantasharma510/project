

<?php
// This script will handle login
session_start();

// check if the user is already logged in
if(isset($_SESSION['username'])) {
    header("location: welcome.php");
    exit;
}

require_once "config.php";

$username = $password = "";
$err = "";

// if request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(empty(trim($_POST['username'])) || empty(trim($_POST['password']))) {
        $err = "Please enter username + password";
    } else {
        $username = trim($_POST['username']);
        $password = trim($_POST['password']);
    }

    if(empty($err)) {
        $sql = "SELECT id, username, password FROM users WHERE username = ?";
        $stmt = mysqli_prepare($conn, $sql);
        
        if($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_username);
            $param_username = $username;
            
            // Try to execute this statement
            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1) {
                    mysqli_stmt_bind_result($stmt, $id, $username, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)) {
                        if(password_verify($password, $hashed_password)) {
                            // this means the password is correct. Allow user to login
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;

                            // Redirect user to welcome page
                            header("location: welcome.php");
                            exit;
                        } else {
                            $err = "Incorrect password";
                        }
                    }
                } else {
                    $err = "Username not found";
                }
            } else {
                $err = "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        } else {
            $err = "Oops! Something went wrong. Please try again later.";
        }
    }
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file here -->
</head>
<body>
    <h4>Welcome TO BCA,TRIBHUVAN UNIVERSITY</h4>
    <div class="container">
        <h2>Login</h2>
        <form action="" method="POST">
          
            <label for="username">Username <i class='bx bxs-user'></i>:</label>
            <input type="text" id="username" name="username" required>
            <label for="password">Password<i class='bx bxs-lock' ></i></label>
            <input type="password" id="password" name="password" required>
            <button type="submit">Login</button>
        </form>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
        <p> <a href= "forget.php">Forgot Password?</a></p>
       
    </div>
    
    <footer>
        <p>&copy; 2024 BCA,PRITHIVI NARYAN CAMPUS,POKHARA. All rights reserved.</p>
    </footer>
    
</body>
</html>
