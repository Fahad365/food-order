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
                <?php
                    if(isset($_GET['Id'])){
                        //    echo $student_id=$_GET['Id'];
                            $admin_Id=$_GET['Id'];
                            $sql= "SELECT * FROM tbl_admin WHERE Id='$admin_Id'";
                            $result=mysqli_query($conn,$sql);
    
                        
                        if(mysqli_num_rows($result)>0){
                            $admin=mysqli_fetch_array($result);
                        ?>
                    
                    <form action="" method="post">
                    <input type="hidden" name="admin_Id" value="<?=$admin['Id'];?>">
                        <div class="mb-3">
                            <label class="fw-bold">Full Name</label> 
                            <!-- value data will come from db table -->
                            <input type="text" name="fullname" class="form-control" value="<?=$admin['full_name'];?>" placeholder="Enter Your Full Name Here">
                        </div>
                        <div class="mb-3">
                            <label class="fw-bold">Username</label>
                            <!-- value data will come from db table -->
                            <input type="text" name="username" class="form-control" value="<?=$admin['username'];?>" placeholder="Enter Your Username Here">
                        </div>
                        <div class="mb-3">
                            <button type="submit" name="submit" class="btn btn-primary">Save</button>
                        </div>
                    </form>
                    <?php
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
   </div>
</br>

<!-- Collect all the data from db and when the user 
click submit then all the data will be updated -->
<?php
 if(isset($_POST['submit'])){
    
    $fullname=$_POST['fullname'];
    $username=$_POST['username'];

    $sql="UPDATE tbl_admin SET full_name='$fullname',username='$username'
    WHERE Id='$admin_Id'" ;
    $result=mysqli_query($conn,$sql);

    // Show alert message according to action
    if($result){
       $_SESSION['message']="Updated Successfully";
       ?>
       <script>
         window.location.href='manage-admin.php';
        </script>
        <?php
       exit(0);
   }else{
       $_SESSION['message']="Sorry! Try Again";
       ?>
       <script>
         window.location.href='add-admin.php';
        </script>
        <?php
       exit(0);
   }
 }
 ?>
 <!-- Include Footer -->
 <?php include('./partials/footer.php');?>
