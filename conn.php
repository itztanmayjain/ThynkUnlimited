<?php      
    $host = "localhost";  
    $user = "root";  
    $password = '';  
    $db_name = "project";  
      
    $con = mysqli_connect($host, $user, $password, $db_name);  
    //mysql_select_db($db_name);
    if(!$con) {  
        die("Failed to connect with MySQL: ". mysql_connect_error());  
    }
?>  