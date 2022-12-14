
<!-- Include navbar menu -->
<?php include ('./partials/menu.php');?>
    <!-- Main section start here  -->
    <div class="main-content py-2"><br>
        <div class="container-fluid">
       
          <div class="row">
            <div class="col-md-12">
              <div class="card">
              <div class="card-header">
            <h4 class="fw-bold">Manage Order
            <!-- <a href="add-admin.php" class="btn btn-dark float-end">Add Admin</a> -->
            </h4>
            </div>
            <div class="card-body">
            <table class="table table-dark table-striped text-center align-middle table-hover table-bordered border-light">
          <thead>
            <tr class="fw-bold align-middle">
                <td>SN</td>
                <td>Food</td>
                <td>Img</td>
                <td>Price</td>
                <td>Quantity</td>
                <td>Total Price</td>
                <td>Order Date</td>
                <td>Status</td>
                <td>Customer Name</td>
                <td>Customer Number</td>
                <td>Customer Email</td>
                <td>Customer Address</td>
                <td>Action</td>

            </tr>
        </thead>
        <tbody>
          <?php
          // Select all data from admin table from database
          $sql="SELECT * FROM tbl_order ORDER BY Id DESC";
          // Execute the Query
          $result=mysqli_query($conn,$sql);
          if($result==TRUE){
            // Count the number of rows to check if their have any data or not 
              $count=mysqli_num_rows($result);

              // Assign sn=1 to show serially id in UI
              $serial_number=1;

              if($count>0){
                // we have data in database
                while($order=mysqli_fetch_assoc($result)){
                  // using while loop to get data from database 
                  // It will run as long as their have data 
                  $Id=$order['Id'];
                  $food=$order['food'];
                  $image_name=$order['image_name'];
                  $price=$order['price'];
                  $quantity=$order['qty'];
                  $total=$order['total'];
                  $order_date=$order['order_date'];
                  $status=$order['status'];
                  $customer_name=$order['customer_name'];
                  $customer_contact=$order['customer_contact'];
                  $customer_email=$order['customer_email'];
                  $customer_address=$order['customer_address'];
            ?>
          <tr>
            <td><?php echo $serial_number++ ?></td>
            <td><?php echo $food;?></td>
            <td>
                <?php 
                  //Check weater image name is available or not
                  if($image_name!=''){
                      // Display image
                      ?>
                      <img src="../images/Food/<?php echo $image_name;?>" width="70px" class="food-img" alt="Food img">
                      <?php
                  }else{
                      // Display image Error messege
                      echo "<div class=error>Image Not Added</div>";
                  }
                ?>
            </td>
            <td><?php echo $price;?></td>
            <td><?php echo $quantity;?></td>
            <td><?php echo $total;?></td>
            <td><?php echo $order_date;?></td>
            <td>
              <?php
              if($status=="Ordered"){
                echo "<div class='ordered'>$status</div>";
              }elseif($status=="Delivered"){
                echo "<div class='delivered'>$status</div>";
              }elseif($status=="On-delivery"){
                echo "<div class='on-delivery'>$status</div>";
              }elseif($status=="Cancel-Order"){
                echo "<div class='cancel'>$status</div>";
              }
              ?>
            </td>
            <td><?php echo $customer_name;?></td>
            <td><?php echo $customer_contact;?></td>
            <td><?php echo $customer_email;?></td>
            <td><?php echo $customer_address;?></td>
            <td>
              <a href="order_status.php?Id=<?php echo $Id;?>" class="btn btn-outline-info btn-sm "><i class="fa-solid fa-pen-to-square"></i>Update Order Status</a><br>
              <a href="delete_order.php?Id=<?php echo $Id;?>" class="btn btn-outline-danger btn-sm "><i class="fa-solid fa-trash-can"></i>Delete Order</a>
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