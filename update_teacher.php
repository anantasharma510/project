<?php
include 'connection_teacher.php'; // Include your database connection file

// Check if teacher_code is provided in the URL
if(isset($_GET['code'])) {
    $teacher_code = $_GET['code'];

    // Retrieve teacher details from the database based on teacher_code
    $query = "SELECT * FROM teacher WHERE teacher_code = '$teacher_code'";
    $result = mysqli_query($conn, $query);
    $row = mysqli_fetch_assoc($result);

    // Check if form is submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Collect form data
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];

        // Prepare UPDATE query
        $update_query = "UPDATE teacher SET name='$name', contact='$contact', address='$address' WHERE teacher_code='$teacher_code'";

        // Execute query
        if (mysqli_query($conn, $update_query)) {
            // If update successful, redirect to teacher list page
            header("Location: teacher.php");
            exit();
        } else {
            // If update fails, display error message
            echo "Error updating record: " . mysqli_error($conn);
        }

        // Close connection
        mysqli_close($conn);
    }
} else {
    // If teacher_code is not provided in the URL, redirect to teacher list page
    header("Location: teacher.php");
    exit();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Update Teacher</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            color: #333;
        }

        h2 {
            text-align: center;
            margin-top: 20px;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        label {
            display: block;
            margin-bottom: 10px;
        }

        input[type="text"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: #fff;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Update Teacher</h2>
    <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"] . "?code=$teacher_code"); ?>">
        <label>Name:</label>
        <input type="text" name="name" value="<?php echo $row['name']; ?>" required><br><br>
        
        <label>Contact:</label>
        <input type="text" name="contact" value="<?php echo $row['contact']; ?>" required><br><br>
        
        <label>Address:</label>
        <input type="text" name="address" value="<?php echo $row['address']; ?>" required><br><br>
        
        <input type="submit" value="Update">
    </form>
</body>
</html>
