<?php
session_start();
@include 'database/config.php';

$id = $_GET['cid'];

if(isset($_SESSION['User']))
{
   //echo $_SESSION['User'];
   $user = $_SESSION["User"];
   $user_query = "SELECT * FROM `login` WHERE `email` = '$user' ";
  $result_user = mysqli_query($conn,$user_query);
  $user_rowData = mysqli_fetch_assoc($result_user);
  $user_id = $user_rowData["id"];
  $user_name = $user_rowData["name"];

  $select = mysqli_query($conn, "SELECT * FROM courses WHERE `cid` = '$id' ");
  $row = mysqli_fetch_assoc($select);
  $title=$row['coursetitle'];


?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Certificate</title>
  </head>
  <body>
    <center>
     
    <?php 
     
        $name = strtoupper($user_name);
      
        $occupation = strtoupper($title);
        $name_len = strlen($title);
        if ($name) {
          $font_size_occupation = 17;
        }

      
          echo 
          "
          <div class='alert alert-success col-sm-6' role='alert'>
              Congratulations! $name on your excellent success.
          </div>
          ";

          //designed certificate picture
          $image = "certi.png";

          $createimage = imagecreatefrompng($image);

          //this is going to be created once the generate button is clicked
          $output = "certificate.png";

          //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
          $white = imagecolorallocate($createimage, 205, 245, 255);
          $black = imagecolorallocate($createimage, 0, 0, 0);

          //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
          $rotation = 0;

          //we then set the x and y axis to fix the position of our text name
          $origin_x = 120;
          $origin_y=260;

          //we then set the x and y axis to fix the position of our text occupation
          $origin1_x = 220;
          $origin1_y=160;

          //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
          if($name_len<=7){
            $font_size = 25;
            $origin_x = 200;
          }
          elseif($name_len<=12){
            $font_size = 30;
          }
          elseif($name_len<=15){
            $font_size = 26;
          }
          elseif($name_len<=20){
             $font_size = 18;
          }
          elseif($name_len<=22){
            $font_size = 15;
          }
          elseif($name_len<=33){
            $font_size=11;
            $origin_x = 140;
           
          }
          else {
            $font_size =10;
            $origin_x = 130;
          }

          $certificate_text = $name;

          //font directory for name
          $drFont = dirname(__FILE__)."/Gotham-black.otf";

          // font directory for occupation name
          $drFont1 = dirname(__FILE__)."/Gotham-black.otf";

          //function to display name on certificate picture
          $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black,$drFont, $occupation);

          //function to display occupation name on certificate picture
          $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $black, $drFont1, $certificate_text);

          imagepng($createimage,$output,3);

 ?>
        <!-- this displays the image below -->
        <img src="<?php echo $output; ?>">
        <br> 
        <br>

        <!-- this provides a download button -->
        <a href="<?php echo $output; ?>" class="btn btn-success">Download My Certificate</a>
        <br><br>


    </center>

      

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>

<?php }else{
  header("location:login.php");
}
?>