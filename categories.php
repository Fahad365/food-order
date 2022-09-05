<?php include('./frontend_partials/navbar.php');?>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
<style>
    .swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 300px;
      /* background: black */
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      border-radius: 5%;
    }
</style>
    <!-- CAtegories Section Starts Here -->
    <section class="categories">
    <div class="swiper mySwiper">
        <div class="swiper-wrapper">
        <!-- Get data from database start -->
        <?php
            $sql="SELECT * FROM tbl_category WHERE active='yes' AND featured='yes'";
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
                  
                  <div class="swiper-slide">
                  <a href="category-foods.php?category_Id=<?php echo $Id;?>">
                        <?php
                        // Check weather img is available or not
                        if($image_name==""){
                            echo "<div class='error'>Image Not Available</div>";
                        }else{
                        ?>
                            <!-- Display Image -->
                              <img src="./images/category/<?php echo $image_name;?>">
                            <?php
                        }
                        ?>
                        <!-- <h3 class="float-text text-white"><?php echo $title;?></h3> -->
                        </a>
                  </div>
                
                    <!-- Front end site code end -->
                  <?php
                }
            }else{
                echo "<div class='error'>No Category Found</div>";
            }
            ?>
        </div>
    </div>
    </section>
    <!-- Categories Section Ends Here -->
    <?php include('./frontend_partials/footer.php');?>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 40,
          stretch: 0,
          depth: 500,
          modifier: 1,
          slideShadows: true,
        },
        // pagination: {
        //   el: ".swiper-pagination",
        // },
        slidesPerView: 5,
        spaceBetween: 40,
        // slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        // loop: true,
        autoplay: {
          delay: 900,
          disableOnInteraction: false,
        },
      });
    </script>
