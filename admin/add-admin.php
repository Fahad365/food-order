<?php 
// session_start();
include ('./partials/menu.php');?>

<!-- Create form to add Admin -->
<div class="container mt-5">
    <?php include('./partials/message.php')?>
    <div class="row">
        <div class="col-mb-8">
            <div class="card">
                <div class="card-header ">
                    <h4 class="fw-bold">Add Admin
                        <a href="manage-admin.php" class="btn btn-dark float-end">Back</a>
                    </h4>
                </div>
                <div class="card-body">
                    <form action="" method="post">
                        <div class="mb-3">
                            <label class="fw-bold">Full Name</label>
                            <input type="text" name="fullname" class="form-control" placeholder="Enter Your Full Name Here">
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Username</label>
                            <input type="text" name="username" class="form-control" placeholder="Enter Your Username Here">
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Password</label>
                            <input type="password" name="password" class="form-control" placeholder="Enter Your Password Here">
                        </div>
                        
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
   </div>
</br>
 <!-- Include Footer -->
 <?php include('./partials/footer.php');?>

 <!-- Get form data from Database -->
 <?php
 if(isset($_POST['submit'])){
    
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    if(empty($fullname) || empty($username) || empty($password)){
        $_SESSION['message']="You have to fill this";
        ?>
        <script>
         window.location.href='add-admin.php';
        </script>
        <?php
        exit(0);
    }
    // sql query to get data from database
    $sql="INSERT INTO tbl_admin SET full_name='$fullname', username='$username', password='$password'";

    // executing query and save data to database
    $result=mysqli_query($conn,$sql) or die(mysqli_connect_error());

    if($result){
        $_SESSION['message']="Admin Created Successfully✔";
        ?>
         <script>
         window.location.href='manage-admin.php';
        </script>
        <?php
        exit(0);
    }
 }
 ?>