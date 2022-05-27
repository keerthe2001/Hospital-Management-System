<?php
include 'user_create_register.php';
// session_start();
if(!isset($_SESSION['name'])){
  header('location:../index.php');
}


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Report Update</title>
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style1.css">
  <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  

<style>
#remove_fields {
  float: right;
}
</style>

<style>
.close_btn{
    display:hidden;
  }
</style>
</head>

<body class="">

<!-- header -->
<?php
include 'header.php';
?>
<?php
include 'admin_side_bar.php';
?>
  <!-- The Modal -->
 <div class="flex justify-center mt-10 sm:mt-0">
  <div class=" mb-20 mt-20 flex flex-col">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">
           
      </div>
    </div>
    <div class=" rounded ml-60 mt-5 md:mt-0 bg-white md:col-span-2 pt-10">
    <h1 class="text-2xl font-bold text-center pb-2 relative bottom-4">
              Update Report
            </h1>
            <?php
              // $qry= "SELECT * FROM Hospital";
              $qry2=" SELECT * from Hospital";
              // $s = mysqli_query($con,$qry);
              $s2 = mysqli_query($con,$qry2);
              
              // while($row1 = mysqli_fetch_array($s2)){
              //   if($row1[0] != $row1[1]){
              //     // echo $row1[0];
              //     echo $row1[1];
              //   }
              // }
 ?>  
    <form action="admin_update_report_form.php" method="post" enctype="multipart/form-data" class="p-5 bg-indigo-300">
      <h1 class="text-xl font-bold m-2 mb-2 relative bottom-3 ">
        Update Using Excel Form:
        <p class="text-sm italic font-light text-gray-900"> 
          (only .xlsx format excel sheet is supported)
        </p>
      </h1>
        <input type="file" name="doc" class="bg-yellow-300 p-2 rounded">
        <input type="submit" name="upload_excel" value="Upload"class="bg-yellow-300 p-2 rounded hover:shadow-xl ml-80">

        <label for="assign_hospital" class="p-2  mt-8 block text-md font-bold text-gray-700">
          Select Hospital: </label>

        <select   name="Assign_Hospital" id="" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
         <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Hospital--</option>'
            <?php while($row1 = mysqli_fetch_array($s2))
                    {
                     ?>
                             
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="<?php echo $row1[1];?>" ><?php echo $row1[1];?></option>
                              <?php 
                              }?>
                            </select>
                            
    </form>

      <form action="admin_update_report_form.php" method="POST">
      
        <div class="shadow-2xl   overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <h1 class="text-xl font-bold leading-6 text-gray-900 ">Fill-In Form</h1>
            <p class="mt-1 text-sm text-gray-600  pb-6">
              Update the records of the Hospital
            </p>
           
          <?php
   
    if(isset($_SESSION['success']))
          {
            ?>

<div id="cont"class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold pl-10"><?php
    echo $_SESSION['success_msg']?>!!</strong>
  <span class="block sm:inline ">
    <?php
    echo $_SESSION['success']?></span>
  <span id="cont" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="func1();">
    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>

<?php
unset($_SESSION['success']);
}
?>
          <?php
   
if(isset( $_SESSION['status']))
{
            ?>

<div id="cont"class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold pl-10"><?
  
    echo $_SESSION['success_msg']?>!!</strong>
  <span class="block sm:inline ">
    <?php
  
    echo $_SESSION['status']?></span>
  <span id="cont" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="func1();">
    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>

<?php
unset($_SESSION['status']);
}
?>

<?php
   
   if(isset( $_SESSION['fail']))
         {
           ?>
<div id="cont"class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold pl-10"><?php
    echo $_SESSION['fail_msg']?>!!</strong>
  <span class="block sm:inline ">
    <?php
    echo $_SESSION['fail']?></span>
  <span id="cont" class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="func1();">
    <svg class="fill-current h-6 w-6 text-red-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>


<?php
unset($_SESSION['fail']);
}
?>


<script>
function func1(){
document.getElementById("cont").remove();
}
</script>

