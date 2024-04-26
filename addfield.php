<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Add Field</title>
   
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/addfield.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- Navigation Slider -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

</head>

<?php

session_start();

@include 'conn.php';

if(isset($_SESSION['User']))
{

if(isset($_POST['add_field'])){

   $field_name = $_POST['field_name'];
   $field_desc = $_POST['field_desc'];
   $field_img = $_FILES['field_img']['name'];
   $field_img_tmp_name = $_FILES['field_img']['tmp_name'];
   $field_img_folder = 'uploaded_img/'.$field_img;
   $field_visible = $_POST['field_visible'];

   if(empty($field_name) || empty($field_desc) || empty($field_img)){
      $message[] = 'please fill out all';
   }else{
      $insert = "INSERT INTO `tabunderfield`(`name`, `description` , `image`, `visible`) VALUES('$field_name', '$field_desc', '$field_img', '$field_visible')";
      $upload = mysqli_query($con,$insert);
      if($upload){
         move_uploaded_file($field_img_tmp_name, $field_img_folder);
         $message[] = 'Added Successfully';
      }else{
         $message[] = 'Could not add';
      }
   }

};

if(isset($_GET['delete'])){
   $id = $_GET['delete'];
   mysqli_query($con, "DELETE FROM tabunderfield WHERE id = $id");
   header('location:addfield.php');
};


if(isset($message)){
    foreach($message as $message){
       echo '<span class="message">'.$message.'</span>';
    }
 }

}else{
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
              <li><a href="adminhome.php">
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

               <li><a href="addfield.php" class="active">
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

        <div class="box-container">

   <div class="admin-product-form-container">

      <form action="<?php $_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
         <h3>add a new Field</h3>
         <input type="text" placeholder="Enter Name" name="field_name" class="box">
         <input type="text" placeholder="Enter Description " name="field_desc" class="box">
         <input type="file" accept="image/png, image/jpeg, image/jpg" name="field_img" class="box">
         <select name="field_visible" class="box">
            <option value="#">Visible</option>
            <option value="1">True</option>
            <option value="0">False</option>
         </select>
         <input type="submit" class="btn add" name="add_field" value="Add Field">
      </form>

   </div>

   <?php

   $select = mysqli_query($con, "SELECT * FROM tabunderfield");
   
   ?>
   <div class="product-display">
      <table class="product-display-table">
         <thead>
         <tr>
            <th>Image</th>
            <th>Name</th>
            <th>Description</th>
            <th>Action</th>
         </tr>
         </thead>
         <?php while($row = mysqli_fetch_assoc($select)){ ?>
         <tr>
            <td><img src="uploaded_img/<?php echo $row['image']; ?>" height="100" alt=""></td>
            <td><?php echo $row['name']; ?></td>
            <td><?php echo $row['description']; ?></td>
            <td>
               <a href="fieldupdate.php?edit=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-edit"></i> edit </a>
               <a href="addfield.php?delete=<?php echo $row['id']; ?>" class="btn"> <i class="fas fa-trash"></i> delete </a>
            </td>
         </tr>
      <?php } ?>
      </table>
   </div>

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
    
    <script src="AdminScript.js"></script>
</body>
</html>