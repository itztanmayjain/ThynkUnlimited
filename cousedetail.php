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
   
   
    <!-- font awesome cdn link  -->
    <script src="https://kit.fontawesome.com/faab3f4ba2.js" crossorigin="anonymous"></script>
     <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    
    <link rel="stylesheet" href="css/coursedetail.css">

</head>
<body>
    
<?php if(isset($_SESSION['User']))
{
    @include 'extra/loginheader.php'; 
}else{
    @include 'extra/header.php';
  }
  ?>



<!-- course details -->



<section id="course-inner">

<?php 



 $detailid = $_GET['catid'];

$sql = "SELECT * FROM `courses` WHERE cid=$detailid;";
$result = mysqli_query($conn, $sql);





while($row = mysqli_fetch_assoc($result)){
    $course_id=$row['cid']; 
    $course_name=$row['coursetitle']; 
    $course_shrt=$row['shortdesc'];
    $course_overview=$row['overview']; 
    $course_learn1=$row['learn1']; 
    $course_learn2=$row['learn2'];
    $course_learn3=$row['learn3'];
    $course_learn4=$row['learn4'];
    $course_price=$row['price'];
    $course_img =$row['image'];
   
?>
    <div class="overview">
        <img id="course-img" src="uploaded_img/<?php echo $course_img ?>" >
        <div class="course-head">
            <div class="course-name"> 
                <h2> <?php echo $course_name ?> </h2>
               <br>
                 <p> <?php echo $course_shrt ?> </p>
            </div>
                <span>Rs.<?php echo $course_price ?>/-</span>
                </div>
        <hr>
        <h3>Course Overview</h3>
        <p> <?php echo $course_overview ?> </p>
            <br><br>
        <hr>
        <h3>What you'll Learn</h3>
        <div class="learn">
            <p><i class="far fa-check-circle fa-beat"></i><?php echo $course_learn1 ?> </p>
            <p><i class="far fa-check-circle fa-beat"></i><?php echo $course_learn2 ?> </p>
            <p><i class="far fa-check-circle fa-beat"></i><?php echo $course_learn3 ?> </p>
            <p><i class="far fa-check-circle fa-beat"></i><?php echo $course_learn4 ?> </p>
        </div>
        </div>
        
        <div class="enroll">
            <h3>This Course include:</h3>
            <p><i class="fas fa-video"></i>Videos</p>
            <p><i class="fa-solid fa-book-open"></i>Notes</p>
            <p><i class="fas fa-cloud-download-alt"></i>Downloadable Resourses</p>
            <p><i class="fas fa-infinity "></i>Full Lifetime Access</p>
            <p><i class="fas fa-file-alt"></i>Test</p>
            <p><i class="fas fa-trophy"></i>Certificate of Completion</p>
            
            <?php

if(isset($_SESSION['User']))
{
   
   $user = $_SESSION["User"];
  $user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
  $result_user = mysqli_query($conn,$user_query);
  $user_rowData = mysqli_fetch_assoc($result_user);
  $user_id = $user_rowData["id"];

  $sql2 = "SELECT * FROM `payment` WHERE user_id='$user_id' AND course_id='$detailid'; ";
$result2= mysqli_query($conn,$sql2);
$row2 = mysqli_fetch_assoc($result2);
$y= $row2["course_id"];


            if ($detailid == $y)
        { ?>
    <div class="enrollbtn"> 
                <a class="enrollcolor" href="coursecat.php?cid=<?php echo $course_id ?> ">Already Enrolled </a>
            </div>
        <?php }
         else
        { ?>
       <div class="enrollbtn"> 
                <a class="enrollcolor" href="payment_detail.php?payid=<?php echo $course_id ?> "> Enroll Now</a>
            </div>
    
            <?php } }
            
            else
            {?>
  <div class="enrollbtn"> 
                <a class="enrollcolor" href="payment_detail.php?payid=<?php echo $course_id ?> "> Enroll Now</a>
            </div>

           <?php }?>


        </div>
        <?php } ?>
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