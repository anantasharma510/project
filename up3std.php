<!DOCTYPE html>
<html lang="en">
<head>
<title>Insert</title>
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
</head>
<body>
<h1>Edit Student</h1>
<?php
include 'connection.php';
$rollno = $_GET['rn'];

$query = "SELECT * FROM bca3 WHERE rollno = $rollno";
$result = mysqli_query($conn, $query);
$row = mysqli_fetch_assoc($result);
?>
<table>
<form action="" method="POST">
<tr>
<td>Roll No</td>
<td><input type="text" name="srollno" value = "<?php echo $row['rollno'];?>" readonly></td>
</tr>
<tr>
<td>Name</td>
<td><input type="text" name="sname" value="<?php echo $row['name'];?>"></td>
</tr>
<tr>
<td>Address</td>
<td><input type="text" name="saddress" value="<?php echo $row['address'];?>"></td>
</tr>
<tr>
<td>Course</td>
<td><input type="text" name="scourse" value="<?php echo $row['course'];?>"></td>
</tr>
<tr>
<td></td>
<td><input type="submit" value="Submit" name = "submit"></td>
</tr>
<?php
if(isset($_POST['submit']))
{
$name = $_POST['sname'];
$saddress = $_POST['saddress'];
$scourse = $_POST['scourse'];
$query = "UPDATE bca3 SET name = '$name', address =

'$saddress', course = '$scourse' WHERE rollno = $rollno";
$result = mysqli_query($conn,$query);
if($result){
// echo "Update Successfully";
header('location:display.php');
}
else{
die(mysqli_error($conn));
}
}
?>

</form>
</table>
</body>
</html>