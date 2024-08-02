<?php
// Establish database connection
$servername = "localhost";
$username = "root";
$password = "";
$database ="";

$conn = new mysqli($servername, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Insert data into the table
if(isset($_POST['submit'])) {
    $day = $_POST['day'];
    $time = $_POST['time'];
    $class = $_POST['class'];
    $semester = $_POST['semester'];

    $sql = "INSERT INTO schedule (day, time, class, semester) VALUES ('$day', '$time', '$class', '$semester')";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Update data in the table
if(isset($_POST['update'])) {
    $id = $_POST['id'];
    $day = $_POST['day'];
    $time = $_POST['time'];
    $class = $_POST['class'];
    $semester = $_POST['semester'];

    $sql = "UPDATE schedule SET day='$day', time='$time', class='$class', semester='$semester' WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $conn->error;
    }
}

// Delete data from the table
if(isset($_POST['delete'])) {
    $id = $_POST['id'];

    $sql = "DELETE FROM schedule WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Record deleted successfully";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teacher Schedule Management</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h1>Teacher Schedule Management</h1>
        <div class="schedule">
            <!-- HTML forms for inserting, updating, and deleting data -->
            <form action="" method="post">
                <input type="text" name="day" placeholder="Day">
                <input type="text" name="time" placeholder="Time">
                <input type="text" name="class" placeholder="Class">
                <select name="semester">
                    <option value="1st Semester">1st Semester</option>
                    <option value="3rd Semester">3rd Semester</option>
                    <option value="4th Semester">4th Semester</option>
                </select>
                <input type="submit" name="submit" value="Add">
            </form>

            <!-- Update form -->
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="text" name="day" placeholder="Day">
                <input type="text" name="time" placeholder="Time">
                <input type="text" name="class" placeholder="Class">
                <select name="semester">
                    <option value="1st Semester">1st Semester</option>
                    <option value="3rd Semester">3rd Semester</option>
                    <option value="4th Semester">4th Semester</option>
                </select>
                <input type="submit" name="update" value="Update">
            </form>

            <!-- Delete form -->
            <form action="" method="post">
                <input type="hidden" name="id" value="<?php echo $id; ?>">
                <input type="submit" name="delete" value="Delete">
            </form>
        </div>
    </div>
</body>
</html>
