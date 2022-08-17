<?php include('./frontend_partials/navbar.php');?>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
        <div class="container">
            <h2 class="text-center">Explore Foods</h2>

             <!-- Get data from database end -->
            <?php
            $sql="SELECT * FROM tbl_category WHERE active='yes'";
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


    <?php include('./frontend_partials/footer.php');?>

</body>
</html>