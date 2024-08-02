<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Certificate Template</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .certificate {
            width: 800px;
            margin: 50px auto;
            border: 2px solid #333;
            padding: 20px;
            box-sizing: border-box;
        }
        .certificate h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        .details {
            margin-bottom: 20px;
        }
        .details p {
            margin: 10px 0;
        }
    </style>
</head>
<body>
    <div class="certificate">
        <h2>Certificate of Achievement</h2>
        <div class="details">
            <p><strong>School Name:</strong> <?php echo $school_name; ?></p>
            <p><strong>Student Name:</strong> <?php echo $student_name; ?></p>
            <p><strong>Father Name:</strong> <?php echo $father_name; ?></p>
            <p><strong>Date of Birth:</strong> <?php echo $dob; ?></p>
            <p><strong>Gender:</strong> <?php echo $gender; ?></p>
            <p><strong>Subject 1 Marks:</strong> <?php echo $subject1_marks; ?></p>
            <p><strong>Subject 2 Marks:</strong> <?php echo $subject2_marks; ?></p>
            <p><strong>Subject 3 Marks:</strong> <?php echo $subject3_marks; ?></p>
            <p><strong>Subject 4 Marks:</strong> <?php echo $subject4_marks; ?></p>
            <p><strong>Subject 5 Marks:</strong> <?php echo $subject5_marks; ?></p>
        </div>
        <p>This certificate is awarded for outstanding performance in academics.</p>
    </div>
</body>
</html>
