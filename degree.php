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
   
    <title>Degree Courses</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>
    
<?php if(isset($_SESSION['User']))
{
    @include 'extra/loginheader.php'; 
}else{
    @include 'extra/header.php';
  }
  ?>


<div class="heading">
    <h1>Degree Courses</h1>
    <p> <a href="home.php">home >></a> Degree</p>
</div>

<section class="category">

    <h1 class="title"> our <span>category</span> </h1>

    <section class="course-2">

        <div class="box">
            <div class="image">
                <img src="image/main-course-1.png" alt="">
            </div>
            <div class="content">
                <span>business</span>
                <h3>Master of Business Administration (MBA)</h3>
                <p>Transform your career with an MBA Degree from a top-UK school, Liverpool Business School.</p>
                <a href="#" class="btn">read more</a>
                <div class="icons">
                    <a href="#"> <i class="fas fa-book"></i> 12 modules </a>
                    <a href="#"> <i class="fas fa-clock"></i> 6 hours </a>
                </div>
            </div>
        </div>
    
        <div class="box">
            <div class="image">
                <img src="image/main-course-2.png" alt="">
            </div>
            <div class="content">
                <span>Data Science</span>
                <h3>Executive PG Programme in Data Science</h3>
                <p>Kick-start your Data Science journey with India's #1 Data Science program, from IIIT-Banglore.</p>
                <a href="#" class="btn">read more</a>
                <div class="icons">
                    <a href="#"> <i class="fas fa-book"></i> 12 modules </a>
                    <a href="#"> <i class="fas fa-clock"></i> 6 hours </a>
                </div>
            </div>
        </div>
    
        <div class="box">
            <div class="image">
                <img src="image/main-course-3.png" alt="">
            </div>
            <div class="content">
                <span>Software Development</span>
                <h3>Master of Science in Computer Science</h3>
                <p>Learn in-demand skills and grow your Software Development career with a Master's in Computer Science from Liverpool John Moores University.</p>
                <a href="#" class="btn">read more</a>
                <div class="icons">
                    <a href="#"> <i class="fas fa-book"></i> 12 modules </a>
                    <a href="#"> <i class="fas fa-clock"></i> 6 hours </a>
                </div>
            </div>
        </div>
    
        <div class="box">
            <div class="image">
                <img src="image/main-course-4.png" alt="">
            </div>
            <div class="content">
                <span>AL/ML</span>
                <h3>Advanced Certification in Machine Learning and Cloud</h3>
                <p>Learn to deploy Machine Learning models using Cloud computing with India's most advanced certification programme, exclusively from IIT Madras .</p>
                <a href="#" class="btn">read more</a>
                <div class="icons">
                    <a href="#"> <i class="fas fa-book"></i> 12 modules </a>
                    <a href="#"> <i class="fas fa-clock"></i> 6 hours </a>
                </div>
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