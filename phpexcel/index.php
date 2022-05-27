<?php
$con = mysqli_connect('localhost','root','','task');
if(isset($_POST['upload_excel'])){
    $file = $_FILES['doc']['tmp_name'];


    $ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
    if($ext=='xlsx' || $ext=='xls'){
        require '../phpexcel/PHPExcel.php';
        require '../phpexcel/PHPExcel/IOFactory.php';

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

                     

                     echo       $patient_type=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                     echo      $no_of_patients=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                     echo       $select_period1=$sheet->getCellByColumnAndRow(1,10)->getValue();
                    
                    
                          $dat11=$sheet->getCellByColumnAndRow(7,12)->getValue();
                     echo  $dat12 = date('Y-m-d', strtotime($dat11));
                    //  echo var_dump($dat11);

                        echo '<br>';
                    $query001 = mysqli_query($con,"INSERT INTO `hospital1 outpatient` (`patient_type`,`no_of_patients`,`select_period1`,`dat`) VALUES ('$patient_type','$no_of_patients','$select_period1','$dat12')");
                   }
                    if($i <=19 && $i>=16){
                        echo $surgery_name1=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        echo $no_of_surgeries1=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        echo $select_period2=$sheet->getCellByColumnAndRow(1,10)->getValue();
                        echo '<br>';
                        
                        $query002 =   mysqli_query($con,"INSERT INTO `hospital2 surgeries` (`surgery_name1`,`no_of_surgeries1`,`select_period2`) VALUES ('$surgery_name1','$no_of_surgeries1','$select_period2')");
                   }
                    if($i <=24 && $i>=21){
                        echo $surgery_name2=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        echo $no_of_surgeries2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        echo $select_period3=$sheet->getCellByColumnAndRow(1,10)->getValue();
                       
                        echo '<br>';
                
                        $query003 = mysqli_query($con,"INSERT INTO `hospital2 camp` (`surgery_name2`,`no_of_surgeries2`,`select_period3`) VALUES ('$surgery_name2','$no_of_surgeries2','$select_period3')");
                
                   }
                    if($i == 26 || $i==27){
                        echo $paying_orbit_sot=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        echo $camp_orbit_sot=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        echo $select_period4=$sheet->getCellByColumnAndRow(1,10)->getValue();
                       
                        echo '<br>';
                
                        $query004 = mysqli_query($con,"INSERT INTO `hospital2 sot` (`paying_orbit_sot`,`camp_orbit_sot`,`select_period4`) VALUES ('$paying_orbit_sot','$camp_orbit_sot','$select_period4')");
                
                   }
                
                    if($i == 29 || $i==30){
                        echo $hospital_surgery=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        echo $train_surgery=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        echo $select_period5=$sheet->getCellByColumnAndRow(1,10)->getValue();
                       
                        echo '<br>';
                
                        $query005 = mysqli_query($con,"INSERT INTO `hospital2 lifeline_camp` (`hospital_surgery`,`train_surgery`,`select_period5`) VALUES ('$hospital_surgery','$train_surgery','$select_period5')");
                
                   }
                
                    if($i <=39 && $i>=34){
                        echo $treatment_name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                        echo $no_of_treatments=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        echo $select_period6=$sheet->getCellByColumnAndRow(1,10)->getValue();
                       
                        echo '<br>';
                
                        $query006 = mysqli_query($con,"INSERT INTO `hospital2 other_treatments` (`treatment_name`,`no_of_treatments`,`select_period6`) VALUES ('$treatment_name','$no_of_treatments','$select_period6')");
                
                   }
                   
                    if($i == 41){
                        
                        echo $gp=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $i++;
                        echo $order1=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        
                        echo $select_period7=$sheet->getCellByColumnAndRow(1,10)->getValue();
                        
                        echo '<br>';
                
                        $query007 = mysqli_query($con,"INSERT INTO `hospital2 optical_hospital` (`gp`,`order1`,`select_period7`) VALUES ('$gp','$order1','$select_period7')");
                   }
                    if($i==44){
                      
                        echo $total_camp=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $i++;
                        echo $camp_name=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $i++;
                        echo $total_op=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $i++;
                        echo $total_ip=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $i++;
                        echo $gp2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        $i++;
                        echo $order2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                        echo $select_period8=$sheet->getCellByColumnAndRow(1,10)->getValue();
                       
                        
                        echo '<br>';
                
                        $query008 = mysqli_query($con,"INSERT INTO `hospital2 camp_details` (`total_camp`, `camp_name`, `total_op`, `total_ip`, `gp2`, `order2`, `select_period8`) VALUES ('$total_camp', '$camp_name', '$total_op', '$total_ip', '$gp2', '$order2', '$select_period8')");
                        
                   }
                
                   if($i <=61 && $i>=54){
                    echo $details3=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                    echo $amount=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                    echo $select_period9=$sheet->getCellByColumnAndRow(1,10)->getValue();
                   
                    echo '<br>';
            
                    $query006 = mysqli_query($con,"INSERT INTO `hospital2 revenue_statement` (`details3`,`amount`,`select_period9`) VALUES ('$details3','$amount','$select_period9')");
            
               }
                // echo $name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                // $mobile=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                // $email=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                
                // mysqli_query($con,"INSERT INTO `exc` (`name`,`mobile`,`email`) VALUES ('$name','$mobile','$email')");
                
                   
            
        }
    }
}
else
{
    echo "Invalid file format";
}

if($query001 && $query002 && $query003 && $query004 && $query005 && $query006 && $query007 && $query008)
{
    $_SESSION['status'] = "successfully inserted!!!";
}
else
{
    $_SESSION['status'] = "Not inserted!!!";
}
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../phpexcel/PHPExcel.php">
    <link rel="stylesheet" href="../phpexcel/PHPExcel/IOFactory.php">
</head>
<body>
<form action="index.php" method="post" enctype="multipart/form-data" class="p-5 bg-indigo-300">
    <input type="file" name="doc" id="">
    <input type="submit" value="submit" name="upload_excel">
</body>
</html>