<?php
// download.php

// Include the database connection file
include_once 'db_connect.php';

// Fetch attendance records from the database
$sql = "SELECT * FROM attendance4";
$result = $conn->query($sql);

// Create CSV content
$csv_content = "Student ID, Course ID, Date, Status\n";
if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Format date as YYYY-MM-DD for consistency
        $date = date('Y-m-d', strtotime($row['date']));
        $csv_content .= "{$row['student_id']}, {$row['course_id']}, {$date}, {$row['status']}\n";
    }
}

// Set headers for CSV download
header('Content-Type: text/csv');
header('Content-Disposition: attachment; filename="attendance_records.csv"');

// Output CSV content
echo $csv_content;
