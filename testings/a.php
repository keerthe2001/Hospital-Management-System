<?php
session_start();
$con=mysqli_connect('localhost','root','','task');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


<form action="a.php" method="post" enctype="multipart/form-data">
<input type="file" name="doc" id="">
        

<input type="button" value="submit" name="submit">
<?php

// $user_name=$_SESSION['user_name'];
// $db3 = "SELECT * FROM user WHERE user_name = '$user_name'";

// $s6 = mysqli_query($con,$db3);

//   $result = mysqli_fetch_array($s);

// echo $result;

// $result6 = mysqli_fetch_array($s6);
// $Assign_Hospital = $result6['Assign_Hospital'];




$file = $_FILES['doc']['tmp_name'];


$ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
if($ext=='xlsx'){
    require '../task1/phpexcel/PHPExcel.php';
    require '../task1/phpexcel/PHPExcel/IOFactory.php';

    $ob = PHPExcel_IOFactory::load($file);
    foreach($ob-> getWorksheetIterator() as $sheet){
        // echo '<pre>';
        // print_r($sheet);
        $getHighestRow = $sheet->getHighestRow();
        // echo '<pre>';
        // print_r($getHighestRow);
        for($i=12;$i<=$getHighestRow;$i++){

            if($i==14  || $i==15 || $i==20 || $i==25 || $i==28 || $i==31 || $i==32 || $i==33 || $i==40 || $i==50 || $i==51 || $i==52 || $i==53 || $i==62 || $i==42) 
                {
                    continue;
                }
                if($i == 12 || $i==13){
                //  echo       $patient_type=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                //  echo      $no_of_patients=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                //  echo       $select_period1=$sheet->getCellByColumnAndRow(1,10)->getValue();
                 echo       $dat=$sheet->getCellByColumnAndRow(7,10)->getValue();
                }           
            }
//                     echo '<br>';
//                 $query001 = mysqli_query($con,"INSERT INTO `$Assign_Hospital outpatient` (`patient_type`,`no_of_patients`,`select_period1`) VALUES ('$patient_type','$no_of_patients','$select_period1')");
//                }
//                 if($i <=19 && $i>=16){
//                     echo $surgery_name1=$sheet->getCellByColumnAndRow(0,$i)->getValue();
//                     echo $no_of_surgeries1=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     echo $select_period2=$sheet->getCellByColumnAndRow(1,10)->getValue();
//                     echo '<br>';
                    
//                     $query002 =   mysqli_query($con,"INSERT INTO `$Assign_Hospital surgeries` (`surgery_name1`,`no_of_surgeries1`,`select_period2`) VALUES ('$surgery_name1','$no_of_surgeries1','$select_period2')");
//                }
//                 if($i <=24 && $i>=21){
//                     echo $surgery_name2=$sheet->getCellByColumnAndRow(0,$i)->getValue();
//                     echo $no_of_surgeries2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     echo $select_period3=$sheet->getCellByColumnAndRow(1,10)->getValue();
                   
//                     echo '<br>';
            
//                     $query003 = mysqli_query($con,"INSERT INTO `$Assign_Hospital camp` (`surgery_name2`,`no_of_surgeries2`,`select_period3`) VALUES ('$surgery_name2','$no_of_surgeries2','$select_period3')");
            
//                }
//                 if($i == 26 || $i==27){
//                     echo $paying_orbit_sot=$sheet->getCellByColumnAndRow(0,$i)->getValue();
//                     echo $camp_orbit_sot=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     echo $select_period4=$sheet->getCellByColumnAndRow(1,10)->getValue();
                   
//                     echo '<br>';
            
//                     $query004 = mysqli_query($con,"INSERT INTO `$Assign_Hospital sot` (`paying_orbit_sot`,`camp_orbit_sot`,`select_period4`) VALUES ('$paying_orbit_sot','$camp_orbit_sot','$select_period4')");
            
//                }
            
//                 if($i == 29 || $i==30){
//                     echo $hospital_surgery=$sheet->getCellByColumnAndRow(0,$i)->getValue();
//                     echo $train_surgery=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     echo $select_period5=$sheet->getCellByColumnAndRow(1,10)->getValue();
                   
//                     echo '<br>';
            
//                     $query005 = mysqli_query($con,"INSERT INTO `$Assign_Hospital lifeline_camp` (`hospital_surgery`,`train_surgery`,`select_period5`) VALUES ('$hospital_surgery','$train_surgery','$select_period5')");
            
//                }
            
//                 if($i <=39 && $i>=34){
//                     echo $treatment_name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
//                     echo $no_of_treatments=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     echo $select_period6=$sheet->getCellByColumnAndRow(1,10)->getValue();
                   
//                     echo '<br>';
            
//                     $query006 = mysqli_query($con,"INSERT INTO `$Assign_Hospital other_treatments` (`treatment_name`,`no_of_treatments`,`select_period6`) VALUES ('$treatment_name','$no_of_treatments','$select_period6')");
            
//                }
               
//                 if($i == 41){
                    
//                     echo $gp=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     $i++;
//                     echo $order1=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                    
//                     echo $select_period7=$sheet->getCellByColumnAndRow(1,10)->getValue();
                    
//                     echo '<br>';
            
//                     $query007 = mysqli_query($con,"INSERT INTO `$Assign_Hospital optical_hospital` (`gp`,`order1`,`select_period7`) VALUES ('$gp','$order1','$select_period7')");
//                }
//                 if($i==44){
                  
//                     echo $total_camp=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     $i++;
//                     echo $camp_name=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     $i++;
//                     echo $total_op=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     $i++;
//                     echo $total_ip=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     $i++;
//                     echo $gp2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     $i++;
//                     echo $order2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                     echo $select_period8=$sheet->getCellByColumnAndRow(1,10)->getValue();
                   
                    
//                     echo '<br>';
            
//                     $query008 = mysqli_query($con,"INSERT INTO `$Assign_Hospital camp_details` (`total_camp`, `camp_name`, `total_op`, `total_ip`, `gp2`, `order2`, `select_period8`) VALUES ('$total_camp', '$camp_name', '$total_op', '$total_ip', '$gp2', '$order2', '$select_period8')");
                    
//                }
            
//                if($i <=61 && $i>=54){
//                 echo $details3=$sheet->getCellByColumnAndRow(0,$i)->getValue();
//                 echo $amount=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//                 echo $select_period9=$sheet->getCellByColumnAndRow(1,10)->getValue();
               
//                 echo '<br>';
        
//                 $query009 = mysqli_query($con,"INSERT INTO `$Assign_Hospital revenue_statement` (`details3`,`amount`,`select_period9`) VALUES ('$details3','$amount','$select_period9')");
        
//            }
//             // echo $name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
//             // $mobile=$sheet->getCellByColumnAndRow(1,$i)->getValue();
//             // $email=$sheet->getCellByColumnAndRow(2,$i)->getValue();
            
//             // mysqli_query($con,"INSERT INTO `exc` (`name`,`mobile`,`email`) VALUES ('$name','$mobile','$email')");
            
               
        
//     }
// }
// }
// else
// {
// $_SESSION['fail'] = "Invalid file format";
// }

// if($query001 && $query002 && $query003 && $query004 && $query005 && $query006 && $query007 && $query008 && $query009)
// {
// $_SESSION['success_msg'] = "success";
// $_SESSION['success'] = "successfully inserted!!!";
// header('location:../task1/update_report.php');
// }
// else
// {
// $_SESSION['fail_msg'] = "Failed";
// $_SESSION['fail'] = "Not inserted!!!";
// header('location:../task1/update_report.php');
}
}
?>


<script>
function durationtype(){
    var division = document.getElementById("tablebody1");
    var row = division.createElememt('tr');
    var data = row.createElememt('td');
    var newField = data.createElement("input");
    newField.setAttribute("type","date");
    newField.setAttribute("name","from date");
    newField.setAttribute("id","from date");
    row.appendChild(data);
    division.appendChild(row);
}
durationtype();
</script>



</body>
</html>