<?php 
include ('./partials/menu.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/add_category.css">
    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fortawesome/fontawesome-free@6.1.1/css/fontawesome.min.css"
    integrity="sha384-zIaWifL2YFF1qaDiAo0JFgsmasocJ/rqu7LKYH8CoBEXqGbb9eO+Xi3s6fQhgFWM" crossorigin="anonymous"> -->
    <script src="https://kit.fontawesome.com/b7abf0124b.js" crossorigin="anonymous"></script>
    <title>Document</title>
   
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header">
                    <h4 class="fw-bold">Manage Category</h4>
                </div>
                <div class="card-body">
                <form action="" method="post" class="container">
                    <table>
                        <tr>
                            <td>Title</td>
                            <td class="box">
                                <input type="text" name="title" placeholder="Food Title">
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
    </div>
</div>

</body>
</html>

<?php include('./partials/footer.php');?>