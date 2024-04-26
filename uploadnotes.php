<?php 

session_start();

include 'database/config.php';

$user = $_SESSION["User"];
$user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
$result_user = mysqli_query($conn,$user_query);
$user_rowData = mysqli_fetch_assoc($result_user);
$user = $user_rowData["name"];
$position = $user_rowData["position"];

//echo $position;

if(isset($_SESSION['User'])){

	if($position == "Faculty"){
		//course Dropdown
		$select_name_Query = "SELECT `coursetitle` FROM `courses` WHERE `created` = '$user'";
		$select_name_Result = mysqli_query($conn, $select_name_Query);
	  }else{
		$select_name_Query = "SELECT `coursetitle` FROM `courses`";
		$select_name_Result = mysqli_query($conn, $select_name_Query);
	  }

	if (isset($_POST['upload'])) { // If isset upload button or not
		// Declaring Variables
		$course_name = $_POST['undercourse'];
		$title = $_POST['title'];
		$location = "uploads/";
		$file_name = $_FILES["file"]["name"]; // Get uploaded file name
		$file_temp = $_FILES["file"]["tmp_name"]; // Get uploaded file temp
		$file_size = $_FILES["file"]["size"]; // Get uploaded file size

		$select_course_name = "SELECT * FROM `courses` WHERE `coursetitle` = '$course_name'";
		$select_course_Result = mysqli_query($conn, $select_course_name);
		$row_cid = mysqli_fetch_assoc($select_course_Result);
		$course_id = $row_cid["cid"];

		/*
		How we can get mb from bytes
		(mb*1024)*1024

		In my case i'm 10 mb limit
		(10*1024)*1024
		*/

		if ($file_size > 10485760) { // Check file size 10mb or not
			echo "<script>alert('Woops! File is too big. Maximum file size allowed for upload 10 MB.')</script>";
		} else {
			$sql = "INSERT INTO `uploaded_files` (`cid`, `title`, `name`)
					VALUES ('$course_id', '$title', '$file_name')";
			$result = mysqli_query($conn, $sql);
			if ($result) {
				move_uploaded_file($file_temp, $location . $file_name);
				echo "<script>alert('Wow! File uploaded successfully.')</script>";
				
			} else {
				echo "<script>alert('Woops! Something wong went.')</script>";
			}
		}
	}
}else{
	header("location:login.php");
}



?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">

	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

	<link rel="stylesheet" type="text/css" href="css/notes.css">

</head>
<body>
	<div class="file__upload">
		<div class="header">
			<p><i class="fa fa-cloud-upload fa-2x"></i><span><span>up</span>load</span></p>			
		</div>
		<form action="" method="POST" enctype="multipart/form-data" class="body">

			<select name="undercourse" id="field">
                <?php while($row1 = mysqli_fetch_array($select_name_Result)):;?>
                <option><?php echo $row1[0];?></option>
                <?php endwhile; ?>
            </select>
			<input type = "text" name = "title" placeholder = "Enter file title">
			<input type="file" name="file" id="upload" required>
			<label for="upload">
				<i class="fa fa-file-text-o fa-3x"></i>
				<p>
					<strong>Drag and drop</strong> files here<br>
					or <span >Browse</span> to begin the upload
				</p>
			</label>
			<button name="upload" class="btn">Upload</button>
		</form>
	</div>
</body>
</html>