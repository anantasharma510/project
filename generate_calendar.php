<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "college";

// Attempt to connect to the database
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch semester information from the database
$sql = "SELECT * FROM semesters ORDER BY start_date DESC LIMIT 1"; // Assuming we only need the latest semester
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Here you can generate the academic calendar based on the retrieved semester information
    // Example: Generate academic calendar events
    $start_date = new DateTime($row["start_date"]);
    $end_date = clone $start_date;
    $end_date->modify('+' . $row["duration_weeks"] . ' weeks');

    $calendar_events = array();

    // Generating events for each week
    $current_date = clone $start_date;
    while ($current_date <= $end_date) {
        // Check if current day is a working day
        if (in_array($current_date->format('l'), explode(",", $row["working_days"]))) {
            $calendar_events[] = 'Class on ' . $current_date->format('Y-m-d');
        }

        // Check if current day is the midterm exam date
        if ($current_date->format('Y-m-d') == $row["midterm_date"]) {
            $calendar_events[] = 'Midterm Exam on ' . $current_date->format('Y-m-d');
        }

        // Check if current day is the pre-board exam date
        if ($current_date->format('Y-m-d') == $row["preboard_date"]) {
            $calendar_events[] = 'Pre-Board Exam on ' . $current_date->format('Y-m-d');
        }

        $current_date->modify('+1 day');
    }

    // Display academic calendar events
    echo "Academic calendar for Semester:<br>";
    foreach ($calendar_events as $event) {
        echo $event . "<br>";
    }
} else {
    echo "No semester information found.";
}

// Close connection
$conn->close();
?>
