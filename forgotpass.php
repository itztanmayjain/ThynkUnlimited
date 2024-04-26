<?php 
include('conn.php'); 

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
require 'C:\Users\Modi\vendor\autoload.php';

//require_once "vendor/autoload.php";

if(isset($_POST["email"]) && (!empty($_POST["email"]))){
    $email = $_POST["email"];
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);
    $email = filter_var($email, FILTER_VALIDATE_EMAIL);
    $error ="";
    if (!$email) {
        $error .="<p>Invalid email address please type a valid email address!</p>";
    }else{
        $sel_query = "SELECT * FROM `login` WHERE `email`='".$email."'";
        $results = mysqli_query($con,$sel_query);
        $row = mysqli_num_rows($results);
        if ($row==""){
            $error .= "<p>No user is registered with this email address!</p>";
        }
    }
    if($error!=""){
        echo "<div class='error'>".$error."</div>
        <br /><a href='javascript:history.go(-1)'>Go Back</a>";
        }else{
        $expFormat = mktime(
        date("H"), date("i"), date("s"), date("m") ,date("d"), date("Y")
        );
        $expDate = date("Y-m-d H:i:s",$expFormat);
        $key = md5($email);
        $addKey = substr(md5(uniqid(rand(),1)),3,10);
        $key = $key . $addKey;

        // Insert Temp Table
        mysqli_query($con,"INSERT INTO `password_reset_temp` (`email`, `key`, `expDate`) VALUES ('".$email."', '".$key."', '".$expDate."');");

        $output='<p>Dear user,</p>';
        $output.='<p>Please click on the following link to reset your password.</p>';
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p><a href="http://localhost:81/Project/AdminProject/resetpass.php?
        key='.$key.'&email='.$email.'&action=reset" target="_blank">
        http://localhost:81/Project/AdminProject/resetpass.php
        ?key='.$key.'&email='.$email.'&action=reset</a></p>';		
        $output.='<p>-------------------------------------------------------------</p>';
        $output.='<p>Please be sure to copy the entire link into your browser.
        The link will expire after 1 day for security reason.</p>';
        $output.='<p>If you did not request this forgotten password email, no action 
        is needed, your password will not be reset. However, you may want to log into 
        your account and change your security password as someone may have guessed it.</p>';   	
        $output.='<p>Thanks,</p>';
        $output.='<p>Team Thynk Infinity</p>';
        $body = $output; 
        $subject = "Password Recovery - Thynk Infinity";

        $email_to = $email;
        //$fromserver = "svasant0498@gmail.com"; 
        //require("PHPMailer/PHPMailerAutoload.php");
        
        $mail = new PHPMailer();
        $mail->IsSMTP();

        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        //$mail->SMTPAutoTLS = false; 

        $mail->Username = '';   // SMTP username 
        $mail->Password = '';   // SMTP password 
        $mail->SMTPSecure = 'tls';
        $mail->Port = 587;

        $mail->setFrom('nencymodi0498@gmail.com', 'Thynk Infinity'); 
        $mail->addReplyTo('nencymodi0498@gmail.com', 'Thynk Infinity'); 
 
// Add a recipient 
        $mail->addAddress($email_to);


        $mail->IsHTML(true);
        $mail->Subject = $subject;
        $mail->Body = $body;

        if(!$mail->Send()){
            echo "Mailer Error: " . $mail->ErrorInfo;
        }else{
            echo "<div class='error'>
            <p>An email has been sent to you with instructions on how to reset your password.</p>
            </div><br /><br /><br />";
        }
    }

}else{
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Forgot Password</title>
   
    <!--<link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="css/style.css">-->
    <link rel="stylesheet" href="css/forgotpass.css">
    <!-- font awesome cdn link  -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Logout Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  <!-- Alert Box -->

   </head>

   <body>

    <header class="header">

        <a href="home.php" class="logo"> THYNK <i class="fas fa-infinity fa-lg"></i> </a>
      
        <a href="login.php"> <input type="button" Value="Sign In" class="btn" id="btnsignin"> </a>
      
    </header>

    <section class="regis">
        <center> <div class="container">
           <div class="title">Forgot Password</div>
           <div class="content">
             <form action="#" method="post" name="reset">
               <div class="user-details">
    
                 <div class="input-box">
                   <span class="details">Email</span>
                   <input type="email"  name="email" placeholder="Enter your email" required>
                 </div>
                 
               <div class="button">
                 <input type="submit" name="submit" value="Submit">
               </div>
             </form>
           </div>
         </div></center>
       </section>

       <section class="credit"><i class="far fa-copyright"></i> 2022-23 All Rights Reserved! | Powered by <b>Thynk Infinity</b></section>

   </body>

</html>

<?php } ?>