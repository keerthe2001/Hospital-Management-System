
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

if(isset($_POST['submit_Hospital'])){

$Hospital_name = $_POST['Hospital_name'];
$Hospital_email  = $_POST['Hospital_email'];
$Hospital_Address = $_POST['Hospital_address'];
$Hospital_phone = $_POST['Hospital_phone'];
$Hospital_id = $_POST['Hospital_id'];
$Hospital_password = $_POST['Hospital_password'];

$db = "SELECT * FROM `Hospital` WHERE Hospital_name = '$Hospital_name'";

$s = mysqli_query($con,$db);

$result = mysqli_num_rows($s);

if($result == 1){
    $_SESSION['fail'] = "Hospital exits!!Try other names";
    // echo '<script>alert("Welcome to Geeks for Geeks")</script>';
  header('location:Add_Hospital.php');
}
else{
$reg = "INSERT INTO `Hospital` (`Hospital_name`, `Hospital_email`, `Hospital_Address`, `Hospital_phone`,`Hospital_id`, `Hospital_password`,`is_assigned`) VALUES ('$Hospital_name', '$Hospital_email', '$Hospital_Address', '$Hospital_phone','$Hospital_id', '$Hospital_password','0')";
mysqli_query($con,$reg);


$reg2= "CREATE TABLE `{$Hospital_name}_outpatient` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `new` VARCHAR(255) NOT NULL ,  `review` VARCHAR(255) NOT NULL ,`other` INT(255) NOT NULL,    `date` DATE NOT NULL ,  `updated_date` DATETIME(6) NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg2);


$reg3=" CREATE TABLE `{$Hospital_name}_surgeries` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `CATARACT` VARCHAR(255) NOT NULL , `RETINA` VARCHAR(255) NOT NULL ,  `GLAUCOMA` INT(255) NOT NULL , `Pediatric_or_Squint` VARCHAR(255) NOT NULL ,  `CORNEA_Pterygium` INT(255) NOT NULL ,  `Lasik_Surgery` INT(255) NOT NULL , `Oculoplasty` INT(255) NOT NULL , `OTHER_SURGERIES` INT(255) NOT NULL , `Sics_Pterygium` INT(255) NOT NULL , `Phaco_Pterygium` INT(255) NOT NULL , `Trab_Pterygium` INT(255) NOT NULL ,   `date` DATE NOT NULL ,  `updated_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg3);
$reg4=" CREATE TABLE `{$Hospital_name}_camp` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `CATARACT` VARCHAR(255) NOT NULL , `RETINA` VARCHAR(255) NOT NULL ,  `GLAUCOMA` INT(255) NOT NULL , `Pediatric_or_Squint` VARCHAR(255) NOT NULL ,  `CORNEA_Pterygium` INT(255) NOT NULL ,  `Lasik_Surgery` INT(255) NOT NULL , `Oculoplasty` INT(255) NOT NULL , `OTHER_SURGERIES` INT(255) NOT NULL , `Sics_Pterygium` INT(255) NOT NULL , `Phaco_Pterygium` INT(255) NOT NULL , `Trab_Pterygium` INT(255) NOT NULL ,   `date` DATE NOT NULL ,  `updated_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg4);


$reg5=" CREATE TABLE `{$Hospital_name}_sot` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `paying_orbit_sot` INT(255) NOT NULL ,  `camp_orbit_sot` INT(255) NOT NULL ,  `other` INT(255) NOT NULL,  `date` DATE NOT NULL ,  `updated_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,     PRIMARY KEY  (`id`))";
mysqli_query($con,$reg5);


$reg6=" CREATE TABLE `{$Hospital_name}_lifeline_camp` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `Hospital_surgery` INT(255) NOT NULL ,  `train_surgery` INT(255) NOT NULL ,  `other` INT(255) NOT NULL,  `date` DATE NOT NULL , `updated_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg6);


$reg7=" CREATE TABLE `{$Hospital_name}_other_treatments` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `HFA` VARCHAR(255) NOT NULL ,  `Yag_PI_Single_eye` INT(255) NOT NULL , `Yag_PI_Both_eyes` INT(255) NOT NULL , `Yag_Cap` INT(255) NOT NULL , `CCT_Laser` INT(255) NOT NULL , `B_scan_single_eye` INT(255) NOT NULL ,`B_scan_both_eye` INT(255) NOT NULL ,`OCT` INT(255) NOT NULL ,`FFA` INT(255) NOT NULL ,`PRP_Laser_Green_Laser` INT(255) NOT NULL , `Penta_Cam` INT(255) NOT NULL ,  `Fundus_Photo` INT(255) NOT NULL , `Inj_Manitol_Eye_Wash` INT(255) NOT NULL , `other` INT(255) NOT NULL,  `date` DATE NOT NULL ,  `updated_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg7);


$reg8=" CREATE TABLE `{$Hospital_name}_optical_Hospital` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `gp` INT(255) NOT NULL ,  `order1` INT(255) NOT NULL , `other` INT(255) NOT NULL,   `date` DATE NOT NULL ,  `updated_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg8);


$reg9=" CREATE TABLE `{$Hospital_name}_camp_details` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `total_camp` INT(255) NOT NULL ,  `camp_name` VARCHAR(255) NOT NULL ,  `total_op` INT(255) NOT NULL ,  `total_ip` INT(255) NOT NULL , `Surgery_Advice` INT(255) NOT NULL , `Surgery_Admission` INT(255) NOT NULL ,  `gp` INT(255) NOT NULL ,  `order1` INT(255) NOT NULL , `other` INT(255) NOT NULL,   `date` DATE NOT NULL , `updated_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg9);


$reg10=" CREATE TABLE `{$Hospital_name}_revenue_statement` ( `id` INT(255) NOT NULL AUTO_INCREMENT ,  `OP_Registration` VARCHAR(255) NOT NULL , `OP_Treatment_Procedures` VARCHAR(255) NOT NULL , `OP_Others` VARCHAR(255) NOT NULL , `IP_Advance` VARCHAR(255) NOT NULL ,`OPTICAL` VARCHAR(255) NOT NULL ,`MEDICAL` VARCHAR(255) NOT NULL ,`CATARACT_CAMP` VARCHAR(255) NOT NULL ,`REFRACTION_CAMP` VARCHAR(255) NOT NULL ,`PHARMACY` VARCHAR(255) NOT NULL ,`LIFELINE_CAMP` VARCHAR(255) NOT NULL , `CANTEEN` VARCHAR(255) NOT NULL ,  `DONATIONS` VARCHAR(255) NOT NULL , `other` INT(255) NOT NULL,   `date` DATE NOT NULL ,  `updated_date` DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg10);

$reg11=" CREATE TABLE `{$Hospital_name}` ( `id` INT(255) NULL AUTO_INCREMENT ,  `outpatient` VARCHAR(255) NULL , `surgeries` VARCHAR(255) NULL ,`camp` VARCHAR(255) NULL ,`camp_details` VARCHAR(255) NULL ,`lifeline_camp` VARCHAR(255) NULL ,`optical_Hospital` VARCHAR(255) NULL ,`other_treatments` VARCHAR(255) NULL , `revenue_statement` VARCHAR(255) NULL , `sot` VARCHAR(255) NULL,`columndata` VARCHAR(255) NULL, `updated_date` DATETIME NULL DEFAULT CURRENT_TIMESTAMP ,    PRIMARY KEY  (`id`))";
mysqli_query($con,$reg11);

$reg13 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('CATARACT','CATARACT','total_camp', 'Hospital_surgery','gp','HFA','OP_Registration','paying_orbit_sot','outpatient','new'),('RETINA','RETINA','camp_name', 'train_surgery','order1','Yag_PI_Single_eye','OP_Treatment_Procedures','camp_orbit_sot','surgeries','review'),
('GLAUCOMA','GLAUCOMA','total_op', 'other','other','Yag_PI_Both_eyes','OP_Others','other','camp','other'),
('Pediatric_or_Squint','Pediatric_or_Squint','total_ip', '','','Yag_Cap','IP_Advance','','camp_details',''),
('CORNEA_Pterygium','CORNEA_Pterygium','Surgery_Advice', '','','CCT_Laser','OPTICAL','','lifeline_camp',''),
('Lasik_Surgery','Lasik_Surgery','Surgery_Admission', '','','B_scan_single_eye','MEDICAL','','optical_Hospital',''),
('Oculoplasty','Oculoplasty','gp', '','','B_scan_both_eye','CATARACT_CAMP','','other_treatments',''),
('OTHER_SURGERIES','OTHER_SURGERIES','order1', '','','OCT','REFRACTION_CAMP','','revenue_statement',''),
('Sics_Pterygium','Sics_Pterygium','other', '','','FFA','PHARMACY','','sot',''),
('Phaco_Pterygium','Phaco_Pterygium','', '','','PRP_Laser_Green_Laser','LIFELINE_CAMP','','',''),
('Trab_Pterygium','Trab_Pterygium','', '','','Penta_Cam','CANTEEN','','',''),
('','','', '','','Fundus_Photo','DONATIONS','','',''),
('','','', '','','Inj_Manitol_Eye_Wash','other','','',''),
('','','', '','','other','','','','')";

mysqli_query($con,$reg13);

// $reg14 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('RETINA','RETINA','camp_name', 'train_surgery','order1','Yag_PI_Single_eye','IP','camp_orbit_sot','surgeries','review')";
// mysqli_query($con,$reg14);

// $reg15 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('GLAUCOMA','GLAUCOMA','camp_name', 'train_surgery','order1','Yag_PI_Single_eye','IP','camp_orbit_sot','surgeries','review')";
// mysqli_query($con,$reg15);

// $reg16 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('CORNEA_Pterygium','CORNEA_Pterygium','total_op', 'other','other','Yag_PI_Both_eyes','OPTICAL','other','camp','other')";
// mysqli_query($con,$reg15);

// $reg16 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('OTHER_SURGERIES','OTHER_SURGERIES','total_ip', '','','Yag_Cap','MEDICAL','','camp_details','')";
// mysqli_query($con,$reg16);

// $reg17 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('','','gp2', '','','CCT_Laser','CATARACT_CAMP','','lifeline_camp','')";
// mysqli_query($con,$reg17);

// $reg18 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('','','order2', '','','other','REFRACTION_CAMP','','optical_Hospital','')";
// mysqli_query($con,$reg18);

// $reg19 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('','','other', '','','','LIFELINE_CAMP','','other_treatments','')";
// mysqli_query($con,$reg19);

// $reg20 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('','','', '','','','CANTEEN','','revenue_statement','')";
// mysqli_query($con,$reg20);

// $reg21 = "INSERT INTO `{$Hospital_name}` (`surgeries`, `camp`, `camp_details`,`lifeline_camp`,`optical_Hospital`,`other_treatments`,`revenue_statement`,`sot`,`columndata`,`outpatient`) VALUES ('','','', '','','','other','','sot','')";
// mysqli_query($con,$reg21);

$_SESSION['success'] = "Successfully Added a Hospital!";
header('location:Add_Hospital.php');
}
}

