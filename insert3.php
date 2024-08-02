<!DOCTYPE html>
<html lang="en">
<head>
<title>Insert BCA 3rd Semester Student</title>
</head>
<style>
    /* CSS Styles for Form */
body {
  font-family: Arial, sans-serif;
  background-color: #f1f1f1;
  margin: 0;
  padding: 0;
}

h1 {
  text-align: center;
  color: #333;
}

table {
  margin: 20px auto;
  background-color: #fff;
  padding: 20px;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

table td {
  padding: 8px;
}

table input[type="text"],
table input[type="submit"] {
  width: 100%;
  padding: 10px;
  border: 1px solid #ccc;
  border-radius: 5px;
  box-sizing: border-box;
}

table input[type="submit"] {
  background-color: #4CAF50;
  color: white;
  border: none;
  cursor: pointer;
}

table input[type="submit"]:hover {
  background-color: #45a049;
}

    </style>
<body>
<h1>New BCA 3rd Semester Student</h1>
<table>
<form action="" method = "POST">
<tr>
<td>Roll No</td>
<td><input type="text" name="srollno" required></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" name="sname" required></td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" name="saddress" required></td>
</tr>
<tr>
<td>Course</td>
<td><input type="text" name="scourse" required></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Submit" name="submit"></td>
</tr>
</form>
</table>
<?php
include 'connection.php';
if(isset($_POST['submit']))
{
$srollno = $_POST['srollno'];
$sname = $_POST['sname'];
$saddress = $_POST['saddress'];
$scourse = $_POST['scourse'];
$query = "INSERT INTO bca3 (rollno, name, address, course) VALUES($srollno, '$sname', '$saddress', '$scourse')";
$result = mysqli_query($conn,$query);

if($result){
// echo "Insert Successfully";
header('location:display.php');
}
else{
die(mysqli_error($conn));
}
}
?>
</body>
</html>
