<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Register Exam</title>
    <link rel="stylesheet" href="assets/css/style.css">
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        form {
            background: #fff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        label {
            display: block;
            margin-top: 10px;
        }
        select, input[type="date"], button {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
        }
        .subjects {
            margin-top: 10px;
        }
        .subjects label {
            display: inline-block;
            width: 100%;
            margin-bottom: 5px;
        }
    </style>
</head>
<body>
    <form id="examForm" action="register.php" method="post">
        <label for="semester">Semester</label>
        <select name="semester" id="semester" required>
            <option disabled selected>Select Semester</option>
            <?php
                $semesters = [
                    1 => '1st Semester',
                    2 => '2nd Semester',
                    3 => '3rd Semester',
                    4 => '4th Semester',
                    5 => '5th Semester',
                    6 => '6th Semester',
                    7 => '7th Semester',
                    8 => '8th Semester'
                ];
                foreach ($semesters as $index => $semester) {
                    echo "<option value='" . $index . "'>$semester</option>";
                }
            ?>
        </select>

        <label for="examType">Type</label>
        <select name="examType" id="examType" required>
            <option value="r">Regular</option>
            <option value="b">Back</option>
        </select>
        
        <label for="examDate">Exam Date</label>
        <input type="date" name="examDate" id="examDate" required>

        <label for="subjects">Subjects (Select up to 5)</label>
        <div class="subjects" id="subjects">
            <p>Please select a semester first.</p>
        </div>

        <button type="submit">Submit</button>
    </form>

    <script>
        const subjects = {
            1: ['CACS101 - Computer Fundamentals & Applications', 'CACO102 - Society and Technology', 'CAEN103 - English I', 'CAMT104 - Mathematics I', 'CACS105 - Digital Logic'],
            2: ['CACS151 - C Programming', 'CAAC152 - Financial Accounting', 'CAEN153 - English II', 'CAMT154 - Mathematics II', 'CACS155 - Microprocessor and Computer Architecture'],
            3: ['CACS201 - Data Structures and Algorithms', 'CAST202 - Probability and Statistics', 'CACS203 - System Analysis and Design', 'CACS204 - OOP in Java', 'CACS205 - Web Technology'],
            4: ['CACS251 - Operating System', 'CACS252 - Numerical Methods', 'CACS253 - Software Engineering', 'CACS254 - Scripting Language', 'CACS255 - Database Management System', 'CAPJ256 - Project I'],
            5: ['CACS301 - MIS and E-Business', 'CACS302 - DotNet Technology', 'CACS303 - Computer Networking', 'CAMG304 - Introduction to Management', 'CACS305 - Computer Graphics and Animation'],
            6: ['CACS351 - Mobile Programming', 'CACS352 - Distributed System', 'CAEC353 - Applied Economics', 'CACS354 - Advanced Java Programming', 'CACS355 - Network Programming', 'CAPJ356 - Project II'],
            7: ['CACS401 - Cyber Law and Professional Ethics', 'CACS402 - Cloud Computing', 'CAIN403 - Internship', 'CACS404 - Image Processing', 'CACS405 - Database Administration', 'CACS406 - Network Administration', 'CACS408 - Advanced Dot Net Technology', 'CACS409 - E-Governance', 'CACS410 - Artificial Intelligence'],
            8: ['CAOR451 - Operations Research', 'CAPJ452 - Project III', 'CACS453 - Database Programming', 'CACS454 - Geographical Information System', 'CACS455 - Data Analysis and Visualization', 'CACS456 - Machine Learning', 'CACS457 - Multimedia System', 'CACS458 - Knowledge Engineering', 'CACS459 - Information Security', 'CACS460 - Internet of Things']
        };

        const semesterSelect = document.getElementById('semester');
        const subjectsDiv = document.getElementById('subjects');

        // Update subjects based on selected semester
        semesterSelect.addEventListener('change', function() {
            const semesterValue = this.value;
            const subjectsForSemester = subjects[semesterValue] || [];

            // Clear current subject options
            subjectsDiv.innerHTML = '';

            // Populate new subject options
            subjectsForSemester.forEach(subject => {
                let checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'subjects[]';
                checkbox.value = subject;
                checkbox.id = subject;
                checkbox.addEventListener('change', limitSelection);

                let label = document.createElement('label');
                label.htmlFor = subject;
                label.textContent = subject;

                subjectsDiv.appendChild(checkbox);
                subjectsDiv.appendChild(label);
            });
        });

        function limitSelection() {
            const checkedBoxes = document.querySelectorAll('input[name="subjects[]"]:checked');
            if (checkedBoxes.length > 5) {
                this.checked = false;
                alert('You can select up to 5 subjects only.');
            }
        }
    </script>
</body>
</html>
