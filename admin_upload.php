<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Notice</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }

        .container {
            max-width: 500px;
            margin: 20px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form {
            display: flex;
            flex-direction: column;
        }

        label {
            margin-bottom: 5px;
            font-weight: bold;
        }

        input[type="text"],
        textarea {
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }

        textarea {
            height: 150px;
        }

        input[type="submit"] {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
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
    <h1>Upload Notice</h1>
    <form action="upload_notice.php" method="post">
        <label for="notice_title">Notice Title:</label>
        <input type="text" id="notice_title" name="notice_title">
        <label for="notice_content">Notice Content:</label>
        <textarea id="notice_content" name="notice_content"></textarea>
        <input type="submit" value="Upload Notice">
        <a href="pncnotice.php"  class="home-btn">Back</a>
    </form>
</div>
</body>
</html>
