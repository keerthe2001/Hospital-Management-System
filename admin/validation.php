<?php
session_start();
include '../dbcon/dbcon.php';

if(isset($_POST['submit'])){

  $name = $_POST['name'];
$password = $_POST['password'];

$db = "select * from admin where name ='$name' && password = '$password' ";
$s = mysqli_query($con,$db);

$result = mysqli_num_rows($s);

if($result == 1){
    $_SESSION['name']="$name";
  
  header('location:admin_home.php?date_sort=none&from_date=&to_date=&Hospital_sort=all&submit_filter=');
  echo"success";
}
else{
  header('location:../index.php');
  $_session['status'] = "login failed!!";
}
}

?>