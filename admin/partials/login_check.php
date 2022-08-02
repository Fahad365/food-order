<!-- Check Login Authentication -->
<?php
if(!isset($_SESSION['user'])){
    $_SESSION['have-to-login']="You have to login first!";
    // messege show location
    ?>
    <script>
         window.location.href='login.php';
    </script>
    <?php
}
?>