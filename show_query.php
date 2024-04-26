<?php
session_start();
include('conn.php');

$user = $_SESSION["User"];
$user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
$result_user = mysqli_query($con,$user_query);
$user_rowData = mysqli_fetch_assoc($result_user);
$position = $user_rowData["position"];

if(isset($_SESSION['User']))
{
    $select_table_Query = "SELECT * FROM `contact` WHERE `status` = ''";
    $result = mysqli_query($con, $select_table_Query);

    if(isset($_GET['update'])){
      $id = $_GET['update'];
      mysqli_query($con, "UPDATE `contact` set `status` = 'Complete' WHERE id = $id");
      header('location:show_query.php');
   };
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
   
    <title>Query</title>
   
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <link rel="stylesheet" href="css/certcourse.css">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script> <!-- Navigation Slider -->

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <!-- Data Tables -->

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.css">
	  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.semanticui.min.css">

    <!-- End data Tables link -->
    

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
                <a href="adminhome.php" class="logo"> THYNK <i class="fas fa-infinity fa-lg"></i> </a>
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
              <?php if ($position == "Admin") { ?>
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

              <li><a href="show_query.php" class="active">
                <span class="icon"><i class="fas fa-question"></i></span>
                <span class="title">Query</span>
                </a></li>

              <?php }else{ ?>

                <li><a href="faculty_side.php" >
                <span class="icon"><i class="fas fa-plus"></i></span>
                <span class="title">Add Course</span>
                </a></li>

              <li><a href="uploadvideo.php"  class="active">
                <span class="icon"><i class="fas fa-upload"></i></span>
                <span class="title">Upload Video</span>
                </a></li>

              <li><a href="created_course.php">
                <span class="icon"><i class="fas fa-calendar-plus"></i></span>
                <span class="title">Created Course</span>
                </a></li>
                
              <li><a href="addblog.php">
                <span class="icon"><i class="fas fa-blog"></i></span>
                <span class="title">Blog</span>
                </a></li>
              <?php } ?>
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

        <section class="header">
            <h2>Created Course</h2>
        </section>

        <section class="table">
            <table id="example" class="ui celled table" style="width:100%">
            <thead>
                <tr>
                    <th>Query No.</th>
                    <th>Contact Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Subject</th>
                    <th>Message</th>
                    <th>Date</th>
                </tr>
              </thead>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                                <tr>  
                                    <td><?php echo $row["id"]; ?></td>
                                    <td><?php echo $row["Name"]; ?></td> 
                                    <td><?php echo $row["Email"]; ?></td> 
                                    <td><?php echo $row["Phone"]; ?></td> 
                                    <td><?php echo $row["Subject"]; ?></td> 
                                    <td><?php echo $row["Message"]; ?></td> 
                                    <td><?php echo $row["Time"]; ?></td>

                                    <td style="text-align:center;">
                                    <a href="show_query.php?update=<?php echo $row['id']; ?>"> <i class="fas fa-calendar-check"></i> </a>
                                    </td>
                                </tr>
                  <?php } ?>  
            </table>

    </div>
   <!-- CDN jQuery Datatable -->
   <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.11.5/js/dataTables.semanticui.min.js"></script>
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/fomantic-ui/2.8.8/semantic.min.js"></script>


    <script>
    //Data Table
    $(document).ready(function() {
      $('#example').DataTable( {
      } );
    } );

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