<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Manage Category</title>
   <style>.category-img {border-radius:50%;}</style>
</head>
 <!-- Include navbar menu -->
 <?php include ('./partials/menu.php');?>

<!-- Main section start here  -->
<div class="main-content md-8">
<?php include('./partials/message.php')?>
    <div class="container">
   
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <?php
            if(isset($_SESSION['remove'])){
              echo $_SESSION['remove'];
              unset ($_SESSION['remove']);
            }
            ?>
          <div class="card-header">
        <h4 class="fw-bold">Manage Category
        <a href="add_category.php" class="btn btn-dark float-end">Add Category</a>
        </h4>
        </div>
        <div class="card-body">
        <table class="table table-dark table-striped text-center align-middle table-hover table-bordered border-light">
      <thead>
        <tr class="fw-bold">
            <td>SN</td>
            <td>Title</td>
            <td>Image</td>
            <td>Featured</td>
            <td>Active</td>
            <td>Action</td>
        </tr>
    </thead>
    <tbody>
      <?php
      // Select all data from admin table from database
      $sql="SELECT * FROM tbl_category";
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
              $title=$rows['title'];
              $image_name=$rows['image_name'];
              $featured=$rows['featured'];
              $active=$rows['active'];

        ?>
      <tr>
        <td><?php echo $serial_number++ ?></td>
        <td><?php echo $title?></td>
        <td>
          <?php 
              //Check weater image name is available or not
              if($image_name!=''){
                  // Display image
                  ?>
                  <img src="../images/category/<?php echo $image_name;?>" width="70px" class="category-img" alt="category img">
                  <?php
              }else{
                  // Display image Error messege
                  echo "<div class=error>Image Not Added</div>";
              }
          ?>
        </td>
        <td><?php echo $featured?></td>
        <td><?php echo $active?></td>
        <td>
          <a href="edit_category.php?Id=<?php echo $Id;?>" class="btn btn-outline-info btn-sm mx-1"><i class="fa-solid fa-pen-to-square"></i> Edit Category</a>
          <a href="delete_category.php?Id=<?php echo $Id;?>&image_name=<?php echo $image_name;?>" class="btn btn-outline-danger btn-sm mx-1"><i class="fa-solid fa-trash-can"></i> Delete Category</a>
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

 <!-- Include Footer -->
<?php include('./partials/footer.php');?>