<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA Third Semester - Assignment</title>
    <link rel="stylesheet" href="styles.css"> <!-- Include your CSS file here -->
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
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
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

        .upload-form {
            margin-bottom: 20px;
        }

        .upload-input {
            margin-top: 10px;
        }

        .upload-btn {
            background-color: #4CAF50;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .upload-btn:hover {
            background-color: #45a049;
        }

        .download-section {
            margin-top: 20px;
        }

        .download-btn {
            display: block;
            background-color: #1E90FF;
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            margin-bottom: 10px;
            transition: background-color 0.3s;
        }

        .download-btn:hover {
            background-color: #007bff;
        }

        footer {
            margin-top: 20px;
            text-align: center;
        }
    </style>
</head>
<body>

<a href="bca-sem3.php" class="home-btn">Back</a>

<div class="container">
    <h2>BCA Third Semester - Assignment</h2>

    <!-- Upload Form -->
    <form action="upload.php" method="post" enctype="multipart/form-data" class="upload-form">
        <input type="text" name="username" placeholder="Your Name" required>
        <input type="file" name="file" class="upload-input" required>
        <button type="submit" name="upload" class="upload-btn">Upload Assignment</button>
    </form>

    <!-- Download Section -->
    <div class="download-section">
        <?php include 'download.php'; ?>
    </div>
</div>

<footer>
    <p>&copy; 2024 BCA Third Semester. All rights reserved.</p>
</footer>

</body>
</html>
