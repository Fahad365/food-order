<?php include('./config/constants.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Important to make website responsive -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Website</title>

    <!-- Link our CSS file -->
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <!-- Navbar Section Starts Here -->
    <section class="navbar">
        <div class="container">
            <div class="logo">
                <a href="#" title="Logo">
                    <img src="images/Rlogo.jpg" alt="Restaurant Logo" class="img-responsive">
                </a>
            </div>

            <div class="menu text-right"> 
                <ul>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="categories.php">Categories</a>
                    </li>
                    <li>
                        <a href="foods.php">Foods</a>
                    </li>
                    <li>
                        <a href="contact_us.php">Contact Us</a>
                    </li>
                </ul>
            </div>
            <script type="text/javascript">
                const currentLocation=location.href;
                const menuItem=document.querySelectorAll('a');
                const menuLength= menuItem.length
                for(let i=0; i<menuLength; i++){
                    if(menuItem[i].href===currentLocation){
                        menuItem[i].className="active"
                    }
                }
            </script>

            <div class="clearfix"></div>
        </div>
    </section>
    <!-- Navbar Section Ends Here -->