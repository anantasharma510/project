<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enter Semester Information</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <div class="container">
        <h2>Enter Semester Information</h2>
        <form action="academiccalander.php" method="post">
            <label for="start_date">Start Date:</label><br>
            <input type="date" id="start_date" name="start_date"><br>
            <label for="duration_weeks">Duration (in weeks):</label><br>
            <input type="number" id="duration_weeks" name="duration_weeks"><br>
            <label for="working_days">Working Days:</label><br>
            <input type="checkbox" id="monday" name="working_days[]" value="Monday">
            <label for="monday">Monday</label>
            <input type="checkbox" id="tuesday" name="working_days[]" value="Tuesday">
            <label for="tuesday">Tuesday</label>
            <input type="checkbox" id="wednesday" name="working_days[]" value="Wednesday">
            <label for="wednesday">Wednesday</label>
            <input type="checkbox" id="thursday" name="working_days[]" value="Thursday">
            <label for="thursday">Thursday</label>
            <input type="checkbox" id="friday" name="working_days[]" value="Friday">
            <label for="friday">Friday</label><br>
            <label for="midterm_date">Midterm Exam Date:</label><br>
            <input type="date" id="midterm_date" name="midterm_date"><br>
            <label for="preboard_date">Pre-board Exam Date:</label><br>
            <input type="date" id="preboard_date" name="preboard_date"><br><br>
            <input type="submit" value="Submit">
        </form>
    </div>
</body>
</html>
