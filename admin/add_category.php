<?php 
include ('./partials/menu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_category.css">
    <script src="https://kit.fontawesome.com/b7abf0124b.js" crossorigin="anonymous"></script>
    <title>Add Category</title>
   
</head>
<body>
        <div class="container-fluid">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">Add Category</h4>
                </div>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <table>
                        <tr>
                            <td>Title</td>
                            <td class="box">
                            <!-- <label class="field"> -->
                                <input type="text" class="field" name="title" placeholder="Food Title">
                            <!-- </label> -->
                            </td>
                        </tr>
                        <tr>
                            <td>Select Img</td>
                            <td class="box">
                            <!-- <label class="field"> -->
                                <input type="file" name="image" class="field">
                            <!-- </label> -->
                            </td>
                        </tr>
                        <tr>
                            <td>featured</td>
                            <td class="box">
                                <label>
                                    <input type="radio" name="featured" value="yes">
                                    <i class="fa-solid fa-check"></i>
                                </label>
                                <label>
                                    <input type="radio" name="featured" value="No">
                                    <i class="fa-solid fa-xmark"></i>
                                </label>
                            </td>
                        </tr>
                        <tr>
                            <td>Active</td>
                            <td class="box">
                            <label>
                                <input type="radio" name="active" value="yes">
                                <i class="fa-solid fa-check"></i>
                            </label>
                            <label>
                                <input type="radio" name="active" value="No">
                                <i class="fa-solid fa-xmark"></i>
                            </label>
                            </td>
                        </tr>
                    </table>
                    <div>
                        <button type="submit" name="submit" value="login" class="lg_button">Upload</button>
                    </div>
                </form>
                </div>
            </div>
        </div>
</body>
</html>


<?php
if(isset($_POST['submit'])){
    
    $title=$_POST['title'];

    // Get data from featured radio input button
    if(isset($_POST['featured'])){
        // get the data from featured radio button
        $featured=$_POST['featured'];
    }else{
        $featured="No";
    }

    // for active radio input button
    if(isset($_POST['active'])){
        // get the data from featured radio button
        $active=$_POST['active'];
    }else{
        $active="No";
    }

    // Set the conditione for empty submission
    if(empty($title) || empty($featured) || empty($active)){
        $_SESSION['error']="<div class='error'>You have to fill all the fields!</div>";
        ?>
        <script>
         window.location.href='add_category.php';
        </script>
        <?php
        exit(0);
    }

    // check weather the file is selected or not 
    if(isset($_FILES['image']['name'])){
        // File will be uploaded
        $image_name = $_FILES['image']['name'];
        // Upload the img only if the img is selected
        if($image_name!=""){
        // Auto rename image name
        // Get the extention of image(jpg,png,jpeg)
        $ext=end(explode('.',$image_name));
        // Rename the image
        $image_name="Food_Category_".rand(00,99).'.'.$ext;
        $source_path = $_FILES['image']['tmp_name'];
        $destination_path = "../images/category/".$image_name;
        // upload the file into destination folder
        $upload=move_uploaded_file($source_path,$destination_path);
        if($upload==false){
            $_SESSION['error']="<div class='error'>Something Wrong!</br>Try Again</div>";
        ?>
        <script>
         window.location.href='add_category.php';
        </script>
        <?php
        exit(0);
        }
    }
    }else{
        // didn't upload any image and set the image name as blank
        $image_name=""; 
    }

    //Create SQL Query
    $sql="INSERT INTO tbl_category SET
          title='$title',
          image_name='$image_name',
          featured='$featured',
          active='$active'
          "; 

    // Execute the query
    $result=mysqli_query($conn,$sql);

    // Check weather the query is successfully execute or not
    if($result==true){
        $_SESSION['message']="Category added successfully✅";
        ?>
        <script>
         window.location.href='manage-category.php';
        </script>
        <?php
        exit(0);
    }else{
        $_SESSION['error']="<div class='error'>Something Wrong!</br>Try Again</div>";
        ?>
        <script>
         window.location.href='add_category.php';
        </script>
        <?php
        exit(0);
    }
}
?>

<?php include('./partials/footer.php');?>