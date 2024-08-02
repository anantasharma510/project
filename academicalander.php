<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Live Calendar</title>
   
    <style>
        .container{
            width:600px;
          
        }
        /* styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.calendar {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
    padding: 10px;
    text-align: center;
}

table th {
    background-color: #333;
    color: #fff;
}

table td {
    border: 1px solid #ccc;
}

.time {
    text-align: center;
}

/* styles.css */

body {
    font-family: Arial, sans-serif;
    background-color: #f0f0f0;
}

.container {
    margin: 50px auto;
    background-color: #fff;
    padding: 20px;
    border-radius: 10px;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

h1 {
    text-align: center;
    color: #333;
}

.calendar {
    margin-bottom: 20px;
}

table {
    width: 100%;
    border-collapse: collapse;
}

table th,
table td {
    padding: 10px;
    text-align: center;
}

table th {
    background-color: #333;
    color: #fff;
}

table td {
    border: 1px solid #ccc;
}

.time {
    text-align: center;
}


        </style>
</head>
<body>
    <div class="container" >
        <h1>Live Calendar and Time</h1>
        <div class="calendar">
            <?php
                // Set timezone to Nepal
                date_default_timezone_set('Asia/Kathmandu');

                // Get current month and year
                $current_month = date("n");
                $current_year = date("Y");

                // Display the calendar for the current month
                echo "<h2>" . date("F Y") . "</h2>"; // Display month and year
                echo "<table>";
                echo "<tr><th>Sun</th><th>Mon</th><th>Tue</th><th>Wed</th><th>Thu</th><th>Fri</th><th>Sat</th></tr>";

                // Get the first day of the current month
                $first_day = date("N", mktime(0, 0, 0, $current_month, 1, $current_year));

                // Get the number of days in the current month
                $days_in_month = date("t", mktime(0, 0, 0, $current_month, 1, $current_year));

                // Initialize counters
                $day_counter = 0;
                $row_started = false;

                // Loop through each day of the current month
                for ($i = 1; $i <= $days_in_month; $i++) {
                    if (!$row_started) {
                        echo "<tr>";
                        $row_started = true;
                    }

                    // Add empty cells for days before the first day of the month
                    if ($day_counter < $first_day - 1) {
                        echo "<td></td>";
                        $day_counter++;
                    } else {
                        // Display the day
                        echo "<td>$i</td>";
                        $day_counter++;

                        // Start a new row after Saturday
                        if ($day_counter % 7 == 0 && $i != $days_in_month) {
                            echo "</tr>";
                            $row_started = false;
                        }
                    }
                }

                // Fill in empty cells at the end of the month
                while ($day_counter % 7 != 0) {
                    echo "<td></td>";
                    $day_counter++;
                }

                echo "</table>";
            ?>
        </div>
        <div class="time" id="time">
            <!-- Time will be displayed here -->
        </div>
    </div>
    <script>
        // Function to update time every second
        function updateTime() {
            var now = new Date();
            var hours = now.getHours();
            var minutes = now.getMinutes();
            var seconds = now.getSeconds();
            var ampm = hours >= 12 ? 'PM' : 'AM';
            hours = hours % 12;
            hours = hours ? hours : 12; // Handle midnight
            minutes = minutes < 10 ? '0' + minutes : minutes;
            seconds = seconds < 10 ? '0' + seconds : seconds;
            var timeString = hours + ':' + minutes + ':' + seconds + ' ' + ampm;
            document.getElementById('time').innerHTML = "<p>Current Time: " + timeString + "</p>";
        }

        // Call updateTime function every second
        setInterval(updateTime, 1000);

        // Automatically reload the page every minute to update the calendar
        setInterval(function() {
            location.reload();
        }, 60000);
    </script>
</body>
</html>
