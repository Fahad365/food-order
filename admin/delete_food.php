<?php
include('../config/constants.php');
// Check weather Id and the image_name value is set or not
if(isset($_GET['Id']) && (isset($_GET['image_name']))){
    $Id=$_GET['Id'];
    $image_name=$_GET['image_name'];

    // Remove the image file if it is available in the img folder
        if($image_name!=""){
            $image_path="../images/Food/".$image_name;

            // unlink is a default function to remove img its return bool value
            $remove_img=unlink($image_path);
                // if failed to remove img then show an error messege
            if($remove_img==false){
                $_SESSION['remove']="<div class='error'>Failed to remove food</div>";
                ?>
                    <script>
                    window.location.href='add_food.php';
                    </script>
                    <?php
                    exit(0);
            }
        }
    // Delete data from database
    $sql="DELETE FROM tbl_food WHERE Id=$Id";

    $result=mysqli_query($conn,$sql);

    if($result==true){
        $_SESSION['message']="Food Item Deleted Successfully";
        ?>
        <script>
         window.location.href='manage-food.php';
        </script>
        <?php
        exit(0);
    }else{
        $_SESSION['message']="Something Wrong! Try again";
        ?>
        <script>
         window.location.href='manage-food.php';
        </script>
        <?php
        exit(0);
    }

   
}
?>