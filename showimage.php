<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
   <title>Videos</title>
  

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/listcoursevideo.css">

</head>

<?php

session_start();

include('conn.php');

if(isset($_SESSION['User']))
{
  $id = $_GET['cid'];
  //echo "id is".$id;
  $select_query = "SELECT * from `courses` where `cid` = '$id'";
  $select_result = mysqli_query($con, $select_query) or die ( mysqli_error());
  $row = mysqli_fetch_assoc($select_result);
  $coursename = $row["coursetitle"];
  //echo $row["CourseName"];

}else{
  header("location:login.php");
}
?>
<body>
    <div class="img-container">
        <img src="uploaded_img/<?php echo $row['image']; ?>" alt=""></td>
    </div>
</body>
</html>