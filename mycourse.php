<?php
session_start();
@include 'database/config.php';

if(isset($_SESSION['User']))
{
   //echo $_SESSION['User'];
   $user = $_SESSION["User"];
  $user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
  $result_user = mysqli_query($conn,$user_query);
  $user_rowData = mysqli_fetch_assoc($result_user);
  $user_id = $user_rowData["id"];

  $user_query2 = "SELECT * FROM `payment` WHERE `user_id` = '$user_id' AND `status`='complete' ";
  $result_user2 = mysqli_query($conn,$user_query2);
 // $user_rowData2 = mysqli_fetch_assoc($result_user2);
  //$course_id = $user_rowData2["course_id"];


  //$user_query3 = "SELECT * FROM `courses` WHERE `cid` = '$course_id' ";
  //$result_user3 = mysqli_query($conn,$user_query3);
 // $user_rowData3 = mysqli_fetch_assoc($result_user3);
  //$course_title = $user_rowData3["coursetitle"];
 // $course_field = $user_rowData3["field"];
 // $course_detail = $user_rowData3["shortdesc"];
 // $course_img = $user_rowData3["image"];

?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<!-- Boxicons -->
	<link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
	<!-- My CSS -->
	<link rel="stylesheet" href="css/mycourse1.css">
	<link rel="stylesheet" href="css/mycourse2.css">

	<title>Dashboard</title>
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="afterlogin.php" class="brand">
			<i class='bx bxl-jsfiddle'></i>
			<span class="text">Thynk Unlimited</span>
		</a>
		<ul class="side-menu top">
			<li>
				<a href="profile.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="changepass.php">
					<i class='bx bxs-check-shield'></i>
					<span class="text">Change Password</span>
				</a>
			</li>
			<li  class="active" >
				<a href="mycourse.php">
					<i class='bx bxs-doughnut-chart' ></i>
					<span class="text">My Courses</span>
				</a>
			</li>
			
		</ul>
		<ul class="side-menu">

			<li>
				<a href="userlogout.php" class="logout">
					<i class='bx bxs-log-out-circle' ></i>
					<span class="text">Logout</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- SIDEBAR -->



	<!-- CONTENT -->
	<section id="content">
		<!-- NAVBAR -->
		<nav>
			<i class='bx bx-menu' ></i>
			
			<a href="afterlogin.php" class="profile">
				<i class='bx bxs-home'></i>
			</a>
		</nav>
		<!-- NAVBAR -->

		

		<section class="course_detail" style="padding:3rem 9%;" >

			<h1 class="highlight">Enrolled Courses  </h1>
		
			<!-- While --> <?php 
			while( $user_rowData2 = mysqli_fetch_assoc($result_user2)){
				$course_id = $user_rowData2["course_id"];
				$user_query3 = "SELECT * FROM `courses` WHERE `cid` = '$course_id' ";
				$result_user3 = mysqli_query($conn,$user_query3);
				$user_rowData3 = mysqli_fetch_assoc($result_user3);
				$course_title = $user_rowData3["coursetitle"];
				$course_field = $user_rowData3["field"];
				$course_detail = $user_rowData3["shortdesc"];
				$course_img = $user_rowData3["image"];
   
?>
		
			<div class="course_container" >
		
				<div class="course_image"> <img src="uploaded_img/<?php echo $course_img ?>" alt=""> <!--Course img--> </div>
		
				<div class="main_coursedetail">
					<p>Course | <?php echo  $course_field ?> <!--Field Name--> </p>
					<p class="course_name"> <?php echo $course_title ?><!--Couse Name--> </p>
					<p><?php echo  $course_detail ?></p>
		
				</div>
		
				<div class = "course_nav">

				<p class="course_heading"> Next Up </p>
		
						<a href="listvideo.php?cid=<?php echo $course_id ?>" class="course_chapter">
							<i class="fas fa-play-circle"></i> &nbsp; &nbsp;Video
						</a><br><br>
						<a href="notes.php?cid=<?php echo $course_id ?>" class="course_chapter">
						<i class="fas fa-book-reader"></i> &nbsp; &nbsp; Notes
						</a>

						
				</div>  
			</div>
		
			<!-- End -->  <?php } ?>
		
		</section>
	
	</section>
	<!-- CONTENT -->
	

	<script src="js/dash.js"></script>
</body>
</html>

<?php }else{
  header("location:login.php");
}
?>