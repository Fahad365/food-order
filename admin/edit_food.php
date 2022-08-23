<!-- Include navbar menu -->
<?php include ('./partials/menu.php'); ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add-food.css">
    <script src="https://kit.fontawesome.com/b7abf0124b.js" crossorigin="anonymous"></script>
    <title>Manage food</title>
   
</head>
<body>
<div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">Edit Food</h4>
                </div>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                        if(isset($_SESSION['remove'])){
                            echo $_SESSION['remove'];
                            unset($_SESSION['remove']);
                        }
                    ?>
                <div class="card-body">
            <?php
            if(isset($_GET['Id'])){
                $food_Id=$_GET['Id'];
                $sql= "SELECT * FROM tbl_food WHERE Id='$food_Id'";
                $result=mysqli_query($conn,$sql);

            if(mysqli_num_rows($result)>0){
                $food=mysqli_fetch_array($result);

                $title=$food['title'];
                $description=$food['description'];
                $price=$food['price'];
                $current_image=$food['image_name'];
                $current_category=$food['Id'];
                $featured=$food['featured'];
                $active=$food['active'];
            ?> 
                    
        <form action="" method="post" enctype="multipart/form-data">
            <table class="fw-bold">
                <tr>
                    <td>Title</td>
                    <td class="box">
                        <input type="text" class="field" name="title" value="<?php echo $title;?>" placeholder="Food Title">
                    </td>
                </tr>
                <tr>
                    <td>Description</td>
                    <td class="box">
                        <textarea name="description" cols="30" rows="5" placeholder="Write Food details"><?php echo $description;?></textarea>
                    </td>
                </tr>
                <tr>
                    <td>Price</td>
                    <td class="box">
                        <input type="number" name="price" value="<?php echo $price;?>">
                    </td>
                </tr>
                <tr>
                    <td>Current Img</td>
                    <td class="box">
                    <?php
                    if($current_image!=""){
                        // Display img
                        ?>
                        <img src="../images/Food/<?php echo $current_image;?>" width="80px">
                        <?php
                    }else{
                        // Display Error messege
                        echo "<div class='error'>Img Not Found!</div>";
                    }
                    ?>
                    </td>
                </tr>
                <tr>
                <td>New Img</td>
                <td class="box">
                    <input type="file" name="image" class="field">
                </td>
                </tr>
                <tr>
                    <td>Category</td>
                    <td class="box">
                    <select name="category">

                <?php
                    // Create php code to display category from database
                    // write sql query to get all the active category from database
                    $sql="SELECT * FROM tbl_category WHERE active='yes'";
                    $result=mysqli_query($conn,$sql);
                    // count rows to check wheather we have category or not
                    $count=mysqli_num_rows($result);
                    if($count>0){    
                        // Display food category into the drop dwon section from db
                        while($category=mysqli_fetch_assoc($result)){
                            $category_Id=$category['Id'];
                            $title=$category['title'];
                            ?>
                                <option <?php if($current_category==$category_Id){echo "selected";}?> value="<?php echo $category_Id;?>"><?php echo $title;?></option>
                            <?php
                        }
                    }else{
                        // dont found any category on database
                        ?>
                        <!-- <option value="0">No Category Found</option> -->
                        <?php
                    }
                    
                ?>
                    </select>
                    </td>
                </tr>
            <tr>
                <td>featured</td>
                <td class="box">
                <label>
                    <input <?php if($featured=="yes"){echo "checked";}?> type="radio" name="featured" value="yes">
                    <i class="fa-solid fa-check"></i>
                </label>
                <label>
                    <input <?php if($featured=="No"){echo "checked";}?> type="radio" name="featured" value="No">
                    <i class="fa-solid fa-xmark"></i>
                </label>
                </td>
            </tr>
        <tr>
            <td>Active</td>
            <td class="box">
            <label>
                <input <?php if($active=="yes"){echo "checked";}?> type="radio" name="active" value="yes">
                <i class="fa-solid fa-check"></i>
            </label>
            <label>
                <input <?php if($active=="No"){echo "checked";}?> type="radio" name="active" value="No">
                <i class="fa-solid fa-xmark"></i>
            </label> 
            </td>
        </tr>
            </table>
            <div>
                <input type="hidden" name="current_image" value="<?php echo $current_image;?>">
                <input type="hidden" name="Id" value="<?php echo $food_Id;?>">
                <button type="submit" name="submit" value="login" class="lg_button">Update</button>
            </div>
        </form>
                <?php
         }        
        }
        ?>
                </div>
            </div>
        </div>
</body>
</html>
<!-- Collect all the data from db and when the user 
click submit then all the data will be updated -->
 <?php
if(isset($_POST['submit'])){
    $Id = $_POST['Id'];
    $title = $_POST['title'];
    $description=$_POST['description'];
    $price=$_POST['price'];
    $current_image = $_POST['current_image'];
    $category=$_POST['category'];
    $featured = $_POST['featured'];
    $active = $_POST['active'];
     // Updating new img if img is selected
        // Check weather the img is selected or not
        if(isset($_FILES['image']['name'])){
            // Get the img details
            $image_name=$_FILES['image']['name'];
             // Check weather the img is available or not
             if($image_name!=""){
                // img available
            // 1. Upload the new img
                // Get the extention of image(jpg,png,jpeg)
            $ext=end(explode('.',$image_name));
            // Rename the image
            $image_name="Food_Item_No_".rand(00,99).'.'.$ext;
            $source_path = $_FILES['image']['tmp_name'];
            $destination_path = "../images/Food/".$image_name;
            // upload the file into destination folder
            $upload=move_uploaded_file($source_path,$destination_path);
            if($upload==false){
                $_SESSION['error']="<div class='error'>Something Wrong!</br>Try Again</div>";
            ?>
            <script>
             window.location.href='edit_food.php';
            </script>
            <?php
            exit(0);
            }
        // 2.Remove the current img
        if($current_image!=""){
            $current_image_path="../images/Food/".$current_image;
    
            // unlink is a default function to remove img its return bool value
            $remove_current_img=unlink($current_image_path);
                // if failed to remove img then show an error messege
            if($remove_current_img==false){
                $_SESSION['remove']="<div class='error'>Failed to remove Food</div>";
                ?>
                    <script>
                    window.location.href='edit_food.php';
                    </script>
                    <?php
                    exit(0);
            }
        }
    }
    else{
        $image_name=$current_image;
    }
} 
else{
    $image_name=$current_image;
}
            // }else{
            //     $image_name=$current_image;
            // }
    
        // else{
        //     $image_name=$current_image;
        // }
        // query to update those data into database.
    $sql="UPDATE tbl_food SET title='$title',description='$description',price=$price,image_name='$image_name',featured='$featured',active='$active'
    WHERE Id='$food_Id'" ;

    $result=mysqli_query($conn,$sql);

    // Show alert message according to action
    if($result){
    $_SESSION['message']="Updated Successfully";
    ?>
    <script>
        window.location.href='manage-food.php';
        </script>
        <?php
    exit(0);
    }else{
        $_SESSION['error']="<div class='error'>Something Wrong!</br>Try Again</div>";
        ?>
        <script>
        window.location.href='add_food.php';
        </script>
        <?php
        exit(0);
    }
}        
?> 

<?php include('./partials/footer.php');?>