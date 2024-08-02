<?php
include 'connection_teacher.php'; // Include your database connection file

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect form data
    $name = $_POST['name'];
    $contact = $_POST['contact'];
    $address = $_POST['address'];

    // Prepare INSERT query
    $query = "INSERT INTO teacher (name, contact, address) VALUES ('$name', '$contact', '$address')";
    
    // Execute query
    if (mysqli_query($conn, $query)) {
        // If insertion successful, redirect to teacher list page
        header("Location: teacher.php");
        exit();
    } else {
        // If insertion fails, display error message
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }

    // Close connection
    mysqli_close($conn);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Teacher</title>
    <style>
body {
    font-family: Arial, sans-serif;
    background-color: #f1f1f1;
    margin: 0;
    padding: 0;
}

h2 {
    text-align: center;
    color: #333;
}

form {
    max-width: 400px;
    margin: 20px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

form label {
    display: block;
    margin-bottom: 8px;
}

form input[type="text"],
form input[type="submit"] {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ccc;
    border-radius: 5px;
    box-sizing: border-box;
}

form input[type="submit"] {
    background-color: #4CAF50;
    color: white;
    border: none;
    cursor: pointer;
}

form input[type="submit"]:hover {
    background-color: #45a049;
}

        
        </style>
</head>
<body>
    <h2>Add Teacher</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
        <label>Name:</label>
        <input type="text" name="name" required><br><br>
        
        <label>Contact:</label>
        <input type="text" name="contact" required><br><br>
        
        <label>Address:</label>
        <input type="text" name="address" required><br><br>
        
        <input type="submit" value="Submit">
    </form>
</body>
</html>