if(isset($_GET['delete'])){
  
  $id = $_GET['delete'];
  
  $result4= mysqli_query($con,"SELECT * FROM Hospital WHERE id ='$id'");
  $row4 = mysqli_fetch_array($result4);
  
$Ename4= $row4['Hospital_name'];
  echo $Ename4; 
  mysqli_query($con,"DROP TABLE `{$Ename4}_camp`, `{$Ename4}_camp_details`, `{$Ename4}_lifeline_camp`, `{$Ename4}_optical_Hospital`, `{$Ename4}_other_treatments`, `{$Ename4}_outpatient`, `{$Ename4}_revenue_statement`, `{$Ename4}_sot`, `{$Ename4}_surgeries`,`{$Ename4}`");
  
  $_SESSION['deleted'] = "Successfully deleted $Ename4";
  $result2= mysqli_query($con,"DELETE FROM Hospital WHERE id = $id");
  header('location:manage.php');
  
}

if(isset($_GET['edit'])){
  $id = $_GET['edit'];
  $update = true;
  $result= mysqli_query($con,"SELECT * FROM Hospital WHERE id ='$id'");
  $row = mysqli_fetch_array($result);
   
        $Ename = $row['Hospital_name'];
        $Eemail = $row['Hospital_email'];
        $Eaddress = $row['Hospital_Address'];
        $Ephone = $row['Hospital_phone'];
        $Eid = $row['Hospital_id'];
        $Epassword = $row['Hospital_password'];
}


if(isset($_POST['update']))
{
  $id = $_POST['id'];
  $Hname = $_POST['Hospital_name'];
  $Hemail = $_POST['Hospital_email'];
  $Haddress = $_POST['Hospital_address'];
  $Hphone = $_POST['Hospital_phone'];
  $Hid = $_POST['Hospital_id'];
  $Hpassword = $_POST['Hospital_password'];

  mysqli_query($con,"UPDATE `Hospital` SET Hospital_name ='$Hname', Hospital_email = '$Hemail',  Hospital_address = '$Haddress', Hospital_phone = '$Hphone', Hospital_id = '$Hid', Hospital_password = '$Hpassword' WHERE id = '$id' ");

  $_SESSION['updated'] = "Hospital Details Have Been Updated!!";
  header('location:manage.php');

}


?>