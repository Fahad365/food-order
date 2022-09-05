<?php include('./frontend_partials/navbar.php');?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            <?php
            $search=$_POST['search'];
            ?>
            <h2>You are searching for <a href="#" class="text">"<?php echo $search;?>"</a></h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->

    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>

            <?php
            // Declare the variable upper to show title
            $sql="SELECT * FROM tbl_food WHERE title LIKE '%$search%' OR description LIKE '%$search%'";
            $result=mysqli_query($conn,$sql);
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
                  <div class="food-menu-box">
                    <div class="food-menu-img">
                        <?php
                            // Check weather img is available or not
                            if($image_name==""){
                                echo "<div class='error'>Image Not Available</div>";
                            }else{
                        ?>
                                <!-- Display Image -->
                                <img src="./images/Food/<?php echo $image_name;?>" alt="Food Img" class="img-responsive img-curve">
                        <?php
                            }
                        ?>
                        <!-- <img src="images/menu-pizza.jpg" alt="Chicke Hawain Pizza" class="img-responsive img-curve"> -->
                    </div>
                        <div class="food-menu-desc">
                            <h4><?php echo $title;?></h4>
                            <p class="food-price"><?php echo $price;?></p>
                            <p class="food-detail">
                                <?php echo $description;?>
                            </p>
                            <br>
                            <a href="order.php?food_Id=<?php echo $Id;?>" class="btn btn-search">Order Now</a>
                        </div>
                  </div>
                <?php
                }
            }else{
                echo "<div class=error>Sorry! Food Not Found.</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>
    </section>
    <!-- fOOD Menu Section Ends Here -->
    <?php include('./frontend_partials/footer.php');?>
</body>
</html>