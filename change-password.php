<?php
session_start();

if (!isset($_SESSION['id']) || !isset($_SESSION['username'])) {
    header("Location: profile.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Change Password</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f5f5f5;
        }
        form {
            background-color: #fff;
            width: 300px;
            margin: 50px auto;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        label {
            font-weight: bold;
        }
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            border: 1px solid #ccc;
            border-radius: 3px;
            box-sizing: border-box;
        }
        button[type="submit"] {
            width: 100%;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 3px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        button[type="submit"]:hover {
            background-color: #0056b3;
        }
        .ca {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            color: #007bff;
        }
        .ca:hover {
            text-decoration: underline;
        }
        .error {
            color: #ff0000;
            margin-bottom: 10px;
        }
        .success {
            color: #007bff;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <form action="change-p.php" method="post">
        <h2>Change Password</h2>
        <?php if (isset($_GET['error'])): ?>
            <p class="error"><?= htmlspecialchars($_GET['error']) ?></p>
        <?php endif; ?>

        <?php if (isset($_GET['success'])): ?>
            <p class="success"><?= htmlspecialchars($_GET['success']) ?></p>
        <?php endif; ?>

        <label for="op">Old Password</label>
        <input type="password" id="op" name="op" placeholder="Old Password">
        <br>

        <label for="np">New Password</label>
        <input type="password" id="np" name="np" placeholder="New Password">
        <br>

        <label for="c_np">Confirm New Password</label>
        <input type="password" id="c_np" name="c_np" placeholder="Confirm New Password">
        <br>

        <button type="submit">Change</button>
        <a href="profile.php" class="ca">Home</a>
    </form>
</body>
</html>
