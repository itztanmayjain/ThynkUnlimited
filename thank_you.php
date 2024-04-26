<?php
session_start();
@include 'database/config.php';

if(isset($_SESSION['User']))
{
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    
    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/thankyou.css">

</head>
<body>
    


<div class="banner-container">

    <div class="banner">
        <div class="Thank">
            <img src="image/up.png" alt="">
        </div>
        <div class="content">
            <span></span>
            <h3>You're passport to the future</h3>
            <p>Enrollment Successful</p>
            <a href="mycourse.php" class="btn">My Course</a>
        </div>
        <div class="you">
            <img src="image/women.png" alt="">
        </div>
    </div>

</div>




</body>
</html>

<?php }else{
  header("location:login.php");
}
?>