<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BCA First Semester</title>
    
    <style>
/* Resetting default browser styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

h2 {
    font-size: 24px; /* Increased font size */
    text-align: center;
    margin-bottom: 20px; /* Added bottom margin */
}

/* Basic styling */
body {
    font-family: Arial, sans-serif;
    line-height: 1.6;
    background-color: #f4f4f4; /* Added background color */
}

.container {
    max-width: 800px; /* Set maximum width */
    margin: 45px auto; /* Center the container horizontally */
    padding: 20px; /* Add padding inside the container */
    background-color: #fff; /* Set background color */
    border-radius: 20px; /* Add border radius for rounded corners */
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.9); /* Add shadow effect */
}

.container a {
    display: block;
    padding: 10px 0;
    text-decoration: none;
    color: #333;
    
    transition: background-color 0.3s ease; /* Smooth hover transition */
}

.container a:hover {
    background-color: #f0f0f0; /* Lighter background color on hover */
}

footer {
    background-color: #333;
    color: #fff;
    text-align: center;
    padding: 20px 0; /* Increased padding */
    position: fixed; /* Fixed position */
    bottom: 0;
    width: 100%;
}

/* Styling the home button */
.home-btn{
    /* CSS for the "Home" link */
 margin: 6px auto;
    display: inline-block; /* Display as inline-block */
    padding: 10px 17px; /* Add padding */
    background-color: #254a72; /* Set background color */
    color: #fff; /* Set text color */
    text-decoration: none; /* Remove underline */
    border-radius: 25px; /* Add border radius for rounded corners */
    transition: background-color 0.3s ease; /* Add transition effect */
}

.home-btn:hover {
    background-color: #45a049;
}

    </style>
</head>
<body>
    <a href="welcome.php" class="home-btn">Home</a>
    <h2>Welcome to BCA First Semester!</h2>
    
    <section id="main-content">
        <!-- Your main content goes here -->
        <div class="container">
           
            

                <a href="syallabus1.php">Syllabus</a>
                <a href="assignment1.php">Assignment</a>
                <a href="labreport1.php">Lab Report</a>
                <a href="notice1.php">Notice</a>
                <a href="messages1.php">Messages</a>
                
                <!-- Add more navigation links as needed -->
        </div>
       
    </section>
    <footer>
        <p>&copy; 2024 BCA First Semester. All rights reserved.</p>
    </footer>
</body>
</html>
