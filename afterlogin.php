<?php
session_start();
@include 'database/config.php';

if(isset($_SESSION['User']))
{
   //echo $_SESSION['User'];
   $user = $_SESSION["User"];
  $user_query = "SELECT `name` FROM `login` WHERE `email` = '$user' ";
  $result_user = mysqli_query($conn,$user_query);
  $user_rowData = mysqli_fetch_assoc($result_user);
  $user_name = $user_rowData["name"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
   
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

     <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css\style.css">
    
</head>
<body>
    
<!-- header section starts  -->

<header class="header">

    <a href="afterlogin.php" class="logo"> THYNK <i class="fas fa-infinity fa-lg"></i> </a>

    <nav class="navbar">
        <a href="afterlogin.php">home</a>
        <a href="about.php">About</a>
        <a href="Alumni.php">Alumni</a>
        <a href="blog.php">Blog</a>
        <a href="contact.php">Contact</a>
    </nav>

    <div class="icons">
        <div id="menu-btn" class="fas fa-bars"></div>
        <div id="login-btn" class="fas fa-user-check"> </div>
    </div>

    <div class="login-form">
   <h3 style="font-size:16px" > Welcome Back! <?php echo $user_name ?> </h3>
    
    <a href="profile.php"> <input value="Dashboard" class="btn"></a>
    <a href="mycourse.php"> <input value="My Courses" class="btn"></a>
 <!-- <a href="#"> <input value="My Certificate" class="btn"></a> -->
    <a href="userlogout.php"><input value="Logout" class="btn"></a>
        
</div>
</header>
<!-- header section ends -->

<!-- home section starts  -->
<section class="home">

    <div class="swiper home-slider">
       
       <div class="swiper-wrapper">
 
          <section class="swiper-slide slide" style="background: url(image/home-slide-1.png) no-repeat;">
             <div class="content">
                <h3>THYNK Unlimited</h3>
                <p>Fast Forward Your Future</p>
                <a href="mycourse.php" class="btn">Get Started</a>
             </div>
          </section>
 
          <section class="swiper-slide slide" style="background: url(image/home-slide-2.png) no-repeat;">
             <div class="content">
                <h3>Test your skill today</h3>
                <p>Don't watch the clock,Keep going</p>
                <a href="quiz.php" class="btn">I'M Ready</a>
             </div>
          </section>
 
          <section class="swiper-slide slide" style="background: url(image/home-slide-3.png) no-repeat;">
             <div class="content">
                <h3>Keep Learning</h3>
                <p>Learning never exhausts the mind</p>
                <a href="certification.php" class="btn">Upskill Now</a>
             </div>
          </section>
      </div>
       <div class="swiper-pagination"></div>
    </div>
 </section>
 <!-- home section ends -->


 <!-- logo slider starts  -->
<section class="logo-container">
   <h1 class="highlight"> Learn from Top Universitys  </h1>

   <div class="swiper logo-slider">
      <div class="swiper-wrapper">
         <div class="swiper-slide"> <img src="image/partner-logo-1.png" alt=""> </div>
         <div class="swiper-slide"> <img src="image/partner-logo-2.jpg" alt=""> </div>
         <div class="swiper-slide"> <img src="image/partner-logo-3.png" alt=""> </div>
         <div class="swiper-slide"> <img src="image/partner-logo-4.png" alt=""> </div>
         <div class="swiper-slide"> <img src="image/partner-logo-5.png" alt=""> </div>
      </div>
   </div>
</section>
<!-- logo slider ends -->


<section class="banner-container" id="select">

   <div class="banner">
       <img src="image/banner-1.png" alt="">
       <div class="content">
          
           <h3>Degree</h3>
           <a href="degree.php" class="btn">Apply Now</a>
       </div>
   </div>

   <div class="banner">
       <img src="image/banner-2.png" alt="">
       <div class="content">
          
           <h3>quiz</h3>
           <a href="quiz.php" class="btn" id="extra">I'M Ready</a>
       </div>
   </div>

   <div class="banner">
       <img src="image/banner-3.png" alt="">
       <div class="content">
           
           <h3>Certification</h3>
           <a href="certification.php" class="btn">Upskill Now</a>
       </div>
   </div>

</section>

<section class="subjects">

   <h1 class="highlight">Trending Certification Courses</h1>

   <div class="box-container">

      <div class="box">
         <img src="image/course-9.png" alt="">
         <h3>Graphic Design</h3>
      </div>

      <div class="box">
         <img src="image/course-5.png" alt="">
         <h3>Digital Marketing</h3>
      </div>

      <div class="box">
         <img src="image/course-6.png" alt="">
         <h3>Maths & Statistics</h3>

      </div>

      <div class="box">
         <img src="image/course-1.png" alt="">
         <h3>Web Design</h3>
      </div>

   </div>

</section>

<!-- subjects section ends -->

<!-- footer section starts  -->

<section class="footer">

   <div class="box-container">

       <div class="box">
           <h3>quick links</h3>
           <a href="home.php"> <i class="fas fa-arrow-right"></i> Home</a>
           <a href="about.php"> <i class="fas fa-arrow-right"></i> About</a>
           <a href="Alumni.php"> <i class="fas fa-arrow-right"></i> Alumni</a>
           <a href="blog.php"> <i class="fas fa-arrow-right"></i> Blog</a>
       </div>

       <div class="box">
           <h3>extra links</h3>
           <a href="mycourse.php"> <i class="fas fa-arrow-right"></i> My Account </a>
           <a href="contact.php"> <i class="fas fa-arrow-right"></i> Contact Us</a>
           <a href="policy.php"> <i class="fas fa-arrow-right"></i> Privacy Policy </a>
           <a href="t&c.php"> <i class="fas fa-arrow-right"></i> Terms & Conditions</a>
       </div>

       <div class="box">
           <h3>Follow us</h3>
           <a href="https://www.facebook.com/"> <i class="fab fa-facebook-f"></i> facebook </a>
           <a href="https://twitter.com/i/flow/login"> <i class="fab fa-twitter"></i> twitter </a>
           <a href="https://www.instagram.com/?hl=en"> <i class="fab fa-instagram"></i> instagram </a>
           <a href="https://in.linkedin.com/?trk=guest_homepage-basic_nav-header-logo"> <i class="fab fa-linkedin"></i> linkedin </a>
       </div>

   </div>

</section>

<section class="credit">2022-23 All Rights Reserved! | Powered by <b>Thynk Unlimited</section>

<!-- footer section ends -->


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>

<?php }else{
  header("location:login.php");
}
?>