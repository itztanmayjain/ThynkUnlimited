<?php

@include 'conn.php';

$id = $_GET['edit'];

if(isset($_POST['update_field'])){

   $field_name = $_POST['field_name'];
   $field_desc = $_POST['field_desc'];
   $field_img = $_FILES['field_img']['name'];
   $field_img_tmp_name = $_FILES['field_img']['tmp_name'];
   $field_img_folder = 'uploaded_img/'.$field_img;
   $field_visible = $_POST['field_visible'];

   if(empty($field_name) || empty($field_desc) || empty($field_img)){
      $message[] = 'please fill out all!';    
   }else{

      $update_field = "UPDATE tabunderfield SET name='$field_name', description='$field_desc', image='$field_img', visible='$field_visible'  WHERE id = '$id'";
      $upload = mysqli_query($con, $update_field);

      if($upload){
         move_uploaded_file($field_img_tmp_name, $field_img_folder);
         header('location:addfield.php');
      }else{
         $$message[] = 'please fill out all!'; 
      }

   }
};

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Admin Panel</title>
   
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/addfield.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- Navigation Slider -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body>

<?php
   if(isset($message)){
      foreach($message as $message){
         echo '<span class="message">'.$message.'</span>';
      }
   }
?>

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
              <li><a href="adminhome.php">
                <span class="icon"><i class="fas fa-home"></i></span>
                <span class="title">Dashboard</span></a></li>

              <li><a href="addcourse.php">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="title">Add Course</span>
                </a></li>

               <li><a href="addfield.php" class="active">
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="title">Add Field</span>
                </a></li>

               <li><a href="certcourse.php">
                <span class="icon"><i class="fas fa-certificate"></i></span>
                <span class="title">Certificate Course</span>
                </a></li>

                <li><a href="uploadnotes.php" target="_blank">
                <span class="icon"><i class="fas fa-sticky-note"></i></span>
                <span class="title">Upload Notes</span>
                </a></li>

               <li><a href="created_course.php">
                  <span class="icon"><i class="fas fa-calendar-plus"></i></span>
                  <span class="title">Created Course</span>
                  </a></li>
              
               <li><a href="#">
                <span class="icon"><i class="fas fa-envelope-open-text"></i></span>
                <span class="title">Tests</span>
                </a></li>

               <li><a href="addblog.php">
                <span class="icon"><i class="fas fa-blog"></i></span>
                <span class="title">Blog</span>
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

        <div class="box-container">

         <div class="admin-product-form-container centered">

            <?php
      
               $select = mysqli_query($con, "SELECT * FROM tabunderfield WHERE id = '$id'");
               while($row = mysqli_fetch_assoc($select)){

            ?>
   
            <form action="" method="post" enctype="multipart/form-data">
               <h3 class="title">update the Field</h3>
               <input type="text" class="box" name="field_name" value="<?php echo $row['name']; ?>" placeholder="enter the Field name">
               <input type="text"  class="box" name="field_desc" value="<?php echo $row['description']; ?>" placeholder="enter the Field price">
               
               <input type="file" class="box" name="field_img"  accept="image/png, image/jpeg, image/jpg">
               <select name="field_visible" class="box" value="<?php echo $row['visible']; ?>">
                  <option value="#">Visible</option>
                  <option value="1">True</option>
                  <option value="0">False</option>
               </select>

               <input type="submit" value="update Field" name="update_field" class="btn add">
               <a href="addfield.php" class="btn">go back!</a>
            </form>
   


            <?php }; ?>

   

         </div>

      </div>
   </div>

</body>
</html>