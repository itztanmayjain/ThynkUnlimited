<?php
session_start();
@include 'database/config.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>About Us</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
<?php 

if(isset($_SESSION['User']))
{
    @include 'extra/loginheader.php'; 
}else{
    @include 'extra/header.php';
  }
  ?>
 



<div class="heading">
    <h1>about us</h1>
    <p> <a href="home.php">home >></a> about </p>
</div>

<section class="about">

    <div class="image">
        <img src="image/about-img.png" alt="">
    </div>

    <div class="content">
        <span>welcome to </span>
        <h3>THYNK Unlimited</h3>
        <p>We as a prestigious educational institution - considers its mission to provide outstanding education within the E-learnig website.</p>
        <p> Its aim is to create conditions for education that enhance the students'academic and personal development by uniting high-level academic knowledge with practical education, based on corporate partnerships from outside the institution.</p>
      
    </div>

</section>

<section class="gallery">

    <h1 class="title"> Beginning of a  <span> revolution</span>  </h1>
    <section class="info-container">

        <div class="info">
            <img src="image/icon-1.png" alt="">
            <div class="content">
                <h3>30%</h3>
                <span>Average Salary Hike</span>
            </div>
        </div>
    
        <div class="info">
            <img src="image/icon-2.png" alt="">
            <div class="content">
                <h3>Top</h3>
                <span>Learn From Global Universities</span>
            </div>
        </div>
    
        <div class="info">
            <img src="image/icon-3.png" alt="">
            <div class="content">
                <h3>Jobs in 100+</h3>
                <span>Top Companies</span>
            </div>
        </div>

        <div class="info">
            <img src="image/icon-4.png" alt="">
            <div class="content">
                <h3>Sessions</h3>
                <span> With Experts</span>
            </div>
        </div>
    
        <div class="info">
            <img src="image/icon-5.png" alt="">
            <div class="content">
                <h3>Practice</h3>
                <span>Have Various Mock Test</span>
            </div>
        </div>

        <div class="info">
            <img src="image/icon-6.png" alt="">
            <div class="content">
                <h3>Friendly</h3>
                <span>Learn From Anywhere</spa
                n>
            </div>
        </div>

    </section>

</section>

<?php if(isset($_SESSION['User']))
{
    @include 'extra/loginfooter.php'; 
}else{
    @include 'extra/footer.php';
  }
  ?>
 

 
 <!-- custom css file link  -->
 <script src="js/script.js"></script>

</body>
</html>