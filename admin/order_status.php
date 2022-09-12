<?php include ('./partials/menu.php');?>
<section class="food-menu">
    <div class="container">
        <div class="card">
            <div class="card-header bg-dark">
                <h2 class="text-light">Update Order Status</h2>
            </div>
            <!-- Get data from database start -->
            <?php
                // $Id = isset($_GET['id']) ? $_GET['id'] : '';
                $Id=$_GET['Id'];
                $sql="SELECT * FROM tbl_order WHERE Id='$Id'";
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
                    <form action="" method="post">
            <div class="card-body">
                
                    <div class="row">
                        <div class="col-2">
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
                        <div class="col-6">
                            <h3><b><?php echo $title?></b></h3>
                            <p class="food-price"><b><?php echo $total;?></b></p>
                            <p class="text-start"><i class="fa-solid fa-user"></i> <?php echo $customer_name;?></p>
                            <p class="text-start"><i class="fa-solid fa-phone"></i> <?php echo $customer_contact;?></p>
                            <p class="text-start"><i class="fa-solid fa-clock"></i> <?php echo $order_date;?></p>
                            <p class="text-start"><i class="fa-solid fa-location-dot"></i> <?php echo $customer_address;?></p>
                        </div>
                        <div class="col-3">
                            <input type="hidden" name="Id" value="<?php echo $Id;?>">
                            <button name="delivered" type="submit" value="Delivered" class="btn btn-success btn-sm mb-3">Delivered</button><br>               
                            <button name="on_delivery" type="submit" type="submit"value="On-delivery" class="btn btn-info btn-sm mb-3">On delivery</button><br>
                            <button name="cancel" type="submit" type="submit" value="Cancel-Order" class="btn btn-danger btn-sm mb-3">Cancel Order</button>
                        </div>
                    </div>
            </div>
                    <?php
                
                }else{
                    echo "<div class='error'>No Food Found</div>";
                }
                ?>
                </form>
            </div>
    </div>
</section>  
<!-- Check weather delivered btn click or not and send valu to UI -->
    <?php 
    if(isset($_POST['delivered'])){
        $Id=$_POST['Id'];
        $status=$_POST['delivered'];
        // $status= "Delivered";
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
                $_SESSION['message']="Something Wrong!</br>Try Again.";
                ?>
                <script>
                window.location.href='manage-order.php';
            </script>
            <?php
            exit(0);
                }
    }
            ?>
        <!-- Check weather On Delivery btn click or not and send valu to UI -->
        <?php 
    if(isset($_POST['on_delivery'])){
        $Id=$_POST['Id'];
        $status=$_POST['on_delivery'];
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
                $_SESSION['message']="Something Wrong!</br>Try Again.";
                ?>
                <script>
                window.location.href='manage-order.php';
            </script>
            <?php
            exit(0);
                }
    }
            ?>
        <!-- Check weather Cancel btn click or not and send valu to UI -->
        <?php 
    if(isset($_POST['cancel'])){
        $Id=$_POST['Id'];
        $status=$_POST['cancel'];
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
            $_SESSION['message']="Something Wrong!</br>Try Again.";
            ?>
            <script>
            window.location.href='manage-order.php';
            </script>
            <?php
            exit(0);
                }
    }
            ?>
            <?php include('./partials/footer.php');?>
