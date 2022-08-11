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
                    <h4 class="fw-bold">Add Food</h4>
                </div>
                    <?php
                        if(isset($_SESSION['error'])){
                            echo $_SESSION['error'];
                            unset($_SESSION['error']);
                        }
                    ?>
                <div class="card-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <table class="fw-bold">
                        <tr>
                            <td>Title</td>
                            <td class="box">
                                <input type="text" class="field" name="title" placeholder="Food Title">
                            </td>
                        </tr>
                        <tr>
                            <td>Description</td>
                            <td class="box">
                                <textarea name="description" cols="30" rows="5" placeholder="Write Food details"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Price</td>
                            <td class="box">
                                <input type="number" name="price">
                            </td>
                        </tr>
                        <tr>
                            <td>Select Img</td>
                            <td class="box">
                                <input type="file" name="image" class="field">
                            </td>
                        </tr>
                        <tr>
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
                                            $Id=$category['Id'];
                                            $title=$category['title'];
                                            ?>
                                             <option value="<?php echo $Id;?>"><?php echo $title;?></option>
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
    $description=$_POST['description'];
    $price=$_POST['price'];

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
    if(empty($title) || empty($featured) || empty($active) || empty($price) || empty($description)){
        $_SESSION['error']="<div class='error'>You have to fill all the fields!</div>";
        ?>
        <script>
         window.location.href='add_food.php';
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
        $destination_path = "../images/Food/".$image_name;
        // upload the file into destination folder
        $upload=move_uploaded_file($source_path,$destination_path);
        if($upload==false){
            $_SESSION['error']="<div class='error'>Something Wrong!</br>Try Again</div>";
        ?>
        <script>
         window.location.href='add_food.php';
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
    // for numerical value dont need to use single quotation ex:price;
    $sql="INSERT INTO tbl_food SET
          title='$title',
          description='$description',
          price=$price, 
          image_name='$image_name',
          category_id='$category',
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

<!-- Include Footer -->
<?php include ("./partials/footer.php");?>