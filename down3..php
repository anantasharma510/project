<?php
include 'connection.php';

// Fetch data for BCA Fourth Semester
$query = "SELECT * FROM bca4";
$result = mysqli_query($conn, $query);

// Generate CSV file content
$csv_content = "Roll No,Name,Address,Course\n";
while($row = mysqli_fetch_assoc($result)) {
    $csv_content .= $row['rollno'] . "," . $row['name'] . "," . $row['address'] . "," . $row['course'] . "\n";
}

// Set headers for file download
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="BCA_Fourth_Semester_Data.csv"');

// Output CSV content
echo $csv_content;

// Close connection and exit script
mysqli_close($conn);
exit();
?>
<?php
include 'connection.php';

// Fetch data for BCA Fourth Semester
$query = "SELECT * FROM bca4";
$result = mysqli_query($conn, $query);

// Generate CSV file content
$csv_content = "Roll No,Name,Address,Course\n";
while($row = mysqli_fetch_assoc($result)) {
    $csv_content .= $row['rollno'] . "," . $row['name'] . "," . $row['address'] . "," . $row['course'] . "\n";
}

// Set headers for file download
header('Content-Type: application/csv');
header('Content-Disposition: attachment; filename="BCA_Fourth_Semester_Data.csv"');

// Output CSV content
echo $csv_content;

// Close connection and exit script
mysqli_close($conn);
exit();
?>
