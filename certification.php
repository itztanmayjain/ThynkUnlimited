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
   
    <title>Certification Courses</title>

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
    <h1>Certification Courses</h1>
    <p> <a href="home.php">home >></a> Certification</p>
</div>

<section class="category">

    <h1 class="title"> our <span>category</span> </h1>

    <section class="course-1">

    <?php 

    $select = mysqli_query($conn, "SELECT * FROM tabunderfield Where visible = 1");
    while($row = mysqli_fetch_assoc($select)){ 
       ?>

        <div class="box">
           <img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt="">
            <h3><?php echo $row['name']; ?></h3>
            <p><?php echo $row['description']; ?></p>
            <a href="courses.php?fieldid=<?php echo $row['id'];?>" class="btn">Read More</a>
        </div>
        <?php } ?>
    
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