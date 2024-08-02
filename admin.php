<?php
// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin_login";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Inserting task into the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["task-title"]) && isset($_POST["task-description"])) {
    $task_title = $_POST["task-title"];
    $task_description = $_POST["task-description"];

    $sql = "INSERT INTO tasks (title, description) VALUES (?, ?)";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ss", $task_title, $task_description);

    if ($stmt->execute()) {
        echo "Task created successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Deleting task from the database
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete-task"])) {
    $task_id = $_POST["delete-task"];

    $sql = "DELETE FROM tasks WHERE id = ?";

    // Prepare and bind parameters
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $task_id);

    if ($stmt->execute()) {
        echo "Task deleted successfully";
    } else {
        echo "Error: " . $stmt->error;
    }

    $stmt->close();
}

// Fetching tasks from the database
$sql = "SELECT * FROM tasks";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="dashboard.css">
    <style>
 
/* Reset styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

/* Typography */
body {
    font-family: Arial, sans-serif;
}

h1, h2, h3, h4, h5, h6 {
    font-weight: bold;
}

/* Layout */
.container {
    max-width: 800px;
    margin: 0 auto;
}

/* Header */
header {
    background-color: #fff;
    color: #333;
    text-align: center;
    padding: 20px 0;
    border-bottom: 4px solid #333;
}

/* Sidebar */
.sidebar {
    width: 250px;
    background: linear-gradient(to bottom, #333, #111);
    color: #fff;
    position: fixed;
    top: 0;
    left: 0;
    bottom: 0;
    overflow-y: auto;
    z-index: 999;
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
    transition: transform 0.3s ease;
}

.sidebar h1 {
    text-align: center;
    margin-bottom: 30px;
}

.sidebar ul {
    list-style-type: none;
    padding: 0;
}

.sidebar li {
    padding: 15px;
    border-bottom: 1px solid #555;
    cursor: pointer;
}

.sidebar li:last-child {
    border-bottom: none;
}

.sidebar a {
    color: #fff;
    text-decoration: none;
    display: block;
}

.sidebar a:hover {
    background-color: rgba(255, 255, 255, 0.1);
}

/* Content */
.content {
    margin-left: 250px;
    padding: 20px;
}

/* Task Form */
#task-form {
    margin-bottom: 20px;
}

#toggle-task-form {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    cursor: pointer;
}

#toggle-task-form:hover {
    background-color: #0056b3;
}

/* Task List */
.task-list {
    list-style-type: none;
    padding: 0;
}

.task-item {
    margin-bottom: 20px;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
    background-color: #f9f9f9;
}

.task-item:hover {
    background-color: #e0e0e0;
}

.task-item h4 {
    margin-top: 0;
}

.task-item p {
    margin-bottom: 0;
}

/* Delete Button */
.delete-form {
    display: inline-block;
}

.delete-form button {
    background-color: #ff6347;
    color: #fff;
    border: none;
    padding: 5px 10px;
    border-radius: 3px;
    cursor: pointer;
}

.delete-form button:hover {
    background-color: #d63e26;
}

/* Footer */
footer {
    text-align: center;
    background-color: #fff;
    padding: 10px 0;
    position: fixed;
    bottom: 0;
    width: 100%;
    border-top: 4px solid #333;
}

/* Hamburger Menu */
.hamburger {
    display: none;
}

/* Responsive Styles */
@media only screen and (max-width: 768px) {
    .sidebar {
        width: 100%;
        left: -100%;
        top: 0;
        bottom: 0;
    }

    .sidebar.show {
        transform: translateX(0);
    }

    .content {
        margin-left: 0;
    }

    .hamburger {
        display: block;
        position: fixed;
        top: 20px;
        right: 20px;
        z-index: 1000;
        cursor: pointer;
    }

    .hamburger span {
        display: block;
        width: 25px;
        height: 3px;
        background-color: #333;
        margin-bottom: 5px;
        transition: all 0.3s ease;
    }

    .hamburger.active span:nth-child(1) {
        transform: rotate(-45deg) translate(-5px, 6px);
    }

    .hamburger.active span:nth-child(2) {
        opacity: 0;
    }

    .hamburger.active span:nth-child(3) {
        transform: rotate(45deg) translate(-5px, -6px);
    }
}
.Btn {
  display: flex;
  align-items: center;
  justify-content: flex-start;
  width: 45px;
  height: 45px;
  border: none;
  border-radius: 50%;
  cursor: pointer;
  position: relative;
  overflow: hidden;
  transition-duration: .3s;
  box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.199);
  background-color: rgb(255, 65, 65);
}

/* plus sign */
.sign {
  width: 100%;
  transition-duration: .3s;
  display: flex;
  align-items: center;
  justify-content: center;
}

.sign svg {
  width: 17px;
}

.sign svg path {
  fill: white;
}
/* text */
.text {
  position: absolute;
  right: 0%;
  width: 0%;
  opacity: 0;
  color: white;
  font-size: 1.2em;
  font-weight: 600;
  transition-duration: .3s;
}
/* hover effect on button width */
.Btn:hover {
  width: 125px;
  border-radius: 40px;
  transition-duration: .3s;
}

.Btn:hover .sign {
  width: 30%;
  transition-duration: .3s;
  padding-left: 20px;
}
/* hover effect button's text */
.Btn:hover .text {
  opacity: 1;
  width: 70%;
  transition-duration: .3s;
  padding-right: 10px;
}
/* button click effect*/
.Btn:active {
  transform: translate(2px ,2px);
}

    </style>
</head>

