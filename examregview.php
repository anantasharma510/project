<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "exam_registration";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM registrations";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Exam Registration View</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
      body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
        }
        .container {
            width: 80%;
            margin-top: 50px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 20px 0;
            font-size: 18px;
            text-align: left;
            border: 1px solid #ddd;
            border-radius: 5px;
            overflow: hidden;
        }
        table th, table td {
            padding: 12px;
            background: #f9f9f9;
            border-bottom: 1px solid #ddd;
        }
        table th {
            background-color: #f2f2f2;
            font-weight: bold;
        }
        table td {
            vertical-align: top;
        }
        .no-data {
            text-align: center;
            padding: 20px;
            color: #666;
        }
    </style>
</head>
<body>
    <table>
        <thead>
            <tr>
                <th>Semester</th>
                <th>Exam Type</th>
                <th>Exam Date</th>
                <th>Subjects</th>
                <th>Approved</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row['semester'] . "</td>";
                    echo "<td>" . ($row['exam_type'] == 'r' ? 'Regular' : 'Back') . "</td>";
                    echo "<td>" . $row['exam_date'] . "</td>";
                    echo "<td>" . $row['subjects'] . "</td>";
                    echo "<td>" . ($row['approved'] ? 'Yes' : 'No') . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No registrations found</td></tr>";
            }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html>
