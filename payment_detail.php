<?php
session_start();
include('conn.php');


$payid = $_GET['payid'];

$user = $_SESSION["User"];
$user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
$result_user = mysqli_query($con,$user_query);
$user_rowData = mysqli_fetch_assoc($result_user);
$userid = $user_rowData["id"];
$username = $user_rowData["name"];

$sql1 = "SELECT * FROM `courses` WHERE cid=$payid";
$result1 = mysqli_query($con, $sql1);
$rowdata = mysqli_fetch_assoc($result1);
$course_price=$rowdata['price'];

$sql = "SELECT * FROM `payment` WHERE user_id='$userid' AND course_id='$payid'; ";
$result= mysqli_query($con,$sql);
$row = mysqli_fetch_assoc($result);


if(isset($_SESSION['User']))
{
  if($row>0)
  {
    header("location:mycourse.php");
  } 
else{

?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <link rel="icon" href="favicon.ico" type="image/icon" sizes="16x16">
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<meta name="viewport" content="width=device-width, initial-scale=1">
   
    <link rel="stylesheet" href="css/payment.css" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://checkout.razorpay.com/v1/checkout.js"></script>
    
    <title>Confirmation</title>
  </head>
  <body>
    <form class="form">
      <h1 class="text-center">Confirm Detail</h1>
     
      <div class="form-step form-step-active">
        <div class="input-group">
          
          <input type="hidden" name="id" id="id" value="<?php echo $payid ?>" required />
        </div>

        <div class="input-group">
          <label for="name">Name</label>
          <input type="text" name="name" id="name"  value="<?php echo $username ?>" required />
        </div>

        <div class="input-group">
          <label for="amt">Amount</label>
          <input type="text" name="amt" id="amt" value="<?php echo $course_price ?>" required />
        </div>
          <input type="button" name="btn" id="btn" value="Pay Now" onclick="pay_now()"/>
        </div>
      </div>
    </form>
  </body>
</html>

<script>
    function pay_now(){
        var name=jQuery('#name').val();
        var amt=jQuery('#amt').val();
        
         jQuery.ajax({
               type:'post',
               url:'payment_upload.php',
               data:"amt="+amt+"&name="+name,
               success:function(result){
                   var options = {
                        "key": "rzp_test_skDCN3rewuxQqL", 
                        "amount": amt*100, 
                        "currency": "INR",
                        "name": "THYNK Unlimited",
                        "description": "Welcome To The World of Education",
                        "image": "image/logo.png",
                        "handler": function (response){
                           jQuery.ajax({
                               type:'post',
                               url:'payment_upload.php',
                               data:"payment_id="+response.razorpay_payment_id,
                               success:function(result){
                                   window.location.href="thank_you.php";
                               }
                           });
                        }
                    };
                    var rzp1 = new Razorpay(options);
                    rzp1.open();
               }
           });
        
        
    }
</script>

<?php
}
}

else{
  header("location:login.php");
}

?>