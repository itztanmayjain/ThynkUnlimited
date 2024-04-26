<?php
session_start();
@include 'database/config.php';

$id = $_GET['cid'];

if(isset($_SESSION['User']))
{
   //echo $_SESSION['User'];
   $user = $_SESSION["User"];
 
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Course Dashboard</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">

</head>
<body>

<?php 
    @include 'extra/loginheader.php'; 
  ?>


<section class="exam">

    <div class="box-container">

        <a href="listvideo.php?cid=<?php echo $id ?>" class="box">
            <img src="image/lecvideo.png" alt="">
            <h3>Videos</h3>
        </a>

        <a href="notes.php?cid=<?php echo $id ?>" class="box">
            <img src="image/lecnotes.png" alt="">
            <h3>Notes</h3>
        </a>
        
        <a href="certificate.php?cid=<?php echo $id ?>" class="box">
            <img src="image/certificate.png" alt="">
            <h3>Certificate</h3>
        </a>
        
    </div>

</section>

<?php 
    @include 'extra/loginfooter.php';
  ?>

</body>
</html>

<?php }else{
  header("location:login.php");
}
?>