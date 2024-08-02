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

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["start_date"]) && isset($_POST["duration_weeks"]) && isset($_POST["working_days"]) && isset($_POST["midterm_date"]) && isset($_POST["preboard_date"])) {
    $start_date = $_POST["start_date"];
    $duration_weeks = $_POST["duration_weeks"];
    $working_days = implode(",", $_POST["working_days"]);
    $midterm_date = $_POST["midterm_date"];
    $preboard_date = $_POST["preboard_date"];

    // Prepare and bind SQL statement to insert data into the database
    $stmt = $conn->prepare("INSERT INTO semesters (start_date, duration_weeks, working_days, midterm_date, preboard_date) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("siiss", $start_date, $duration_weeks, $working_days, $midterm_date, $preboard_date);

    // Execute SQL statement
    $stmt->execute();

    // Close statement
    $stmt->close();
}

?>
<!DOCTYPE html>
<html lang="en">
<head>  
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Academic Calendar</title>
</head>
<body>
    <div class="container"> 
        <h2>Academic Calendar for First Semester</h2>
        <br>
        <!-- PHP code to display academic calendar events -->
        <?php
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
            echo "<p><strong>Academic calendar for Semester:</strong></p>";
            foreach ($calendar_events as $event) {
                echo "<p>$event</p>";
            }
        } else {
            echo "<p>No semester information found.</p>";
        }
        ?>
    </div>

    <button onclick="toggleSemesterInformation()">Enter Semester Information</button>
    <div id="semester-form" style="display: none;">
        <h2>Enter Semester Information</h2>
        <!-- Your form code here -->
    </div>

    <!-- Add UI element to select semester -->
    <select id="semester-select" onchange="generateCalendar()">
        <?php
        // Fetch all semesters from the database
        $sql = "SELECT * FROM semesters ORDER BY start_date DESC";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<option value='" . $row["id"] . "'>Semester starting on " . $row["start_date"] . "</option>";
            }
        }
        ?>
    </select>
    
    <script>
        function toggleSemesterInformation() {
            var semesterForm = document.getElementById("semester-form");
            if (semesterForm.style.display === "none") {
                semesterForm.style.display = "block";
            } else {
                semesterForm.style.display = "none";
            }
        }

        // Function to generate calendar based on selected semester
        function generateCalendar() {
            var semesterId = document.getElementById("semester-select").value;
            // Fetch semester information based on selected semesterId using AJAX
            // Generate calendar based on fetched data
        }
    </script>
</body>
</html>

<?php
// Close connection
$conn->close();
?>
