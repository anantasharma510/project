<?php
// Database connection
$servername = "localhost";
$username = "your_username";
$password = "your_password";
$dbname = "admin_login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserting task into the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task-title"]) && isset($_POST["task-description"])) {
    $task_title = $_POST["task-title"];
    $task_description = $_POST["task-description"];

    $sql = "INSERT INTO tasks (title, description) VALUES ('$task_title', '$task_description')";

    if ($conn->query($sql) === TRUE) {
        echo "Task created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetching tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>
<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_login";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserting task into the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task-title"]) && isset($_POST["task-description"])) {
    $task_title = $_POST["task-title"];
    $task_description = $_POST["task-description"];

    $sql = "INSERT INTO tasks (title, description) VALUES ('$task_title', '$task_description')";

    if ($conn->query($sql) === TRUE) {
        echo "Task created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Fetching tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);
?>
