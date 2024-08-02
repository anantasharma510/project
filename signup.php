<?php
/* Data Configuration */
define('DB_SERVER', 'localhost'); // Define the database server hostname
define('DB_USERNAME', 'root');    // Define the database username
define('DB_PASSWORD', '');        // Define the database password (empty in this case)
define('DB_NAME', 'login');       // Define the database name

// Try connecting to the database
$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASSWORD, DB_NAME);

// Check the connection
if($conn === false){
    // If the connection fails, terminate the script and display an error message
    die('Error: Cannot Connect');
}

// Initialize variables
$name = $semester = $contact = $username = $email = $password = $confirm_password = "";
$name_err = $semester_err = $contact_err = $username_err = $email_err = $password_err = $confirm_password_err = "";

// Check if the form is submitted using POST method
if($_SERVER['REQUEST_METHOD'] == "POST"){
    // Validate name
    if(empty(trim($_POST["name"]))){
        $name_err = "Name cannot be blank";
    } else {
        $name = trim($_POST["name"]);
    }

    // Validate semester
    if(empty(trim($_POST["semester"]))){
        $semester_err = "Semester cannot be blank";
    } else {
        $semester = trim($_POST["semester"]);
    }

    // Validate contact
    if(empty(trim($_POST["contact"]))){
        $contact_err = "Contact cannot be blank";
    } else {
        $contact = trim($_POST["contact"]);
    }

    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Username cannot be blank";
    } else {
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_username);

            // Set parameters
            $param_username = trim($_POST["username"]);

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken";
                } else {
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Something went wrong";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Email cannot be blank";
    } elseif(!filter_var(trim($_POST["email"]), FILTER_VALIDATE_EMAIL)){
        $email_err = "Invalid email format";
    } else {
        $email = trim($_POST["email"]);
    }

    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Password cannot be blank";
    } elseif(strlen(trim($_POST["password"])) < 5){
        $password_err = "Password must have at least 5 characters";
    } else {
        $password = trim($_POST["password"]);
    }

    // Validate confirm password
    if(empty(trim($_POST["confirm_password"]))){
        $confirm_password_err = "Please confirm password";
    } else {
        $confirm_password = trim($_POST["confirm_password"]);
        if(empty($password_err) && ($password != $confirm_password)){
            $confirm_password_err = "Password did not match";
        }
    }

    // Check input errors before inserting into database
    if(empty($name_err) && empty($semester_err) && empty($contact_err) && empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO users (name, semester, contact, username, email, password) VALUES (?, ?, ?, ?, ?, ?)";

        if($stmt = mysqli_prepare($conn, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssssss", $param_name, $param_semester, $param_contact, $param_username, $param_email, $param_password);

            // Set parameters
            $param_name = $name;
            $param_semester = $semester;
            $param_contact = $contact;
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash

            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }

    // Close connection
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Signup</title>
    <link rel="stylesheet" href="style.css"> <!-- Include your CSS file here -->
</head>
<body>
    
    <h4>Get  Register Asap !</h4>
    <div class="container">
        
        <h2>Sign Up</h2>
        <form action="signup.php" method="POST">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" required>
            <label for="semester">Semester:</label>
            <input type="text" id="semester"  name="semester"  required>
            <label for="contact">Contact:</label>
            <input type="text" placeholder="+977" id="contact" name="contact" required>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" required>
            <label for="email">Email:</label>
            <input type="email" placeholder="xyz@gmail.com" id="email" name="email" required>
            <label for="password">Password:</label>
            <input type="password" placeholder="********" id="password" name="password" required>
            <label for="confirm_password">Confirm Password:</label>
            <input type="password" placeholder="********" id="confirm_password" name="confirm_password" required>
            <button type="submit">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
    </div>
    <footer>
        <p>&copy; 2024 BCA,PRITHIVI NARYAN CAMPUS,POKHARA. All rights reserved.</p>
    </footer>
</body>
</html>
