<!DOCTYPE html>
<head>
<title>Teacher</title>
<style>
body {
  font-family: Arial, sans-serif;
  background-color: #f3f3f3;
  margin: 0;
  padding: 0;
}

h1 {
  text-align: center;
  color: #333;
}

table {
  margin: 20px auto;
  border-collapse: collapse;
  width: 80%;
  background-color: #fff;
  border-radius: 8px;
  box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
}

th, td {
  padding: 15px;
}

th {
  background-color: #4CAF50;
  color: white;
}

tr:nth-child(even) {
  background-color: #f2f2f2;
}

tr:hover {
  background-color: #ddd;
}

a {
  text-decoration: none;
}

button {
  padding: 8px 12px;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  transition: background-color 0.3s;
}

button.add {
  background-color: #4CAF50;
  color: white;
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
  background-color: #555;
}

</style>
</head>
<body>
<h1>List of BCA Teachers</h1>
<a href='insert_teacher.php'><button style='color:green;'>Add Teacher</button></a><br><br>
<table border='1' cellspacing='0'>
<tr style="background-color:yellow">
<th>Teacher Code</th>
<th>Name</th>
<th>Contact</th>
<th>Address</th>
<th>Action</th>
</tr>
<!-- PHP -->
<?php
include 'connection_teacher.php';
$query = "SELECT * FROM teacher";
$result = mysqli_query($conn, $query);
while($row = mysqli_fetch_assoc($result))
{
$teacher_code = $row['teacher_code'];
$name = $row['name'];
$contact = $row['contact'];
$address = $row['address'];
echo"<tr>
<td>".$teacher_code."</td>
<td>".$name."</td>
<td>".$contact."</td>
<td>".$address."</td>
<td>
<a href='update_teacher.php?code=$teacher_code'><button style='color:blue;'>Update</button></a>
<a href='delete_teacher.php?code=$teacher_code'><button style='color:red;'>Delete</button></a>
</td>
</tr>";
}
?>
</table>
<br><br>
<a  href ="admin.php"><button style="color:red;">Back</button></a>
</body>
</html>