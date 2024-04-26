<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Registration</title>
   
    <link rel="stylesheet" href="css/registration.css">
    <link rel="stylesheet" href="css/regs1.css">
    <!-- font awesome cdn link  -->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>  
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Logout Alert -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  <!-- Alert Box -->

   </head>

<?php
session_start();

include('conn.php'); 

if(isset($_POST['submit'])){

  $name = $_POST['name'];
  $username = $_POST['username'];
  $email = $_POST['email'];
  $mobile = $_POST['phone'];
  $password = $_POST['password'];
  $position = $_POST['position'];

  $name_error = $username_error = $mobile_error = $password_error = "";

  if (!preg_match("/^[a-zA-Z ]+$/",$name)) {
    $name_error = "Name must contain only alphabets and space";
  }

  if(!preg_match("/^[0-9a-zA-Z@#$ ]+$/",$username)) {
    $username_error = "Only @ # $ special characters are allowed";
  }

  if(strlen($mobile) < 10) {
    $mobile_error = "Mobile number must be minimum of 10 number";
  }

  if(!preg_match("/^[0-9a-zA-Z@#$ ]+$/",$password)) {
    $password_error = "Only @ # $ special characters are allowed";
  }

  if($name_error == NULL and $username_error == NULL and $mobile_error == NULL and $password_error == NULL)
  {
    $check_email_query = "SELECT * from `login` where `email` = '$email' ";
    $result=mysqli_query($con, $check_email_query) or die(mysql_error());
    $rowData = mysqli_fetch_assoc($result);
    $check_email = isset($rowData["email"]);

    if($check_email == ""){

      $insert_Query="INSERT INTO `login` (`name`, `username`, `email`, `phoneNo`, `password`, `position`) VALUES ('" . $name . "', '" . $username . "' ,'" . $email . "', '" . $mobile . "', '" . $password . "', '" . $position . "')"; 
    
      try{
      $insert_Result = mysqli_query($con, $insert_Query);
        
        if($insert_Result)
        {
          if(mysqli_affected_rows($con) > 0)
          {
            //echo 'Data Inserted';
            echo '
                <script type="text/javascript">
  
                  $(document).ready(function(){
  
                    swal({
                      title: "User Created!",
                      text: "Your registration done succesfully",
                      icon: "success",
                      showConfirmButton: false,
                      confirmButtonColor: "btn-danger"
                    })
                  });
  
                </script>
              ';
              //header("location:login.php");
          }else{
            echo 'Data Not Inserted';
          }
        }
      } catch (Exception $ex) {
        echo 'Error Insert'.$ex->getMessage();
      }
    }else{
      $message = " This Email address is already registered";
      echo "<script type='text/javascript'>alert('$message');</script>";
    }
    
  }
}

?>

<body>
<!-- header section starts  -->

<header class="header">

  <a href="home.php" class="logo"> THYNK <i class="fas fa-infinity fa-lg"></i> </a>

  <a href="login.php"> <input type="button" Value="Sign In" class="btn" id="btnsignin"> </a>

</header>
<!-- header section ends -->

<section class="regis">
 <center> <div class="container">
    <div class="title">Forgot Password</div>
    <div class="content">
      <form action="#" method="post">
        <div class="user-details">
          <div class="input-box">
            <span class="details">Full Name</span>
            <input type="text" name="name" placeholder="Enter your name" required>
            <span class="error"><?php if (isset($name_error)) echo $name_error; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Username</span>
            <input type="text" name="username" placeholder="Enter your username" required>
            <span class="error"><?php if (isset($username_error)) echo $username_error; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Email</span>
            <input type="email"  name="email" placeholder="Enter your email" required>
          </div>
          <div class="input-box">
            <span class="details">Phone Number</span>
            <input type="number"  name="phone" placeholder="Enter your number" maxlength="12" required>
            <span class="error"><?php if (isset($mobile_error)) echo $mobile_error; ?></span>
          </div>
          <div class="input-box">
            <span class="details">Password</span>
            <input type="password"  name="password" placeholder="Enter your password" required>
            <span class="error"><?php if (isset($password_error)) echo $password_error; ?></span>
          </div>

           <div class="input-box">
            <span class="details">Position</span>
            <select name="position" required>

              <option value="Learner">Learner</option>
              <option value="Faculty">Faculty</option>
                  
            </select>
          </div>
        </div>
        <div class="button">
          <input type="submit" name="submit" value="Register">
        </div>
        <div class="link">
         <p>Already Have Account? <a href="login.php">Click Here</a></p>
       </div>
      </form>
    </div>
  </div></center>
</section>

<section class="credit"><i class="far fa-copyright"></i> 2022-23 All Rights Reserved! | Powered by <b>Thynk Infinity</b></section>

  <!-- custom css file link  -->
<script src="AdminScript.js"></script>
</body>
</html>