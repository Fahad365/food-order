<?php include('./frontend_partials/navbar.php');?>
    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <form action="food-search.html" method="POST">
                <input type="search" name="search" placeholder="Search for Food.." required>
                <input type="submit" name="submit" value="Search" class="btn btn-primary">
            </form>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>
            <!-- Get data from database start -->
            <?php
            $sql="SELECT * FROM tbl_category WHERE active='yes' AND featured='yes' LIMIT 3";
            $result=mysqli_query($conn,$sql);

            // Check weather their have category or not
            $count=mysqli_num_rows($result);
            if($count>0){
                // we have data in database
                while($category=mysqli_fetch_assoc($result)){
                  // using while loop to get data from database 
                  // It will run as long as their have data 
                  $Id=$category['Id'];
                  $title=$category['title'];
                  $image_name=$category['image_name'];
                  ?>
                <!-- Get data from database end -->

                  <!-- Front end site code start -->
                <a href="category-foods.php">
                    <div class="box-3 float-container">
                        <?php
                        // Check weather img is available or not
                        if($image_name==""){
                            echo "<div class='error'>Image Not Available</div>";
                        }else{
                            ?>
                            <!-- Display Image -->
                              <img src="./images/category/<?php echo $image_name;?>" alt="Category Img" class="img-responsive img-curve">
                            <?php
                        }
                        ?>
                       
                        <h3 class="float-text text-white"><?php echo $title;?></h3>
                    </div>
                </a>
                    <!-- Front end site code end -->
                  <?php
                }
            }else{
                echo "<div class='error'>No Category Found</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Categories Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

             <!-- Get data from database start -->
            <?php
            $sql="SELECT * FROM tbl_food WHERE active='yes' AND featured='yes' LIMIT 6";
            $result=mysqli_query($conn,$sql);

            // Check weather their have category or not
            $count=mysqli_num_rows($result);
            if($count>0){
                // we have data in database
                while($food=mysqli_fetch_assoc($result)){
                  // using while loop to get data from database 
                  // It will run as long as their have data 
                  $Id=$food['Id'];
                  $title=$food['title'];
                  $price=$food['price'];
                  $description=$food['description'];
                  $image_name=$food['image_name'];
                  ?>
                  <!-- Get data from database end -->
                <div class="food-menu-box">
                    <div class="food-menu-img">
                    <?php
                        // Check weather img is available or not
                        if($image_name==""){
                            echo "<div class='error'>Image Not Available</div>";
                        }else{
                    ?>
                        <!-- Display Image -->
                        <img src="./images/Food/<?php echo $image_name;?>" alt="Food Item Name" class="img-responsive img-curve">
                        <?php
                        }
                        ?>
                </div>
                    <div class="food-menu-desc">
                    <h4><?php echo $title?></h4>
                    <p class="food-price"><?php echo $price;?></p>
                    <p class="food-detail">
                        <?php echo $description;?>
                    </p>
                    <br>
                    <a href="order.php" class="btn btn-primary">Order Now</a>
                    </div>
                </div>
                  <?php
                }
            }else{
                echo "<div class='error'>No Food Found</div>";
            }
            ?>

            
            <div class="clearfix"></div>
        </div>

        <p class="text-center">
            <a href="foods.php">See All Foods</a>
        </p>
    </section>
    <!-- fOOD Menu Section Ends Here -->

   <?php include('./frontend_partials/footer.php');?>
<script src="JS/script.js"></script>
</body>
</html>