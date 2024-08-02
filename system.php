<?php
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <!-- Include CSS files -->
    <link rel="stylesheet" href="system.css">
    <!-- Include CSS files -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>
    <div class="container">
    <h2>Admin Login</h2>
    
    <form action="process.php" method="post">
        
        <label for="username">Admin ID<i class='bx bxs-user'></i>:</label>
        <input type="text" id="username" name="username" required>
        <label for="password">Password<i class='bx bxs-lock' ></i>:</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">Login</button>
    
    </form>
    
   </div>
    <p></p>
    <footer>
        <p>&copy; 2024 BCA,PRITHIVI NARYAN CAMPUS,POKHARA. All rights reserved.</p>
    </footer>
</body>
</html>