<body>
    <header>
        <h1>Welcome to BCA Admin Dashboard</h1>
    </header>

    <div class="sidebar" id="sidebar">
        <h1>Menu</h1>
        <ul>
            <li><a href="adminprofile.php">Profile</a></li>
            <li><a href="#" class="sidebar-item" data-page="display.php">Students Section</a></li>
            <li><a href="#" class="sidebar-item" data-page="teacher.php">Teacher Section</a></li>
            <li><a href="#" class="sidebar-item" data-page="pncnotice.php">Upload BCA Notice</a></li>
            <li><a href="#" class="sidebar-item" data-page="stdrecord.php">Student Record</a></li>
            
            <li><a href="#" class="sidebar-item" data-page="resultmaker.php">Student Certificate</a></li>
            <li><a href="#" class="sidebar-item" data-page="">Online  Student Portal</a></li>
            <li><a href="#" class="sidebar-item" data-page="studentform.php">Student Formm Portal
            </a></li>
           
            <li><a href="#" class="sidebar-item" data-page="academicalander.php">Calander</a></li>
          
           



            
            <!-- Add more menu items as needed -->
            <button id="dark-mode-toggle">Dark Mode</button>
            <br><br>
            <button  class="Btn">
  
  <div class="sign"><svg viewBox="0 0 512 512"><path d="M377.9 105.9L500.7 228.7c7.2 7.2 11.3 17.1 11.3 27.3s-4.1 20.1-11.3 27.3L377.9 406.1c-6.4 6.4-15 9.9-24 9.9c-18.7 0-33.9-15.2-33.9-33.9l0-62.1-128 0c-17.7 0-32-14.3-32-32l0-64c0-17.7 14.3-32 32-32l128 0 0-62.1c0-18.7 15.2-33.9 33.9-33.9c9 0 17.6 3.6 24 9.9zM160 96L96 96c-17.7 0-32 14.3-32 32l0 256c0 17.7 14.3 32 32 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32l-64 0c-53 0-96-43-96-96L0 128C0 75 43 32 96 32l64 0c17.7 0 32 14.3 32 32s-14.3 32-32 32z"></path></svg></div>
  
  <div class="text"><li><a href="master.php">Logout</a></li></div>
</button>
        </ul>
    </div>
    
    <!-- Other menu items -->
    <button id="dark-mode-toggle">Dark Mode</button>



    <div class="content" id="content">
        <main>
            <h2>Task Manager</h2>
            <div id="task-form">
                <h3>Create New Task</h3>
                <button id="toggle-task-form">Toggle Task Form</button>
                <form id="new-task-form" method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" style="display: none;">
                    <label for="task-title">Task Title:</label>
                    <input type="text" id="task-title" name="task-title" required><br>
                    <label for="task-description">Task Description:</label><br>
                    <textarea id="task-description" name="task-description" rows="4" required></textarea><br>
                    <button type="submit">Create Task</button>
                </form>
            </div>
            <div id="task-list">
                <h3>Task List</h3>
                <ul id="tasks">
                    <?php
                    if ($result->num_rows > 0) {
                        while ($row = $result->fetch_assoc()) {
                            echo "<li class='task-item' data-task-id='" . $row["id"] . "'><h4>" . $row["title"] . "</h4><p>" . $row["description"] . "</p><form class='delete-form' method='POST' action='" . htmlspecialchars($_SERVER["PHP_SELF"]) . "'><input type='hidden' name='delete-task' value='" . $row["id"] . "'><button type='submit'>Delete</button></form></li>";
                        }
                    } else {
                        echo "<li>No tasks yet.</li>";
                    }
                    ?>
                </ul>
            </div>
        </main>
    </div>

    <footer>
        <p>&copy; 2024 BCA, PRITHIVI NARAYAN CAMPUS, POKHARA. All rights reserved.</p>
    </footer>

    <!-- Hamburger menu icon -->
    <div class="hamburger" id="hamburger">
        <span></span>
        <span></span>
        <span></span>
    </div>
    

    <!-- Add your JavaScript code here -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Handle sidebar item click
            $('.sidebar-item').click(function(e) {
                e.preventDefault(); // Prevent default link behavior

                // Get the page to load from the data-page attribute
                var page = $(this).data('page');

                // Load content using AJAX
                $.ajax({
                    url: page,
                    type: 'GET',
                    success: function(response) {
                        $('#content main').html(response); // Replace content in main area
                    },
                    error: function(xhr, status, error) {
                        console.error(status + ': ' + error);
                    }
                });
            });

            // Toggle sidebar and content area
            $('#hamburger').click(function() {
                $('#sidebar').toggleClass('show');
                $('#content').toggleClass('active');
                $('#hamburger').toggleClass('active');
            });

            // Toggle task form visibility
            $('#toggle-task-form').click(function() {
                $('#new-task-form').toggle();
            });

            // Handle task deletion using event delegation
            $(document).on('submit', '.delete-form', function(e) {
                e.preventDefault();
                var taskId = $(this).find('input[name="delete-task"]').val();

                // AJAX request to delete task
                $.ajax({
                    url: "<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>",
                    type: 'POST',
                    data: {
                        'delete-task': taskId
                    },
                    success: function(response) {
                        console.log(response);
                        // Reload the task list
                        location.reload();
                    },
                    error: function(xhr, status, error) {
                        console.error(status + ': ' + error);
                    }
                });
            });
        });
        /* Dark mode styles */
        $(document).ready(function() {
    // Function to toggle dark mode
    function toggleDarkMode() {
        $('body').toggleClass('dark-mode');
        // You can add more elements to toggle for dark mode
    }

    // Handle dark mode toggle button click
    $('#dark-mode-toggle').click(function() {
        toggleDarkMode();
        var mode = $('body').hasClass('dark-mode') ? 'Dark' : 'Light';
        $(this).text(mode + ' Mode');
    });
});

    </script>
</body>

</html>
