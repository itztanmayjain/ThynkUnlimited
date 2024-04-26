<?php
session_start();
include('conn.php');



if(isset($_POST['amt']) && isset($_POST['name'])){
    $amt=$_POST['amt'];
    $name=$_POST['name'];
    $cid=$_POST['id'];
    $payment_status="pending";

    $sql = "SELECT * FROM `courses` WHERE price=$amt;";
$result1 = mysqli_query($con, $sql);
$row = mysqli_fetch_assoc($result1);
$courseid = $row["cid"];
$coursename = $row["coursetitle"];

$user = $_SESSION["User"];
$user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
$result_user = mysqli_query($con,$user_query);
$user_rowData = mysqli_fetch_assoc($result_user);
$userid = $user_rowData["id"];

    $sql = " INSERT INTO `payment` (`course_id`, `user_id`, `name`, `amount`, `status`,`field`, `date`) VALUES ('$courseid', '$userid', '$name', '$amt', '$payment_status', '$coursename', current_timestamp());";

    
    $result= mysqli_query($con,$sql);
    
    $_SESSION['OID']=mysqli_insert_id($con);
}


if(isset($_POST['payment_id']) && isset($_SESSION['OID'])){
    $payment_id=$_POST['payment_id'];
    mysqli_query($con,"update payment set status='complete',payment_id='$payment_id' where id='".$_SESSION['OID']."'");
}
?>