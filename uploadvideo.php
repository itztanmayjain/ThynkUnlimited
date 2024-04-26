<!DOCTYPE html>
<html lang="en">
    <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
      <title>Add Course</title>
     
      
      <link rel="stylesheet" href="css/addcoursecss.css">
      <link rel="stylesheet" href="css/addcourse.css"/>

      <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

      <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script> <!-- Logout Alert -->

      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script> <!-- Alert -->

      <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
      <script>tinymce.init({ selector:'textarea' });</script>

      <script src="AddcourseScript.js" defer></script>
    </head>

<?php

session_start();

include('conn.php');

$user = $_SESSION["User"];
$user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
$result_user = mysqli_query($con,$user_query);
$user_rowData = mysqli_fetch_assoc($result_user);
$user = $user_rowData["name"];
$position = $user_rowData["position"];

//echo $position;

if(isset($_SESSION['User']))
{

  //course Dropdown
  if($position == "Faculty"){
    //course Dropdown
    $select_name_Query = "SELECT `coursetitle` FROM `courses` WHERE `created` = '$user'";
    $select_name_Result = mysqli_query($con, $select_name_Query);
  }else{
    $select_name_Query = "SELECT `coursetitle` FROM `courses`";
    $select_name_Result = mysqli_query($con, $select_name_Query);
  }
  /*$user = $_SESSION["User"];
  $user_query = "SELECT `name` FROM `login` WHERE `email` = '$user' ";
  $result_user = mysqli_query($con,$user_query);
  $user_rowData = mysqli_fetch_assoc($result_user);
  $user = $user_rowData["name"];*/


  if(isset($_POST['submit']))
  {
    $name = $_POST['undercourse'];
    $maxsize = 5242880;    
    $file_name = array_filter($_FILES['file']['name']);
    $target_dir = "uploaded_videos/";

    $title = array_filter($_POST['title']);



    for($i=0; $i<4; $i++){
      $target_file = $target_dir . $_FILES["file"]["name"][$i];

      $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

      //$extensions_arr = array("mp4","avi","3gp","mov","mpeg");

      if(move_uploaded_file($_FILES['file']['tmp_name'][$i],$target_file)){

          $insert_video_Query = "INSERT INTO `course_video` (`CourseName`,`title`,`video`,`user`) VALUES ('$name','$title[$i]','$file_name[$i]','$user')";
          $insert_Video = mysqli_query($con, $insert_video_Query);


        if($insert_Video)
        {
          if(mysqli_affected_rows($con) > 0)
          {
              //echo 'Data Inserted';
              echo '
                <script type="text/javascript">
  
                  $(document).ready(function(){
  
                    swal({
                      title: "Added!",
                      text: "You add new course succesfully",
                      icon: "success",
                      showConfirmButton: false,
                      timer: 2000
                    })
                  });
  
                </script>
              ';
          }else{
            echo 'Data Not Inserted';
          }
        }
      }
    }
  }

}
else{
    header("location:login.php");
}



?>

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
              </ul>>
            </div>
        </div>
       
        <div class="sidebar">
            <ul>
            <?php if ($position == "Admin") { ?>
              <li><a href="adminhome.php">
                <span class="icon"><i class="fas fa-home"></i></span>
                <span class="title">Dashboard</span></a></li>

              <li><a href="addcourse.php">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="title">Add Course</span>
                </a></li>

               <li><a href="uploadvideo.php" class="active">
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

               <li><a href="addblog.php" >
                <span class="icon"><i class="fas fa-blog"></i></span>
                <span class="title">Blog</span>
                </a></li>

               <li><a href="show_query.php">
                <span class="icon"><i class="fas fa-question"></i></span>
                <span class="title">Query</span>
                </a></li>

            <?php }else{ ?>

               <li><a href="faculty_side.php" >
                  <span class="icon"><i class="fas fa-plus"></i></span>
                  <span class="title">Add Course</span>
                  </a></li>

               <li><a href="uploadvideo.php" class="active">
                  <span class="icon"><i class="fas fa-upload"></i></span>
                  <span class="title">Upload Video</span>
                  </a></li>

               <li><a href="uploadnotes.php" target="_blank">
                <span class="icon"><i class="fas fa-sticky-note"></i></span>
                <span class="title">Upload Notes</span>
                </a></li>

               <li><a href="created_course.php">
                  <span class="icon"><i class="fas fa-calendar-plus"></i></span>
                  <span class="title">Created Course</span>
                  </a></li>

               <li><a href="addblog.php" >
                  <span class="icon"><i class="fas fa-blog"></i></span>
                  <span class="title">Blog</span>
                  </a></li>
            <?php } ?>
          </ul>
        </div>

        <section class="header">
          <h2>Upload Video</h2>
        </section>

        <section class="content">

          <form action="#" class="form" method="post" enctype="multipart/form-data">
            <h1 class="text-center">Upload Video</h1>
            <!-- Progress bar -->
            <div class="progressbar">
              <div class="progress" id="progress"></div>
              
              <div
                class="progress-step progress-step-active"
                data-title="Select"></div>
              <div class="progress-step" data-title="Video"></div>
      
            </div>
      
            <!-- Steps -->
            <div class="form-step form-step-active">
              <div class="input-group">
                <label for="title">Course Name</label>
                <select name="undercourse" id="field">
                  <?php while($row1 = mysqli_fetch_array($select_name_Result)):;?>
                  <option><?php echo $row1[0];?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <!--<div class="input-group">
                <label for="shortdesc">Number of videos</label>
                <input type="number" name="num" id="shortdesc" />
              </div>-->
              
              <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto" name="next">Next</a>
              </div>
            </div>
            <div class="form-step">
              <div class="input-group">
                <label for="Learn1">Module</label>
                <input type="text" name="title[]" id="Learn1" placeholder="Enter Module Name" />
                <input type="file" name="file[]" multiple>
              </div>
              <div class="input-group">
                <label for="Learn2">Module</label>
                <input type="Learn2" name="title[]" id="Learn2"  placeholder="Enter Module Name"/>
                <input type="file" name="file[]" multiple>
              </div>
              <div class="input-group">
                <label for="Learn3">Module</label>
                <input type="text" name="title[]" id="Learn3"  placeholder="Enter Module Name" />
                <input type="file" name="file[]" multiple>
              </div>
              <div class="input-group">
                <label for="Learn4">Module</label>
                <input type="text" name="title[]" id="Learn4"  placeholder="Enter Module Name" />
                <input type="file" name="file[]" multiple>
              </div>
              <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <!--<a href="#" class="btn btn-next">Next</a>-->
                <input type="submit" value="Upload" name="submit" class="btn" />
              </div>
            </div>
          </form>
        </section>

        <section class="credit">
          <div>
            <i class="far fa-copyright"></i> 2022-23 All Rights Reserved! | Powered by <b>Thynk Infinity</b>
          </div>
        
        </section>

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
    </div>

    <script>


      

      //Navigation Slider js
      $(document).ready(function(){
        $(".hamburger").click(function(){
          $(".wrapper").toggleClass("collapse");
        });
      });
    </script>
    <script src="AdminScript.js" defer></script>
  </body>
</html>