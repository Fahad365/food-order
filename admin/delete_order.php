<?php

include('../config/constants.php');

// Get the Id of the admin to be deleted
$Id=$_GET['Id'];
// echo $Id;

// Create SQL quiry to delete admin
$sql="DELETE FROM tbl_order WHERE Id=$Id";
// Execute the query
$result=mysqli_query($conn,$sql);

// Redirect to manage admin page with messege
if($result==TRUE){
    $_SESSION['message']="Order Deleted Successfully ✔";
    ?>
     <script>
     window.location.href='manage-order.php';
    </script>
    <!-- header("Location:add-admin.php"); -->
    <?php
    exit(0);
}
?>