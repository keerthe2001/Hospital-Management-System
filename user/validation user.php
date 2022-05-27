
<?php
session_start();
include '../dbcon/dbcon.php';

if(isset($_POST['submit'])){

$user_password = $_POST['user_password'];
$user_name = $_POST['user_name'];


$db = "select * from user where user_name ='$user_name' && user_password = '$user_password' ";


$s = mysqli_query($con,$db);


$result = mysqli_num_rows($s);



if($result == 1){
    $_SESSION['user_name']= $user_name;
  header('location:user_home.php');
  echo"success";
}
else{
  header('location:../index.php');
  $_session['status'] = "login failed!!";
}
}

?>