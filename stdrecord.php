<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Record</title>
<style>
body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f2f2f2;
}

/* Container Styles */
.container {
    max-width: 800px;
    margin: 70px auto;
    padding: 20px;
    background-color: #fff;
    border-radius: 8px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

/* Home Button Styles */
.home-btn {
    margin: 10px auto; /* Adjusted margin */
    display: inline-block;
    padding: 10px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 25px;
    transition: background-color 0.3s ease;
}

.home-btn:hover {
    background-color: #0056b3;
}

/* Heading Styles */
h1 {
    text-align: center; /* Center align heading */
    color: #007bff; /* Change heading color */
}

/* Notice Link Styles */
.notice-links {
    margin-bottom: 20px;
}

.notice-link {
    display: block;
    padding: 15px 20px; /* Increased padding for better touch */
    margin-bottom: 10px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 5px;
    transition: background-color 0.3s;
}

.notice-link:hover {
    background-color: #0056b3;
}

.notice-link:nth-child(even) {
    background-color: #0056b3;
}

.notice-link:nth-child(even):hover {
    background-color: #007bff;
}

/* Footer Styles */
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
    <a href="admin.php"  class="home-btn">Home</a>
    <h1>Student Record</h1>
    <div class="notice-links">
       
        <a href="attendance.php" class="notice-link"> First Sem Record</a>
        <a href="attendance3.php" class="notice-link"> Second Sem Record</a>
        <a href="attendance4.php" class="notice-link"> Third Sem Record</a>
        
    </div>
</div>

<footer>
    <p>&copy; 2024 BCA, PRITHIVI NARAYAN CAMPUS, POKHARA. All rights reserved.</p>
</footer>
</body>
</html>
