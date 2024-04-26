<?php
session_start();
include('conn.php');

if(isset($_SESSION['User']))
{
  $select_user_Query = "SELECT * FROM `login`";
  $select_course_Query = "SELECT * FROM `courses`";
  $select_field_Query = "SELECT * FROM `tabunderfield`";
  $select_video_Query = "SELECT * FROM `course_video`";
  $select_enrollcourse_Query = "SELECT * FROM `payment` where `status`= 'complete'";
  $select_blog_Query = "SELECT * FROM `tabaddblog` ";

  $result_user = mysqli_query($con, $select_user_Query);
  $result_course = mysqli_query($con, $select_course_Query);
  $result_field = mysqli_query($con, $select_field_Query);
  $result_video = mysqli_query($con, $select_video_Query);
  $result_enrollcourse = mysqli_query($con, $select_enrollcourse_Query);
  $result_blog = mysqli_query($con, $select_blog_Query);

  $row_user = mysqli_num_rows($result_user);
  $row_course = mysqli_num_rows($result_course);
  $row_field = mysqli_num_rows($result_field);
  $row_video = mysqli_num_rows($result_video);
  $row_enrollcourse = mysqli_num_rows($result_enrollcourse);
  $row_blog = mysqli_num_rows($result_blog);
}
else{
  header("location:login.php");
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
   
    <title>Dashboard</title>
   
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/admincss.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>

</head>

<body>
    <div class="wrapper">
        <div class="top_navbar">
          <div class="hamburger">
             <div class="one"></div>
             <div class="two"></div>
             <div class="three"></div>
          </div>

            <div class="top_menu">
                <a href="home.php" class="logo"> THYNK <i class="fas fa-infinity fa-lg"></i> </a>
                <ul>
                   
                  <li><a href="#">
                    <i id="user-btn" class="fas fa-user"></i>
                    </a></li>
                </ul>
            </div>

            <div class="user-content">
            <ul>
                <li><a href="profile.php">
                  <span class="icon"><i class="fas fa-user"></i></span>
                  <span class="title">Profile</span></a></li>

                <li><a href="changepass.php">
                  <span class="icon"><i class="fas fa-key"></i></span>
                  <span class="title">Password</span></a></li>

                <li><a href="#" onclick="document.getElementById('id01').style.display='block'">
                    <span class="icon"><i class="fas fa-sign-out-alt"></i></span>
                    <span class="title">Sign Out</span></a></li>
              </ul>
            </div>
        </div>
       
        <div class="sidebar">
            <ul>
              <li><a href="adminhome.php" class="active">
                <span class="icon"><i class="fas fa-home"></i></span>
                <span class="title">Dashboard</span></a></li>
                
              <li><a href="addcourse.php">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="title">Add Course</span>
                </a></li>

              <li><a href="uploadvideo.php">
                <span class="icon"><i class="fas fa-upload"></i></span>
                <span class="title">Upload Video</span>
                </a></li>
                
              
                <li><a href="uploadnotes.php" target="_blank">
                <span class="icon"><i class="fas fa-sticky-note"></i></span>
                <span class="title">Upload Notes</span>
                </a></li>

              <li><a href="addfield.php">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="title">Add Field</span>
                </a></li>

              <li><a href="admin_show_course.php">
                <span class="icon"><i class="fas fa-calendar-plus"></i></span>
                <span class="title">Created Course</span>
                </a></li>

              <li><a href="addblog.php">
                <span class="icon"><i class="fas fa-blog"></i></span>
                <span class="title">Blog</span>
                </a></li>

              <li><a href="show_query.php">
                <span class="icon"><i class="fas fa-question"></i></span>
                <span class="title">Query</span>
                </a></li>
          </ul>
        </div>

        <div id="id01" class="modal">
            <span onclick="document.getElementById('id01').style.display='none'" class="close" title="Close Modal">×</span>
            <form class="modal-content" action="/action_page.php">
            <div class="container">
                <h1>Sign Out</h1>
                <p>Are you sure you want to sign out your account?</p>
    
                <div class="clearfix">
                  <button type="button" onclick="document.getElementById('id01').style.display='none'" class="cancelbtn">Cancel</button>
                  <a href="logout.php?logout" class="deletebtn">OK</a>
                </div>
            </div>
            </form>
        </div>

        <section class="main_container">
          <a href = "userdetail.php" class="item">
            <div class="content">
           
              <h3><?php echo $row_user; ?></h3>
              <h5>Total Users</h5>
            </div>
          </a>

          <a href="addfield.php" class="item">
            <div class="content">
           
              <h3><?php echo $row_field; ?></h3>
              <h5>Total Fields</h5>
            </div>
          </a>
        </section>

        <section class="second_container">

          <a href="admin_show_course.php" class="item">
            <div class="content">
           
              <h3><?php echo $row_course; ?></h3>
              <h5>Cources</h5>
            </div>
          </a>

          <a href="" class="item">
            <div class="content">
           
              <h3><?php echo $row_video; ?></h3>
              <h5>Videos</h5>
            </div>
          </a>

          <a href="certcourse.php" class="item">
            <div class="content">
           
              <h3><?php echo $row_enrollcourse; ?></h3>
              <h5>Enroll Students</h5>
            </div>
          </a>
        </section>

        <section class="third_container">
        <a href="addblog.php" class="item">
            <div class="content">
           
              <h3><?php echo $row_blog; ?></h3>
              <h5>Blog</h5>
            </div>
          </a>
          
        </section>
        <section class="credit">
        <i class="far fa-copyright"></i> 2022-23 All Rights Reserved! | Powered by <b>Thynk Infinity</b>
        </section>
    </div>

   <script>
      //Navigation Slider js
      $(document).ready(function(){
        $(".hamburger").click(function(){
          $(".wrapper").toggleClass("collapse");
        });
      });
    </script> 
    <script src="AdminScript.js"></script>
</body>
</html>