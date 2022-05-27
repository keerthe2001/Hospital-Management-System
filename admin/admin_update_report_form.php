<?php
session_start();
include '../dbcon/dbcon.php';

if(isset($_SESSION['name']) && isset($_POST['submit_admin'])){

 $Assign_Hospital = $_POST['Assign_Hospital'];

// outpatient 

    $new = $_POST['new'];
    $review = $_POST['review'];
    // $select_period1 = $_POST['select_period1'];
    echo $other_outpatient = $_POST['other1'];
    $dat = date('Y-m-d',strtotime($_POST['dat']));
    
    //  foreach($patient_type as $index => $data){
    //    echo $data.'-'.$no_of_patients[$index].'-'.$select_period1.'-'.$dat;
    //       $s_new = $data;
    //       $s_review = $review[$index];
    //       $s_select_period1 = $select_period1;
    //       $s_dat = $dat;
       
          $reg11 = "INSERT INTO `{$Assign_Hospital}_outpatient` ( `new`, `review`,`other`, `date`) VALUES ('$new', '$review','$other_outpatient', '$dat')";
          $query_run11 = mysqli_query($con,$reg11);
 
    
    //  surgery

     echo $CATARACT = $_POST['cataract'];
     echo $GLAUCOMA	 = $_POST['glaucoma'];
     echo $CORNEA = $_POST['CORNEA(Pterygium)'];
     echo $RETINA = $_POST['RETINA'];
     echo $PEDIATRIC = $_POST['Pediatric'];
     echo $Lasik = $_POST['Lasik'];
     echo $Oculoplasty = $_POST['Oculoplasty'];
     echo $Sics  = $_POST['Sics'];
     echo $Phaco = $_POST['Phaco'];
     echo $Trab = $_POST['Trab'];
     echo $OTHER_SURGERIES = $_POST['other_surgeries'];
    //  echo $select_period2 = $_POST['select_period2'];
     echo $dat2 = date('Y-m-d', strtotime($_POST['dat2']));

// foreach($surgery_name1 as $index1 => $data1){

//           $s_surgery_name1 = $data1;
//           $s_no_of_surgeries1 = $no_of_surgeries1[$index1];
//           $s_select_period2 = $select_period2;
//           $s_dat2 = $dat2;
     
    $reg12 = "INSERT INTO `{$Assign_Hospital}_surgeries` (`CATARACT`,`RETINA`, `GLAUCOMA`,`Pediatric_or_Squint`, `CORNEA_Pterygium` ,`Lasik_Surgery`,`Oculoplasty`,`OTHER_SURGERIES`,`Sics_Pterygium`,`Phaco_Pterygium`,`Trab_Pterygium`, `date`) VALUES ('$CATARACT','$RETINA','$GLAUCOMA','$PEDIATRIC','$CORNEA','$Lasik','$Oculoplasty','$OTHER_SURGERIES','$Sics','$Phaco','$Trab','$dat2')";
    mysqli_query($con,$reg12);


//     // echo  $s_surgery_name1;
//     // echo $s_no_of_surgeries1 ;
//     // echo $s_select_period2;
//     // echo $s_dat2 = $dat2;
//   }   

  //camp

  echo $CATARACT1 = $_POST['cataract1'];
  echo $GLAUCOMA1	 = $_POST['glaucoma1'];
  echo $CORNEA1 = $_POST['CORNEA(Pterygium)1'];
  echo $RETINA1 = $_POST['RETINA'];
  echo $PEDIATRIC1 = $_POST['Pediatric'];
  echo $Lasik1 = $_POST['Lasik'];
  echo $Oculoplasty1 = $_POST['Oculoplasty'];
  echo $Sics1 = $_POST['Sics'];
  echo $Phaco1 = $_POST['Phaco'];
  echo $Trab1 = $_POST['Trab'];
  echo $OTHER_SURGERIES1 = $_POST['other_surgeries1'];
//   echo $select_period3 = $_POST['select_period3'];
  echo $dat3 = date('Y-m-d', strtotime($_POST['dat3']));

    // foreach($surgery_name2 as $index2 => $data2){

    //   $s_surgery_name2 = $data2;
    //   $s_no_of_surgeries2 = $no_of_surgeries2[$index2];
    //   $s_select_period3 = $select_period3;
    //   $s_dat3 = $dat3;
 

    $reg13 = "INSERT INTO `{$Assign_Hospital}_camp` (`CATARACT`,`RETINA`, `GLAUCOMA`,`Pediatric_or_Squint`, `CORNEA_Pterygium` ,`Lasik_Surgery`,`Oculoplasty`,`OTHER_SURGERIES`,`Sics_Pterygium`,`Phaco_Pterygium`,`Trab_Pterygium`, `date`) VALUES ('$CATARACT1','$RETINA1','$GLAUCOMA1','$PEDIATRIC1','$CORNEA1','$Lasik1','$Oculoplasty1','$OTHER_SURGERIES1','$Sics1','$Phaco1','$Trab1','$dat3')";
    mysqli_query($con,$reg13);

//     // echo $s_surgery_name2;
//     // echo $s_no_of_surgeries2;
//     // echo $s_select_period3;
//     // echo $s_dat3;

  // sot detail

    $paying_orbit_sot = $_POST['paying_orbit_sot'];
    $camp_orbit_sot = $_POST['camp_orbit_sot'];
    // $select_period4 = $_POST['select_period4'];
    $other_sot = $_POST['other3'];
    $dat4 = date('Y-m-d', strtotime($_POST['dat4']));

    // foreach($paying_orbit_sot as $index3 => $data3){

    //   $s_paying_orbit_sot = $data3;
    //   $s_camp_orbit_sot = $camp_orbit_sot[$index3];
    //   $s_select_period4 = $select_period4;
    //   $s_dat4 = $dat4;

    $reg14 = "INSERT INTO `{$Assign_Hospital}_sot` (`paying_orbit_sot`, `camp_orbit_sot`,`other`, `date`) VALUES ('$paying_orbit_sot', '$camp_orbit_sot','$other_sot', '$dat4')";
    mysqli_query($con,$reg14);
    
    

    // lifeline camp 

    $hospital_surgery = $_POST['hospital_surgery'];
    $train_surgery = $_POST['train_surgery'];
    // $select_period5 = $_POST['select_period5'];
    $other_lifeline = $_POST['other4'];
    $dat5 = date('Y-m-d', strtotime($_POST['dat5']));

    // foreach($hospital_surgery as $index4 => $data4){

      // $s_hospital_surgery = $data4;
      // $s_train_surgery = $camp_orbit_sot[$index4];
      // $s_select_period5 = $select_period5;
      // $s_dat5 = $dat5;

      // echo      $hospital_surgery;
      // echo      $train_surgery;
      // echo      $select_period5;
      // echo      $dat5;


    $reg15 = "INSERT INTO `{$Assign_Hospital}_lifeline_camp` (`hospital_surgery`, `train_surgery`,`other`, `date`) VALUES ('$hospital_surgery', '$train_surgery','$other_lifeline', '$dat5')";
    mysqli_query($con,$reg15);
    

    // other treatment

    $treatment1 = $_POST['treatment1'];
    $treatment2 = $_POST['treatment2'];
    $treatment3 = $_POST['treatment3'];
    $treatment4 = $_POST['treatment4'];
    $treatment5 = $_POST['treatment5'];
    $treatment6 = $_POST['treatment6'];
    $treatment7 = $_POST['treatment7'];
    $treatment8 = $_POST['treatment8'];
    $treatment9 = $_POST['treatment9'];
    $treatment10 = $_POST['treatment10'];
    $treatment11 = $_POST['treatment11'];
    $treatment12 = $_POST['treatment12'];
    $treatment13 = $_POST['treatment13'];
    // $select_period6 = $_POST['select_period6'];
    $other_treatment = $_POST['other5'];
    $dat6 = date('Y-m-d', strtotime($_POST['dat6']));

    // foreach($treatment_name as $index5 => $data5){

    //   $s_treatment_name = $data5;
    //   $s_no_of_treatments = $no_of_treatments[$index5];
    //   $s_select_period6 = $select_period6;
    //   $s_dat6 = $dat6;

    $reg16 = "INSERT INTO `{$Assign_Hospital}_other_treatments` (`HFA`, `Yag_PI_Single_eye`,`Yag_PI_Both_eyes`,`Yag_Cap`,`CCT_Laser`,`B_scan_single_eye`,`B_scan_both_eye`,`OCT`,`FFA`,`PRP_Laser_Green_Laser`,`Penta_Cam`,`Fundus_Photo`,`Inj_Manitol_Eye_Wash`,`other`, `date`) VALUES ('$treatment1', '$treatment2', '$treatment3','$treatment4','$treatment5','$treatment6','$treatment7','$treatment8','$treatment9','$treatment10','$treatment11','$treatment12','$treatment13','$other_treatment', '$dat6')";

    mysqli_query($con,$reg16);
    

// optical hospital

    $gp = $_POST['gp'];
    $order1 = $_POST['order1'];
    // $select_period7 = $_POST['select_period7'];
    $other_op = $_POST['other6'];
    $dat7 = date('Y-m-d', strtotime($_POST['dat7']));

    // foreach($gp as $index6=> $data6){

    //   $s_gp = $data6;
    //   $s_order1 = $order1[$index6];
    //   $s_select_period7 = $select_period7;
    //   $s_dat7 = $dat7;


    $reg16 = "INSERT INTO `{$Assign_Hospital}_optical_Hospital` (`gp`, `order1`,`other`, `date`) VALUES ('$gp', '$order1','$other_op', '$dat7')";
    mysqli_query($con,$reg16);

    

// camp details 

    $total_camp = $_POST['total_camp'];
    $camp_name = $_POST['camp_name'];
    $total_op = $_POST['total_op'];
    $total_ip = $_POST['total_ip'];
    $surgery_advice = $_POST['Surgery_Advice'];
    $surgery_admission = $_POST['Surgery_Admission'];

    $gp2 = $_POST['gp'];
    $order2 = $_POST['order2'];
    // $select_period8 = $_POST['select_period8'];
    $other_camp = $_POST['other7'];
    $dat8 = date('Y-m-d', strtotime($_POST['dat8']));


    // foreach($total_camp as $index7=> $data7){
    //   $s_total_camp= $data7;
    //   $s_camp_name = $camp_name[$index7];
    //   $s_total_op = $select_period8;
    //   $s_dat8 = $dat8;
    //   $s_total_camp= $data7;
    //   $s_camp_name = $camp_name[$index7];
    //   $s_select_period8 = $select_period8;
    //   $s_dat8 = $dat8;


    $reg17 = "INSERT INTO `{$Assign_Hospital}_camp_details` (`total_camp`, `camp_name`, `total_op`, `total_ip`,`Surgery_Advice`,`Surgery_Admission`, `gp`, `order1`,`other`, `date`) VALUES ('$total_camp', '$camp_name', '$total_op', '$total_ip','$surgery_advice','$surgery_admission', '$gp2', '$order2','$other_camp', '$dat8')";
    mysqli_query($con,$reg17);

    
//     // revenue details 

    $detail1 = $_POST['detail1'];
    $detail2 = $_POST['detail2'];
    $detail3 = $_POST['detail3'];
    $detail4 = $_POST['detail4'];
    $detail5 = $_POST['detail5'];
    $detail6 = $_POST['detail6'];
    $detail7 = $_POST['detail7'];
    $detail8 = $_POST['detail8'];
    $detail9 = $_POST['detail9'];
    $detail10 = $_POST['detail10'];
    $detail11 = $_POST['detail11'];
    $detail12 = $_POST['detail12'];
    // $detail12 = $_POST['detail12'];
    // $select_period9 = $_POST['select_period9'];
    $other_revenue = $_POST['other8'];
    $dat9 = date('Y-m-d', strtotime($_POST['dat9']));

// foreach($details3 as $index8 => $data8){

//       $s_details3  = $data8;
//       $s_amount = $amount[$index8];
//       $s_select_period9 = $select_period9;
//       $s_dat9 = $dat9;


    $reg18 = "INSERT INTO `{$Assign_Hospital}_revenue_statement` (`OP_Registration`,`OP_Treatment_Procedures`,`OP_Others`,`IP_Advance`,`OPTICAL`,`MEDICAL`,`CATARACT_CAMP`,`REFRACTION_CAMP`,`PHARMACY`,`LIFELINE_CAMP`, `CANTEEN`,`DONATIONS`,`other`, `date`) VALUES ('$detail1', '$detail2','$detail3','$detail4','$detail5','$detail6','$detail7','$detail8','$detail9','$detail10','$detail11','$detail12','$other_revenue', '$dat9')";

    mysqli_query($con,$reg18);

//   }
    $_SESSION['status']="Succesfully inserted data!!";
    header('location:../admin/admin_update_report.php');
    }
     
  


