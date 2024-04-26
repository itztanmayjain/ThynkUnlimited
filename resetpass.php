<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Reset</title>

    <!--<link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="css/forgotpass.css">
    <!-- font awesome cdn link  -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Logout Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  <!-- Alert Box -->

    <script src="jquery-3.3.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>

   </head>

   <body>

    <header class="header">

        <a href="home.php" class="logo"> THYNK <i class="fas fa-infinity fa-lg"></i> </a>
      
        <a href="login.php"> <input type="button" Value="Sign In" class="btn" id="btnsignin"> </a>
      
    </header>

   <?php
include('conn.php');
if (isset($_GET["key"]) && isset($_GET["email"]) && isset($_GET["action"]) && ($_GET["action"]=="reset") || !isset($_POST["action"])){
  $key = "";
  $email = "";
  $expDate = "";
  $pass_error = "";
  $row = "";
    $key = isset($_GET["key"]);
    $email = $_GET["email"];
    $curDate = date("Y-m-d H:i:s");

    $query = mysqli_query($con,"SELECT * FROM `password_reset_temp` WHERE `key`='".$key."' and `email`='".$email."';");

    $row = mysqli_num_rows($query);
    printf("Result set has %d rows.\n",$row);
    printf("Key %s",$key);
    printf("email %s",$email);
    if ($row == ""){
        /*$pass_error .= '<h2>Invalid Link</h2>
        <p>The link is invalid/expired. Either you did not copy the correct link
        from the email, or you have already used the key in which case it is 
        deactivated.</p>
        <p><a href="http://localhost:81/Project/AdminProject/resetpass.php">
        Click here</a> to reset password.</p>';*/

        echo '
                <script type="text/javascript">
  
                  $(document).ready(function(){
  
                    swal({
                      title: "Invalid Link",
                      text: "The link is invalid / expired",
                      icon: "error",
                      showConfirmButton: false,
                      confirmButtonColor: "btn-danger"
                    })
                  });
  
                </script>
              ';

    }else{
        $row = mysqli_fetch_assoc($query);
        $expDate = isset($row['expDate']);
        if ($expDate <= $curDate){
?>

   

    <section class="regis">
        <center> <div class="container">
           <div class="title">Reset Password</div>
           <div class="content">
             <form action="" method="post" name="update">
             <input type="hidden" name="action" value="update" />
               <div class="user-details">
    
                 <div class="input-box">
                   <span class="details">Password</span>
                   <input type="password"  name="password" placeholder="Enter New Password" required>
                 </div>

                 <div class="input-box">
                   <span class="details">Confirm Password</span>
                   <input type="password"  name="cpassword" placeholder="Enter Confirm Password" required>
                   <span class="error"><?php if (isset($pass_error)) echo $pass_error; ?></span>
                 </div>
                <input type="hidden" name="email" value="<?php echo $email;?>"/> 
               <div class="button">
                 <input type="submit" name="submit" value="Register">
               </div>
             </form>
           </div>
         </div></center>
       </section>

       <section class="credit"><i class="far fa-copyright"></i> 2022-23 All Rights Reserved! | Powered by <b>Thynk Infinity</b></section>

   </body>

   
</html>

   <?php

    }else{
        /*$pass_error .= "<h2>Link Expired</h2>
        <p>The link is expired. You are trying to use the expired link which 
        as valid only 24 hours (1 days after request).<br /><br /></p>";*/

        echo '
                <script type="text/javascript">
  
                  $(document).ready(function(){
  
                    swal({
                      title: "Link Expired",
                      text: "This link which as valid only 24 hours",
                      icon: "error",
                      showConfirmButton: false,
                      confirmButtonColor: "btn-danger"
                    })
                  });
  
                </script>
              ';
    }
    }

    if($pass_error!=""){
        echo "<div class='error'>".$pass_error."</div><br />";
    }			
    }

    if(isset($_POST["submit"])){

        $password = $_POST['password'];
        $cpassword = $_POST['cpassword'];

        $email = $_POST["email"];
        $curDate = date("Y-m-d H:i:s");

        if($password != $cpassword){
            $pass_error = "Not same as above password";
        }

        if($pass_error == NULL){
            $update_Query = "UPDATE `login` SET `password`='" . $cpassword . "' WHERE `email`='".$email."'";
            mysqli_query($con,$update_Query);

            mysqli_query($con,"DELETE FROM `password_reset_temp` WHERE `email`='".$email."';");
	
/*echo '<div class="error"><p>Congratulations! Your password has been updated successfully.</p>
<p><a href="https://www.allphptricks.com/forgot-password/login.php">
Click here</a> to Login.</p></div><br />';*/

echo '
<script type="text/javascript">

$(document).ready(function(){

  swal({
    position: "top-end",
    icon: "success",
    title: "Your password change successfully",
    showConfirmButton: false,
    timer: 1500
  })
});

</script>
';
        }
    }

?>