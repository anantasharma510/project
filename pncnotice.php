<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Notice Upload</title>
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
    box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
}

.notice-link {
    text-align:center;
    display: block;
    padding: 15px 20px;
    margin-bottom: 10px;
    background-color: #4CAF50; /* Changed the background color */
    color: #fff;
    text-decoration: none;
    border-radius: 8px;
    transition: background-color 0.3s, transform 0.3s;
}

.notice-link:hover {
    background-color: #45a049; /* Changed the hover background color */
    transform: translateY(-3px);
}

.notice-link:nth-child(even) {
    background-color: #45a049; /* Changed the even background color */
}

.notice-link:nth-child(even):hover {
    background-color: #4CAF50; /* Changed the hover even background color */
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

.home-btn {
    margin: 20px auto;
    display: inline-block;
    padding: 12px 20px;
    background-color: #007bff;
    color: #fff;
    text-decoration: none;
    border-radius: 25px;
    transition: background-color 0.3s, transform 0.3s;
}

.home-btn:hover {
    background-color: #0056b3;
    transform: translateY(-3px);
}
    </style>
</head>
<body>
<div class="container">
    <a href="admin.php"  class="home-btn">Home</a>
    <h1>Notice Upload</h1>
    <div class="notice-links">
        <a href="admin_upload_bca.php" class="notice-link">NOTICE UPLOAD BCA</a>
        <a href="#" class="notice-link">Notice Upload First Sem</a>
        <a href="#" class="notice-link">Notice Upload Second Sem</a>
        <a href="admin_upload.php" class="notice-link">Notice Upload Third Sem</a>
        <a href="#" class="notice-link">Notice Upload Fourth Sem</a>
        <a href="#" class="notice-link">Notice Upload Fifth Sem</a>
        <a href="#" class="notice-link">Notice Upload Sixth Sem</a>
        <a href="#" class="notice-link">Notice Upload Seventh Sem</a>
    </div>
</div>
<footer>
    <p>&copy; 2024 BCA, PRITHIVI NARAYAN CAMPUS, POKHARA. All rights reserved.</p>
</footer>
</body>
</html>
