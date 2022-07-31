<?php
session_start();
// Create Constant to store non repeating value
define('LOCALHOST','localhost');
define('DB_USERNAME','root');
define('DB_PASSWORD','');
define('DB_NAME','online-food');

//Create Connection to Database
$conn=mysqli_connect(LOCALHOST,DB_USERNAME,DB_PASSWORD,DB_NAME) or die(mysqli_connect_error());
// $db_select=mysqli_select_db($conn,)  

?>