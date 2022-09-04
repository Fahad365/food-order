 <!-- Include navbar menu -->
<?php include ('./partials/menu.php'); ?>

    <!-- Main section start here  -->
    <div class="main-content text-center">
        <div class="wrapper">
          <h1 class="text-center">DESHBOARD</h1>
           <div class="col-4">
              <?php
              $sql="SELECT * FROM tbl_category";
              $result=mysqli_query($conn,$sql);
              $count=mysqli_num_rows($result);
              ?>
              <h3><?php echo $count;?></h3></br>
              Categories
           </div>
           <div class="col-4">
              <?php
                  $sql="SELECT * FROM tbl_food";
                  $result=mysqli_query($conn,$sql);
                  $count=mysqli_num_rows($result);
                  ?>
                  <h3><?php echo $count;?></h3></br>
                  Food
           </div>
           <div class="col-4">
              <?php
                  $sql="SELECT * FROM tbl_order";
                  $result=mysqli_query($conn,$sql);
                  $count=mysqli_num_rows($result);
                  ?>
                  <h3><?php echo $count;?></h3></br>
                  Total Order           
           </div>
           <div class="col-4">
              <?php 
              // Using Aggregate function into query
                  $sql="SELECT SUM(total) AS Total FROM tbl_order WHERE status='Delivered'";
                  $result=mysqli_query($conn,$sql);
                  // Check weather their have data or not
                  $reveneu=mysqli_fetch_assoc($result);
                  $total_rev=$reveneu['Total'];

              ?>
             <h3>&#2547;<?php echo $total_rev;?></h3></br>
             Reveneu Generate
           </div>
           <div class="remove-box-indentation-error">

           </div>
        </div>
    </div>
    <!-- Main section end here  -->

    <!-- Include Footer -->
    <?php include ("./partials/footer.php");?>
</body>
</html>