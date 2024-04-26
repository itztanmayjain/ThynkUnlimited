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
   
    <title>Our Blogs</title>

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
    <h1>our blogs</h1>
    <p> <a href="home.php">home >></a> blogs </p>
</div>

<section class="blogs">

    <h1 class="title"> our <span>blogs</span></h1>

    <div class="box-container">

    <?php $select = mysqli_query($conn, "SELECT * FROM tabaddblog WHERE visible=1");
    while($row = mysqli_fetch_assoc($select)){ 
       ?>

        <div class="box">
            <div class="image">
                <img src="uploaded_img/<?php echo $row['image'] ?>" alt="">
            </div>
            <div class="content">
                <div class="icons">
                    <a> <i class="fas fa-calendar"></i> <?php echo $row['date']; ?> </a>
                    <a> <i class="fas fa-user"></i><?php echo $row['createdby']; ?></a>
                </div>
                <h3><?php echo $row['name']; ?></h3>
                <p><?php echo $row['shortdesc']; ?></p>
                <a href="blogcontent.php?blogid=<?php echo $row['id'];?>" class="btn">Read Now</a>
            </div>
        </div>
        <?php } ?>

        </div>

       

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