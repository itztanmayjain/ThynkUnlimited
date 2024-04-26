<?php

session_start();

include('conn.php'); 

if(isset($_POST['email'])){
    
    $uname = $_POST['email'];
    $password = $_POST['password'];
    
    $sql="select * from `login` where `email`='$uname' AND `password` ='$password'"; 
    $result=mysqli_query($con, $sql) or die(mysql_error());
    $rowData = mysqli_fetch_assoc($result);
    
    if($rowData){
        if(isset($_POST['remember'])){
            setcookie('email', $uname, time()+(60*60*7));
            setcookie('password', $password, time()+(60*60*7));
        }else{
            if(isset($_COOKIE["email"]))   
            {  
                setcookie ("email","");  
            }  
            if(isset($_COOKIE["password"]))  
            {  
                setcookie ("password","");  
            }  
        }
        $_SESSION['User'] = $uname;

        if($rowData["position"] == "Faculty"){
            header("location:faculty_side.php");
        }elseif($rowData["position"] == "Admin"){
            header("location:adminhome.php");
        }else{
            header("location:afterlogin.php");
        }
    }
    else{
        $message = " You Have Entered Incorrect Email or Password";
        echo "<script type='text/javascript'>alert('$message');</script>";
    }
    
}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Thynk</title>
   
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!--<link rel="stylesheet" href="css/logincss.css">-->
    <link rel="stylesheet" href="css/logincss.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>
<body style="background-image: url('image/loginbg.png');">
    <div class="main-page" >
        <div class="topnav">
            <a href="home.php" class="logo"> THYNK 
                <i class="fas fa-infinity fa-lg"></i> 
            </a>
            
            <a href="registration.php"> <input type="button" Value="Sign Up" class="btn" id="btnsignin"> </a>
            
        </div>

        <form name="f1" action="#" onsubmit="return validation()" method="POST" class="login-box">
            <h3>Sign In</h3>
            <input type="email" placeholder="Enter your email" class="box" name="email" value="<?php if(isset($_COOKIE["email"])) { echo $_COOKIE["email"]; } ?>">
            <input type="password" placeholder="Enter your password" class="box" name="password" value="<?php if(isset($_COOKIE["password"])) { echo $_COOKIE["password"]; } ?>" >
            <div class="remember">
                <input type="checkbox" name="remember" <?php if(isset($_COOKIE["email"])) { ?> checked <?php } ?>>
                <label for="remember-me">Remember Me</label>
            </div>
            <input type="submit" value="Sign In" class="btn">
          <!--  <h5>OR</h5>
            <a href="#" class="google-btn"><img src="Images/google.png" alt="">
                Sign In with Google+
            </a>-->

            <p>forget password? <a href="forgotpass.php">click here</a></p>
            <p class="signin">don't have an account? <a href="registration.php">create one</a></p>
        </form>
    </div>

    <!--JavaScript-->
    <script src="AdminScript.js"></script>
</body>
</html>