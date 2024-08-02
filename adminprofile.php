<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Users Data</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
            padding: 8px;
            text-align: center;
        }
        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <h1>Admin Users Data</h1>
    <table>
        <tr>
            <th>Name</th>
            <th>Contact</th>
            <th>Academic Section</th>
            <th>ID</th>
            <th>Password</th>
            <th>Actions</th>
        </tr>
        <tr>
            <td>Admin 1</td>
            <td>3487898</td>
            <td>Main Head</td>
            <td>100</td>
            <td>admin1</td>
            <td>
                <a href="edit.php?id=1">Edit</a> | 
              
            </td>
        </tr>
        <tr>
            <td>Admin 2</td>
            <td>1234567</td>
            <td>Department Head</td>
            <td>101</td>
            <td>admin2</td>
            <td>
                <a href="edit.php?id=2">Edit</a> | 
                
            </td>
        </tr>
        <tr>
            <td>Admin 3</td>
            <td>9876543</td>
            <td>Faculty</td>
            <td>102</td>
            <td>admin3</td>
            <td>
                <a href="edit.php?id=3">Edit</a> | 
               
            </td>
        </tr>
    </table>
</body>
</html>
