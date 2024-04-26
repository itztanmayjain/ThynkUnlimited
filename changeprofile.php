<?php
session_start();

include('conn.php');
if(isset($_SESSION['User'])){

  $user = $_SESSION["User"];
  $user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
  $result_user = mysqli_query($con,$user_query);
  $user_rowData = mysqli_fetch_assoc($result_user);
  $user_id = $user_rowData["id"];
  $user_name = $user_rowData["name"];
  $user_email = $user_rowData["email"];
  $user_phone = $user_rowData["phoneNo"];
  $user_position = $user_rowData["position"];

  if(isset($_POST['upload'])){

    $name = $_POST['name'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];

    if($name == "" && $email == "" && $phone == ""){
      $message[] = 'Fill all Details.';
    }else{
      $update_Query = "UPDATE `login` SET `name`='" . $name . "', `email`='" . $email . "', `phoneNo`='" . $phone . "' WHERE `id`='".$user_id."'";
            mysqli_query($con,$update_Query);
            $message[] = 'Your Details save successfully.';
            header("location:profile.php");
            
       
    }
  }
}else{
    header("location:login.php");
}
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
	<link rel="stylesheet" href="css/dashboard.css">

	<title>Change Details</title>
   
</head>
<body>


	<!-- SIDEBAR -->
	<section id="sidebar">
		<a href="afterlogin.php" class="brand">
            <i class='bx bxl-jsfiddle'></i>
			<span class="text">Thynk Unlimited</span>
		</a>
		<ul class="side-menu top">
			<li class="active">
				<a href="profile.php">
					<i class='bx bxs-dashboard' ></i>
					<span class="text">Profile</span>
				</a>
			</li>
			<li>
				<a href="changepass.php">
					<i class='bx bxs-check-shield'></i>
					<span class="text">Change Password</span>
				</a>
			</li>
			<li>
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
			<?php if($user_position == "Faculty"){ ?>
			<a href="faculty_side.php" class="profile">
				<i class='bx bxs-home'></i>
			</a>
			<?php } 
			else if($user_position == "Admin" ) { ?>
			<a href="adminhome.php" class="profile">
				<i class='bx bxs-home'></i>
			</a>
			<?php }
			else {?>
			<a href="afterlogin.php" class="profile">
				<i class='bx bxs-home'></i>
			</a>
			<?php }?>
		</nav>
		<!-- NAVBAR -->
        <?php
        if(isset($message)){
            foreach($message as $message){
               echo '<span class="message">'.$message.'</span>';
            }
         }
        ?>

        <div>
        <center> <div class="container">
           <div class="title">Change Profile</div>
           <div class="content">
             <form action="" method="post" name="update">
             <input type="hidden" name="action" value="update" />
               <div class="user-details">
    
                 <div class="input-box">
                   <span class="details">Name</span>
                   <input type="text"  name="name" value=" <?php echo $user_name; ?> " required>
                 </div>

                 <div class="input-box">
                   <span class="details">Email</span>
                   <input type="email"  name="email" value=" <?php echo $user_email; ?> " required>
                 </div>

                 <div class="input-box">
                   <span class="details">Phone No.</span>
                   <input type="text"  name="phone" value=" <?php echo $user_phone; ?> " required>
                 </div>
               <div class="button">
                 <input type="submit" name="upload" value="Save">
               </div>
             </form>
           </div>
         </div></center>
        </div>

	
	</section>
	<!-- CONTENT -->
	

	<script src="dash.js"></script>
</body>
</html>