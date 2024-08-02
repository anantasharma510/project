<?php
// Include the database connection file
include 'config.php';

// Start session to access session variables
session_start();

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    // Redirect the user to the login page if they're not logged in
    header("Location: login.php");
    exit();
}

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $username = $_POST['username'];
    $email = $_POST['email'];
    $semester = $_POST['semester'];
    $contact = $_POST['contact'];
    $country = $_POST['country'];

    // Get user ID from session
    $user_id = $_SESSION['user_id'];

    // Prepare and execute SQL query to update user data in the database
    $stmt = $conn->prepare("UPDATE users SET username=?, email=?, semester=?, contact=?, country=? WHERE id=?");
    $stmt->bind_param("sssssi", $username, $email, $semester, $contact, $country, $user_id);

    // Check if the query executed successfully
    if ($stmt->execute()) {
        // Update session variables with new data
        $_SESSION['username'] = $username;
        $_SESSION['email'] = $email;
        $_SESSION['semester'] = $semester;
        $_SESSION['contact'] = $contact;
        $_SESSION['country'] = $country;

        // Redirect back to the profile page after updating
        header("Location: profile.php");
        exit();
    } else {
        // Handle database update failure
        echo "Error updating profile: " . $conn->error;
    }

    // Close statement
    $stmt->close();
}

// Close database connection
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="profile.css"> <!-- Include your CSS file here -->
</head>
<body>

<div class="container">
    <h1>Edit Profile</h1>

    <div class="edit-profile-form">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $_SESSION['username']; ?>" required>
            
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $_SESSION['email']; ?>" required>
            
            <label for="semester">Semester:</label>
            <input type="text" id="semester" name="semester" value="<?php echo $_SESSION['semester']; ?>" required>
            
            <label for="contact">Contact:</label>
            <input type="text" id="contact" name="contact" value="<?php echo $_SESSION['contact']; ?>" required>
            
            <label for="country">Country:</label>
            <input type="text" id="country" name="country" value="<?php echo $_SESSION['country']; ?>" required>
            
            <button type="submit">Save Changes</button>
        </form>
    </div>
</div>

</body>
</html>
