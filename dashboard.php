<?php
session_start();
error_reporting(0);
include('includes/dbconnection.php');
if (strlen($_SESSION['tsasaid']) == 0) {
    header('location:logout.php');
} else {
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>TSAS Admin : Dashboard</title>
   <style>
    body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
}

.container-fluid {
    padding: 20px;
}

.card {
    border-radius: 10px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin-bottom: 20px;
}

.media {
    padding: 20px;
    display: flex;
    align-items: center;
}

.media-left {
    margin-right: 20px;
}

.media-left i {
    font-size: 22px;
}

.media-body {
    flex: 1;
}

/* Color variations */
.color-primary .border-primary {
    border-color: #007bff;
    color: #007bff;
}

.color-warning .border-warning {
    border-color: #ffc107;
    color: #ffc107;
}

.color-success .border-success {
    border-color: #28a745;
    color: #28a745;
}

/* Breadcrumb */
.breadcrumb {
    background-color: #f8f9fa;
    padding: 5px 15px;
    border-radius: 5px;
}

/* Header */
.page-header h1 {
    margin: 0;
    font-size: 24px;
    color: #333;
}

/* Links */
a {
    color: #007bff;
    text-decoration: none;
}

a:hover {
    text-decoration: underline;
}

/* Responsive */
@media (max-width: 768px) {
    .col-md-6 {
        width: 100%;
    }
}
</style>
</head>

<body>
    <?php include_once('includes/sidebar.php'); ?>
    <?php include_once('includes/header.php'); ?>
    <div class="content-wrap">
        <div class="main">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-8 p-r-0 title-margin-right">
                        <div class="page-header">
                            <div class="page-title">
                                <h1>Dashboard</h1>
                            </div>
                        </div>
                    </div><!-- /# column -->
                    <div class="col-lg-4 p-l-0 title-margin-left">
                        <div class="page-header">
                            <div class="page-title">
                                <ol class="breadcrumb text-right">
                                    <li><a href="#">Dashboard</a></li>
                                    <li class="active">Home</li>
                                </ol>
                            </div>
                        </div>
                    </div><!-- /# column -->
                </div><!-- /# row -->
                <div id="main-content">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-file f-s-22 color-primary border-primary round-widget"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <?php
                                        $sql1 = "SELECT * from  tblcourse";
                                        $query1 = $dbh->prepare($sql1);
                                        $query1->execute();
                                        $results1 = $query1->fetchAll(PDO::FETCH_OBJ);
                                        $totcourse = $query1->rowCount();
                                        ?>
                                        <h4 style="color: blue">Total Course</h4>
                                        <h4 style="color: blue"><?php echo htmlentities($totcourse); ?></h4>
                                        <a href="course.php">
                                            <h5>View Detail</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-file f-s-22 color-warning border-warning round-widget"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <?php
                                        $sql2 = "SELECT * from  tblsubject";
                                        $query2 = $dbh->prepare($sql2);
                                        $query2->execute();
                                        $results2 = $query2->fetchAll(PDO::FETCH_OBJ);
                                        $totsub = $query2->rowCount();
                                        ?>
                                        <h4 style="color: blue">Total Subject</h4>
                                        <h4 style="color: blue"><?php echo htmlentities($totsub); ?></h4>
                                        <a href="subject.php">
                                            <h5>View Detail</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card">
                                <div class="media">
                                    <div class="media-left meida media-middle">
                                        <span><i class="ti-user f-s-22 color-success border-success round-widget"></i></span>
                                    </div>
                                    <div class="media-body media-text-right">
                                        <?php
                                        $sql3 = "SELECT * from  tblteacher";
                                        $query3 = $dbh->prepare($sql3);
                                        $query3->execute();
                                        $results3 = $query3->fetchAll(PDO::FETCH_OBJ);
                                        $totteacher = $query3->rowCount();
                                        ?>
                                        <h4 style="color: blue">Total Teacher</h4>
                                        <h4 style="color: blue"><?php echo htmlentities($totteacher); ?></h4>
                                        <a href="manage-teacher.php">
                                            <h5>View Detail</h5>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php include_once('includes/footer.php'); ?>
                </div>
            </div>
        </div>
    </div>
</body>

</html>
<?php } ?>
