<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['username'])) {
    include 'config.php'; // Include your database connection file

    // Retrieve user input
    $old_password = $_POST['op'];
    $new_password = $_POST['np'];
    $confirm_password = $_POST['c_np'];

    // Retrieve old password from the database
    $user_id = $_SESSION['id'];
    $sql = "SELECT password FROM users WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $user_id);
    $stmt->execute();
    $result = $stmt->get_result();
    $row = $result->fetch_assoc();
    $stored_password = $row['password'];

    // Verify old password
    if ($stmt->num_rows == 1 && password_verify($old_password, $stored_password)) {
        // Old password is correct, proceed to update password
        if ($new_password == $confirm_password) {
            // Hash the new password
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT);

            // Update password in the database
            $update_sql = "UPDATE users SET password = ? WHERE id = ?";
            $update_stmt = $conn->prepare($update_sql);
            $update_stmt->bind_param("si", $hashed_password, $user_id);
            if ($update_stmt->execute()) {
                // Password updated successfully
                header("Location: changepassword.php?success=Password changed successfully");
                exit();
            } else {
                // Error updating password
                header("Location: changepassword.php?error=Error updating password");
                exit();
            }
        } else {
            // New password and confirm password do not match
            header("Location: changepassword.php?error=New password and confirm password do not match");
            exit();
        }
    } else {
        // Old password is incorrect
        header("Location: changepassword.php?error=Incorrect old password");
        exit();
    }
} else {
    // User is not logged in
    header("Location: profile.php");
    exit();
}
?>
