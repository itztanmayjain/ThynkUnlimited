
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
   
    <title>Term And Conditions</title>

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

<section class="terms">

    <h1 class="title"> Terms &<span>Conditions</span></h1>

    <div class="box-container">
    <ul>
            <h2>
                <li>This is a legal and binding agreement between you, the user (referred to as “user” or “you”) of the Programs, as defined below, and upGrad (together with its subsidiaries, and international affiliates, hereinafter "Think-Unlimited," "us," "we," or "our" or “the Company”) stating the terms that govern your use of the Platform, as defined below. The website www.thynkunlimited.cf and mobile apps (collectively referred to as the “Platform”) and the information, services and other materials contained therein are provided and operated. ThnkUnlimited offers curated and specially designed online higher education and industry-relevant certification programs and career assistance services (“Programs”).</li><br>

                <li>Each Program may have a separate set of terms dealing with refunds, deferrals, payments, etc. governing such Programs, and our corporate clients may have executed separate written agreements with us, which, in the event of a conflict, will supersede these Terms to the extent of the conflicting provisions.</li><br>

                <li>Although you may "bookmark" a particular portion of the Platform and thereby bypass these Terms, your use of the Platform still binds you to these Terms.</li><br>

                <li>We may change these Terms from time to time without prior notice. You should review this page regularly. Your continued use of the Platform and Programs after changes have been made will be taken to indicate that you have read and accepted those changes. You should not use the Platform or Programs if you are not happy with any changes to these Terms.</li><br>

                <li>In order to participate in most Platform activities and to apply for a Program, you will need to register for a personal account (“User Account”) by undergoing a two-step verification process to verify your login credentials such as your phone number, by way of a one-time password which will be sent to your phone number simultaneously and/or by providing an email address and a password that is unique.</li><br>

                <li>It is the sole responsibility of the user enrolling into a Program to check the accuracy of, and evaluate the suitability and relevance of, the Program elected. The enrolment into a Program is non-transferable</li><br>

                <li>In compliance of the Information Technology Act, 2000 and rules made thereunder and also in compliance of the Consumer Protection (E-Commerce) Rules, 2020, Feel free to contact us <a href="contact.php"> Click Here </a> For any query. </li><br>


            </h2>
        </ul>
        </div>

       

</section>

<?php 
if(isset($_SESSION['User']))
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