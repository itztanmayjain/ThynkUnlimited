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
   
    <title>Notes</title>
   
    <!-- font awesome cdn link  -->
    <script src="https://kit.fontawesome.com/faab3f4ba2.js" crossorigin="anonymous"></script>
     <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    
    <link rel="stylesheet" href="css/style.css">

</head>
<body>    
<?php @include 'extra/loginheader.php'; ?>


<section class="subjects" style="padding:150px" >

   <div class="box-container" >

   <?php $select = mysqli_query($conn, "SELECT * FROM uploaded_files WHERE `cid` = '$id' ");
    while($row = mysqli_fetch_assoc($select)){ 
       ?>
       <a href="uploads/<?php echo $row['name']; ?>" target="_blank"> 
      <div class="box">
         <img src="image/upnotes.png" alt="">
         <h3> <?php echo $row['title']; ?> </h3>
      </div></a>

      <?php } ?>    

   </div>

</section>


        


<?php @include 'extra/loginfooter.php';?>


</body>
</html>
<?php }else{
  header("location:login.php");
}
?>
