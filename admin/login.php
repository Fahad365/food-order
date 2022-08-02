<?php
include('../config/constants.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/login.css">
    <title>Admin Login</title>
</head>
<body>
    <div class="login">
        <div class="admin_logo"></div>
        <div class="messege">
            <?php
                if(isset($_SESSION['login'])){
                    echo $_SESSION['login'];
                    unset($_SESSION['login']);
                }
                if(isset($_SESSION['have-to-login'])){
                    echo $_SESSION['have-to-login'];
                    unset($_SESSION['have-to-login']);
                }
                ?>
            </div>
                <form action="" method="post" class="container">
                    <div class="inputbox">
                        <input type="text" name="username" required="required">
                        <span>Username</span>
                    </div>
                    <div class="inputbox">
                        <input type="password" name="password" required="required">
                        <span>Password</span>
                    </div>
                    <div>
                        <button type="submit" name="submit" value="login" class="lg_button">login</button>
                    </div>
                </form>
            </div>
        <!-- </div> -->
    <!-- </div> -->
</body>
</html>

<?php
if(isset($_POST['submit'])){
    $username=$_POST['username'];
    $password=md5($_POST['password']);

    $sql="SELECT * FROM tbl_admin WHERE username='$username' AND password='$password'";
    $result=mysqli_query($conn,$sql);

    // Check wheather their have data or not
    $count=mysqli_num_rows($result);
    if($count==1){
    $_SESSION['login']="<div class='success'>Login Successfull.</div>";

    // TO check weather the user is logged in or not and logout will unset it 
    $_SESSION['user']=$username;
    ?>
    <script>
         window.location.href='admin_index.php';
    </script>
    <?php
    exit(0);
    }else{
        $_SESSION['login']="Username or password</br>didn't match";
    ?>
    <script>
         window.location.href='login.php';
    </script>
    <?php
    exit(0);

    }
}
?>