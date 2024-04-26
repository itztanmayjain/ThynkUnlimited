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
   
    <title>Privacy Policy</title>

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
  ?> 

<!-- header section ends -->

<section class="terms">

    <h1 class="title">Privacy<span>Policy</span></h1>

    <div class="box-container">
    <ul>
            <h2>
                <li>Special Category of Personal Data includes details about your race or ethnicity, religious or philosophical beliefs, sex life, sexual orientation, political opinions, trade unions memberships, information about your health and genetic and biometric data.</li><br>

                <li>We do not collect or process any special or sensitive Personal Data.</li><br>

                <li>Should we specifically require “special” or “sensitive” Personal Data in connection with one or more of the uses described below, we will request your explicit consent to use the data in accordance with this policy and/or in the ways described at the point where you were asked to disclose the data.</li><br>

                <li>Other legal basis for our processing of special category data may include, as permitted by applicable law, for scientific research, for employment, social security or social protection law, for reasons of substantial public interest, or as necessary for the establishment, exercise or defence of legal claims. If you voluntarily share with us or post/upload any “special” or “sensitive” Personal Data to this website for any other reason, you consent that we may use such data in accordance with applicable law and this policy. You can contact our DPO for more information about our processing of your Personal Data.</li><br>

                <li>We receive Personal Data such as access or login details, profile picture or any other text / image in relation to your Personal Data which may be available with such third parties.</li><br>

                <li>Third parties from whom we receive your Personal Data include, our service providers, other networks connected to our service, our advertising partners, our marketing and advertising affiliates, our educational partners, scholarship providers, analytics providers, recruiters and such other third-party sources.</li><br>

                <li>Furthermore, we may allow third-party advertising companies (such as Facebook, Google, Twitter, Quora and Bing) to place cookies on our website. These cookies enable such companies to track your activity across various sites where they display Ads and record your activities, so they can show Ads that they consider relevant to you as you browse the Internet. These cookies store information about the content you are browsing, together with an identifier linked to your device or IP address. </li><br>

               <li> We use Analytics tools and search information providers to measure how visitors interact with content on our website. We also use Facebook Custom Audiences to ask Facebook to show you ads that are customized based on your interaction with our websites or our Facebook applications and to measure how you interact with those ads. Additional information on how these services use such technologies can be found on Google’s website, Adobe’s website and Facebook’s website.</li><br>


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