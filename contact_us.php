<?php include('./config/constants.php');?>
<!DOCTYPE html>
<!-- Designined by CodingLab | www.youtube.com/codinglabyt -->
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Responsive Contact Us Form  | CodingLab </title>
    <link rel="stylesheet" href="./css/contact_us.css">
    <!-- Fontawesome CDN Link -->
    <script src="https://kit.fontawesome.com/b7abf0124b.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"/>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
    <div class="content">
      <div class="left-side">
        <div class="address details">
          <i class="fas fa-map-marker-alt"></i>
          <div class="topic">Address</div>
          <div class="text-one">Plot # 56/A, Block # C</div>
          <div class="text-two">Bashundhara R/A</div>
        </div>
        <div class="phone details">
          <i class="fas fa-phone-alt"></i>
          <div class="topic">Phone</div>
          <div class="text-one">+88-01622921671</div>
          <div class="text-two">+88-01844000177</div>
        </div>
        <div class="email details">
          <i class="fas fa-envelope"></i>
          <div class="topic">Email</div>
          <div class="text-one">mdfahadhossain80@gmail.com</div>
          <div class="text-two">rashadul.haider@bg.com.bd</div>
        </div>
      </div>
      <div class="right-side">
        <div class="topic-text">Send us a message</div>
        <p>If you have any quries or objection to our services, you can send us your valuable opanion from here. We will highly appriciate It.</p>
      <form action="" method="POST">
        <div class="input-box">
          <input type="text" name="customer_name" placeholder="Enter your name" required="required">
        </div>
        <div class="input-box">
          <input type="email" name="email" placeholder="Enter your email" required="required">
        </div>
        <div class="input-box message-box">
          <textarea name="message" placeholder="Enter your message"></textarea>
        </div>
        <div>
          <label class="bold">Rate our service</label>
          <div class="star-rating">
            <input class="fa-solid fa-star" name="rating" type="checkbox" value="1">
            <input class="fa-solid fa-star" name="rating" type="checkbox" value="2">
            <input class="fa-solid fa-star" name="rating" type="checkbox" value="3">
            <input class="fa-solid fa-star" name="rating" type="checkbox" value="4">
            <input class="fa-solid fa-star" name="rating" type="checkbox" value="5">
          </div>
          <!-- <i class="fa-solid fa-star"></i> -->
        </div>
        <div class="button">
          <button type="submit" name="submit" class="send_btn">Send</button>
          <!-- <input type="submit" name="submit" value="Send Now" > -->
        </div>
      </form>
    </div>
    </div>
  </div>
</body>
</html>

<?php 
// print_r($_POST);
if(isset($_POST['submit'])){
    
  $customer_name=$_POST['customer_name'];
  $email=$_POST['email'];
  $message=$_POST['message'];
  // Get data from feature="checkbox input button
  if(isset($_POST['rating'])){
    // get the data from feature="checkbox button
    $rating=$_POST['rating'];
    }else{
      $rating=0;
    }

  $rating=$rating;

  // sql query to get data from database
  $sql="INSERT INTO tbl_contact SET customer_name='$customer_name', email='$email', message='$message', rating='$rating'";

  // executing query and save data to database
  $result=mysqli_query($conn,$sql) or die(mysqli_connect_error());

}
?>


