<?php
include_once 'dataconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['student_id']) && isset($_POST['course_id']) && isset($_POST['date']) && isset($_POST['status'])) {
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);
        
        $sql = "INSERT INTO attendance1 (student_id, course_id, date, status) VALUES ('$student_id', '$course_id', '$date', '$status')";
        
        if ($conn->query($sql) === TRUE) {
            echo "Attendance record added successfully";
            header("Location: {$_SERVER['PHP_SELF']}");
            exit();
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "All form fields are required";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pre Board Exam Attendance - THIRD Semester</title>
    
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
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            margin-bottom: 20px;
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="date"],
        form select {
            width: calc(100% - 22px);
            padding: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }
        form button {
            width: 100%;
            padding: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        form button:hover {
            background-color: #45a049;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        .btn-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        .btn-container a {
            text-decoration: none;
            padding: 10px 20px;
            background-color: #4CAF50;
            color: white;
            border-radius: 4px;
        }
        .btn-container a:hover {
            background-color: #45a049;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <h1>Pre Board Attendance Management BCA THIRD SEMESTER</h1>
        
        <!-- Form to enter attendance data -->
        <form method="post">
            <label for="student_id">SYMBOL NO:</label>
            <input type="text" name="student_id" required>
            
            <label for="course_id">ROLL NO:</label>
            <input type="text" name="course_id" required>
            
            <label for="date">Date:</label>
            <input type="date" name="date" required>
            
            <label for="status">Status:</label>
            <select name="status" required>
                <option value="present">Present</option>
                <option value="absent">Absent</option>
            </select>
            
            <button type="submit" name="submit">Submit</button>
        </form>

        <h2>Attendance Records</h2>
        <table>
            <tr>
                <th>Student ID</th>
                <th>Course ID</th>
                <th>Date</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
            <?php
            include 'dataconnection.php';
            // Fetch and display attendance records from the database
            $sql = "SELECT * FROM attendance1"; // Corrected table name to 'attendance4'
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["student_id"] . "</td>";
                    echo "<td>" . $row["course_id"] . "</td>";
                    echo "<td>" . $row["date"] . "</td>";
                    echo "<td>" . $row["status"] . "</td>";
                    echo "<td><a href='u3.php?id=" . $row["id"] . "'>Update</a> | <a href='del3.php?id=" . $row["id"] . "' onclick='return confirm(\"Are you sure you want to delete this record?\")'>Delete</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>No attendance records found</td></tr>";
            }
            ?>
        </table>
        
        <!-- Form to download attendance records of a specific day -->
        <form method="post" action="d3.php">
            <label for="download_date">Download Attendance Records for Date:</label>
            <input type="date" name="download_date" required>
            <button type="submit" name="download">Download Attendance Records</button>
        </form>

        <div class="btn-container">
            <a href="stdrecord.php">Back</a>
        </div>
    </div>
</body>
</html>
