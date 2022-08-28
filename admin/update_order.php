<?php include ('./partials/menu.php');?>
<?php 
// if(isset($_GET['food_Id'])){
//     $food_Id=$_GET['food_Id'];
//     $sql="SELECT * FROM tbl_food WHERE Id='$food_Id'";
//     $result=mysqli_query($conn,$sql);
//     $count=mysqli_num_rows($result);
//             if($count>0){
//                 $food=mysqli_fetch_assoc($result);
//                   $title=$food['title'];
//                   $price=$food['price'];
//                   $image_name=$food['image_name'];
//     }else{
//     //  showing No data found
//     }
// }else{
//     //  showing error message
// }
?>
<!-- Order form section -->
<section class="food-menu">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
            <h2 class="text-light">Update Order Status</h2>
            </div>

             <!-- Get data from database start -->
             <?php
             $Id=$_GET['Id'];
            $sql="SELECT * FROM tbl_order WHERE Id=$Id";
            $result=mysqli_query($conn,$sql);
            // Check weather their have category or not
            $count=mysqli_num_rows($result);
            if($count>0){
                // we have data in database
                $food=mysqli_fetch_assoc($result);
                  $Id=$food['Id'];
                  $title=$food['food'];
                  $image_name=$food['image_name'];
                  $price=$food['price'];
                  $quantity=$food['qty'];
                  $total=$food['total'];
                  $order_date=$food['order_date'];
                  $status=$food['status'];
                  $customer_name=$food['customer_name'];
                  $customer_contact=$food['customer_contact'];
                  $customer_email=$food['customer_email'];
                  $customer_address=$food['customer_address'];
                  ?>
                  <!-- Get data from database end -->
                  <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
            <div class="card-body">
                <form action="" method="post">
            <div class="food-menu-box">
                <div class="food-menu-img">
                    <?php
                        // Check weather img is available or not
                        if($image_name==""){
                            echo "<div class='error'>Image Not Available</div>";
                        }else{
                    ?>
                        <!-- Display Image -->
                        <img src="../images/Food/<?php echo $image_name;?>"  alt="Food Item Name" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                </div>
                <div class="food-menu-desc">
                    <h3><b><?php echo $title?></b></h3>
                    <p class="food-price"><b><?php echo $total;?></b></p>
                    <div class="decoration">
                    <p class="align-right"><i class="fa-solid fa-user"></i> <?php echo $customer_name;?></p>
                    <p class="align-right"><i class="fa-solid fa-phone"></i> <?php echo $customer_contact;?></p>
                    <p class="align-right"><i class="fa-solid fa-clock"></i> <?php echo $order_date;?></p><br>
                    <p class="text-start"><i class="fa-solid fa-location-dot"></i> <?php echo $customer_address;?></p>
                    </div>
                    <!-- <div class="demo">
                    <p><i class="fa-solid fa-location-dot"></i> <?php /*echo $customer_address;*/?></p>
                    </div> -->
                     <br>
                   
                </div>
                <div class="d-grid gap-2 col-2 float-end">
                <!-- <button name="submit" type="button" class="btn btn-success btn-sm">Delivered</button>
                <button type="button" class="btn btn-info btn-sm" value="on-delivery">On delivery</button>
                <button type="button" class="btn btn-danger btn-sm" value="cancel-order">Cancel Order</button> -->
                <a href="manage-order.php?Id=<?php echo $Id;?>" class="btn btn-info btn-sm " name="submit">Delivered</a>
                </div>
            </div>
                  <?php
                
            }else{
                echo "<div class='error'>No Food Found</div>";
            }
            ?>
            <!-- <div class="clearfix"></div> -->

            </form>
            </div>
            <!-- card body end here -->
        </div>
        <!-- card end here -->
    </div>
    <!-- Container End here -->
    <?php 
    if(isset($_POST['submit'])){
        // $Id=$Id;
        $status= "Delivered";
        $sql="UPDATE tbl_order SET status='$status' WHERE Id='$Id'";
        $result=mysqli_query($conn,$sql);
        if($result){
            $_SESSION['message']="Updated Successfully";
            ?>
            <script>
                window.location.href='manage-order.php';
                </script>
                <?php
            exit(0);
            }else{
            $_SESSION['error']="<div class='error'>Something Wrong!</br>Try Again</div>";
            ?>
            <script>
            window.location.href='add_food.php';
            </script>
            <?php
            exit(0);
                }
    }
    ?>
</section>