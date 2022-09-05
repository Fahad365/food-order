<?php include('./frontend_partials/navbar.php');?>

<?php
    // Check weather catagory_Id is passed or Not
    if(isset($_GET['category_Id'])){
    $category_Id=$_GET['category_Id'];
    $sql="SELECT title FROM tbl_category WHERE Id=$category_Id";
    $result=mysqli_query($conn,$sql);
    // to get the data from database
    $category=mysqli_fetch_assoc($result);
    $category_title=$category['title'];
    }else{
        echo "<div class='error'>Catagory Not found</div>";
    }
?>

    <!-- fOOD sEARCH Section Starts Here -->
    <section class="food-search text-center">
        <div class="container">
            
            <h2>All the Item on "<a href="#" class="text"><?php echo $category_title;?></a>" Catagory</h2>

        </div>
    </section>
    <!-- fOOD sEARCH Section Ends Here -->



    <!-- fOOD MEnu Section Starts Here -->
    <section class="food-menu">
        <div class="container">
            <h2 class="text-center">Food Menu</h2>
            <?php 
            $sql="SELECT * FROM tbl_food WHERE category_id=$category_Id";
            $result=mysqli_query($conn,$sql);
            $count=mysqli_num_rows($result);
            if($count>0){
                while($category=mysqli_fetch_assoc($result)){
                    $Id=$category['Id'];
                    $title=$category['title'];
                    $price=$category['price'];
                    $description=$category['description'];
                    $image_name=$category['image_name'];

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
                        <p class="food-price"><?php echo $price?></p>
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
                echo "<div class='error'>No Food Found in this Category</div>";
            }
            ?>
            <div class="clearfix"></div>
        </div>

    </section>
    <!-- fOOD Menu Section Ends Here -->

    <?php include('./frontend_partials/footer.php');?>

</body>
</html>