<?php
                        // $qry= "SELECT * FROM Hospital";
                        $qry2=" SELECT * from Hospital";
              // $s = mysqli_query($con,$qry);
              $s2 = mysqli_query($con,$qry2);
              
            
              // while($row1 = mysqli_fetch_array($s2)){
              //   if($row1[0] != $row1[1]){
              //     // echo $row1[0];
              //     echo $row1[1];
              //   }
              // }



         ?>  
         <label for="assign_hospital" class="p-2  block text-md font-bold text-gray-700">
          Select Hospital: </label>
        <select   name="Assign_Hospital" id="" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
         <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Hospital--</option>'
            <?php while($row1 = mysqli_fetch_array($s2))
                    {
                     ?>
                             
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="<?php echo $row1[1];?>" ><?php echo $row1[1];?></option>
                              <?php 
                              }?>
                            </select>

            <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" autocomplete="given-name" class="h-6 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

        <div class="">
              <div id = "inside1" class="col-span-6 sm:col-span-3">
              <label for="out_patients" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700"> OUT PATIENTS:  

                <br>
                <br>

                <!-- <a href="#" id="add_more_fields" onclick="generate_table1();" class="  relative left-72  bg-blue-300 pl-2 pr-2 rounded-full font-bold text-2xl pl-3 pr-3 m-2">+</a>
                            
                <a href="#" id="remove_fields"  onclick="remove_table1();" class="relative left-72  bg-red-300 font-bold text-2xl pl-3 pr-3 rounded-full pl-3 pr-3 m-2">-</a> -->
              </label>
            
         
               
                        <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                          <label for="new"  class="block text-sm font-medium text-gray-700">New Patients</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="new" id="no_of_patients" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                       
                        
                        <label for="review"  class="block text-sm font-medium text-gray-700">Review Patients</label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="review" id="no_of_patients" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
