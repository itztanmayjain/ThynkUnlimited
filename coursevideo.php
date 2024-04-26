<?php
session_start();
@include 'database/config.php';

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
   
   <title>Video Lecture</title>

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/coursevideo.css">

</head>
<?php

$select = mysqli_query($conn, "SELECT * FROM course_video");
//$row = mysqli_fetch_assoc($select);
$rowcount = mysqli_num_rows($select);
?>

<body>

<!-- header section starts  -->
<?php 
    @include 'extra/loginheader.php'; 
  ?>

<!-- header section ends -->

<!-- home section starts  -->
   
<div class="container">

   <div class="main-video-container">
      <video src="" loop controls class="main-video"></video>
      <h3 class="main-vid-title"></h3>
   </div>

   <div class="video-list-container" >
      
      
  
      <?php for($i=0; $i<$rowcount; $i++){
         $row = mysqli_fetch_assoc($select)?>
         
         <div class="list" >
            <video src="uploaded_videos/<?php echo $row['video']; ?>" class="list-video"></video>
            <h3 class="list-title"><?php echo $row['title']; ?></h3>
         </div>

      <?php } ?>


      <!--<div class="list active" >
         <video src="images/vid-1.mp4" class="list-video"></video>
         <h3 class="list-title">Chapter-1</h3>
         <i class="far fa-check-circle"></i> 
      </div>

      <div class="list">
         <video src="images/vid-2.mp4" class="list-video"></video>
         <h3 class="list-title">Chapter-2</h3>
         <i class="far fa-check-circle"></i> 
      </div>

      <div class="list">
         <video src="images/vid-3.mp4" class="list-video"></video>
         <h3 class="list-title">Chapter-3</h3>
         <i class="far fa-check-circle"></i> 
      </div>

      <div class="list">
         <video src="images/vid-4.mp4" class="list-video"></video>
         <h3 class="list-title">Chapter-4</h3>
         <i class="far fa-check-circle"></i> 
      </div>

      <div class="list">
         <video src="images/vid-5.mp4" class="list-video"></video>
         <h3 class="list-title">Chapter-5</h3>
         <i class="far fa-check-circle"></i> 
      </div>

      <div class="list">
         <video src="images/vid-6.mp4" class="list-video"></video>
         <h3 class="list-title">Chapter-6</h3>
         <i class="far fa-check-circle"></i> 
      </div>-->

   </div>

</div>

<?php 
    @include 'extra/loginfooter.php'; 
  ?>


<!-- custom js file link  -->
<script src="js/videoscript.js"></script>

</body>
</html>
<?php }else{
  header("location:login.php");
}
?>