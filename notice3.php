<?php
// Database connection parameters
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "notices"; // Specify the database name

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Retrieve notices from the database
$sql = "SELECT * FROM notices"; // Query the notices table
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Third Semester - Notices</title>
    
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f4f4f4; /* Set a light background color */
        }

        .container {
            max-width: 800px;
            margin: 50px auto;
            text-align: center;
            background-color: #fff; /* Set a white background color */
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1); /* Add a subtle shadow */
        }

        .notice {
            margin-bottom: 30px;
            border: 1px solid #ddd;
            padding: 20px;
            border-radius: 10px;
        }

        .notice h3 {
            color: #007bff; /* Set a primary color for headings */
        }

        .download-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff; /* Set a primary color for the button */
            color: #fff;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .download-btn:hover {
            background-color: #0056b3; /* Darken the color on hover */
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px;
            position: relative;
            width: 100%;
            bottom: 0;
        }
        .home-btn{
    /* CSS for the "Home" link */
 margin: 6px auto;
    display: inline-block; /* Display as inline-block */
    padding: 10px 17px; /* Add padding */
    background-color: #007bff; /* Set background color */
    color: #fff; /* Set text color */
    text-decoration: none; /* Remove underline */
    border-radius: 25px; /* Add border radius for rounded corners */
    transition: background-color 0.3s ease; /* Add transition effect */
}

/* Hover effect */
.home-link:hover {
    background-color: #0056b3; /* Darker background color on hover */
}
    </style>
</head>
<body>
<div class="container">
<a href="bca-sem3.php"class="home-btn">Back</a>
    <h2>BCA Third Semester - Notices</h2>

    <!-- Display notices -->
    <?php
    if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
            echo "<div class='notice'>";
            echo "<h3>" . $row["title"]. "</h3>";
            echo "<p>" . $row["content"]. "</p>";
            echo "<a href='#' class='download-btn'>Download Notice (PDF)</a>"; // Change '#' to actual download link
            echo "</div>";
        }
    } else {
        echo "<p>No notices found</p>";
    }
    ?>
</div>

<footer>
    <p>&copy; 2024 BCA Third Semester. All rights reserved.</p>
</footer>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
