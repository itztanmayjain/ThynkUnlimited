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
   
    <title>Alumi</title>

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
  ?> ?>


<!-- header section ends -->

<div class="heading">
    <h1>Our Alumni</h1>
    <p> <a href="home.php">home >></a>Alumni</p>
</div>



<section class="review">

    <div class="box">
        <div class="user">
            <img src="image/pic-1.png" alt="">
            <div class="info">
                <h3>Satish Hiremath</h3>
                <span>Senior Consultant , Capgemini</span>
            </div>
        </div>
        <p>Big Data Architect course has helped me advance from Senior Software Engineer to Senior Java Hadoop Developer with a 30% hike in salary.</p>
    </div>

    <div class="box">
        <div class="user">
            <img src="image/pic-2.png" alt="">
            <div class="info">
                <h3>Goutami Chitrapu</h3>
                <span>Senior Analyst , Synchrony</span>
            </div>
        </div>
        <p>I changed my career path from Business Intelligence Executive to Senior Analyst with a 20% hike in my salary.</p>
    </div>

    <div class="box">
        <div class="user">
            <img src="image/pic-3.png" alt="">
            <div class="info">
                <h3>Akash Kumar</h3>
                <span>Principal Software Engineer , TESCO</span>
            </div>
        </div>
        <p>THYNK Certified Scrum Master course helped me rise in my career from Principle Software Engineer to Senior Manager. Thank you</p>
    </div>

    <div class="box">
        <div class="user">
            <img src="image/pic-5.png" alt="">
            <div class="info">
                <h3>Manmeet G</h3>
                <span>IBM Cybersecurity Analyst</span>
            </div>
        </div>
        <p>The most amazing thing about this courses program is the certified and experienced instructors.</p>
    </div>

    <div class="box">
        <div class="user">
            <img src="image/pic-4.png" alt="">
            <div class="info">
                <h3>Akansha Sharma</h3>
                <span>Deep Learning Specialization</span>
            </div>
        </div>
        <p>The knowledge I gained through the Machine Learning and Deep Learning courses helped me land an internship.</p>
    </div>

    <div class="box">
        <div class="user">
            <img src="image/man.png" alt="">
            <div class="info">
                <h3>E. Naveen</h3>
                <span>Google IT Professional Certificate</span>
            </div>
        </div>
        <p>Google's IT Support certificate allowed me to get a foot in the door for the roles I went after, thereby allowing me to convert an offer.</p>
    </div>

</section>

<?php if(isset($_SESSION['User']))
{
    @include 'extra/loginfooter.php'; 
}else{
    @include 'extra/footer.php';
  }
  ?>

</body>
</html>