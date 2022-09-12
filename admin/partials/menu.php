<!-- Include database connection to menu because menu is included to all files -->
<?php 
// session_start();
include('../config/constants.php');
include('login_check.php');
?>
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="../css/style.css">
    <link rel="stylesheet" href="../css/admin.css">
    <script src="https://kit.fontawesome.com/b7abf0124b.js" crossorigin="anonymous"></script>
    <title>Admin Home page</title>
  </head>
  <body>
    <!-- Menu section start here  -->
    <div class="menu text-center">
       
        <ul>
            <li><a href="admin_index.php">Home</a></li>
            <li><a href="manage-admin.php">Admin</a></li>
            <li><a href="manage-category.php">Categeroy</a></li>
            <li><a href="manage-food.php">Food</a></li>
            <li><a href="manage-order.php">Order</a></li>
            <li><a href="manage-report.php">Report</a></li>
            <li><a href="customer_feedback.php">Feedback</a></li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
       
    </div>
    <!-- Menu section end here  -->
   


