<!-- Include Nav Ber -->
<?php include ('./partials/menu.php');?>
<section class="review">
    <div class="container">
        
        <h2 class="text-center">Customer Reviews</h2>
        <!-- Get data from database start -->
        <?php
            $sql="SELECT * FROM tbl_contact";
            $result=mysqli_query($conn,$sql);

            // Check weather their have category or not
            $count=mysqli_num_rows($result);
            if($count>0){
                // we have data in database
                while($review=mysqli_fetch_assoc($result)){
                  // using while loop to get data from database 
                  // It will run as long as their have data 
                  $Id=$review['Id'];
                  $customer_name=$review['customer_name'];
                  $email=$review['email'];
                  $message=$review['message'];
                  $rating=$review['rating'];
        ?>
                  <!-- Get data from database end -->
        <div class="food-menu-box">
            <div class="food-menu-desc">
                <div class="row-2">
                <h4 class="text-start"><?php echo $customer_name;?></h4>
                <p class="text-end">
                    <?php 
                    if($review['rating']==1){
                        ?>
                        <span class="fa-solid fa-star"></span>
                        <?php 
                        }
                        ?>
                        <?php 
                    if($review['rating']==2){
                        ?>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <?php 
                        }
                        ?>
                        <?php 
                    if($review['rating']==3){
                        ?>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <?php 
                        }
                        ?>
                        <?php 
                    if($review['rating']==4){
                        ?>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <?php 
                        }
                        ?>
                        <?php 
                    if($review['rating']==5){
                        ?>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <span class="fa-solid fa-star"></span>
                        <?php 
                        }
                        ?>
                   
               
                </div>
                    <p class="food-price"><?php echo $email;?></p>
                    <p class="food-detail"><?php echo $message;?></p>
            </div>
        </div>
        <?php
                }
            }else{
                echo "<div class='error'>You have No Feedback Yet</div>";
            }
            ?>
    </div>
</section>