
<?php

session_start();

@include 'database/db_contact.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Contact Us</title>

    <!-- font awesome cdn link  -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

    
     <!-- swiper css link  -->
   <link rel="stylesheet" href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />

    <!-- custom css file link  -->
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/faq.css">

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
<div class="heading">
    <h1>contact us</h1>
    <p> <a href="home.php">home >></a> contact </p>
</div>

<section class="contact">

    <div class="icons-container">

        <div class="icons">
            <i class="fas fa-phone"></i>
            <h3>our number</h3>
             <a href="tel:+919033092100"> <p>+91-9033092100</p> </a>
        </div>

        <div class="icons">
            <i class="fas fa-envelope"></i>
            <h3>our email</h3>
            <a href="mailto:thynkunlimited@inboxkittem.com"> <p>contact@thynk-unlimited.com</p> </a>
        </div>

        <div class="icons">
            <i class="fas fa-map-marker-alt"></i>
            <h3>our address</h3>
            <p>Surat, Gujarat</p>
        </div>

    </div>

    <div class="row">

        <form action="" method="post">
            <h3>Get in Touch</h3>
            <div class="inputBox">
                <input type="text"  name="name" placeholder="Enter your name" class="box" required>
                <input type="email" name="email" placeholder="Enter your email" class="box"required>
            </div>
            <div class="inputBox">
                <input type="tel" name="phone" placeholder="Enter your number" class="box"required>
                <input type="text" name="subject" placeholder="Enter your subject" class="box"required>
            </div>
            <textarea name="message" placeholder="your message" cols="30" rows="10"></textarea required>
            <input type="submit" value="send message" class="btn">
        </form>

        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d238132.6372711589!2d72.68220624513657!3d21.15946270712223!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3be04e59411d1563%3A0xfe4558290938b042!2sSurat%2C%20Gujarat!5e0!3m2!1sen!2sin!4v1640087149819!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>

    </div>

</section>


<section class="faq">

    <h1 class="highlight">frequently asked questions</h1>
 

    <div class="accordion">
    <div>
      <input type="radio" name="example_accordion" id="section1" class="accordion__input">
      <label for="section1" class="accordion__label">How do I purchase a course?</label>
      <div class="accordion__content">
       
        <p>
        To purchase your course online just follow the link. Online purchases can either be paid for immediately by credit/debit card, you can nominate somebody else to pay on your behalf, or an invoice can be requested.
        </p>
      </div>
    </div>
    <div>

      <input type="radio" name="example_accordion" id="section2" class="accordion__input">
      <label for="section2" class="accordion__label">Do I receive a certificate?</label>
      <div class="accordion__content">
        <p>
        Yes. The majority of our eLearning courses have CPD accredited assessments with the ability to print a certificate once the assessment has been passed (80% pass mark). The below courses are CPD accredited but do not include assessments, for these courses a certificate of participation is accessable at the end of the last module
        </p>
      </div>
    </div>
    <div>
      <input type="radio" name="example_accordion" id="section3" class="accordion__input">
      <label for="section3" class="accordion__label">I have purchased the course online but cannot access the course?</label>
      <div class="accordion__content">
        <p>
        Please contact the THNKY Unlimited office on: contact@thynk-unlimited.com or by calling (+91) 9033092100 or by filling contact form and within 24hr our executive communicate with you.
        </p>
      </div>
    </div>
  </div>
  
 
 </section>
 
 <!-- faq section ends -->

 <?php if(isset($_SESSION['User']))
{
    @include 'extra/loginfooter.php'; 
}else{
    @include 'extra/footer.php';
  }
  ?>


<!-- swiper js link  -->
<script src="https://unpkg.com/swiper@7/swiper-bundle.min.js"></script>

<!-- custom css file link  -->
<script src="js/script.js"></script>

</body>
</html>