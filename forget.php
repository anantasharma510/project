<?php
// forget.php

session_start();

require_once "config.php";

$email = $err = "";

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if(empty(trim($_POST['email']))) {
        $err = "Please enter your email";
    } else {
        $email = trim($_POST['email']);
    }

    if(empty($err)) {
        $sql = "SELECT id FROM users WHERE email = ?";
        $stmt = mysqli_prepare($conn, $sql);

        if($stmt) {
            mysqli_stmt_bind_param($stmt, "s", $param_email);
            $param_email = $email;

            if(mysqli_stmt_execute($stmt)) {
                mysqli_stmt_store_result($stmt);

                if(mysqli_stmt_num_rows($stmt) == 1) {
                    // Generate a unique token
                    $token = bin2hex(random_bytes(32));

                    // Insert token into password_reset table
                    $sql = "INSERT INTO password_reset (email, token) VALUES (?, ?)";
                    $stmt = mysqli_prepare($conn, $sql);

                    if($stmt) {
                        mysqli_stmt_bind_param($stmt, "ss", $param_email, $param_token);
                        $param_email = $email;
                        $param_token = $token;

                        if(mysqli_stmt_execute($stmt)) {
                            // Send email with reset link
                            $reset_link = "http://yourwebsite.com/reset.php?token=" . $token;
                            // Example: http://yourwebsite.com/reset.php?token=yourgeneratedtoken
                            $to = $email;
                            $subject = "Password Reset";
                            $message = "To reset your password, please click the link below:\n\n";
                            $message .= $reset_link;
                            $headers = "From: yourname@example.com";

                            if(mail($to, $subject, $message, $headers)) {
                                // Redirect user to a confirmation page
                                header("location: forgot_confirm.php");
                                exit;
                            } else {
                                $err = "Email could not be sent. Please try again later.";
                            }
                        } else {
                            $err = "Oops! Something went wrong. Please try again later.";
                        }
                    }
                } else {
                    $err = "Email address not registered";
                }
            } else {
                $err = "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Forgot Password</title>
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href=""> <!-- Include your CSS file here -->\
    <style>
        /* styles.css */

body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

.container {
    background-color: #fff;
    border-radius: 5px;
    box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
    padding: 20px;
    max-width: 400px;
    margin: 20px auto;
}

h2 {
    margin-top: 0;
    color: #333;
}

label {
    display: block;
    margin-bottom: 5px;
    color: #333;
}

input[type="text"],
input[type="email"],
input[type="password"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 3px;
    box-sizing: border-box;
}

button {
    background-color: #007bff;
    color: #fff;
    padding: 10px 20px;
    border: none;
    border-radius: 3px;
    cursor: pointer;
}

button:hover {
    background-color: #0056b3;
}

p {
    margin-top: 15px;
}

footer {
    margin-top: 20px;
    text-align: center;
    color: #666;
}

        </style>
</head>
<body>
    <h4>Welcome TO BCA,TRIBHUVAN UNIVERSITY</h4>
    <div class="container">
        <h2>Forgot Password</h2>
        <form action="" method="POST">
            <label for="email">Email <i class='bx bx-mail-send' ></i>:</label>
            <input type="email" id="email" name="email" required>
            <button type="submit">Submit</button>
        </form>
        <p>Remember your password? <a href="login.php">Login</a></p>
        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
    </div>
    <footer>
        <p>&copy; 2024 BCA,PRITHIVI NARYAN CAMPUS,POKHARA. All rights reserved.</p>
    </footer>
</body>
</html>
