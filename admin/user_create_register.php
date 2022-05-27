
<?php
session_start();
include '../dbcon/dbcon.php';


$id=0;
$update = false;
$Ename = '';
$Eemail = '';
$Eaddress = '';
$Ephone = '';
$Eid = '';
$Epassword = '';


if(isset($_POST['submit_user'])){

$user_id = $_POST['user_id'];
$user_name = $_POST['user_name'];
$user_email  = $_POST['user_email'];
$Assign_Hospital= $_POST['Assign_Hospital'];
$user_mobile = $_POST['user_mobile'];
$user_password = $_POST['user_password'];

$db = "select * from user where user_name ='$user_name'";

$s = mysqli_query($con,$db);


$result = mysqli_num_rows($s);

if($result == 1){
    $_SESSION['fail'] = "username exits!!Try other names";
    echo '<script>alert("Welcome to Geeks for Geeks")</script>';
  header('location:create_user.php');
}
else{
$reg = "INSERT INTO `user` (`user_id`,`user_name`, `user_mobile`, `user_email`,`Assign_Hospital`, `user_password`) VALUES ('$user_id','$user_name', '$user_mobile', '$user_email','$Assign_Hospital', '$user_password') ";

mysqli_query($con,$reg);

$_SESSION['success'] = "Successfully created!";
header('location:create_user.php');
}
}

if(isset($_GET['delete'])){
  $id = $_GET['delete'];
  mysqli_query($con,"DELETE FROM user WHERE id = $id");
  $_SESSION['deleted'] = "Successfully deleted a user!";
  header('location:manage.php');
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update = true;
  $result= mysqli_query($con,"SELECT * FROM user WHERE id ='$id'");
  $row = mysqli_fetch_array($result);
   
        $Ename = $row['user_name'];
        $Eemail = $row['user_email'];
        $EassHos = $row['Assign_Hospital'];
        $Ephone = $row['user_mobile'];
        $Eid = $row['user_id'];
        $Epassword = $row['user_password'];
}

if(isset($_POST['update']))
{
  $id = $_POST['id'];
  $Hname = $_POST['user_name'];
  $Hemail = $_POST['user_email'];
  $HassHos = $_POST['Assign_Hospital'];
  $Hphone = $_POST['user_mobile'];
  $Hid = $_POST['user_id'];
  $Hpassword = $_POST['user_password'];

  mysqli_query($con,"UPDATE `user` SET user_name ='$Hname', user_email = '$Hemail',  Assign_Hospital = '$HassHos', user_mobile = '$Hphone', user_id = '$Hid', user_password = '$Hpassword' WHERE id = '$id' ");

  $_SESSION['updated'] = "user Details Have Been Updated!!";
  header('location:manage.php');

}
?>