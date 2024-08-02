<?php
session_start(); // Start the session

// Check if user is logged in, if not redirect to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}

// Include your database configuration
include_once "config.php";

// Prepare a select statement to fetch user details from the database
$sql = "SELECT username, email, semester, contact FROM users WHERE id = ?";

if($stmt = mysqli_prepare($conn, $sql)){
    // Bind variables to the prepared statement as parameters
    mysqli_stmt_bind_param($stmt, "i", $param_id);

    // Set parameters
    $param_id = $_SESSION["id"];

    // Attempt to execute the prepared statement
    if(mysqli_stmt_execute($stmt)){
        // Store result
        mysqli_stmt_store_result($stmt);

        // Check if user exists, if yes then display the user details
        if(mysqli_stmt_num_rows($stmt) == 1){
            // Bind result variables
            mysqli_stmt_bind_result($stmt, $username, $email, $semester, $contact);
            mysqli_stmt_fetch($stmt);
        } else{
            // User does not exist
            // Redirect to login page or display an error message
            // You can customize this according to your requirement
        }
    } else{
        // Error executing the statement
        // You can handle this accordingly
    }

    // Close statement
    mysqli_stmt_close($stmt);
}

// Close connection
mysqli_close($conn);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Profile</title>
    <link rel="stylesheet" href="profile.css"> <!-- Include your CSS file here -->
 <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f2f2f2;
    margin: 0;
    padding: 0;
}

.container {
    max-width: 800px;
    margin: 20px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.9);
    
}

.profile-info {
    display: flex;
    align-items: center;
}

.profile-picture {
    flex: 1;
    text-align: center;
}

.profile-picture img {
    width: 200px;
    height: 200px;
    border-radius: 50%;
    object-fit: cover;
    margin-bottom: 10px;
    border: 5px solid #fff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
}

.user-details {
    flex: 2;
    padding-left: 20px;
}

.user-details h2 {
    font-size: 24px;
    margin-bottom: 20px;
}

.user-details p {
    font-size: 18px;
    margin-bottom: 10px;
}

.btn {
    display: inline-block;
    background-color: #4CAF50;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-top: 10px;
    transition: background-color 0.3s;
}

.btn:hover {
    background-color: #45a049;
}

.btn.primary {
    background-color: #1E90FF;
}

.btn.primary:hover {
    background-color: #007bff;
}

.btn.danger {
    background-color: #dc3545;
}

.btn.danger:hover {
    background-color: #c82333;
}

.btn.success {
    background-color: #28a745;
}

.btn.success:hover {
    background-color: #218838;
}

.home-btn {
    display: inline-block;
    background-color: #008CBA;
    color: white;
    padding: 10px 20px;
    text-align: center;
    text-decoration: none;
    border: none;
    border-radius: 4px;
    cursor: pointer;
    margin-bottom: 20px;
    transition: background-color 0.3s;
}

.home-btn:hover {
    background-color: #005f73;
}
</style>

</head>
<body>

<a href="welcome.php" class="home-btn">Home</a>
<div class="container">
    <h1>Welcome to Your Profile <br>  Dear Bca Students </h1>

    <div class="profile-info">
        <div class="profile-picture">
            <img src="<?php echo $profile_photo_path; ?>" alt="Profile Picture">
            <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
                <input type="file" name="new_photo">
                <button type="submit" class="change-photo-btn">Change Photo</button>
            </form>
        </div>
        <div class="user-details">
            <h2>User Details</h2>
            <p><strong>Username:</strong> <?php echo $username; ?></p>
            <p><strong>Email:</strong> <?php echo $email; ?></p>
            <p><strong>Semester:</strong> <?php echo $semester; ?></p>
            <p><strong>Contact:</strong> <?php echo $contact; ?></p>

            <!-- Other user details -->
            <button class="edit-profile-btn"> <a href="editprofile.php ">Edit Profile</a></button>
            <button class="change-password-btn"><a href="change-password.php">Change Password</a></button>
            <button class="logout-btn"><a href="logout.php">Logout</a></button>
        </div>
    </div>
</div>
</body>
</html>
