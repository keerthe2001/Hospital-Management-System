<?php
session_start();

include '../dbcon/dbcon.php';

if(!isset($_SESSION['user_name'])){
  header('location:../index.php');
}

// else{
//   header('location:../index.php');
// }
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <style>
    .dropdown:hover .dropdown-menu {
      display: block;
    }

  
    .test01 {
      display: none;
    }


    .test02 {
      display: none;
    }
    .viewtable1 {
      display: none;
    }
    .dropdown:focus-within .dropdown-menu {
      opacity: 1;
      transform: translate(0) scale(1);
      visibility: visible;
    }
    .outpatient{
      display:block;
    }
    .surgeries{
      display:none;
    }
    .camp{
      display:none;
    }
    .camp_details{
      display:none;
    }
    .lifeline_camp{
      display:none;
    }
    .optical_Hospital{
      display:none;
    }
    .other_treatments{
      display:none;
    }
    .revenue_statement{
      display:none;
    }
    .sot{
      display:none;
    }
  </style>


  <title> User Portal </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">

  <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->
  <link rel="stylesheet" href="../task1/css/style.css">
  <link rel="stylesheet" href="../task1/css/style1.css">
  <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
  

  <!-- for the pie chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <?php 
$ABC = mysqli_query($con,"SELECT * FROM Hospital");
$num_rows = mysqli_num_rows($ABC);

if($num_rows > 0)
{

  $user_name=$_SESSION['user_name'];
      $db3 = "SELECT * FROM user WHERE user_name = '$user_name'";
    
      $s6 = mysqli_query($con,$db3);
      
    //   $result = mysqli_fetch_array($s);
      if(!$s6){
        echo "<h3>No username Found</h3>";
      }
      // echo $result;
      else{
      $result6 = mysqli_fetch_array($s6);
      $Assign_Hospital= $result6['Assign_Hospital'];
      }

?>
 

 <?php 

$hosname_bar_graph = $Assign_Hospital;
$Result_db9 = mysqli_query($con,"SELECT * FROM `$hosname_bar_graph`");
$col_hos_single = mysqli_num_fields($Result_db9);
$a=1;
$b=9;
while($data_admin_bar_graph_single = mysqli_fetch_array($Result_db9))
{
  if($a<=9)
  {
    $col_db_name = $data_admin_bar_graph_single[10];
  }
  else{
    break;
  }
?>


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
google.charts.setOnLoadCallback(<?php
   echo ('drawChart' . $b);
?>
)
function 
<?php
   echo ('drawChart' . $b);
  ?>() {
var data = google.visualization.arrayToDataTable([
 ['Total data',  

<?php
$title_Result_db = mysqli_query($con,"SELECT * FROM `$hosname_bar_graph`");
while($data_title = mysqli_fetch_array($title_Result_db))
{
    if($data_title[$a]!=NULL)
    {
?>
'<?php
echo $data_title[$a];
?>',
<?php
}
}
?>
  ],
<?php
for($h=0;$h<=15;$h++)
{
$sum9[$h]=0;
}
$result_db_single9 = mysqli_query($con, "SELECT * FROM `$hosname_bar_graph`");
$n=0;
while($data_db_single9 = mysqli_fetch_array($result_db_single9))
{
if($data_db_single9[$a] != NULL)
{
$col_name9[$n] = $data_db_single9[$a];
$result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `{$hosname_bar_graph}_$col_db_name`");

$result_db_each_one9 = mysqli_fetch_array($result_db_each9);
$sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
  $n++;
}
}


?>
    ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
echo $sum9[$j];
if($j!=$n-1)
{
echo ',';
}
}
?>

],  
  ]);
  var options = {
    chart: {
      title: 'Patient Details',
      subtitle: '',
    },
    bars: 'vertical' // Required for Material Bar Charts.
  };
  var chart = new google.charts.Bar(document.getElementById('<?php
   echo ('barchart_material' . $b);
?>'));

 chart.draw(data, google.charts.Bar.convertOptions(options));
} 


</script>

<?php
$b++;
$a++;
}
}


?>


</head>

<body>

<?php
include 'user_header.php';
?>
<?php
include 'user_side_bar.php';
?>

  <div class="max-w-full">
 
    <div class="sm:flex sm:space-x-4  relative top-20 ml-72">
      <?php
