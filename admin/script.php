<script src="../JS/sweetalert.min.js"></script>
<?php
 if(isset($_SESSION['message'])):
 ?>
 <!-- Sweet alart Script from website -->
     <script>
      swal({
        title: "<?php echo $_SESSION['message'];?>",
        // text: "You clicked the button!",
        icon: "success",
        button: "OK",
      });
    </script>
    <!-- <div class="container alert alert-danger alert-dismissible fade show mb-8" role="alert">
    <strong>Hay!</strong></br>
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div> -->
    <?php
        unset($_SESSION['message']);
        endif;          
    ?>
    
   