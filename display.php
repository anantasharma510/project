<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student</title>
    <style>
        /* CSS Styles for Table */
          /* General Styles */
          body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            margin-top: 20px;
        }

        /* CSS Styles for Table */
        table {
            width: 100%;
            border-collapse: collapse;
            border-radius: 8px;
            overflow: hidden;
            box-shadow: 0 4px 8px 0 rgba(0,0,0,0.2);
            margin-bottom: 40px;
        }

        th, td {
            padding: 12px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }

        th {
            background-color: #4CAF50;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f9f9f9;
        }

        /* Styles for Action Buttons */
        .action-buttons {
            text-align: center;
        }

        button {
            padding: 8px 16px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            transition: transform 0.3s ease-in-out;
            margin-right: 5px;
        }

        button.update {
            background-color: #2196F3;
            color: white;
        }

        button.delete {
            background-color: #f44336;
            color: white;
        }

        button:hover {
            transform: scale(1.1);
        }

        /* Styling links */
        a {
          
            text-decoration: none;
        }

        /* Hover effect for rows */
        tr:hover {
            background-color: #f5f5f5;
        }
    </style>
</head>
<body>
    <h1>List of BCA First Semester Students</h1>
    <a href='insert.php'><button style='color:green;'>Add+</button></a>
    <a href="down1.php?semester=1"><button style='color:blue;'>Download</button></a>
    <br><br>
    <table>
        <tr class="header" style="background-color:yellow">
            <th>Roll No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Course</th>
            <th>Action</th>
        </tr>

        <!-- PHP for BCA 1st semester students -->
        <?php
        include 'connection.php';

        $query = "SELECT * FROM student";
        $result = mysqli_query($conn, $query);
        if (!$result) {
            die("Query failed: " . mysqli_error($conn));
        }
        while($row = mysqli_fetch_assoc($result))
        {
            $rollno = $row['rollno'];
            $name = $row['name'];
            $address = $row['address'];
            $course = $row['course'];
            echo"<tr>
            <td>".$rollno."</td>
            <td>".$name."</td>
            <td>".$address."</td>
            <td>".$course."</td>
            <td>
            <a href='update.php?rn=$rollno'><button style='color:blue;'>Update</button></a>
            <a href='delete.php?rn=$rollno'><button style='color:red;'>Delete</button></a>
            </td>
            </tr>";
        }
        ?>

    </table>

    <br><br><br>

    <h1>List of BCA Third Semester Students</h1>
    <a href='insert3.php'><button style='color:green;'>Add+</button></a>
    <a href="down3.php?semester=3"><button style='color:blue;'>Download</button></a>
    <br><br>
    <table>
        <tr class="header" style="background-color:yellow">
            <th>Roll No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Course</th>
            <th>Action</th>
        </tr>

        <!-- PHP for BCA 3rd semester students -->
        <?php
        $query_bca3 = "SELECT * FROM bca3";
        $result_bca3 = mysqli_query($conn, $query_bca3);
        if (!$result_bca3) {
            die("Query failed: " . mysqli_error($conn));
        }
        while($row_bca3 = mysqli_fetch_assoc($result_bca3))
        {
            $rollno = $row_bca3['rollno'];
            $name = $row_bca3['name'];
            $address = $row_bca3['address'];
            $course = $row_bca3['course'];
            echo"<tr>
            <td>".$rollno."</td>
            <td>".$name."</td>
            <td>".$address."</td>
            <td>".$course."</td>
            <td>
            <a href='up3std.php?rn=$rollno'><button style='color:blue;'>Update</button></a>
            <a href='del3std.php?rn=$rollno'><button style='color:red;'>Delete</button></a>
            </td>
            </tr>";
        }
        ?>

    </table>

    <br><br>

    <h1>List of BCA Fourth Semester Students</h1>
    <a href='insert4.php'><button style='color:green;'>Add+</button></a>
    <a href="down4.php?semester=4"><button style='color:blue;'>Download</button></a>
    <br><br>
    <table>
        <tr class="header" style="background-color:yellow">
            <th>Roll No</th>
            <th>Name</th>
            <th>Address</th>
            <th>Course</th>
            <th>Action</th>
        </tr>
        <br><br><br>
        <!-- PHP for BCA 4th semester students -->
        <?php
        $query_bca4 = "SELECT * FROM bca4";
        $result_bca4 = mysqli_query($conn, $query_bca4);
        if (!$result_bca4) {
            die("Query failed: " . mysqli_error($conn));
        }
        while($row_bca4 = mysqli_fetch_assoc($result_bca4))
        {
            $rollno = $row_bca4['rollno'];
            $name = $row_bca4['name'];
            $address = $row_bca4['address'];
            $course = $row_bca4['course'];
            echo"<tr>
            <td>".$rollno."</td>
            <td>".$name."</td>
            <td>".$address."</td>
            <td>".$course."</td>
            <td>
            <a href='up4std.php?rn=$rollno'><button style='color:blue;'>Update</button></a>
            <a href='del4std.php?rn=$rollno'><button style='color:red;'>Delete</button></a>
            </td>
            </tr>";
        }
        ?>

    </table>

    <br><br>

    <a href="admin.php"><button style="color:red;">Back</button></a>
</body>
</html>