if(isset($_SESSION['database'])){
  echo $_SESSION['database'];
}
?>
      <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all w-20 sm:w-48 h-20 ">
        <div class="bg-white p-4">
          <div class="sm:flex sm:items-start">
            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
              <h3 class="text-xs leading-6 font- text-gray-400">Total Patients</h3>
              <p class="text-md font-bold text-black">

              <?php
                    $user_name=$_SESSION['user_name'];
                        $db3 = "SELECT * FROM user WHERE user_name = '$user_name'";
                      
                        $s6 = mysqli_query($con,$db3);
                        
                      //   $result = mysqli_fetch_array($s);
                        if(!$s6){
                          echo "<h3>No username Found</h3>";
                        }
                        // echo $result;
                        else{
                      
                        $result6 = mysqli_fetch_array($s6);
                        $Assign_Hospital= $result6['Assign_Hospital'];

                        }
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  $h++;
                  }
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$Assign_Hospital`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[1] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[1];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `{$Assign_Hospital}_outpatient`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                  
                  echo $sum9[0];
             
                ?>       
              </p>
            </div>
          </div>
        </div>
      </div>
      <div
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all w-20 sm:w-48 h-20 ">
        <div class="bg-white p-4">
          <div class="sm:flex sm:items-start">
            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
              <h3 class="text-xs leading-6 font- text-gray-400">Total surgeries</h3>
              <p class="text-md font-bold text-black">
                
              
<?php
                    $user_name=$_SESSION['user_name'];
                        $db3 = "SELECT * FROM user WHERE user_name = '$user_name'";
                      
                        $s6 = mysqli_query($con,$db3);
                        
                      //   $result = mysqli_fetch_array($s);
                        if(!$s6){
                          echo "<h3>No username Found</h3>";
                        }
                        // echo $result;
                        else{
                      
                        $result6 = mysqli_fetch_array($s6);
                        $Assign_Hospital= $result6['Assign_Hospital'];
                        }
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  $h++;
                  }
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$Assign_Hospital`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[2] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[2];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `{$Assign_Hospital}_surgeries`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                  
                  echo $sum9[0];
             
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all w-20 sm:w-48 h-20 ">
        <div class="bg-white p-4">
          <div class="sm:flex sm:items-start">
            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
              <h3 class="text-xs leading-6 font- text-gray-400">Lifeline camp</h3>
              <p class="text-md font-bold text-black">
                
              <?php
                    $user_name=$_SESSION['user_name'];
                        $db3 = "SELECT * FROM user WHERE user_name = '$user_name'";
                      
                        $s6 = mysqli_query($con,$db3);
                        
                      //   $result = mysqli_fetch_array($s);
                        if(!$s6){
                          echo "<h3>No username Found</h3>";
                        }
                        // echo $result;
                        else{
                      
                        $result6 = mysqli_fetch_array($s6);
                        $Assign_Hospital= $result6['Assign_Hospital'];

                        }
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  $h++;
                  }
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$Assign_Hospital`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[5] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[5];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `{$Assign_Hospital}_lifeline_camp`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                  
                  echo $sum9[0];
             
                ?>  
              </p>
            </div>
          </div>
        </div>
      </div>
      <div
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all w-20 sm:w-48 h-20 mr-20">
        <div class="bg-white p-4">
          <div class="sm:flex sm:items-start">
            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
              <h3 class="text-xs leading-6 font- text-gray-400">Other Treatments</h3>
              <p class="text-md font-bold text-black">   <?php
                    $user_name=$_SESSION['user_name'];
                        $db3 = "SELECT * FROM user WHERE user_name = '$user_name'";
                      
                        $s6 = mysqli_query($con,$db3);
                        
                      //   $result = mysqli_fetch_array($s);
                        if(!$s6){
                          echo "<h3>No username Found</h3>";
                        }
                        // echo $result;
                        else{
                      
                        $result6 = mysqli_fetch_array($s6);
                        $Assign_Hospital= $result6['Assign_Hospital'];

                        }
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  $h++;
                  }
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$Assign_Hospital`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[7] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[7];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `{$Assign_Hospital}_other_treatments`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                  
                  echo $sum9[0];
             
                ?>  
              </p></p>
            </div>
          </div>
        </div>
      </div>
      <div
        class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-2xl transform transition-all w-20 sm:w-48 h-20 mr-20">
        <div class="bg-white p-4">
          <div class="sm:flex sm:items-start">
            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
              <h3 class="text-xs leading-6 font- text-gray-400">Optical Hospital</h3>
              <p class="text-md font-bold text-black">   <?php
                    $user_name=$_SESSION['user_name'];
                        $db3 = "SELECT * FROM user WHERE user_name = '$user_name'";
                      
                        $s6 = mysqli_query($con,$db3);
                        
                      //   $result = mysqli_fetch_array($s);
                        if(!$s6){
                          echo "<h3>No username Found</h3>";
                        }
                        // echo $result;
                        else{
                      
                        $result6 = mysqli_fetch_array($s6);
                        $Assign_Hospital= $result6['Assign_Hospital'];

                        }
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  $h++;
                  }
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$Assign_Hospital`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[6] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[6];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `{$Assign_Hospital}_optical_Hospital`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                  
                  echo $sum9[0];
             
                ?>  
              </p></p>
            </div>
          </div>
        </div>
      </div>


    </div>
  </div>

  </div>


  <div style="width:83%;" class="float-right p-4">
    <div class="container p-5">
      <form action="../user/user_home.php" class="">
      <input type="date" class="w-1/4 shadow-2xl h-10 w-1/4 pr-8 pl-5 rounded z-0 focus:outline-none" placeholder="Search anything..." name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>">
          <button class="mt-10 ml-8 bg-gray-300 shadow-2xl h-10 w-32 pr-8 pl-5 rounded z-0 focus:outline-none" type="submit"  >search</button>

          <div class="dropdown inline-block relative">
            <button class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
              <span class="mr-1">data Format</span>
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
            </button>
            <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
              <li onclick="myFunction1()"
                class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">tabular</li>
              <!-- <li onclick="myFunction2()" class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">
                piechart</li> -->
              <li onclick="myFunction3()"
                class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">bar graph</li>
            </ul>
          </div>
          </form>
<!-- component -->
<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

<!-- This is an example component -->
<div class="mx-auto float-right relative bottom-10">
 
    <!-- Modal toggle -->
    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font- rounded-lg text-xs px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
      Sort/Filter
    </button>

    <!-- Main modal -->
    <div id="authentication-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-xs p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <form method="GET" class="space-y-4 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="../user/user_home.php">
                    <h3 class="text-xl text-center font- text-gray-900 dark:text-white">Sort/Filter</h3>


    <label for="sort">Sort:</label>
   <select name="date_sort" id="date_change" class=" mr-2 h-9 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs " onchange="datechange()">
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
              value="" selected disabled>Sort</option>
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
              value="none">None</option>
            <!-- <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
              value="single_date">Single Date </option> -->
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
              value="date_range">Date Range</option>
                
          </select>
<!-- <section id="test" class="test01" >
<label for="sing_Date">single date</label>
<input type="date" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
</section> -->
<section id="test1" class="test02" >
<label for="sing_Date">From</label>
<input type="date" name="from_date" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
<label for="sing_Date">To</label>
<input type="date" name="to_date" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs">
</section>
    <!-- <label for="sort">Data Type:</label>
   <select name="Hospital_sort" id=""
            class=" mr-2 h-9 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs" onchange="">
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
              value="" selected disabled>Data Type</option>
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
              value="Single Date">Single Date </option>
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-xs"
              value="Date Range">Date Range</option>
                
          </select> -->
<script>

function datechange() {
var x = document.getElementById("date_change").value;
// if(x=="single_date"){
//  document.getElementById("test").style.display="block";
//  document.getElementById("test1").style.display="none";
// }
if(x=="date_range"){
  document.getElementById("test1").style.display="none";
 document.getElementById("test1").style.display="block";
}
}
</script>
          
  
                    <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font- rounded-lg text-xs px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit_filter">Filter</button>
                    
                </form>
            </div>
        </div>
 

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>

</div>
</div>
<div>
</div>
  


<div id="viewbar" style="display:inline-block" class="relative
ml-4 top-10">
    <table class="divide-y divide-gray-200 border border-slate-400">
      <thead>
        <h1 class="text-center font-bold text-2xl">
          Total Report
        </h1>
      </thead>
      <tbody>

 <tr>
 <td>   
              <div class="mt-5" id="barchart_material9" style="width: 380px; height:500px;"></div>
          </td>
          <td>  
              <div class="mt-5 ml-20" id="barchart_material10" style="width:380px; height: 600px;"></div>
          </td>
        </tr>

        <tr>
          <td>   
            <div class="mt-5" id="barchart_material11" style="width: 380px; height: 600px;"></div>
          </td>

          <td>   
            <div class="mt-5 ml-20" id="barchart_material12" style="width: 380px; height: 400px;">
            </div>
          </td>
        </tr>

        <tr>
          <td>  
              <div class="mt-5" id="barchart_material13" style="width: 380px; height: 400px;">
              </div>
          </td>

          <td> 
              <div class="mt-5 ml-20" id="barchart_material14" style="width: 420px; height: 400px;">
                </div>
          </td> 
       </tr>

        <tr>
          <td>   
              <div class="mt-5" id="barchart_material15" style="width: 380px; height: 500px;">
              </div>
          </td>
          <td>  
              <div class="mt-5 ml-20" id="barchart_material16" style="width: 450px; height: 500px;">
              </div>
          </td>

        </tr>

        <tr>
          <td>   
              <div class="mt-5" id="barchart_material17" style="width: 400px; height: 400px;">
              </div>
          </td>
 </tr>

      </tbody>
    </table>
</div>


<div id="viewtable" class="viewtable1">
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="container overflow-y-auto">
          <select name="category" id="select_category" class="" onchange="category()">
                  <option class="" value="" disabled >Select Category</option>
                  <option class="" value="outpatient" selected>outpatient</option>
                  <option class="" value="surgeries" >surgeries</option>
                  <option class="" value="camp" >camp</option>
                  <option class="" value="camp_details" >camp_details</option>
                  <option class="" value="lifeline_camp" >lifeline_camp</option>
                  <option class="" value="optical_Hospital" >optical_Hospital</option>
                  <option class="" value="other_treatments" >other_treatments</option>
                  <option class="" value="revenue_statement" >revenue_statement</option>
                  <option class="" value="sot" >sot</option>
    
              </select>
         
   
<?php
$user_name=$_SESSION['user_name'];
$db3 = "SELECT * FROM user WHERE user_name = '$user_name'";

$s6 = mysqli_query($con,$db3);

//   $result = mysqli_fetch_array($s);
if(!$s6){
  echo "<h3>No username Found</h3>";
}
// echo $result;
else{
$result6 = mysqli_fetch_array($s6);
$Assign_Hospital= $result6['Assign_Hospital'];
}


if(isset($_GET['date_sort']))
{
  if($_GET['date_sort'] == 'date_range' )
  {
    if(isset($_GET['from_date'])  && isset($_GET['to_date']))
    {
      $from_date = $_GET['from_date'];
      $to_date = $_GET['to_date'];
    
?>

<h1 class="mt-2 mb-2 p-2 font-bold text-2xl bg-indigo-400 text-center">
  <?php echo $Assign_Hospital;?> sorted Details
</h1>


<?php
        $r0 = mysqli_query($con,"SELECT * FROM `$Assign_Hospital`");
        $j=1;
        while($d0 = mysqli_fetch_array($r0))
        {
          if($j<=9){

            $hname = $d0[10];
          }
          else{
            break;
          }
          ?>
<div class="<?php echo $hname;?> container overflow-x-auto">
<h1 class="mt-2 mb-2 p-2 font-bold text-2xl bg-green-100">
  <?php echo $hname;?>
</h1>
<table class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
<thead>
  <tr>
<th>No.</th>
      <?php
          $r1 = mysqli_query($con,"SELECT * FROM `$Assign_Hospital`");
          
          while($d1 = mysqli_fetch_array($r1))
          {
          
              if($d1[$j] != NULL)
              {
                ?>
                <th><?php echo $d1[$j];?></th>

                <?php

              }
              else
              {
                continue;
              }
              
          }
          
      ?>
     <th>date</th>
     <th>updated time</th>
</tr>
    </thead>
    <tbody>
      <?php
    
          $r2 = mysqli_query($con,"SELECT * FROM `{$Assign_Hospital}_$hname` WHERE date BETWEEN  '$from_date' AND '$to_date' ");
          $col_h = mysqli_num_fields($r2);
          $k=0;
          $nuurow = mysqli_num_rows($r2);

          while($d2 = mysqli_fetch_array($r2))
          {
            ?>
            <tr>
            <?php
            if($d2[$k] != NULL)
            {
              for($n=0;$n<=$col_h-1;$n++)
              {
                // if($d2[$n] != NULL)
                // {
              ?>
               <td>
                     
                            <?php echo $d2[$n];?>
                     
                </td>

              <?php
                // }
              }
            }
            else
            {
              continue;
            }
            ?>
</tr>
            <?php
          }
          $j++;
        
          ?>
</tbody>
</table>
        </div>
          <?php
        }
       
      
    }
  }
}
      ?>
            <?php
if(isset($_GET['search']))
    {
      $filterdata = $_GET['search'];
      $r = mysqli_query($con,"SELECT * FROM `Hospital`");
      $i=0;
    
        
        ?>

<h1 class="mt-2 mb-2 p-2 font-bold text-2xl bg-indigo-400 text-center">
  <?php echo $Assign_Hospital;?> searched Details
</h1>


<?php
        $r0 = mysqli_query($con,"SELECT * FROM `$Assign_Hospital`");
        $j=1;
        while($d0 = mysqli_fetch_array($r0))
        {
          if($j<=9)
          {
            $hname = $d0[10];
        }
        else{
          break;
            }
          ?>
<div class="<?php echo $hname;?> container overflow-x-auto">
<h1 class="mt-2 mb-2 p-2  text-xl bg-green-100">
  <?php echo $hname;?>
</h1>
<table class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
<theads>
  <tr>
<th>No.</th>
      <?php
          $r1 = mysqli_query($con,"SELECT * FROM `$Assign_Hospital`");
          
          while($d1 = mysqli_fetch_array($r1))
          {
          
              if($d1[$j] != NULL)
              {
                ?>
                <th><?php echo $d1[$j];?></th>

                <?php

              }
              else
              {
                continue;
              }
              
          }
          
      ?>
     <th>date</th>
     <th>updated time</th>
</tr>
    </thead>
    <tbody>
      <?php
    
          $r2 = mysqli_query($con,"SELECT * FROM `{$Assign_Hospital}_$hname` WHERE date LIKE '%$filterdata%' ");
          $col_h = mysqli_num_fields($r2);
          $k=0;
          $nurow = mysqli_num_rows($r2);



          while($d2 = mysqli_fetch_array($r2))
          {
            ?>
            <tr>
            <?php
            if($d2[$k] != NULL)
            {
              for($n=0;$n<=$col_h-1;$n++)
              {
                // if($d2[$n] != NULL)
                // {
              ?>
               <td>
                            <?php echo $d2[$n];?>
                     

              <?php
                // }
              }
            }
            else
            {
              continue;
            }
            ?>
</tr>
            <?php
          }
          $j++;
        
          ?>
</tbody>
</table>
</div>

          <?php
        }
    
    }
      ?>


    <!-- <div id="viewpie" class="viewpie_inactive mt-10" style="display:flex; justify-content:center;">
      <div id="piechart4" style="width: 700px; height: 400px;"></div>
      <div id="piechart5" style="width: 700px; height: 400px;"></div>

    </div> -->

<?php

$hosname = $Assign_Hospital;
$result_req = mysqli_query($con,"SELECT * FROM `$hosname`");
$col_admin_single = mysqli_num_fields($result_req);
$m=1;
?>
<div id="Hosp">
<h1 class="mt-2 mb-2 p-2 font-bold text-2xl bg-indigo-400 text-center">
  <?php echo $hosname;?>
</h1>
<?php
while($data_req = mysqli_fetch_array($result_req))   
{
  if($m<=9)
  {
    $dbreq = $data_req[10];
  }
  else{
    break;
  }

?>

<div  class="<?php echo $dbreq;?> container  overflow-x-auto">
  <h1 class="mt-2 mb-2 bg-green-100  text-xl">
  
  <?php
  echo $dbreq;?> Details
  </h1>

  <table class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                    <th> No.</th>
 
                    <?php 
                   $result_admin_tbl_head_outpatient_single = mysqli_query($con,"SELECT * FROM `$hosname`");
                   while($data_admin_tbl_head_outpatient_single = mysqli_fetch_array($result_admin_tbl_head_outpatient_single))
                   {
                      if($data_admin_tbl_head_outpatient_single[$m] != NULL)
                      {
                        ?>
                        <th><?php echo $data_admin_tbl_head_outpatient_single[$m];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   
                   }
                 
                 ?>

                           <!-- <th scope="col"
                      class="px-6 py-3 text-center text-xs font- text-gray-500 uppercase tracking-wider">Date</th>
                    
                    <th scope="col"
                      class="px-6 py-3 text-center text-xs font- text-gray-500 uppercase tracking-wider">
                      Action
                    </th> -->
                    
                    <th>
                      Date
                    </th>
                    <th>
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_outpatient_single_admin_tbldata = mysqli_query($con,"SELECT * FROM `{$hosname}_{$dbreq}`");

$col_outpatient_single_admin = mysqli_num_fields($qryrun_outpatient_single_admin_tbldata);

$result_outpatient_single_admin_check = mysqli_num_rows($qryrun_outpatient_single_admin_tbldata);

if($result_outpatient_single_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Data Found!!</strong>
        <span class='block sm:inline '> Details are not updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_outpatient_single_admin_tbldata = mysqli_fetch_array($qryrun_outpatient_single_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_outpatient_single_admin-1;$l++)
    {
      // if($result_outpatient_single_admin_tbldata[$l] != NULL)
      // {
    ?>
  
                    <td>
                    
                            <?php echo $result_outpatient_single_admin_tbldata[$l];?>
                         
                    </td>

  <?php
      // }
   }
  ?>
    </tr>
  <?php
 
  }
}
?>
</tbody>
</table>
</div>
<?php
 $m++;
}
?>
</div>
            </div>
          </div>
        </div>
      </div>
</div>




   
<script>
function category(){

var category = document.getElementById("select_category").value;
var outpatient = document.getElementsByClassName('outpatient');
var surgeries = document.getElementsByClassName('surgeries');
var camp = document.getElementsByClassName('camp');
var camp_details = document.getElementsByClassName('camp_details');
var lifeline_camp = document.getElementsByClassName('lifeline_camp');
var optical_Hospital = document.getElementsByClassName('optical_Hospital');
var other_treatments = document.getElementsByClassName('other_treatments');
var revenue_statement = document.getElementsByClassName('revenue_statement');
var sot = document.getElementsByClassName('sot');

if(category == 'outpatient')
{
  $limit = document.getElementsByClassName('outpatient').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "block";
  surgeries[$m].style.display = "none";
  camp[$m].style.display = "none";
  camp_details[$m].style.display = "none";
  lifeline_camp[$m].style.display = "none";
  optical_Hospital[$m].style.display = "none";
  other_treatments[$m].style.display = "none";
  revenue_statement[$m].style.display = "none";
  sot[$m].style.display = "none";
  }
}
else if(category == 'surgeries')
{
  $limit = document.getElementsByClassName('surgeries').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "none";
  surgeries[$m].style.display = "block";
  camp[$m].style.display = "none";
  camp_details[$m].style.display = "none";
  lifeline_camp[$m].style.display = "none";
  optical_Hospital[$m].style.display = "none";
  other_treatments[$m].style.display = "none";
  revenue_statement[$m].style.display = "none";
  sot[$m].style.display = "none";
  }
}
else if(category == 'camp')
{
  $limit = document.getElementsByClassName('camp').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "none";
  surgeries[$m].style.display = "none";
  camp[$m].style.display = "block";
  camp_details[$m].style.display = "none";
  lifeline_camp[$m].style.display = "none";
  optical_Hospital[$m].style.display = "none";
  other_treatments[$m].style.display = "none";
  revenue_statement[$m].style.display = "none";
  sot[$m].style.display = "none";
  }
}
else if(category == 'camp_details')
{
  $limit = document.getElementsByClassName('camp_details').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "none";
  surgeries[$m].style.display = "none";
  camp[$m].style.display = "none";
  camp_details[$m].style.display = "block";
  lifeline_camp[$m].style.display = "none";
  optical_Hospital[$m].style.display = "none";
  other_treatments[$m].style.display = "none";
  revenue_statement[$m].style.display = "none";
  sot[$m].style.display = "none";
  }
}
else if(category == 'lifeline_camp')
{
  $limit = document.getElementsByClassName('lifeline_camp').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "none";
  surgeries[$m].style.display = "none";
  camp[$m].style.display = "none";
  camp_details[$m].style.display = "none";
  lifeline_camp[$m].style.display = "block";
  optical_Hospital[$m].style.display = "none";
  other_treatments[$m].style.display = "none";
  revenue_statement[$m].style.display = "none";
  sot[$m].style.display = "none";
  }
}
else if(category == 'optical_Hospital')
{
  $limit = document.getElementsByClassName('optical_Hospital').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "none";
  surgeries[$m].style.display = "none";
  camp[$m].style.display = "none";
  camp_details[$m].style.display = "none";
  lifeline_camp[$m].style.display = "none";
  optical_Hospital[$m].style.display = "block";
  other_treatments[$m].style.display = "none";
  revenue_statement[$m].style.display = "none";
  sot[$m].style.display = "none";
  }
}
else if(category == 'other_treatments')
{
  $limit = document.getElementsByClassName('other_treatments').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "none";
  surgeries[$m].style.display = "none";
  camp[$m].style.display = "none";
  camp_details[$m].style.display = "none";
  lifeline_camp[$m].style.display = "none";
  optical_Hospital[$m].style.display = "none";
  other_treatments[$m].style.display = "block";
  revenue_statement[$m].style.display = "none";
  sot[$m].style.display = "none";
  }
}
else if(category == 'revenue_statement')
{
  $limit = document.getElementsByClassName('revenue_statement').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "none";
  surgeries[$m].style.display = "none";
  camp[$m].style.display = "none";
  camp_details[$m].style.display = "none";
  lifeline_camp[$m].style.display = "none";
  optical_Hospital[$m].style.display = "none";
  other_treatments[$m].style.display = "none";
  revenue_statement[$m].style.display = "block";
  sot[$m].style.display = "none";
  }
}
else if(category == 'sot')
{
  $limit = document.getElementsByClassName('sot').length;
  for($m=0;$m<$limit;$m++)
  {
  outpatient[$m].style.display = "none";
  surgeries[$m].style.display = "none";
  camp[$m].style.display = "none";
  camp_details[$m].style.display = "none";
  lifeline_camp[$m].style.display = "none";
  optical_Hospital[$m].style.display = "none";
  other_treatments[$m].style.display = "none";
  revenue_statement[$m].style.display = "none";
  sot[$m].style.display = "block";
  }
}




  }
</script>

<script>
      function myFunction1() 
      {
        var y = document.getElementsByClassName("viewtable1")[0];
          y.style.display = "block";
        var v = document.getElementById("viewbar");
        v.style.display = "none";

        <?php

        if(isset($_GET['search']) || isset($_GET['date_sort']))
        {
          ?>
          var z = document.getElementById("Hosp");
          z.style.display = "none";
          <?php

        }
        else{
          ?>
          var z = document.getElementById("Hosp");
          z.style.display = "block";
          <?php

        }
        ?>
      }
      
    

       
      
      // function myFunction2() {

      //   var y = document.getElementById("viewtable");
      //   var z = document.getElementById("viewpie");
      //   var v = document.getElementById("viewbar");

      //   if (z.style.display === "none") {
      //     z.style.display = "flex";


      //     v.style.display = "none";
      //     y.style.display = "none";
      //   } else {
      //     z.style.display = "none";
      //   }


      // }
      function myFunction3() {

        var y = document.getElementsByClassName('viewtable1')[0];
          y.style.display = "none";
        var v = document.getElementById("viewbar");
        v.style.display = "block";
      }

    </script>

</body>

</html>