<!--                      
             <label for=""  class="block text-sm font-medium text-gray-700">select period</label>
                        <select name="select_period1" id="select_period1" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                                <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" disabled selected >--Select Period--</option>
                                <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                                <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="this week" >This Week</option>
                                <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="this month" >This Month</option>
                                <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="last year" >Last year</option>
                                <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="this year" >This year</option>
                                <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="till date" >Till Date</option>
                            </select> -->
                       
                            <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                              <input type="number" value=""  name="other1" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <label for="date"  class="block text-sm font-medium text-gray-700">Date</label>
                          <input type="date" value=""  name="dat" id="dat" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    
              </div>
              <br>
            <div class="">
              <div id = "inside2" class="col-span-6 sm:col-span-3">
              <label for="surgery" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700">SURGERY:

                <!-- <a href="#" id="add_more_fields" onclick="generate_table2();" class="  relative left-8  bg-blue-300 pl-2 pr-2 rounded-full font-bold text-2xl ">+</a>
                            
                            <a href="#" id="remove_fields"  onclick="remove_table2();" class="bg-red-300 font-bold text-2xl pl-3 pr-3 rounded-full">-</a> -->
              </label>
             
                        <label for="new"  class="block text-sm font-medium text-gray-700">CATARACT</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="cataract" id="surgery_name1" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="retina"  class="block text-sm font-medium text-gray-700">RETINA</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="RETINA" id="retina" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    
                        <label for="new"  class="block text-sm font-medium text-gray-700">GLAUCOMA</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="glaucoma" id="GLAUCOMA" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">PEDIATRIC/SQUINT</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="Pediatric" id="pediatric" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    
                        <label for="new"  class="block text-sm font-medium text-gray-700">LASIC Surgery</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="Lasik" id="Lasik" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">Oculoplasty </label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="Oculoplasty" id="Oculoplasty" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">CORNEA (Pterygium)</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="CORNEA(Pterygium)" id="CORNEA(Pterygium)" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">Sics+Pterygium</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="Sics" id="CORNEA(Pterygium)" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">Phaco+Pterygium</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="Phaco" id="CORNEA(Pterygium)" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">Trab+Pterygium</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="Trab" id="CORNEA(Pterygium)" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  
                        <label for="new"  class="block text-sm font-medium text-gray-700">OTHER SURGERIES</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="other_surgeries" id="OTHER SURGERIES" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
               
                      
                     
                        <!-- <label for="new"  class="block text-sm font-medium text-gray-700">Select Period</label>
                          <select   name="select_period2" id="select_period2" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Period--</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Week</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Month</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Last year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Till Date</option>
                          </select> -->
                    
                     
                   
                   
                        <label for="new"  class="block text-sm font-medium text-gray-700">Date</label>
                          <input type="date" value=""  name="dat2" id="date" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                          <!-- <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                          <input type="number" value=""  name="other" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> -->
                    
              
              </div>
              <br>
            <div class="">
              <div id="inside3" class="col-span-6 sm:col-span-3">
                <label for="camp_total" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700">CAMP TOTAL:
                <!-- <a href="#" id="add_more_fields" onclick="generate_table3();" class="relative left-8 bg-blue-300 pl-2 pr-2 rounded-full font-bold text-2xl ">+</a>
                 -->
                <!-- <a href="#" id="remove_fields" onclick="remove_table3();" class=" bg-red-300 font-bold text-2xl pl-3 pr-3 rounded-full">-</a> -->
                </label>
            
                        <label for="new"  class="block text-sm font-medium text-gray-700">CATARACT</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="cataract1" id="surgery_name1" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="retina"  class="block text-sm font-medium text-gray-700">RETINA</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="RETINA" id="retina" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    
                        <label for="new"  class="block text-sm font-medium text-gray-700">GLAUCOMA</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="glaucoma1" id="GLAUCOMA" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">PEDIATRIC/SQUINT</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="pediatric" id="pediatric" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                    
                        <label for="new"  class="block text-sm font-medium text-gray-700">LASIC Surgery</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="Lasik" id="Lasik" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">Oculoplasty </label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="Oculoplasty" id="Oculoplasty" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">CORNEA (Pterygium)</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="CORNEA(Pterygium)1" id="CORNEA(Pterygium)" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">Sics+Pterygium</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="CORNEA(Pterygium)" id="CORNEA(Pterygium)" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        
                        <label for="new"  class="block text-sm font-medium text-gray-700">Phaco+Pterygium</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="CORNEA(Pterygium)" id="CORNEA(Pterygium)" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="new"  class="block text-sm font-medium text-gray-700">Trab+Pterygium</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="CORNEA(Pterygium)" id="CORNEA(Pterygium)" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  
                        <label for="new"  class="block text-sm font-medium text-gray-700">OTHER SURGERIES</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="other_surgeries1" id="OTHER SURGERIES" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                      
                        <!-- <label for="new"  class="block text-sm font-medium text-gray-700">Select Period</label>
                          <select   name="select_period3" id="select_period3" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Period--</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Week</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Month</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Last year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Till Date</option>
                          </select> -->
                    <!--  -->
                          <!-- <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                          <input type="number" value=""  name="other2" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"> -->
                        <label for="new"  class="block text-sm font-medium text-gray-700">Date</label>
                          <input type="date" value=""  name="dat3" id="date" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

              
              </div>
              

              <div class="col-span-6 sm:col-span-4">
                <label for="user_email" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700">SOT TOTAL 

:</label>
                <label for="paying_orbit_sot" class=" block text-sm font-medium text-gray-700">  PAYING - ORBIT (SOT) 
:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="paying_orbit_sot" id="paying_orbit_sot" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="camp_orbit_sot" class="block text-sm font-medium text-gray-700">  CAMP - ORBIT (SOT) 
:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="camp_orbit_sot" id="camp_orbit_sot" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <!-- <label for="select_period4" class="block text-sm font-medium text-gray-700">select period:</label>
                <select   name="select_period4" id="select_period4" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Period--</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Week</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Month</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Last year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Till Date</option>
        </select> -->
        <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                <input type="number" value=""  name="other3" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="date" class="block text-sm font-medium text-gray-700">date:</label>
                <input type="date" value="<?php echo $Ename; ?>"  name="dat4" id="date" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

              <div class="col-span-6 sm:col-span-4">
                <label for="user_email" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700">  LIFELINE CAMP TOTAL 
</label>
                <label for="hospital_surgery" class="block text-sm font-medium text-gray-700">  Hospital Surgery
 
:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="hospital_surgery" id="hospital_surgery" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="train_surgery" class="block text-sm font-medium text-gray-700">   Train Surgery 

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="train_surgery" id="train_surgery" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <!-- <label for="select_period5" class="block text-sm font-medium text-gray-700">select period:</label>
                <select   name="select_period5" id="select_period5" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Period--</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Week</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Month</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Last year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Till Date</option>
        </select> -->
        <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                  <input type="number" value=""  name="other4" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="date" class="block text-sm font-medium text-gray-700">date:</label>
                <input type="date" value="<?php echo $Ename; ?>"  name="dat5" id="date" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">


                <div class="">
              <div id="inside4" class="col-span-6 sm:col-span-3">
              <label for="camp_total" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700">OTHER TREATMENT:
              <!-- <a href="#" id="add_more_fields" onclick="generate_table4();" class="  relative left-8    bg-blue-300 pl-2 pr-2 rounded-full font-bold text-2xl ">+</a>
              
              <a href="#" id="remove_fields" onclick="remove_table4();" class=" bg-red-300 font-bold text-2xl pl-3 pr-3 rounded-full">-</a> -->
              </label>
              
                          <label for="new"  class="block text-sm font-medium text-gray-700">HFA</label>
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment1" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                     
                        <label for="review"  class="block text-sm font-medium text-gray-700">Yag PI (Single eye)</label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment2" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                       
                        <label for="review"  class="block text-sm font-medium text-gray-700">Yag PI (Both eyes)</label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment3" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        
                        <label for="review"  class="block text-sm font-medium text-gray-700">Yag Cap</label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment4" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                       
                        <label for="review"  class="block text-sm font-medium text-gray-700">CCT Laser</label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment5" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="review"  class="block text-sm font-medium text-gray-700">B_Scan_Single_Eye
                        </label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment6" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="review"  class="block text-sm font-medium text-gray-700">B_Scan_Both_Eye
                        </label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment7" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="review"  class="block text-sm font-medium text-gray-700">OCT
                        </label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment8" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="review"  class="block text-sm font-medium text-gray-700">FFA
                        </label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment9" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="review"  class="block text-sm font-medium text-gray-700">PRP LASER (GREEN LASER)
                        </label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment10" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="review"  class="block text-sm font-medium text-gray-700">PentaCam
                        </label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment11" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                        <label for="review"  class="block text-sm font-medium text-gray-700">Fundus Photo
                        </label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment12" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                       
                        <label for="review"  class="block text-sm font-medium text-gray-700">Inj. Manitol/Eye Wash etc.
                        </label>
                        
                        <input type="text" value="<?php echo $Ename; ?>"  name="treatment13" id="no_of_patients" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                       
                        <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                        <input type="number" value=""  name="other5" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                        <label for="review"  class="block text-sm font-medium text-gray-700">Date</label>
                          <input type="date" value=""  name="dat6" id="dat6" autocomplete="given-name" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                          <!-- <label for="select_period6" class="block text-sm font-medium text-gray-700">select period:</label>
                <select   name="select_period6" id="select_period6" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Period--</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Week</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Month</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Last year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Till Date</option>
        </select> -->
              </div>



              <div class="col-span-6 sm:col-span-4">
                <label for="user_email" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700"> OPTICAL HOSPITAL

</label>
                <label for="gp" class="block text-sm font-medium text-gray-700"> GP
 
:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="gp" id="gp" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="order" class="block text-sm font-medium text-gray-700">   ORDER

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="order1" id="order1" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <!-- <label for="select_period" class="block text-sm font-medium text-gray-700">select period:</label>
                <select   name="select_period7" id="select_period7" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Period--</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Week</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Month</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Last year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Till Date</option>
        </select> -->
        <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                  <input type="number" value=""  name="other6" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="date" class="block text-sm font-medium text-gray-700">date:</label>
                <input type="date" value="<?php echo $Ename; ?>"  name="dat7" id="date" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

              <div class="col-span-6 sm:col-span-4">
                <label for="user_email" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700"> CAMP DETAILS


</label>
                <label for="total_camp" class="block text-sm font-medium text-gray-700"> TOTAL CAMP

 
:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="total_camp" id="total_camp" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="camp_name" class="block text-sm font-medium text-gray-700">   Camp Name- 						

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="camp_name" id="camp_name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="total_op" class="block text-sm font-medium text-gray-700"> TOTAL OP

 
:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="total_op" id="total_op" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="total_ip" class="block text-sm font-medium text-gray-700">   TOTAL  IP


:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="Surgery Advice" id="total_ip" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="total_ip" class="block text-sm font-medium text-gray-700">   Surgery Advice


:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="Surgery Admission" id="total_ip" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="total_ip" class="block text-sm font-medium text-gray-700">  Surgery Admission


:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="total_ip" id="total_ip" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                <label for="gp2" class="block text-sm font-medium text-gray-700"> GP


:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="gp2" id="gp2" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="order2" class="block text-sm font-medium text-gray-700">   ORDER

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="order2" id="order2" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <!-- <label for="select_period8" class="block text-sm font-medium text-gray-700">select period:</label>
                <select   name="select_period8" id="select_period8" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Period--</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Week</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Month</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Last year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Till Date</option>
        </select> -->
        <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                  <input type="number" value=""  name="other7" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                <label for="date" class="block text-sm font-medium text-gray-700">date:</label>
                <input type="date" value="<?php echo $Ename; ?>"  name="dat8" id="date" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">


              <div class="">
              <div id="inside5" class="col-span-6 sm:col-span-3">
              <label for="user_name" class=" bg-indigo-300 p-2 mb-8 mt-8 block text-md font-bold text-gray-700">REVENUE STATEMENT
:</label>
<div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="camp_name" class="block text-sm font-medium text-gray-700">  OP COLLECTION(Registration) 						

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail1" id="OP COLLECTION" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="camp_name" class="block text-sm font-medium text-gray-700">  OP COLLECTION(Treatment Procedures) 						

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail2" id="OP COLLECTION" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="camp_name" class="block text-sm font-medium text-gray-700">  OP COLLECTION(Others) 						

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail3" id="OP COLLECTION" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="total_op" class="block text-sm font-medium text-gray-700"> IP Advance COLLECTION

 
:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="detail4" id="total_op" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="total_ip" class="block text-sm font-medium text-gray-700">   OPTICAL COLLECTION


:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail5" id="total_ip" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

                <label for="gp2" class="block text-sm font-medium text-gray-700"> MEDICAL COLLECTION


:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="detail6" id="gp2" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="order2" class="block text-sm font-medium text-gray-700">   CATARACT CAMP COLLECTION 

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail7" id="order2" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="order2" class="block text-sm font-medium text-gray-700">   REFRACTION CAMP COLLECTION

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail8" id="order2" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="order2" class="block text-sm font-medium text-gray-700">PHARMACY COLLECTION

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail9" id="order2" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="order2" class="block text-sm font-medium text-gray-700">   LIFELINE CAMP

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail10" id="order2" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="order2" class="block text-sm font-medium text-gray-700">   CANTEEN

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail11" id="order2" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="order2" class="block text-sm font-medium text-gray-700">   DONATIONS

:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="detail12" id="order2" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <!-- <label for="select_period9" class="block text-sm font-medium text-gray-700">select period:</label>
                <select   name="select_period9" id="select_period9" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Period--</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Today</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Week</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This Month</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Last year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >This year</option>
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="today" >Till Date</option>
        </select> -->
                <label for="date" class="block text-sm font-medium text-gray-700">date:</label>
                <input type="date" value="<?php echo $Ename; ?>"  name="dat9" id="date" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                <label for="other"  class="block text-sm font-medium text-gray-700">Other Details</label>
                          <input type="number" value=""  name="other8" id="other" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
          <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">

          <?php
            if($update == true)
            {
              ?>
            <button type="submit" name="update" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="">
              Update
              </button>
<?php
            }
            else
            {
?>
           
            <button type="submit" name="submit_admin" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="">
              Save
            </button>
<?php
            }
            ?>



          </div>
        </div>
      </form>
    </div>
  </div>
</div>





</body>

</html>