<?php include('./frontend_partials/navbar.php');?>

<?php 
if(isset($_GET['food_Id'])){
    $food_Id=$_GET['food_Id'];
    $sql="SELECT * FROM tbl_food WHERE Id='$food_Id'";
    $result=mysqli_query($conn,$sql);
    $count=mysqli_num_rows($result);
            if($count>0){
                $food=mysqli_fetch_assoc($result);
                  $title=$food['title'];
                  $price=$food['price'];
                  $image_name=$food['image_name'];
    }else{
    //  showing No data found
    }
}else{
    //  showing error message
}
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-order">
        <div class="form-bg">
            
            <h2 class="text-center order-heading">Fill this form to confirm your order</h2>

            <form action="" method="POST" class="order" enctype="multipart/form-data">
                <fieldset>
                    <legend>Selected Food</legend>

                    <div class="food-menu-img">
                    <?php
                        // Check weather img is available or not
                        if($image_name==""){
                            echo "<div class='error'>Image Not Available</div>";
                        }else{
                            ?>
                            <img src="images/Food/<?php echo $image_name;?>" alt="Food Item img" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                       
                    </div>
    
                    <div class="food-menu-desc">
                        <h3><?php echo $title;?></h3>
                        <input type="hidden" name="food" value="<?php echo $title;?>">
                        <p class="food-price"><?php echo $price?></p>
                        <input type="hidden" name="price" value="<?php echo $price;?>">
                        <div class="order-label">Quantity</div>
                        <input type="number" name="qty" class="input-responsive" value="1" required>
                        
                    </div>

                </fieldset>
                
                <fieldset>
                    <legend>Delivery Details</legend>
                    <div class="order-label">Full Name</div>
                    <input type="text" name="full-name" placeholder="write your full name" class="input-responsive" required>

                    <div class="order-label">Phone Number</div>
                    <input type="tel" name="contact" placeholder="E.g. 016xxxxxxxx" class="input-responsive" required>

                    <div class="order-label">Email</div>
                    <input type="email" name="email" placeholder="E.g. xyz@.com" class="input-responsive" required>

                    <div class="order-label">Address</div>
                    <textarea name="address" rows="10" placeholder="E.g. Street, City, Country" class="input-responsive" required></textarea>

                    <input type="submit" name="submit" value="Confirm Order" class="btn btn-search">
                </fieldset>

            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- Check weather the submit button is cliked  or not -->
    <?php 
    if(isset($_POST['submit'])){
        $food=$_POST['food'];
        // $image_name= $image_name;
        $price=$_POST['price'];
        $qty=$_POST['qty'];
        $total=$price*$qty;
        $order_date=date("y-m-d h:i:sa").date_default_timezone_set("Asia/Dhaka");
        $status="Ordered";  //ordered,delivered,cancel,on delivery
        $customer_name=$_POST['full-name'];
        $customer_contact=$_POST['contact'];
        $customer_email=$_POST['email'];
        $customer_address=$_POST['address'];

        $sql="INSERT INTO tbl_order SET
        food='$food',image_name='$image_name',price=$price,qty=$qty,total=$total,order_date='$order_date',status='$status',
        customer_name='$customer_name',customer_contact='$customer_contact',customer_email='$customer_email',customer_address='$customer_address'";
        // query check
        // echo $sql;die();

        $result2=mysqli_query($conn,$sql);
         // Check weather the query is successfully execute or not
        if($result2==true){
            $_SESSION['message']="Order place successfully";
            ?>
            <script>
             window.location.href='index.php';
            </script>
            <?php
            exit(0);
        }else{
            $_SESSION['error']="<div class='error'>Something Wrong!</br>Try Again</div>";
            ?>
            <script>
             window.location.href='index.php';
            </script>
            <?php
            exit(0);
        }
    }else{
        // echo "something wrong";
    }
    ?>
    <!-- Include sweet alart messege -->
  
    <?php include('./frontend_partials/footer.php');?>