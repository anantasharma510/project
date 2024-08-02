<?php
include_once 'dataconnection.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['student_id'], $_POST['course_id'], $_POST['date'], $_POST['status'])) {
        $id = $_POST['id'];
        $student_id = mysqli_real_escape_string($conn, $_POST['student_id']);
        $course_id = mysqli_real_escape_string($conn, $_POST['course_id']);
        $date = mysqli_real_escape_string($conn, $_POST['date']);
        $status = mysqli_real_escape_string($conn, $_POST['status']);

        $update_sql = "UPDATE attendance1 SET student_id='$student_id', course_id='$course_id', date='$date', status='$status' WHERE id=$id";

        if ($conn->query($update_sql) === TRUE) {
            echo "Attendance record updated successfully";
            header("Location: attendance3.php");
            exit();
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        echo "All form fields are required";
    }
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $select_sql = "SELECT * FROM attendance1 WHERE id = $id";
    $result = $conn->query($select_sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Attendance Record</title>

    <style>
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f2f2f2;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        form {
            max-width: 400px;
            margin: 20px auto;
            padding: 20px;
            background: #fff;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        form label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        form input[type="text"],
        form input[type="date"],
        form select {
            width: 100%;
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
        /* CSS styling for the form */
        /* Add your CSS styles here */
        </style>
</head>
<body>
    <h1>Update Attendance Record</h1>
    <form method="post">
        <input type="hidden" name="id" value="<?php echo $row['id']; ?>">
        <label for="student_id">SYMBOL NO:</label>
        <input type="text" name="student_id" value="<?php echo $row['student_id']; ?>" required>
        
        <label for="course_id">ROLL NO:</label>
        <input type="text" name="course_id" value="<?php echo $row['course_id']; ?>" required>
        
        <label for="date">Date:</label>
        <input type="date" name="date" value="<?php echo $row['date']; ?>" required>
        
        <label for="status">Status:</label>
        <select name="status" required>
            <option value="present" <?php if($row['status'] == 'present') echo 'selected'; ?>>Present</option>
            <option value="absent" <?php if($row['status'] == 'absent') echo 'selected'; ?>>Absent</option>
        </select>
        
        <button type="submit" name="submit">Update</button>
    </form>
</body>
</html>
<?php
    } else {
        echo "No record found with the provided ID";
    }
} else {
    echo "ID parameter is missing";
}
?>
