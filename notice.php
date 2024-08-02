<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Board</title>
    <link rel="stylesheet" href="notice.css"> <!-- Include your CSS file here -->
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 800px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .notice {
            border-bottom: 1px solid #ccc;
            padding: 20px 0;
        }

        .notice h3 {
            margin-bottom: 10px;
            color: #333;
        }

        .notice p {
            margin-bottom: 20px;
            color: #666;
        }

        .download-btn {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .download-btn:hover {
            background-color: #45a049;
        }

        .home-btn {
            display: block;
            width: 120px;
            margin: 20px auto;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .home-btn:hover {
            background-color: #0056b3;
        }

        footer {
            background-color: #333;
            color: #fff;
            text-align: center;
            padding: 10px 0;
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
        }
    </style>
</head>
<body>
<div class="container">
    <h1>Notice Board</h1>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = ""; // Assuming you have no password set
    $dbname = "bcanotices"; // Name of your database

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        // If connection fails, display an error message
        die("Connection failed: " . $conn->connect_error);
    }

    // Retrieve notices from the database
    $sql = "SELECT * FROM notices"; // Query the notices table
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<div class='notice'>";
            echo "<h3>" . $row["title"] . "</h3>";
            echo "<p>" . $row["content"] . "</p>";
            echo "</div>";
        }
    } else {
        echo "<p>No notices found</p>";
    }
    ?>
    <a href="welcome.php" class="home-btn">Back to Home</a>
</div>
<footer>
    <p>&copy; 2024 BCA, PRITHIVI NARAYAN CAMPUS, POKHARA. All rights reserved.</p>
</footer>
</body>
</html>
