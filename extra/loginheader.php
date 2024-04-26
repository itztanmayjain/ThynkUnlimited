

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
   
    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

     <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css\style.css">

</head>
<body>
 
<header class="header">

<a href="afterlogin.php" class="logo"> THYNK <i class="fas fa-infinity fa-lg"></i> </a>

<nav class="navbar">
    <a href="afterlogin.php">home</a>
    <a href="about.php">About</a>
    <a href="Alumni.php">Alumni</a>
    <a href="blog.php">Blog</a>
    <a href="contact.php">Contact</a>
</nav>

<div class="icons">
    <div id="menu-btn" class="fas fa-bars"></div>
    <div id="login-btn" class="fas fa-user-check"> <?php echo $user_name ?></div>
</div>

<div class="login-form">
   
<a href="profile.php"> <input value="Dashboard" class="btn"></a>
<a href="mycourse.php"> <input value="My Courses" class="btn"></a>
<!--  <a href="#"> <input value="My Certificate" class="btn"></a> -->
<a href="userlogout.php"><input value="Logout" class="btn"></a>
    
</div>
</header>
<!-- header section ends -->


<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>