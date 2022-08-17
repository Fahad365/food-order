<!--  3d Responsive Touch Slider Using html css & Swiper.js in Hindi | Swiper js Carousel 2021 Youtube channel 
Nilesh Dadheech  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css"/>
    <!-- <link rel="stylesheet" href="test.css"> -->
    <style>
    html,
    body {
      position: relative;
      height: 100%;
    }

    body {
      background: #eee;
      font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
      font-size: 14px;
      color: #000;
      margin: 0;
      padding: 0;
      min-height: 100vh;
      background-color: black;
      display: flex;
      justify-content:center;
      align-items: center;
    }

    .swiper {
      width: 100%;
      padding-top: 50px;
      padding-bottom: 50px;
    }

    .swiper-slide {
      background-position: center;
      background-size: cover;
      width: 300px;
      height: 300px;
      background: black
    }

    .swiper-slide img {
      display: block;
      width: 100%;
      height: 100%;
      border-radius: 5%;
    }
  </style>
</head>
<body>
<div class="swiper mySwiper">
    <div class="swiper-wrapper">
        <div class="swiper-slide"><img src="./images/burger.jpg"></div>
        <div class="swiper-slide"><img src="./images/burger.jpg"></div>
        <div class="swiper-slide"><img src="./images/burger.jpg"></div>
        <!-- <div class="swiper-slide"><img src="./images/burger.jpg"></div>
        <div class="swiper-slide"><img src="./images/burger.jpg"></div>
        <div class="swiper-slide"><img src="./images/burger.jpg"></div> -->
         
       
    </div>
    <div class="swiper-pagination"></div>
</div>

<script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
<script>
      var swiper = new Swiper(".mySwiper", {
        effect: "coverflow",
        grabCursor: true,
        centeredSlides: true,
        slidesPerView: "auto",
        coverflowEffect: {
          rotate: 40,
          stretch: 0,
          depth: 500,
          modifier: 1,
          slideShadows: true,
        },
        // pagination: {
        //   el: ".swiper-pagination",
        // },
        slidesPerView: 5,
        spaceBetween: 40,
        // slidesPerGroup: 3,
        loop: true,
        loopFillGroupWithBlank: true,
        // loop: true,
        autoplay: {
          delay: 900,
          disableOnInteraction: false,
        },
      });
    </script>
</body>
</html>