<?php

session_start();

if(!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !==true)
{
    header("location: login.php");
}


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href='https://unpkg.com/css.gg@2.0.0/icons/css/profile.css' rel='stylesheet'>
    <link rel="stylesheet" href="styl.css">
    <title>Document</title>
</head>

<body>

    <body>
        <div class="nav-bar">
            <a href=""><i class='bx bxs-home'></i>Home</a>



            <a href="profile.php">Profile</a>
            <a href="bca.php">BCA</a>
            <a href="notice.php">Notice</a>
            <a href="aboutbca.php">About Us</a>
            <a href="examportal.php">Exams Register</a>


            <div class="search-form">
                <input type="text" placeholder="Search...">
                <button class="search-btn">Search</button>
            </div>
        </div>
        <div class="container">
            <h1> Semester List</h1>
            <div class="semester-options">
                <!-- <Semester options will be displayed here -->
                <a href="bca-sem1.php">BCA Semester 1</a>
                <a href="bca-sem2.php">BCA Semester 2</a>
                <a href="bca-sem3.php">BCA semester 3</a>
                <a href="bca-sem4.php">BCA semester 4</a>
                <a href="bca-sem5.php">BCA semester 5</a>
                <a href="bca-sem6.php">BCA semester 6</a>
                <a href="bca-sem7.php">BCA semester 7</a>
                <a href="bca-sem8.php">BCA semester 8</a>

            </div>
            
        </div>
        <footer>
            <p>&copy; 2024 BCA,PRITHIVI NARYAN CAMPUS,POKHARA. All rights reserved.</p>
        </footer>
    </body>
 
</body>

</html>