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
   
    <title> Blog</title>

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

<?php
    $id = $_GET['blogid'];
    $sql = "SELECT * FROM `tabaddblog` WHERE id=$id;"; 
    $result = mysqli_query($conn, $sql);
    while($row = mysqli_fetch_assoc($result)){
        $blog_title=$row['name']; 
        $blog_content=$row['description']; 
    ?>

<!-- header section ends -->

<section class="terms">

    <h1 class="title"><span> <?php echo $blog_title ?> </span> </h1>

    <div class="box-container">
    <ul>
            <h2>
            <?php echo $blog_content ?> 
            </h2>
        </ul>
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