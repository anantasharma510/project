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

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $semester = $_POST['semester'];
    $examType = $_POST['examType'];
    $examDate = $_POST['examDate'];
    $subjects = isset($_POST['subjects']) ? implode(", ", $_POST['subjects']) : '';

    if (count(explode(", ", $subjects)) > 5) {
        header("Location: index.php?error=1");
        exit();
    }

    $sql = "INSERT INTO registrations (semester, exam_type, exam_date, subjects) VALUES (?, ?, ?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("isss", $semester, $examType, $examDate, $subjects);

    if ($stmt->execute()) {
        // Redirect to welcome.php after successful registration
        header("Location: examregview.php?success=1");
        exit();
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $stmt->close();
}

$conn->close();
?>
