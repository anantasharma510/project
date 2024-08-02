<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Student Data Entry Portal, Student Result Management System In PHP MySQL">
    <meta name="author" content="Sudhanshu Pandey">
    <title>STUDENT DATA ENTRY PORTAL - Result Hosting™</title>
    <link rel="stylesheet" href="styles.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Francois+One" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Yantramanav:500&subset=devanagari,latin" rel="stylesheet">
</head>
<body>
    <div class="container">
        <div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
            <div class="panel-body">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" role="form">
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-building-o"></i></span>
                        <input type="text" name="sn" id="fname" class="form-control" placeholder="Full Name Of School.." required/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user"></i></span>
                        <input type="text" name="stn" id="lname" class="form-control" placeholder="Full Name Of Student" required/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-user-secret"></i></span>
                        <input type="text" name="fn" id="login" class="form-control" placeholder="Full Name Of Father.." required/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
                        <input type="date" name="dob" id="dob" class="form-control" placeholder="MM/DD/YYYY" min="1990-01-01" max="2018-12-31" required/>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-venus-mars"></i></span>
                        <select class="form-control" name="gen" id="gen" required>
                            <option value="">-------------Select Gender-------------</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </div>
                    <div class="form-group input-group">
                        <span class="input-group-addon"><i class="fa fa-book"></i></span>
                        <input type="number" name="subject1" class="form-control" placeholder="Subject 1 Marks" required/>
                    </div>
                    <!-- Similar form groups for other subjects -->
                    <div class="row">
                        <div class="col-xs-4 col-sm-3 col-md-3">
                            <span class="button-checkbox">
                                <div class="checkbox">
                                    <label><input type="checkbox" value="Agreed" required><strong class="label label-primary">I Agree</strong></label>..<a href="#" data-toggle="modal" data-target="#t_and_c_m"><strong class="label label-danger">Terms and Conditions</a></strong>
                                </div>
                            </span>
                        </div>
                    </div>
                    <p>By Result Hosting™, Including Our Cookie Use.</p>
                    <hr />
                    <button type="submit" class="btn btn-success"><span class="glyphicon glyphicon-ok-sign"></span> Submit Data</button> Or  <button type="reset" class="btn btn-warning"><span class="glyphicon glyphicon-refresh"></span> Reset The Form</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="t_and_c_m" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <h4 class="modal-title" id="myModalLabel">Terms & Conditions</h4>
                </div>
                <div class="modal-body">
                    <!-- Your terms and conditions content here -->
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">I Agree</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->

    <?php
    // Database configuration
    $servername = "localhost";
    $username = "your_username";
    $password = "your_password";
    $dbname = "student_data";

    // Create connection
    $conn = new mysqli($servername, $username, $password);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Create database
    $sql_create_db = "CREATE DATABASE IF NOT EXISTS $dbname";
    if ($conn->query($sql_create_db) === TRUE) {
        echo "Database created successfully";
    } else {
        echo "Error creating database: " . $conn->error;
    }

    // Connect to the database
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL to create table
    $sql_create_table = "CREATE TABLE IF NOT EXISTS student (
        id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
        school_name VARCHAR(255) NOT NULL,
        student_name VARCHAR(255) NOT NULL,
        father_name VARCHAR(255) NOT NULL,
        dob DATE NOT NULL,
        gender VARCHAR(10) NOT NULL,
        subject1 INT NOT NULL,
        subject2 INT NOT NULL,
        subject3 INT NOT NULL,
        subject4 INT NOT NULL,
        subject5 INT NOT NULL
    )";

    // Execute create table query
    if ($conn->query($sql_create_table) === TRUE) {
        echo "Table created successfully";
    } else {
        echo "Error creating table: " . $conn->error;
    }

    // Handle form submission
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Retrieve form data
        $school_name = $_POST['sn'];
        $student_name = $_POST['stn'];
        $father_name = $_POST['fn'];
        $dob = $_POST['dob'];
        $gender = $_POST['gen'];
        $subject1 = $_POST['subject1'];
        // Retrieve marks for other subjects similarly

        // SQL to insert data into table
        $sql_insert = "INSERT INTO student (school_name, student_name, father_name, dob, gender, subject1, subject2, subject3, subject4, subject5)
                       VALUES ('$school_name', '$student_name', '$father_name', '$dob', '$gender', '$subject1', '$subject2', '$subject3', '$subject4', '$subject5')";

        // Execute insert query
        if ($conn->query($sql_insert) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql_insert . "<br>" . $conn->error;
        }
    }

    // Close connection
    $conn->close();
    ?>
</body>
</html>
