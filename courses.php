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
   
    <title><?php ?></title>

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

<!-- header section ends -->

<?php
    $fid = $_GET['fieldid'];
    $sql = "SELECT * FROM `tabunderfield` WHERE id=$fid;"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $field_name=$row['name']; 
    ?>

<div class="heading">
    <h1> <?php echo $field_name ?></h1>
</div>

<?php } ?>



<section class="course-2">

<?php 
$sql = "SELECT * FROM `courses` WHERE fieldid=$fid;";
$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result)){
    $course_name=$row['coursetitle']; 
    $course_desc=$row['shortdesc']; 
    $course_by=$row['created']; 
    $course_img =$row['image'];
    $id=$row['cid']; 
?>

        <div class="box">
            <div class="image">
                <img src="uploaded_img/<?php echo $course_img ?>">
            </div>
            <div class="content"> 
                <h3> <?php echo $course_name ?> </h3>
                <p> <?php echo $course_desc ?></p>
                <a href="cousedetail.php?catid=<?php echo $id ?>" class="btn">Read More</a>
                <div class="icons">
                    <a> <i class="fas fa-user"></i> By  <?php echo $course_by ?>  </a>
                </div>
            </div>
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




<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>
