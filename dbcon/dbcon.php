<?php


    $servername='localhost';
    $username='root';
    $password='';
    $dbname = "task";
    $con=mysqli_connect($servername,$username,$password,$dbname);
      if(!$con){
          die('Could not Connect MySql Server:' .mysql_error());
        }
?>