if(isset($_POST['upload_excel']) && isset($_SESSION['name'])){

      echo $Assign_Hospital = $_POST['Assign_Hospital'];

      $file = $_FILES['doc']['tmp_name'];
  
  
      $ext=pathinfo($_FILES['doc']['name'],PATHINFO_EXTENSION);
      if($ext=='xlsx'){
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

  
                  if($i==14  || $i==15 || $i==27 || $i==39 || $i==42 || $i==45 || $i==47 || $i==61 || $i==64 || $i==73|| $i==74 || $i==90) 
                      {
                          continue;
                      }
                      if($i == 12 || $i==13){

                    //   $dat11 = date('Y-m-d', strtotime($_POST['dat']));

                       echo       $new=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                       $i++;//13
                       echo      $review=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                   
//date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    echo '<br>';

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat = gmdate("Y-m-d", $UNIX_DATE);

                       
                    $query001 = mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_outpatient` (`new`,`review`,`date`) VALUES ('$new','$review','$dat')");
                    if(!$query001){
                      echo $_SESSION['warn_outpatients'] = "{$Assign_Hospital}_outpatient Not Inserted!!!";
                    }
                      }

                      if($i <=26 && $i>=16){
                          echo $cataract3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//17

                          echo $glaucoma3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//18

                          echo $retina3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++; 
                          echo $pediatric3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++; 
                          echo $cornea3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++; 
                          echo $lasik3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++; 
                          echo $oculoplasty3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++; 
                       
                          echo $other_surgeries3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++; 
                          echo $sics3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++; 
                          echo $phaco3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++; 
                          echo $trab3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          

                          
                     


                                   //date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    echo '<br>';

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat2002 = gmdate("Y-m-d", $UNIX_DATE);

                          
                          
                          $query002 =   mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_surgeries` (`CATARACT`,`RETINA`, `GLAUCOMA`,`Pediatric_or_Squint`, `CORNEA_Pterygium` ,`Lasik_Surgery`,`Oculoplasty`,`OTHER_SURGERIES`,`Sics_Pterygium`,`Phaco_Pterygium`,`Trab_Pterygium`, `date`) VALUES ('$cataract3','$retina3','$glaucoma3','$pediatric3','$cornea3','$lasik3','$oculoplasty3','$other_surgeries3','$sics3','$phaco3','$trab3','$dat2002')");

                          if(!$query002){
                           echo $_SESSION['warn_surgeries'] = "{$Assign_Hospital}_surgeries Not Inserted!!!";
                          }
                     }
                      if($i <=38 && $i>=28){
                        echo $cataract4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//17

                              echo $glaucoma4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//18

                          echo $retina4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $pediatric4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $cornea4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $lasik4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $oculoplasty4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $other_surgeries4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $sics4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $phaco4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $trab4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                       
                     

                                 //date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    echo '<br>';

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat2003 = gmdate("Y-m-d", $UNIX_DATE);
                      

                        
                        $query003 =   mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_camp` (`CATARACT`,`RETINA`, `GLAUCOMA`,`Pediatric_or_Squint`, `CORNEA_Pterygium` ,`Lasik_Surgery`,`Oculoplasty`,`OTHER_SURGERIES`,`Sics_Pterygium`,`Phaco_Pterygium`,`Trab_Pterygium`, `date`) VALUES ('$cataract4','$retina4','$glaucoma4','$pediatric4','$cornea4','$lasik4','$oculoplasty4','$other_surgeries4','$sics4','$phaco4','$trab4','$dat2003')");
                        if(!$query003){
                          echo $_SESSION['warn_camp'] = "{$Assign_Hospital}_camp Not Inserted!!!";
                        }
                     
                     }
                      if($i == 41 || $i==40){
                          echo $paying_orbit_sot=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//27

                          echo $camp_orbit_sot=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      

                                   //date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    echo '<br>';

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat2004 = gmdate("Y-m-d", $UNIX_DATE);
                     

                           
                  
                          $query004 = mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_sot` (`paying_orbit_sot`,`camp_orbit_sot`,`date`) VALUES ('$paying_orbit_sot','$camp_orbit_sot','$dat2004')");

                          if(!$query004){
                           echo $_SESSION['warn_sot'] = "{$Assign_Hospital}_sot Not Inserted!!!";
                          }
                  
                     }
                  
                      if($i == 44 || $i==43){
                          echo $hospital_surgery=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//30

                          echo $train_surgery=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                       
                         

                                   //date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    echo '<br>';

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat2005 = gmdate("Y-m-d", $UNIX_DATE);
                    

                          $query005 = mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_lifeline_camp` (`hospital_surgery`,`train_surgery`,`date`) VALUES ('$hospital_surgery','$train_surgery','$dat2005')");

                          if(!$query005){
                           echo $_SESSION['warn_lifeline_camp'] = "{$Assign_Hospital}_lifeline_camp Not Inserted!!!";
                          }
                  
                     }
                  
                      if($i <=60 && $i>=48){
                          echo $treatment1=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//35

                          echo $treatment2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//36

                          echo $treatment3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//37

                          echo $treatment4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//38

                          echo $treatment5=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $treatment6=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $treatment7=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $treatment8=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $treatment9=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $treatment10=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $treatment11=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $treatment12=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $treatment13=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                       

                          //date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    echo '<br>';

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat2006 = gmdate("Y-m-d", $UNIX_DATE);

                          
                  
                          $query006 = mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_other_treatments` (`HFA`, `Yag_PI_Single_eye`,`Yag_PI_Both_eyes`,`Yag_Cap`,`CCT_Laser`,`B_scan_single_eye`,`B_scan_both_eye`,`OCT`,`FFA`,`PRP_Laser_Green_Laser`,`Penta_Cam`,`Fundus_Photo`,`Inj_Manitol_Eye_Wash`, `date`) VALUES ('$treatment1', '$treatment2', '$treatment3','$treatment4','$treatment5','$treatment6','$treatment7','$treatment8','$treatment9','$treatment10','$treatment11','$treatment12','$treatment13', '$dat2006')");

                          if(!$query006){
                            echo $_SESSION['warn_other_treatments'] = "{$Assign_Hospital}_other_treatments Not Inserted!!!";
                          }
                  
                     }
                     
                      if($i == 62 || $i==63){
                          
                          echo $gp = $sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;//42
                          echo $order1 = $sheet->getCellByColumnAndRow(1,$i)->getValue();
                          


         //date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    echo '<br>';

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat2007 = gmdate("Y-m-d", $UNIX_DATE);

                  
$query007 = mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_optical_Hospital` (`gp`,`order1`,`date`) VALUES ('$gp','$order1','$dat2007')"); 
if(!$query007){
  echo $_SESSION['warn_optical_hospital'] = "{$Assign_Hospital}_optical_hospital Not Inserted!!!";
}                    }
                      if($i==65){
                        
                          echo $total_camp=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $camp_name=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $total_op=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $total_ip=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $surgery_advice1=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $surgery_admission1=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $gp2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                          $i++;
                          echo $order2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                         



                          //date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    echo '<br>';

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat2008 = gmdate("Y-m-d", $UNIX_DATE);
                         
                            
                  
                          $query008 = mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_camp_details` (`total_camp`, `camp_name`, `total_op`, `total_ip`,`Surgery_Advice` ,`Surgery_Admission`,`gp`, `order1`, `date`) VALUES ('$total_camp', '$camp_name', '$total_op', '$total_ip',  '$surgery_advice1','$surgery_admission1', '$gp2', '$order2','$dat2008')");

                          if(!$query008){
                            echo $_SESSION['warn_camp_details'] = "{$Assign_Hospital}_camp_details Not Inserted!!!";
                          }
                          
                     }
                  
                     if($i <=87 && $i>=75){
                      echo $detail1=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;

                      echo $detail2=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;

                      echo $detail3=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;

                      echo $detail4=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;

                      echo $detail5=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;

                      echo $detail6=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;

                      echo $detail7=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;

                      echo $detail8=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;
                      echo $detail9=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;
                      echo $detail10=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;
                      echo $detail11=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;
                      echo $detail12=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                      $i++;

                     
                    
//date format changing

                    $EXCEL_DATE=$sheet->getCellByColumnAndRow(3,5)->getValue();

                    $UNIX_DATE = ($EXCEL_DATE - 25569) * 86400;

                    $dat2009 = gmdate("Y-m-d", $UNIX_DATE);



                      $query009 = mysqli_query($con,"INSERT INTO `{$Assign_Hospital}_revenue_statement` (`OP_Registration`,`OP_Treatment_Procedures`,`OP_Others`,`IP_Advance`,`OPTICAL`,`MEDICAL`,`CATARACT_CAMP`,`REFRACTION_CAMP`,`PHARMACY`,`LIFELINE_CAMP`, `CANTEEN`,`DONATIONS`, `date`) VALUES ('$detail1', '$detail2','$detail3','$detail4','$detail5','$detail6','$detail7','$detail8','$detail9','$detail10','$detail11','$detail12', '$dat2009')");

                      if(!$query009){
                       echo $_SESSION['warn_revenue_statement'] = "{$Assign_Hospital}_revenue_Statement Not Inserted!!!";
                      }
              
                 }
                  // echo $name=$sheet->getCellByColumnAndRow(0,$i)->getValue();
                  // $mobile=$sheet->getCellByColumnAndRow(1,$i)->getValue();
                  // $email=$sheet->getCellByColumnAndRow(2,$i)->getValue();
                  
                  // mysqli_query($con,"INSERT INTO `exc` (`name`,`mobile`,`email`) VALUES ('$name','$mobile','$email')");
                  $_SESSION['success_msg'] = "success";
      $_SESSION['success'] = "successfully inserted!!!";
      
                  
                     
              
          }
      }
  }
  else
  {
    $_SESSION['fail'] = "Invalid file format";
  }
  
  // if($query001 && $query002 && $query003 && $query004 && $query005 && $query006 && $query007 && $query008 && $query009)
  // {
      
      header('location:../admin/admin_update_report.php');
  // }
  // else
  // {
      // $_SESSION['fail_msg'] = "Failed";
      // $_SESSION['fail'] = "Not inserted!!!";
      // header('location:../task1/update_report.php');
  // }
  }
?>