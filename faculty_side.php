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

if(isset($_SESSION['User']))
{
  //UnderGroup Dropdown
  $select_UG_Query = "SELECT `name` FROM `tabundergroup` WHERE `visible` = 1";
  $select_UG_Result = mysqli_query($con, $select_UG_Query);

  //UnderField Dropdown
  $select_UF_Query = "SELECT `name` FROM `tabunderfield` WHERE `visible` = 1";
  $select_UF_Result = mysqli_query($con, $select_UF_Query);

  $user = $_SESSION["User"];
  $user_query = "SELECT `name` FROM `login` WHERE `email` = '$user' ";
  $result_user = mysqli_query($con,$user_query);
  $user_rowData = mysqli_fetch_assoc($result_user);
  $user = $user_rowData["name"];

  
  if(isset($_POST['upload']))
  {
      $title = $_POST['title'];
      $short_desc = $_POST['shortdesc'];
      $learn1 = $_POST['Learn1'];
      $learn2 = $_POST['Learn2'];
      $learn3 = $_POST['Learn3'];
      $learn4 = $_POST['Learn4'];

      $overview = $_POST['blogtext'];
      $price = $_POST['price'];

      $field = $_POST['underfield'];
     
      $field_img = $_FILES['field_img']['name'];
      $field_img_tmp_name = $_FILES['field_img']['tmp_name'];
      $field_img_folder = 'uploaded_img/'.$field_img;

      $select_field_Query = "SELECT `id` FROM `tabunderfield` WHERE `name` = '$field'";
      $select_field_Result = mysqli_query($con, $select_field_Query);
      $row_field = mysqli_fetch_assoc($select_field_Result);
      $field_id = $row_field["id"];
  
      $insert_Query = "INSERT INTO `courses`(`fieldid`,`coursetitle`, `shortdesc`, `learn1`, `learn2`, `learn3`, `learn4`, `overview`, `price` ,`field`, `image` ,`created`) VALUES ('$field_id','$title','$short_desc', '$learn1','$learn2','$learn3','$learn4','$overview','$price','$field','$field_img','$user')";
      

      try{
        $insert_Result = mysqli_query($con, $insert_Query);
       
          
          if($insert_Result)
          {
            if(mysqli_affected_rows($con) > 0)
            {
              move_uploaded_file($field_img_tmp_name, $field_img_folder);
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

      } catch (Exception $ex) {
        echo 'Error Insert'.$ex->getMessage();
      }
  }

  if(isset($_POST['f2upload']))
  {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $maxsize = 5242880;
    $file_name = $_FILES['file']['name'];
    $target_dir = "uploaded_videos/";
    $target_file = $target_dir . $_FILES["file"]["name"];

    $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    $extensions_arr = array("mp4","avi","3gp","mov","mpeg");

    if( in_array($extension,$extensions_arr) ){

      if(move_uploaded_file($_FILES['file']['tmp_name'],$target_file)){

        $insert_video_Query = "INSERT INTO `course_video` (`title`, `description`,`video`) VALUES ('$title','$description','$file_name')";
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
    }else{
      echo '
      <script type="text/javascript">

        $(document).ready(function(){

          swal({
            title: "Invalid file extension!",
            text: "Only mp4,avi,3gp,mov,mpeg, are support ",
            icon: "error",
            showConfirmButton: false,
            timer: 2000
          })
        });

      </script>
    ';
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
              </ul>
            </div>
        </div>
       
        <div class="sidebar">
            <ul>
              <!--<li><a href=" home.php">
                <span class="icon"><i class="fas fa-home"></i></span>
                <span class="title">Dashboard</span></a></li>-->

              <li><a href="faculty_side.php" class="active">
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

              <!--<li><a href="addfield.php">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="title">Add Field</span>
                </a></li>-->

              <li><a href="created_course.php">
                <span class="icon"><i class="fas fa-calendar-plus"></i></span>
                <span class="title">Created Course</span>
                </a></li>
                
              <li><a href="addblog.php">
                <span class="icon"><i class="fas fa-blog"></i></span>
                <span class="title">Blog</span>
                </a></li>
          </ul>
        </div>

        <section class="header">
          <h2>Add New Course</h2>
        </section>

        <section class="content">

          <form action="#" class="form" method="post" enctype="multipart/form-data">
            <h1 class="text-center">Add Course</h1>
            <!-- Progress bar -->
            <div class="progressbar">
              <div class="progress" id="progress"></div>
              
              <div
                class="progress-step progress-step-active"
                data-title="Intro"
              ></div>
              <div class="progress-step" data-title="Learn"></div>
              <div class="progress-step" data-title="Overview"></div>
              <div class="progress-step" data-title="Image"></div>
            </div>
      
            <!-- Steps -->
            <div class="form-step form-step-active">
              <div class="input-group">
                <label for="title">Course Title</label>
                <input type="text" name="title" id="title" />
              </div>
              <div class="input-group">
                <label for="shortdesc">Short Description</label>
                <input type="text" name="shortdesc" id="shortdesc" />
              </div>
              
              <div class="">
                <a href="#" class="btn btn-next width-50 ml-auto">Next</a>
              </div>
            </div>
            <div class="form-step">
              <div class="input-group">
                <label for="Learn1">Learn1</label>
                <input type="text" name="Learn1" id="Learn1" placeholder="What you'll Learn" />
              </div>
              <div class="input-group">
                <label for="Learn2">Learn2</label>
                <input type="Learn2" name="Learn2" id="Learn2"  placeholder="What you'll Learn"/>
              </div>
              <div class="input-group">
                <label for="Learn3">Learn3</label>
                <input type="text" name="Learn3" id="Learn3"  placeholder="What you'll Learn" />
              </div>
              <div class="input-group">
                <label for="Learn4">Learn4</label>
                <input type="text" name="Learn4" id="Learn4"  placeholder="What you'll Learn" />
              </div>
              <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
              </div>
            </div>
            <div class="form-step">
              <div class="input-group">
                <label for="overview">Course Overview</label>
                <textarea name="blogtext">  </textarea>
              </div>
              <div class="input-group">
                <label for="price">Price</label>
                <input type="number" name="price" id="price" />
              </div>
              <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <a href="#" class="btn btn-next">Next</a>
              </div>
            </div>
            <div class="form-step">
              <div class="input-group">
                <label for="password">Field</label>
                <!--<input type="" name="field" id="field" />-->
                <select name="underfield" id="field">
                  <?php while($row1 = mysqli_fetch_array($select_UF_Result)):;?>
                  <option><?php echo $row1[0];?></option>
                  <?php endwhile; ?>
                </select>
              </div>
              <div class="input-group">
                <label for="image">Preview Image</label>
                <input type="file" accept="image/png, image/jpeg, image/jpg" name="field_img">
              </div>
              <div class="btns-group">
                <a href="#" class="btn btn-prev">Previous</a>
                <input type="submit" value="Upload" name="upload" class="btn" />
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