<?php
session_start();
include('conn.php');

if(isset($_SESSION['User']))
{
    $select_table_Query = "SELECT * FROM `courses`";
    $result = mysqli_query($con, $select_table_Query);

    if(isset($_GET['delete'])){
      $id = $_GET['delete'];
      mysqli_query($con, "DELETE FROM courses WHERE cid = $id");
      header('location:admin_show_course.php');
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
   
    <title>Created Course</title>
   
    <link rel="stylesheet" href="css/certcourse.css">


    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>

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

              <li><a href="admin_show_course.php" class="active">
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

        <section class="header">
            <h2>Created Course</h2>
        </section>

        <section class="table">
            <table id="example" class="ui celled table" style="width:100%">
              <thead>
                <tr>
                    <th>Course No.</th>
                    <th>Created Date</th>
                    <th>Field</th>
                    <th>Course Name</th>
                    <th>Description</th>
                    <th>Price</th>
                    <th>Image</th>
                    <th>Video</th>
                    <th>Created By</th>
                    <th>Edit</th>
                    <th>Delete</th> 
                </tr>
              </thead>

                <?php while($row = mysqli_fetch_assoc($result)){ ?>

                                <tr>  
                                    <td><?php echo $row["cid"]; ?></td>
                                    <td><?php echo $row["date"]; ?></td> 
                                    <td><?php echo $row["field"]; ?></td> 
                                    <td><?php echo $row["coursetitle"]; ?></td> 
                                    <td><?php echo $row["shortdesc"]; ?></td> 
                                    <td><?php echo $row["price"]; ?></td> 

                                    <td style="text-align:center;">
                                    <a href="showimage.php?cid=<?php echo $row['cid']; ?>" target="_blank"> <i class="fas fa-camera"></i> </a>
                                    </td>

                                    <td style="text-align:center;">
                                    <a href="listvideo.php?cid=<?php echo $row['cid']; ?>" target="_blank"> <i class="fas fa-video"></i> </a>
                                    </td>

                                    <td><?php echo $row["created"]; ?></td>

                                    <td style="text-align:center;">
                                    <a href="updatecourse.php?id=<?php echo $row['cid']; ?>"> <i class="fas fa-edit"></i> </a>
                                    </td>

                                    <td style="text-align:center;">
                                    <a href="admin_show_course.php?delete=<?php echo $row['cid']; ?>"> <i class="fas fa-trash-alt"></i>
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