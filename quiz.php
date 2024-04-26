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
   
    <title>Exam-Test Your Skill</title>

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

<!-- header section ends -->
<section class="exam">

    <div class="box-container">

        <a href="c++quiz.php" class="box">
            <img src="image/C++.png" alt="">
            <h3>C++</h3>
        </a>

        <a href="phpquiz.php" class="box">
            <img src="image/php.png" alt="">
            <h3>PHP</h3>
        </a>


        <a href="htmlquiz.php" class="box">
            <img src="image/html.png" alt="">
            <h3>HTML/CSS</h3>
        </a>

     
    </div>

</section>

<?php 
if(isset($_SESSION['User']))
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