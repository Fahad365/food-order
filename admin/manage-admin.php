 <!-- Include navbar menu -->
<?php include ('./partials/menu.php');?>
    <!-- Main section start here  -->
    <div class="main-content mp-8">
    
        <div class="container">
       
          <div class="row">
            <div class="col-md-12">
              <div class="card">
              <div class="card-header">
            <h4 class="fw-bold">Manage Admin
            <a href="add-admin.php" class="btn btn-dark float-end">Add Admin</a>
            </h4>
            </div>
            <div class="card-body">
            <table class="table table-dark table-striped text-center align-middle table-hover table-bordered border-light">
          <thead>
            <tr class="fw-bold">
                <td>SN</td>
                <td>Full Name</td>
                <td>Username</td>
                <td>Action</td>
            </tr>
        </thead>
        <tbody>
          <?php
          // Select all data from admin table from database
          $sql="SELECT * FROM tbl_admin";
          // Execute the Query
          $result=mysqli_query($conn,$sql);
          if($result==TRUE){
            // Count the number of rows to check if their have any data or not 
              $count=mysqli_num_rows($result);

              // Assign sn=1 to show serially id in UI
              $serial_number=1;

              if($count>0){
                // we have data in database
                while($rows=mysqli_fetch_assoc($result)){
                  // using while loop to get data from database 
                  // It will run as long as their have data 
                  $Id=$rows['Id'];
                  $full_name=$rows['full_name'];
                  $username=$rows['username'];
            ?>
          <tr>
            <td><?php echo $serial_number++ ?></td>
            <td><?php echo $full_name?></td>
            <td><?php echo $username?></td>
            <td>
              <a href="edit_admin.php?Id=<?php echo $Id;?>" class="btn btn-outline-info"><i class="fa-solid fa-pen-to-square"></i></a>
              <a href="delete_admin.php?Id=<?php echo $Id;?>" class="btn btn-outline-danger"><i class="fa-solid fa-trash-can"></i></a>
            </td>
          </tr>
          <?Php
                }
              }
              else{

              }
          }
          ?>  
        </tbody>
          </table>
            </div>
              </div>
            </div>
          </div>
        </div>
    </div>
    <!-- Main section end here  -->

    <!-- Include sweet alart messege -->
     <?php include('./script.php')?>
      <!-- Include Footer -->
    <?php include('./partials/footer.php');?>
