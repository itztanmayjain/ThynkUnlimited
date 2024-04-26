<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
   <title>Videos</title>
  

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/listcoursevideo.css">

</head>
<?php

session_start();

include('conn.php');

if(isset($_SESSION['User']))
{
  $id = $_GET['cid'];
  //echo "id is".$id;
  $select_query = "SELECT * from `courses` where `cid` = '$id'";
  $select_result = mysqli_query($con, $select_query) or die ( mysqli_error());
  $row = mysqli_fetch_assoc($select_result);
  $coursename = $row["coursetitle"];
  //echo $row["CourseName"];

  $select = mysqli_query($con, "SELECT * FROM course_video where `CourseName` = '$coursename'");
//$row = mysqli_fetch_assoc($select);
$rowcount = mysqli_num_rows($select);

}else{
  header("location:login.php");
}
?>

<body>

<!-- header section starts  -->

<?php @include 'extra/loginheader.php'; ?>

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

   </div>

</div>

<?php @include 'extra/loginfooter.php'; ?>


<!-- custom js file link  -->
<script src="listvideoscript.js"></script>
<script src="AdminScript.js"></script>

</body>
</html>