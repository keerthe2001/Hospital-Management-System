<?php
session_start();
error_reporting(0);

include '../dbcon/dbcon.php';

if(!isset($_SESSION['name'])){
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
    /* #viewbar_Hospital {
  display: none;
} */

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


  <title> AdminPortal </title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap5.min.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css">


  <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">

  <!-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> -->

  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style1.css">

  <!-- for the pie chart -->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<?php 

$ABC = mysqli_query($con,"SELECT * FROM Hospital");
$num_rows = mysqli_num_rows($ABC);

if($num_rows > 0)
{
?>
<!-- for the admin page -->
<?php if(isset($_SESSION['name']))
{

?>
 <script type="text/javascript">
    google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart10);

    function drawChart10() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php
$title_Result_db12 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db = mysqli_fetch_array($title_Result_db12))
{
    $data_title_d[0] =  $data_title_db['Hospital_name'];
    $title_Result_db = mysqli_query($con,"SELECT * FROM `$data_title_d[0]`");
    while($data_title = mysqli_fetch_array($title_Result_db))
    {
        if($data_title[1]!=NULL)
        {
?>



'<?php
echo $data_title[1];
?>',
<?php
    }
}
    break;
}
    ?>

      ],

      <?php

$result_db = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum[$h] = 0;

$h++;
}
while($data_db = mysqli_fetch_array($result_db))
{
  $select_db_single[$i] = $data_db['Hospital_name'];
  $result_db_single = mysqli_query($con, "SELECT * FROM `$select_db_single[$i]`");
  $n=0;
  while($data_db_single = mysqli_fetch_array($result_db_single))
  {
	  if($data_db_single[1] != NULL)
	  {
    $col_name[$n] = $data_db_single[1];
    $result_db_each = mysqli_query($con, "SELECT SUM($col_name[$n]) as $col_name[$n] FROM `$select_db_single[$i]_outpatient`");

	  $result_db_each_one = mysqli_fetch_array($result_db_each);
	  $sum[$n] = $sum[$n] + $result_db_each_one["$col_name[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total data', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum[$j];
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
      var chart = new google.charts.Bar(document.getElementById('barchart_material9'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }


</script>



<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart11);

    function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db2 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db2 = mysqli_fetch_array($Result_db2))
{
     $data_title_d2[0] =  $data_title_db2['Hospital_name'];
    $title_Result_db2 = mysqli_query($con,"SELECT * FROM `$data_title_d2[0]`");
    while($data_title2 = mysqli_fetch_array($title_Result_db2))
    {
        if($data_title2[2]!=NULL)
        {
?>



'<?php
echo $data_title2[2];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db2 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum2[$h] = 0;

$h++;
}
while($data_db2 = mysqli_fetch_array($result_db2))
{
  $select_db_single2[$i] = $data_db2['Hospital_name'];
  $result_db_single2 = mysqli_query($con, "SELECT * FROM `$select_db_single2[$i]`");
  $n=0;
  while($data_db_single2 = mysqli_fetch_array($result_db_single2))
  {
	  if($data_db_single2[2] != NULL)
	  {
    $col_name2[$n] = $data_db_single2[2];
    $result_db_each = mysqli_query($con, "SELECT SUM($col_name2[$n]) as $col_name2[$n] FROM `$select_db_single2[$i]_surgeries`");

	  $result_db_each_one2 = mysqli_fetch_array($result_db_each);
	  $sum2[$n] = $sum2[$n] + $result_db_each_one2["$col_name2[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum2[$j];
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
          title: 'Surgery Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material10'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }


</script>

<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart11);

    function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db3 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db3 = mysqli_fetch_array($Result_db3))
{
    $data_title_d3[0] =  $data_title_db3['Hospital_name'];
    $title_Result_db3 = mysqli_query($con,"SELECT * FROM `$data_title_d3[0]`");
    while($data_title3 = mysqli_fetch_array($title_Result_db3))
    {
        if($data_title3[3]!=NULL)
        {
?>



'<?php
echo $data_title3[3];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db3 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum3[$h] = 0;

$h++;
}
while($data_db3 = mysqli_fetch_array($result_db3))
{
  $select_db_single3[$i] = $data_db3['Hospital_name'];
  $result_db_single3 = mysqli_query($con, "SELECT * FROM `$select_db_single3[$i]`");
  $n=0;
  while($data_db_single3 = mysqli_fetch_array($result_db_single3))
  {
	  if($data_db_single3[3] != NULL)
	  {
    $col_name3[$n] = $data_db_single3[3];
    $result_db_each3 = mysqli_query($con, "SELECT SUM($col_name3[$n]) as $col_name3[$n] FROM `$select_db_single3[$i]_camp`");

	  $result_db_each_one3 = mysqli_fetch_array($result_db_each3);
	  $sum3[$n] = $sum3[$n] + $result_db_each_one3["$col_name3[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum3[$j];
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
          title: 'Camp Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material11'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }


</script>


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart11);

    function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db4 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db4 = mysqli_fetch_array($Result_db4))
{
    $data_title_d4[0] =  $data_title_db4['Hospital_name'];
    $title_Result_db4 = mysqli_query($con,"SELECT * FROM `$data_title_d4[0]`");
    while($data_title4 = mysqli_fetch_array($title_Result_db4))
    {
        if($data_title4[4]!=NULL)
        {
?>



'<?php
echo $data_title4[4];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db4 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum4[$h] = 0;

$h++;
}
while($data_db4 = mysqli_fetch_array($result_db4))
{
  $select_db_single4[$i] = $data_db4['Hospital_name'];
  $result_db_single4 = mysqli_query($con, "SELECT * FROM `$select_db_single4[$i]`");
  $n=0;
  while($data_db_single4 = mysqli_fetch_array($result_db_single4))
  {
	  if($data_db_single4[4] != NULL)
	  {
    $col_name4[$n] = $data_db_single4[4];
    $result_db_each4 = mysqli_query($con, "SELECT SUM($col_name4[$n]) as $col_name4[$n] FROM `$select_db_single4[$i]_camp_details`");

	  $result_db_each_one4 = mysqli_fetch_array($result_db_each4);
	  $sum4[$n] = $sum4[$n] + $result_db_each_one4["$col_name4[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum4[$j];
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
          title: 'camp Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material12'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart11);

    function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db5 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db5 = mysqli_fetch_array($Result_db5))
{
    $data_title_d5[0] =  $data_title_db5['Hospital_name'];
    $title_Result_db5 = mysqli_query($con,"SELECT * FROM `$data_title_d5[0]`");
    while($data_title5 = mysqli_fetch_array($title_Result_db5))
    {
        if($data_title5[5]!=NULL)
        {
?>



'<?php
echo $data_title5[5];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db5 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum5[$h] = 0;

$h++;
}
while($data_db5 = mysqli_fetch_array($result_db5))
{
  $select_db_single5[$i] = $data_db5['Hospital_name'];
  $result_db_single5 = mysqli_query($con, "SELECT * FROM `$select_db_single5[$i]`");
  $n=0;
  while($data_db_single5 = mysqli_fetch_array($result_db_single5))
  {
	  if($data_db_single5[5] != NULL)
	  {
    $col_name5[$n] = $data_db_single5[5];
    $result_db_each5 = mysqli_query($con, "SELECT SUM($col_name5[$n]) as $col_name5[$n] FROM `$select_db_single5[$i]_lifeline_camp`");

	  $result_db_each_one5 = mysqli_fetch_array($result_db_each5);
	  $sum5[$n] = $sum5[$n] + $result_db_each_one5["$col_name5[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum5[$j];
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
          title: 'Lifeline camp Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material13'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 

</script>


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart11);

    function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db6 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db6 = mysqli_fetch_array($Result_db6))
{
    $data_title_d6[0] =  $data_title_db6['Hospital_name'];
    $title_Result_db6 = mysqli_query($con,"SELECT * FROM `$data_title_d6[0]`");
    while($data_title6 = mysqli_fetch_array($title_Result_db6))
    {
        if($data_title6[6]!=NULL)
        {
?>



'<?php
echo $data_title6[6];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db6 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum6[$h] = 0;

$h++;
}
while($data_db6 = mysqli_fetch_array($result_db6))
{
  $select_db_single6[$i] = $data_db6['Hospital_name'];
  $result_db_single6 = mysqli_query($con, "SELECT * FROM `$select_db_single6[$i]`");
  $n=0;
  while($data_db_single6 = mysqli_fetch_array($result_db_single6))
  {
	  if($data_db_single6[6] != NULL)
	  {
    $col_name6[$n] = $data_db_single6[6];
    $result_db_each6 = mysqli_query($con, "SELECT SUM($col_name6[$n]) as $col_name6[$n] FROM `$select_db_single6[$i]_optical_Hospital`");

	  $result_db_each_one6 = mysqli_fetch_array($result_db_each6);
	  $sum6[$n] = $sum6[$n] + $result_db_each_one6["$col_name6[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum6[$j];
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
          title: 'optical Hospital',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material14'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>
 


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart11);

    function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db7 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db7 = mysqli_fetch_array($Result_db7))
{
    $data_title_d7[0] =  $data_title_db7['Hospital_name'];
    $title_Result_db7 = mysqli_query($con,"SELECT * FROM `$data_title_d7[0]`");
    while($data_title7 = mysqli_fetch_array($title_Result_db7))
    {
        if($data_title7[7]!=NULL)
        {
?>



'<?php
echo $data_title7[7];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db7 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum7[$h] = 0;

$h++;
}
while($data_db7 = mysqli_fetch_array($result_db7))
{
  $select_db_single7[$i] = $data_db7['Hospital_name'];
  $result_db_single7 = mysqli_query($con, "SELECT * FROM `$select_db_single7[$i]`");
  $n=0;
  while($data_db_single7 = mysqli_fetch_array($result_db_single7))
  {
	  if($data_db_single7[7] != NULL)
	  {
    $col_name7[$n] = $data_db_single7[7];
    $result_db_each7 = mysqli_query($con, "SELECT SUM($col_name7[$n]) as $col_name7[$n] FROM `$select_db_single7[$i]_other_treatments`");

	  $result_db_each_one7 = mysqli_fetch_array($result_db_each7);
	  $sum7[$n] = $sum7[$n] + $result_db_each_one7["$col_name7[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum7[$j];
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
          title: 'Other Treatment',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material15'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>
 

<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart11);

    function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db8 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db8 = mysqli_fetch_array($Result_db8))
{
    $data_title_d8[0] =  $data_title_db8['Hospital_name'];
    $title_Result_db8 = mysqli_query($con,"SELECT * FROM `$data_title_d8[0]`");
    while($data_title8 = mysqli_fetch_array($title_Result_db8))
    {
        if($data_title8[8]!=NULL)
        {
?>



'<?php
echo $data_title8[8];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db8 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum8[$h] = 0;

$h++;
}
while($data_db8 = mysqli_fetch_array($result_db8))
{
  $select_db_single8[$i] = $data_db8['Hospital_name'];
  $result_db_single8 = mysqli_query($con, "SELECT * FROM `$select_db_single8[$i]`");
  $n=0;
  while($data_db_single8 = mysqli_fetch_array($result_db_single8))
  {
	  if($data_db_single8[8] != NULL)
	  {
    $col_name8[$n] = $data_db_single8[8];
    $result_db_each8 = mysqli_query($con, "SELECT SUM($col_name8[$n]) as $col_name8[$n] FROM `$select_db_single8[$i]_revenue_statement`");

	  $result_db_each_one8 = mysqli_fetch_array($result_db_each8);
	  $sum8[$n] = $sum8[$n] + $result_db_each_one8["$col_name8[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum8[$j];
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
          title: 'Revenue Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material16'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>

<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart11);

    function drawChart11() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db9 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db9 = mysqli_fetch_array($Result_db9))
{
    $data_title_d9[0] =  $data_title_db9['Hospital_name'];
    $title_Result_db9 = mysqli_query($con,"SELECT * FROM `$data_title_d9[0]`");
    while($data_title9 = mysqli_fetch_array($title_Result_db9))
    {
        if($data_title9[9]!=NULL)
        {
?>



'<?php
echo $data_title9[9];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db9 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum9[$h] = 0;

$h++;
}
while($data_db9 = mysqli_fetch_array($result_db9))
{
  $select_db_single9[$i] = $data_db9['Hospital_name'];
  $result_db_single9 = mysqli_query($con, "SELECT * FROM `$select_db_single9[$i]`");
  $n=0;
  while($data_db_single9 = mysqli_fetch_array($result_db_single9))
  {
	  if($data_db_single9[9] != NULL)
	  {
    $col_name9[$n] = $data_db_single9[9];
    $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `$select_db_single9[$i]_sot`");

	  $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
	  $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
      $n++;
    }
  }
  $i++;
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
          title: 'SOT Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material17'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>







<?php
}
else{
  echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
  <strong class='font-bold pl-10'>No Admin Name Found!!</strong>
  <span class='block sm:inline '> Login Again or Register Again!!</span>
  <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
    <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
  </span>
</div>";
}
}
else{
 $_SESSION['norecord'] = "No Records Found";
}
?>

<?php
if(isset($_GET['Hospital_sort']))
{
  if($_GET['Hospital_sort'] != 'all' && $_GET['Hospital_sort'] != NULL)
  {
    ?>
    <script type="text/javascript">
    google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart20);

    function drawChart20() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php
$title_Result_db12 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db = mysqli_fetch_array($title_Result_db12))
{
    $data_title_d[0] =  $_GET['Hospital_sort'];
    $title_Result_db = mysqli_query($con,"SELECT * FROM `$data_title_d[0]`");
    while($data_title = mysqli_fetch_array($title_Result_db))
    {
        if($data_title[1]!=NULL)
        {
?>



'<?php
echo $data_title[1];
?>',
<?php
    }
}
    break;
}
    ?>

      ],

      <?php

$result_db = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum[$h] = 0;

$h++;
}
while($data_db = mysqli_fetch_array($result_db))
{
  $select_db_single[$i] = $_GET['Hospital_sort'];
  $result_db_single = mysqli_query($con, "SELECT * FROM `$select_db_single[$i]`");
  $n=0;
  while($data_db_single = mysqli_fetch_array($result_db_single))
  {
	  if($data_db_single[1] != NULL)
	  {
    $col_name[$n] = $data_db_single[1];
    $result_db_each = mysqli_query($con, "SELECT SUM($col_name[$n]) as $col_name[$n] FROM `$select_db_single[$i]_outpatient`");

	  $result_db_each_one = mysqli_fetch_array($result_db_each);
	  $sum[$n] = $sum[$n] + $result_db_each_one["$col_name[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total data', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum[$j];
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
      var chart = new google.charts.Bar(document.getElementById('barchart_material18'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }


</script>



<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart21);

    function drawChart21() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db2 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db2 = mysqli_fetch_array($Result_db2))
{
     $data_title_d2[0] = $_GET['Hospital_sort'];
    $title_Result_db2 = mysqli_query($con,"SELECT * FROM `$data_title_d2[0]`");
    while($data_title2 = mysqli_fetch_array($title_Result_db2))
    {
        if($data_title2[2]!=NULL)
        {
?>



'<?php
echo $data_title2[2];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db2 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum2[$h] = 0;

$h++;
}
while($data_db2 = mysqli_fetch_array($result_db2))
{
  $select_db_single2[$i] =$_GET['Hospital_sort'];
  $result_db_single2 = mysqli_query($con, "SELECT * FROM `$select_db_single2[$i]`");
  $n=0;
  while($data_db_single2 = mysqli_fetch_array($result_db_single2))
  {
	  if($data_db_single2[2] != NULL)
	  {
    $col_name2[$n] = $data_db_single2[2];
    $result_db_each = mysqli_query($con, "SELECT SUM($col_name2[$n]) as $col_name2[$n] FROM `$select_db_single2[$i]_surgeries`");

	  $result_db_each_one2 = mysqli_fetch_array($result_db_each);
	  $sum2[$n] = $sum2[$n] + $result_db_each_one2["$col_name2[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum2[$j];
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
          title: 'Surgery Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material19'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }


</script>

<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart22);

    function drawChart22() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db3 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db3 = mysqli_fetch_array($Result_db3))
{
    $data_title_d3[0] =  $_GET['Hospital_sort'];
    $title_Result_db3 = mysqli_query($con,"SELECT * FROM `$data_title_d3[0]`");
    while($data_title3 = mysqli_fetch_array($title_Result_db3))
    {
        if($data_title3[3]!=NULL)
        {
?>



'<?php
echo $data_title3[3];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db3 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum3[$h] = 0;

$h++;
}
while($data_db3 = mysqli_fetch_array($result_db3))
{
  $select_db_single3[$i] = $_GET['Hospital_sort'];
  $result_db_single3 = mysqli_query($con, "SELECT * FROM `$select_db_single3[$i]`");
  $n=0;
  while($data_db_single3 = mysqli_fetch_array($result_db_single3))
  {
	  if($data_db_single3[3] != NULL)
	  {
    $col_name3[$n] = $data_db_single3[3];
    $result_db_each3 = mysqli_query($con, "SELECT SUM($col_name3[$n]) as $col_name3[$n] FROM `$select_db_single3[$i]_camp`");

	  $result_db_each_one3 = mysqli_fetch_array($result_db_each3);
	  $sum3[$n] = $sum3[$n] + $result_db_each_one3["$col_name3[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum3[$j];
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
          title: 'Camp Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material20'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    }


</script>


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart23);

    function drawChart23() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db4 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db4 = mysqli_fetch_array($Result_db4))
{
    $data_title_d4[0] =  $_GET['Hospital_sort'];
    $title_Result_db4 = mysqli_query($con,"SELECT * FROM `$data_title_d4[0]`");
    while($data_title4 = mysqli_fetch_array($title_Result_db4))
    {
        if($data_title4[4]!=NULL)
        {
?>



'<?php
echo $data_title4[4];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db4 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum4[$h] = 0;

$h++;
}
while($data_db4 = mysqli_fetch_array($result_db4))
{
  $select_db_single4[$i] = $_GET['Hospital_sort'];
  $result_db_single4 = mysqli_query($con, "SELECT * FROM `$select_db_single4[$i]`");
  $n=0;
  while($data_db_single4 = mysqli_fetch_array($result_db_single4))
  {
	  if($data_db_single4[4] != NULL)
	  {
    $col_name4[$n] = $data_db_single4[4];
    $result_db_each4 = mysqli_query($con, "SELECT SUM($col_name4[$n]) as $col_name4[$n] FROM `$select_db_single4[$i]_camp_details`");

	  $result_db_each_one4 = mysqli_fetch_array($result_db_each4);
	  $sum4[$n] = $sum4[$n] + $result_db_each_one4["$col_name4[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum4[$j];
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
          title: 'camp Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material21'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart24);

    function drawChart24() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db5 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db5 = mysqli_fetch_array($Result_db5))
{
    $data_title_d5[0] =  $_GET['Hospital_sort'];
    $title_Result_db5 = mysqli_query($con,"SELECT * FROM `$data_title_d5[0]`");
    while($data_title5 = mysqli_fetch_array($title_Result_db5))
    {
        if($data_title5[5]!=NULL)
        {
?>



'<?php
echo $data_title5[5];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db5 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum5[$h] = 0;

$h++;
}
while($data_db5 = mysqli_fetch_array($result_db5))
{
  $select_db_single5[$i] = $_GET['Hospital_sort'];
  $result_db_single5 = mysqli_query($con, "SELECT * FROM `$select_db_single5[$i]`");
  $n=0;
  while($data_db_single5 = mysqli_fetch_array($result_db_single5))
  {
	  if($data_db_single5[5] != NULL)
	  {
    $col_name5[$n] = $data_db_single5[5];
    $result_db_each5 = mysqli_query($con, "SELECT SUM($col_name5[$n]) as $col_name5[$n] FROM `$select_db_single5[$i]_lifeline_camp`");

	  $result_db_each_one5 = mysqli_fetch_array($result_db_each5);
	  $sum5[$n] = $sum5[$n] + $result_db_each_one5["$col_name5[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum5[$j];
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
          title: 'Lifeline camp Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material22'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 

</script>


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart25);

    function drawChart25() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db6 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db6 = mysqli_fetch_array($Result_db6))
{
    $data_title_d6[0] =  $_GET['Hospital_sort'];
    $title_Result_db6 = mysqli_query($con,"SELECT * FROM `$data_title_d6[0]`");
    while($data_title6 = mysqli_fetch_array($title_Result_db6))
    {
        if($data_title6[6]!=NULL)
        {
?>



'<?php
echo $data_title6[6];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db6 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum6[$h] = 0;

$h++;
}
while($data_db6 = mysqli_fetch_array($result_db6))
{
  $select_db_single6[$i] = $_GET['Hospital_sort'];
  $result_db_single6 = mysqli_query($con, "SELECT * FROM `$select_db_single6[$i]`");
  $n=0;
  while($data_db_single6 = mysqli_fetch_array($result_db_single6))
  {
	  if($data_db_single6[6] != NULL)
	  {
    $col_name6[$n] = $data_db_single6[6];
    $result_db_each6 = mysqli_query($con, "SELECT SUM($col_name6[$n]) as $col_name6[$n] FROM `$select_db_single6[$i]_optical_Hospital`");

	  $result_db_each_one6 = mysqli_fetch_array($result_db_each6);
	  $sum6[$n] = $sum6[$n] + $result_db_each_one6["$col_name6[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum6[$j];
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
          title: 'optical Hospital',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material23'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>
 


<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart25);

    function drawChart25() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db7 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db7 = mysqli_fetch_array($Result_db7))
{
    $data_title_d7[0] =  $_GET['Hospital_sort'];
    $title_Result_db7 = mysqli_query($con,"SELECT * FROM `$data_title_d7[0]`");
    while($data_title7 = mysqli_fetch_array($title_Result_db7))
    {
        if($data_title7[7]!=NULL)
        {
?>



'<?php
echo $data_title7[7];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db7 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum7[$h] = 0;

$h++;
}
while($data_db7 = mysqli_fetch_array($result_db7))
{
  $select_db_single7[$i] = $_GET['Hospital_sort'];
  $result_db_single7 = mysqli_query($con, "SELECT * FROM `$select_db_single7[$i]`");
  $n=0;
  while($data_db_single7 = mysqli_fetch_array($result_db_single7))
  {
	  if($data_db_single7[7] != NULL)
	  {
    $col_name7[$n] = $data_db_single7[7];
    $result_db_each7 = mysqli_query($con, "SELECT SUM($col_name7[$n]) as $col_name7[$n] FROM `$select_db_single7[$i]_other_treatments`");

	  $result_db_each_one7 = mysqli_fetch_array($result_db_each7);
	  $sum7[$n] = $sum7[$n] + $result_db_each_one7["$col_name7[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum7[$j];
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
          title: 'Other Treatment',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material24'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>
 

<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart26);

    function drawChart26() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db8 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db8 = mysqli_fetch_array($Result_db8))
{
    $data_title_d8[0] =  $_GET['Hospital_sort'];
    $title_Result_db8 = mysqli_query($con,"SELECT * FROM `$data_title_d8[0]`");
    while($data_title8 = mysqli_fetch_array($title_Result_db8))
    {
        if($data_title8[8]!=NULL)
        {
?>



'<?php
echo $data_title8[8];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db8 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum8[$h] = 0;

$h++;
}
while($data_db8 = mysqli_fetch_array($result_db8))
{
  $select_db_single8[$i] = $_GET['Hospital_sort'];
  $result_db_single8 = mysqli_query($con, "SELECT * FROM `$select_db_single8[$i]`");
  $n=0;
  while($data_db_single8 = mysqli_fetch_array($result_db_single8))
  {
	  if($data_db_single8[8] != NULL)
	  {
    $col_name8[$n] = $data_db_single8[8];
    $result_db_each8 = mysqli_query($con, "SELECT SUM($col_name8[$n]) as $col_name8[$n] FROM `$select_db_single8[$i]_revenue_statement`");

	  $result_db_each_one8 = mysqli_fetch_array($result_db_each8);
	  $sum8[$n] = $sum8[$n] + $result_db_each_one8["$col_name8[$n]"];
      $n++;
    }
  }
  $i++;
}
?>
        ['Total', 
<?php
for($j=0;$j<=$n-1;$j++)
{
  echo $sum8[$j];
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
          title: 'Revenue Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material25'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>

<script type="text/javascript">
google.charts.load('current', { 'packages': ['bar'] });
    google.charts.setOnLoadCallback(drawChart27);

    function drawChart27() {
      var data = google.visualization.arrayToDataTable([
        ['Total data', 

<?php

$Result_db9 = mysqli_query($con,"SELECT * FROM `Hospital`");
while($data_title_db9 = mysqli_fetch_array($Result_db9))
{
    $data_title_d9[0] =  $_GET['Hospital_sort'];
    $title_Result_db9 = mysqli_query($con,"SELECT * FROM `$data_title_d9[0]`");
    while($data_title9 = mysqli_fetch_array($title_Result_db9))
    {
        if($data_title9[9]!=NULL)
        {
?>



'<?php
echo $data_title9[9];
?>',
<?php
    }
}
    break;
}
    ?>



      ],

      <?php

$result_db9 = mysqli_query($con, "SELECT * FROM `Hospital`");
$i=0;
$h=0;
while($h<=10)
{
$sum9[$h] = 0;

$h++;
}
while($data_db9 = mysqli_fetch_array($result_db9))
{
  $select_db_single9[$i] = $_GET['Hospital_sort'];
  $result_db_single9 = mysqli_query($con, "SELECT * FROM `$select_db_single9[$i]`");
  $n=0;
  while($data_db_single9 = mysqli_fetch_array($result_db_single9))
  {
	  if($data_db_single9[9] != NULL)
	  {
    $col_name9[$n] = $data_db_single9[9];
    $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `$select_db_single9[$i]_sot`");

	  $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
	  $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
      $n++;
    }
  }
  $i++;
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
          title: 'SOT Details',
          subtitle: '',
        },
        bars: 'vertical' // Required for Material Bar Charts.
      };
      var chart = new google.charts.Bar(document.getElementById('barchart_material26'));

      chart.draw(data, google.charts.Bar.convertOptions(options));
    } 


</script>

 <?php

 }
  }

 ?>
 </head>

<body>
<script>
function myFunction1(){

var y = document.getElementsByClassName("viewtable1")[0];
y.style.display = "block";
<?php
if(isset($_GET['submit_filter']))
{
if($_GET['Hospital_sort'] == 'all')
{
?>
    var z = document.getElementById("viewbar_all");
      z.style.display = "none";
<?php
}

if($_GET['Hospital_sort'] != 'all')
{
?>
var x = document.getElementById("viewbar_Hospital");
x.style.display = "none";
    
<?php
   }

  
}
if(isset($_GET['search']))
{
  ?>
var i = document.getElementById("graphicon");
i.style.display = "none";
  <?php
}
?>
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
}
function myFunction3() {

        // var v = document.getElementById("viewbar_all");
        //   v.style.display = "inline-block";
        // var x = document.getElementById("viewbar_Hospital");
        //   x.style.display = "inline-block";
        // var b = document.getElementById("viewtable");
        //   b.style.display = "none";

var y = document.getElementsByClassName("viewtable1")[0];
y.style.display = "none";
<?php
if(isset($_GET['submit_filter']))
{
if($_GET['Hospital_sort'] == 'all')
{
  ?>
        var z = document.getElementById("viewbar_all");
            z.style.display = "inline-block";
<?php
}

if($_GET['Hospital_sort'] != 'all')
{
  ?>
        var x = document.getElementById("viewbar_Hospital");
        x.style.display = "inline-block";
        
  <?php
}


}
if(isset($_GET['search'])){
  ?>
var i = document.getElementById("graphicon");
i.style.display = "flex";
  <?php
}
?>

}

</script>
<?php
include 'header.php';
?>

  

<?php
include 'admin_side_bar.php';
?>


<div class="max-w-full">
  <div class="sm:flex sm:space-x-6 relative top-24 ml-72 mr-16 right-2">
    <div class="inline-block align-bottom rounded text-left  overflow-hidden transform transition-all w-14 sm:w-48 h-20">
      <div class="bg-indigo-300 p-3">
        <div class="sm:flex sm:items-start">
          <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
            <h3 class="text-md leading-6 font-medium text-indigo-900">
              Total Patients
            </h3>
            <p class="text-md font-bold text-indigo-900">
              <?php
                  $result_db9 = mysqli_query($con, "SELECT * FROM `Hospital`");
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  
                  $h++;
                  }
                  while($data_db9 = mysqli_fetch_array($result_db9))
                  {
                    $select_db_single9[$i] = $data_db9['Hospital_name'];
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$select_db_single9[$i]`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[1] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[1];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `$select_db_single9[$i]_outpatient`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                    $i++;
                  }
                  echo $sum9[0];
             
                ?>
            </p>
          </div>
        </div>
      </div>
    </div>
    <div class="inline-block align-bottom bg-white rounded text-left overflow-hidden  transform transition-all w-20 sm:w-48 h-20 ">
      <div class="bg-indigo-300 p-3">
        <div class="sm:flex sm:items-start">
          <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
            <h3 class="text-md leading-6 font-medium text-indigo-900">Total Surgeries</h3>
              <p class="text-md font-bold text-indigo-900">
                <?php
                  
                
                  $result_db9 = mysqli_query($con, "SELECT * FROM `Hospital`");
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  
                  $h++;
                  }
                  while($data_db9 = mysqli_fetch_array($result_db9))
                  {
                    $select_db_single9[$i] = $data_db9['Hospital_name'];
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$select_db_single9[$i]`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[2] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[2];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `$select_db_single9[$i]_surgeries`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                    $i++;
                  }
                  echo $sum9[0];
             
                ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="inline-block align-bottom bg-white rounded text-left overflow-hidden  transform transition-all w-20 sm:w-48 h-20 ">
        <div class="bg-indigo-300 p-3">
          <div class="sm:flex sm:items-start">
            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
              <h3 class="text-md leading-6 font-medium text-indigo-900">
                Total Hospitals
              </h3>
              <p class="text-md font-bold text-indigo-900">
                   <?php
                    
                
                  $result_db9 = mysqli_query($con, "SELECT * FROM `Hospital`");
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  
                  $h++;
                  }
                  while($data_db9 = mysqli_fetch_array($result_db9))
                  {
                    
                    $i++;
                  }
                  echo $i;
             
                  ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="inline-block align-bottom bg-white rounded text-left overflow-hidden  transform transition-all w-20 sm:w-48 h-20 mr-10">
        <div class="bg-indigo-300 p-3">
          <div class="sm:flex sm:items-start">
            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
              <h3 class="text-md leading-6 font-medium text-indigo-900">
                Total Revenue
              </h3>
                <p class="text-md font-bold text-indigo-900">
                  <?php
                  
                
                  $result_db9 = mysqli_query($con, "SELECT * FROM `Hospital`");
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  
                  $h++;
                  }
                  while($data_db9 = mysqli_fetch_array($result_db9))
                  {
                    $select_db_single9[$i] = $data_db9['Hospital_name'];
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$select_db_single9[$i]`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[8] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[8];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `$select_db_single9[$i]_revenue_statement`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                    $i++;
                  }
                  echo $sum9[0];
             
                   ?>
              </p>
            </div>
          </div>
        </div>
      </div>
      <div class="inline-block align-bottom bg-white rounded text-left overflow-hidden  transform transition-all w-20 sm:w-48 h-20 mr-20">
        <div class="bg-indigo-300 p-3">
          <div class="sm:flex sm:items-start">
            <div class="text-center sm:mt-0 sm:ml-2 sm:text-left">
              <h3 class="text-md leading-6 font-medium text-indigo-900">Other Surgery</h3>
                <p class="text-md font-bold text-indigo-900">
                  <?php
                  
                
                  $result_db9 = mysqli_query($con, "SELECT * FROM `Hospital`");
                  $i=0;
                  $h=0;
                  while($h<=10)
                  {
                  $sum9[$h] = 0;
                  
                  $h++;
                  }
                  while($data_db9 = mysqli_fetch_array($result_db9))
                  {
                    $select_db_single9[$i] = $data_db9['Hospital_name'];
                    $result_db_single9 = mysqli_query($con, "SELECT * FROM `$select_db_single9[$i]`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single9))
                    {
                      if($data_db_single9[7] != NULL)
                      {
                      $col_name9[$n] = $data_db_single9[7];
                      $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `$select_db_single9[$i]_other_treatments`");
                  
                      $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                      $sum9[$n] = $sum9[$n] + $result_db_each_one9["$col_name9[$n]"];
                        
                      }
                    }
                    $i++;
                  }
                  echo $sum9[0];
             
                   ?>
                </p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>





<div style="width:83%;" class="float-right p-4">
  <div class="container p-5">
    <form action="../admin/admin_home.php" method="GET" class="">
      <input type="date" class="w-1/4 shadow-2xl h-10 w-96 pr-8 pl-5 rounded z-0 focus:outline-none"  name="search" value="<?php if(isset($_GET['search'])){ echo $_GET['search'];}?>">
      <button class="mt-10 ml-8 bg-gray-300 shadow-2xl h-10 w-32 pr-8 pl-5 rounded z-0 focus:outline-none" type="submit"  >
        search
      </button>
                  
          <div class="dropdown inline-block relative">
            <span class="bg-gray-300 text-gray-700 font-semibold py-2 px-4 rounded inline-flex items-center">
              <span class="mr-1">data Format</span>
              <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" />
              </svg>
</span>
            <ul class="dropdown-menu absolute hidden text-gray-700 pt-1">
              <li onclick="myFunction1()" class="rounded-t bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">tabular</li>
              <!-- <li onclick="myFunction2()" class="bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">
                piechart</li> -->
              <li onclick="myFunction3()" class="rounded-b bg-gray-200 hover:bg-gray-400 py-2 px-4 block whitespace-no-wrap">bargraph</li>
            </ul>
          </div>
          </form>
 
<!-- component -->
<link rel="stylesheet" href="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.min.css" />

<!-- This is an example component -->
<div class="mx-auto float-right relative bottom-10">
 
    <!-- Modal toggle -->
    <button class="block text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" type="button" data-modal-toggle="authentication-modal">
      Sort/Filter
    </button>

    <!-- Main modal -->
    <div id="authentication-modal" aria-hidden="true" class="hidden overflow-x-hidden overflow-y-auto fixed h-modal md:h-full top-4 left-0 right-0 md:inset-0 z-50 justify-center items-center">
        <div class="relative w-full max-w-md px-4 h-full md:h-auto">
            <!-- Modal content -->
            <div class="bg-white rounded-lg shadow relative dark:bg-gray-700">
                <div class="flex justify-end p-2">
                    <button type="button" class="text-gray-400 bg-transparent hover:bg-gray-200 hover:text-gray-900 rounded-lg text-sm p-1.5 ml-auto inline-flex items-center dark:hover:bg-gray-800 dark:hover:text-white" data-modal-toggle="authentication-modal">
                        <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.5864.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>  
                    </button>
                </div>
                <form method="GET" class="space-y-4 px-6 lg:px-8 pb-4 sm:pb-6 xl:pb-8" action="../admin/admin_home.php">
                    <h3 class="text-xl text-center font-medium text-gray-900 dark:text-white">Sort/Filter</h3>


    <label for="sort">Sort:</label>
   <select name="date_sort" id="date_change" class=" mr-2 h-9 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm " required onchange="datechange()">
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value=""  disabled>Sort</option>
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" selected value="none">none</option>
           <!-- <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value="single_date">Single Date </option>-->
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value="date_range">Date Range</option>
                
          </select>
<!--<section id="test" class="test01" >
<label for="sing_Date">single date</label>
<input type="date" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="sing_date">
</section>-->
<section id="test1" class="test02" >
<label for="from_date">From</label>
<input type="date" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="from_date" >
<label for="to_date">To</label>
<input type="date"  class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="to_date" >
</section>
    <!-- <label for="sort">Data Type:</label>
   <select name="Hospital_sort" id=""
            class=" mr-2 h-9 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" onchange="">
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value="" selected disabled>Data Type</option>
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value="Single Date">Single Date </option>
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value="Date Range">Date Range</option>
                
          </select> -->
<script>

function datechange() {
var x = document.getElementById("date_change").value;

if(x=="date_range"){

 document.getElementById("test1").style.display="block";
}
else{
     document.getElementById("test1").style.display="none";
}
}
</script>
          
                    <?php
                        $qry= "SELECT * FROM Hospital";
                        
              // $s = mysqli_query($con,$qry);
              $s2 = mysqli_query($con,$qry);

              // while($row1 = mysqli_fetch_array($s2)){
              //   if($row1[0] != $row1[1]){
              //     // echo $row1[0];
              //     echo $row1[1];
              //   }
              // }

         ?>
         <?php
          if(isset($_SESSION['name']))
          {

         ?>
       <label for="sort">Filter:</label>
         <select name="Hospital_sort" id=""
            class=" mr-2 h-9 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value="" disabled >Filter</option>
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value="all" selected>all</option>
            <?php while($row1 = mysqli_fetch_array($s2))
                             {
                              ?>
            <option
              class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm"
              value="<?php echo $row1[1];?>">
              <?php echo $row1[1];?>
            </option>
            <?php }
                              ?>
          </select>

<?php
         }
         ?>
 <button type="submit" class="w-full text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center dark:bg-blue-600 dark:hover:bg-blue-700 dark:focus:ring-blue-800" name="submit_filter">Filter</button>
                    
                </form>
            </div>
        </div>
 

<script src="https://unpkg.com/@themesberg/flowbite@1.2.0/dist/flowbite.bundle.js"></script>



      </div>
      
    </div>
  <div>
</div>

    <!-- <div id="viewpie" class="viewpie_inactive mt-10" style="display:flex; justify-content:center;">
      <div id="piechart4" style="width: 700px; height: 400px;"></div>
      <div id="piechart5" style="width: 700px; height: 400px;"></div>

    </div> -->
<?php
if(isset($_GET['Hospital_sort']))
{
if($_GET['Hospital_sort'] != 'all')
{
  $dbhosname = $_GET['Hospital_sort'];
  ?>
  <div id="viewbar_Hospital" style=" display:inline-block;" class="relative  top-10">
    <table  class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
      <thead>
        <h1 class="text-center font-bold text-2xl mb-10">
          <?php echo $dbhosname;?> Report
        </h1>
      </thead>
      <tbody>

 <tr>
<td>   
    <div class="mt-5" id="barchart_material18" style="width: 250px; height: 400px;"></div>
</td>
<td>  
     <div class="mt-5 ml-40" id="barchart_material19" style="width:350px; height: 400px;"></div>
</td>
 </tr>

 <tr>
<td>   
<div class="mt-5" id="barchart_material20" style="width: 375px; height: 400px;"></div>
</td>

<td>   
<div class="mt-5 ml-40" id="barchart_material21" style="width: 350px; height: 400px;"></div>
</td>
 </tr>

 <tr>
   <td>   <div class="mt-5" id="barchart_material22" style="width: 250px; height: 400px;"></div>
   </td>
   <td>   <div class="mt-5 ml-40" id="barchart_material23" style="width: 250px; height: 400px;"></div>
   </td> 
 </tr>

 <tr>
   <td>     <div class="mt-5" id="barchart_material24" style="width: 350px; height: 400px;"></div>
   </td>
   <td>   <div class="mt-5 ml-20" id="barchart_material25" style="width: 400px; height: 500px;"></div>
   </td>

 </tr>

 <tr>
   <td>       <div class="mt-5" id="barchart_material26" style="width: 300px; height: 400px;"></div>
   </td>

 </tr>

      </tbody>
    </table>
   

  </div>

  
    <?php
}
}
?>
<?php
if(isset($_GET['search']))
{
  ?>
  <div id="graphicon" class="flex flex-col w-72 ml-64 justify-center" style="text-align: center;">

    <img src="../img/graph.gif" alt=""/>
    <p class="flex text-red-600">Graphical Data is Not Available For Search Details!!</p>
    <br>
    <p class="flex text-red-600 ml-4">Please Switch to Tablular Data!!</p>
  </div>

  <?php
}
?>

    
<div id="viewtable" class="viewtable1 pt-10">
      <!-- This example requires Tailwind CSS v2.0+ -->
      <!-- <div class="w-11/12 mx-auto  flex flex-col"> -->
  <div class="container overflow-y-auto">
          <!-- <div class=" pb-20 align-middle inline-block max-w-full">
            <div class="sm:rounded-lg"> -->
            

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

          <!-- <?php
              $qry= "SELECT * FROM Hospital";
              $s2 = mysqli_query($con,$qry);
            ?>

<select name="hospital" id="select_hospital" class="">
            <option class="" value="" disabled >Filter</option>
            <option class="" value="all" selected >all</option>
            <?php while($row1 = mysqli_fetch_array($s2))
                    {
                              ?>
            <option class="" value="<?php echo $row1[1];?>">
              <?php echo $row1[1];?>
            </option>
            <?php }
                              ?>
          </select> -->
     
          <?php

if(isset($_GET['search']))
    {
      $filterdata = $_GET['search'];
      $r = mysqli_query($con,"SELECT * FROM Hospital");
      $i=0;
      while($d = mysqli_fetch_array($r))
      {
        $hos[$i] = $d['Hospital_name'];
        
        ?>

<h1 class="mt-2 mb-2 p-2 font-bold text-2xl bg-indigo-400 text-center">
  <?php echo $hos[$i];?> searched Details
</h1>


<?php
        $r0 = mysqli_query($con,"SELECT * FROM `$hos[$i]`");
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
<h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  <?php echo $hname;?> searched Details
</h1>
<table  class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
  <thead>
  <tr>
<th class="th-sm">No.</th>
      <?php
          $r1 = mysqli_query($con,"SELECT * FROM `$hos[$i]`");
          
          while($d1 = mysqli_fetch_array($r1))
          {
          
              if($d1[$j] != NULL)
              {
                ?>
                <th class="th-sm"><?php echo $d1[$j];?></th>

                <?php

              }
              else
              {
                continue;
              }
              
          }
          
      ?>
     
            <th class="th-sm">date</th>
            <th class="th-sm">updated time</th>
        </tr>
    </thead>
    <tbody>
      <?php
    
          $r2 = mysqli_query($con,"SELECT * FROM `{$hos[$i]}_$hname` WHERE date LIKE '%$filterdata%' ");
          $col_h = mysqli_num_fields($r2);
          $k=0;
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
        $i++;
      }
      
    } // closing of search 
      ?>

<?php

if(isset($_GET['date_sort']))
{
  if($_GET['date_sort'] == 'date_range' )
  {
    if(isset($_GET['from_date'])  && isset($_GET['to_date']))
    {
    
      $from_date = $_GET['from_date'];
      $to_date = $_GET['to_date'];
      $r = mysqli_query($con,"SELECT * FROM `Hospital`");
      $i=0;
      while($d = mysqli_fetch_array($r))
      {
        $hos[$i] = $d['Hospital_name'];
        
        ?>

<h1 class="mt-1 mb-1 p-3 font-bold text-2xl bg-indigo-400 text-center">
  <?php echo $hos[$i];?> sorted Details
</h1>


<?php
        $r0 = mysqli_query($con,"SELECT * FROM `$hos[$i]`");
        $j=1;
        while($d0 = mysqli_fetch_array($r0))
        {
          if($j<=9)
          {

            $hname = $d0[10];
          }
          ?>
  <div class="<?php echo $hname;?> container overflow-x-auto">
  <h1 class="mt-1 mb-1 p-2 bg-green-100 text-xl">
    <?php echo $hname;?> sorted Details
  </h1>
  <table  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
  <thead>
    <tr>
  <th class="th-sm">No.</th>
      <?php
          $r1 = mysqli_query($con,"SELECT * FROM `$hos[$i]`");
          
          while($d1 = mysqli_fetch_array($r1))
          {
          
              if($d1[$j] != NULL)
              {
                ?>
                <th class="th-sm"><?php echo $d1[$j];?></th>

                <?php

              }
              else
              {
                continue;
              }
              
          }
          
      ?>
     <th class="th-sm">date</th>
     <th class="th-sm">updated time</th>
</tr>
    </thead>
    <tbody>
      <?php
    
          $r2 = mysqli_query($con,"SELECT * FROM `$hos[$i]_$hname` WHERE date BETWEEN  '$from_date' AND '$to_date' ");
          $col_h = mysqli_num_fields($r2);
          $k=0;

          while($d2 = mysqli_fetch_array($r2))
          {
            ?>
            <tr>
            <?php
            if($d2[$k] != NULL)
            {
              for($n=0;$n<=$col_h-1;$n++)
              {
              
              ?>
               <td>
                      
                            <?php echo $d2[$n];?>
                         
                </td>

              <?php
                
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
        $i++;
      }
      $query = mysqli_query($con,"SELECT * FROM `Hospital`");
      while($row = mysqli_fetch_array($query))
      {
        $hosname = $row['Hospital_name'];
        $query2 = mysqli_query($con,"SELECT * FROM `$hosname`");
        while($row2 = mysqli_fetch_array($query2))
        {
          $hname = $row2[$i];

        }
      }
    }
  }
}
 ?>



            
  <?php 
if(isset($_GET['Hospital_sort']) == 'all')
      {
    if($_GET['Hospital_sort'] == 'all' && $_GET['date_sort'] != 'date_range' &&  isset($_GET['search']) == false )
        {

    
  $db_admin = "SELECT * FROM Hospital";
    
$qry_hos_select = mysqli_query($con,$db_admin);

//   $result = mysqli_fetch_array($s);
if(!$qry_hos_select){
  echo "<h3>No admin name Found</h3>";
}
// echo $result;
else{
$i=0;
while($result_Hospital_Select = mysqli_fetch_assoc($qry_hos_select))
{
  $hosname[$i] = $result_Hospital_Select['Hospital_name'];
  $_SESSION['hospital'] = $hosname[$i];
  $hospital =  $_SESSION['hospital'];
 

?>

<div id="<?php  $hosname[$i]?>" >
<h1 class="mt-2 mb-2 p-2 font-bold text-2xl bg-indigo-400 text-center">

<?php
echo $hosname[$i];
?>
 Total Details
</h1>

<div class="outpatient container overflow-x-auto">
  <h4 class="mt-2 mb-2 p-2 bg-green-100  text-xl">
  <?php
    echo $hosname[$i];
    ?>
      Outpatient Details
    </h4>
  <table   class=" table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head = mysqli_fetch_array($result_admin_tbl_head))
                   {
                      if($data_admin_tbl_head[1] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head[1];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
               
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_outpatient_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_outpatient`");

$col_outpatient_admin = mysqli_num_fields($qryrun_outpatient_admin_tbldata);

$result_outpatient_admin_check = mysqli_num_rows($qryrun_outpatient_admin_tbldata);

if($result_outpatient_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_outpatient_admin_tbldata = mysqli_fetch_array($qryrun_outpatient_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_outpatient_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_outpatient_admin_tbldata[$l];?>
                         
                    </td>

  <?php

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

<!-- table for surgeries -->

<div class="surgeries container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  
  <?php echo $hosname[$i];?> surgeries 
  </h1>
              <table   class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head_surgeries = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head_surgeries = mysqli_fetch_array($result_admin_tbl_head_surgeries))
                   {
                      if($data_admin_tbl_head_surgeries[2] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_surgeries[2];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                   
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_surgeries_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_surgeries`");

$col_surgeries_admin = mysqli_num_fields($qryrun_surgeries_admin_tbldata);

$result_surgeries_admin_check = mysqli_num_rows($qryrun_surgeries_admin_tbldata);

if($result_surgeries_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_surgeries_admin_tbldata = mysqli_fetch_array($qryrun_surgeries_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_surgeries_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_surgeries_admin_tbldata[$l];?>
                       
                    </td>

  <?php

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
<!-- table for camp -->

<div  class="camp container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
    
    <?php echo $hosname[$i];?> Camp    
    </h1>
  <table   class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
    <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head_camp = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head_camp = mysqli_fetch_array($result_admin_tbl_head_camp))
                   {
                      if($data_admin_tbl_head_camp[3] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_camp[3];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                    
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_camp_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_camp`");

$col_camp_admin = mysqli_num_fields($qryrun_camp_admin_tbldata);

$result_camp_admin_check = mysqli_num_rows($qryrun_camp_admin_tbldata);

if($result_camp_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_camp_admin_tbldata = mysqli_fetch_array($qryrun_camp_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_camp_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_camp_admin_tbldata[$l];?>
                         
                    </td>

  <?php

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
<!-- table for camp details  -->

<div  class="camp_details container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  
  <?php echo $hosname[$i];?> Camp Details    
  </h1>
  <table   class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head_camp_details = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head_camp_details = mysqli_fetch_array($result_admin_tbl_head_camp_details))
                   {
                      if($data_admin_tbl_head_camp_details[4] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_camp_details[4];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                   
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_camp_details_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_camp_details`");

$col_camp_details_admin = mysqli_num_fields($qryrun_camp_details_admin_tbldata);

$result_camp_details_admin_check = mysqli_num_rows($qryrun_camp_details_admin_tbldata);

if($result_camp_details_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_camp_details_admin_tbldata = mysqli_fetch_array($qryrun_camp_details_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_camp_details_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_camp_details_admin_tbldata[$l];?>
                    </td>

  <?php

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
<!-- table for lifeline camp  -->


<div  class="lifeline_camp container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  
  <?php echo $hosname[$i];?> lifeline_details 
  </h1>
  <table   class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head_lifeline_details = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head_lifeline_details = mysqli_fetch_array($result_admin_tbl_head_lifeline_details))
                   {
                      if($data_admin_tbl_head_lifeline_details[5] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_lifeline_details[5];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                 
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_lifeline_details_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_lifeline_camp`");

$col_lifeline_details_admin = mysqli_num_fields($qryrun_lifeline_details_admin_tbldata);

$result_lifeline_details_admin_check = mysqli_num_rows($qryrun_lifeline_details_admin_tbldata);

if($result_lifeline_details_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_lifeline_details_admin_tbldata = mysqli_fetch_array($qryrun_lifeline_details_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_lifeline_details_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_lifeline_details_admin_tbldata[$l];?>
                         
                    </td>

  <?php

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
<!-- table for optical Hospital -->

<div  class="optical_Hospital container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  
  <?php echo $hosname[$i];?> optical Hospital 
  </h1>
  <table   class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head_optical_Hospital = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head_optical_Hospital = mysqli_fetch_array($result_admin_tbl_head_optical_Hospital))
                   {
                      if($data_admin_tbl_head_optical_Hospital[6] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_optical_Hospital[6];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                    
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_optical_Hospital_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_optical_Hospital`");

$col_optical_Hospital_admin = mysqli_num_fields($qryrun_optical_Hospital_admin_tbldata);

$result_optical_Hospital_admin_check = mysqli_num_rows($qryrun_optical_Hospital_admin_tbldata);

if($result_optical_Hospital_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_optical_Hospital_admin_tbldata = mysqli_fetch_array($qryrun_optical_Hospital_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_optical_Hospital_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_optical_Hospital_admin_tbldata[$l];?>
                       
                    </td>

  <?php

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

<!-- table for other treatments -->

<div  class="other_treatments container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  
  <?php echo $hosname[$i];?> other treatment
  </h1>
  <table class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head_other_treatments = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head_other_treatments = mysqli_fetch_array($result_admin_tbl_head_other_treatments))
                   {
                      if($data_admin_tbl_head_other_treatments[7] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_other_treatments[7];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                  
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_other_treatments_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_other_treatments`");

$col_other_treatments_admin = mysqli_num_fields($qryrun_other_treatments_admin_tbldata);

$result_other_treatments_admin_check = mysqli_num_rows($qryrun_other_treatments_admin_tbldata);

if($result_other_treatments_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_other_treatments_admin_tbldata = mysqli_fetch_array($qryrun_other_treatments_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_other_treatments_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_other_treatments_admin_tbldata[$l];?>
                         
                    </td>

  <?php

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
<!-- table for revenue statement  -->

<div  class="revenue_statement container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  
  <?php echo $hosname[$i];?> Revenue Statement
  </h1>
  <table  class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head_revenue_statements = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head_revenue_statements = mysqli_fetch_array($result_admin_tbl_head_revenue_statements))
                   {
                      if($data_admin_tbl_head_revenue_statements[8] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_revenue_statements[8];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                    
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_revenue_statements_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_revenue_statement`");

$col_revenue_statements_admin = mysqli_num_fields($qryrun_revenue_statements_admin_tbldata);

$result_revenue_statements_admin_check = mysqli_num_rows($qryrun_revenue_statements_admin_tbldata);

if($result_revenue_statements_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_revenue_statements_admin_tbldata = mysqli_fetch_array($qryrun_revenue_statements_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_revenue_statements_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_revenue_statements_admin_tbldata[$l];?>
                          
                    </td>

  <?php

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
<!-- sot details table  -->

<div  class="sot container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  
  <?php echo $hosname[$i];?> SOT Details
  </h1>
  <table  class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php
                 
                 for($j=$i;$j<=$i;$j++)
                 {
                   $result_admin_tbl_head_sot = mysqli_query($con,"SELECT * FROM `$hosname[$j]`");
                   while($data_admin_tbl_head_sot = mysqli_fetch_array($result_admin_tbl_head_sot))
                   {
                      if($data_admin_tbl_head_sot[9] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_sot[9];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   }
                 }
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                  
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_sot_admin_tbldata = mysqli_query($con,"SELECT * FROM `$hosname[$i]_sot`");

$col_sot_admin = mysqli_num_fields($qryrun_sot_admin_tbldata);

$result_sot_admin_check = mysqli_num_rows($qryrun_sot_admin_tbldata);

if($result_sot_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
        <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
          <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
        </span>
      </div>";
      
}
else{

  $l=0;
  while($result_sot_admin_tbldata = mysqli_fetch_array($qryrun_sot_admin_tbldata))
  {
    
?>
    <tr>
  <?php

    for($l=0;$l<=$col_sot_admin-1;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_sot_admin_tbldata[$l];?>
                       
                    </td>

  <?php

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
</div>

<?php
}

$i++;
}
  }
}

if(isset($_GET['submit_filter']))
{
if(isset($_GET['Hospital_sort']) && $_GET['Hospital_sort'] != 'all' && $_GET['date_sort'] != 'date_range'  && isset($_GET['search']) == false)
{
$hosname1 = $_GET['Hospital_sort'];
?>

<h1 class="mt-2 mb-2 p-2 font-bold text-2xl bg-indigo-400 text-center">

<?php
echo $hosname1;
?> Details
</h1>
<?php
if($hosname1 != 'all')
{
  

$result_req = mysqli_query($con,"SELECT * FROM `$hosname1`");
$col_admin_single = mysqli_num_fields($result_req);
$m=1;
while($data_req = mysqli_fetch_array($result_req))   
{
  if($m<=9)
  {
    $dbreq = $data_req[10];
  }

?>



<div class="<?php echo $dbreq;?> container overflow-x-auto">
  <h1 class="mt-2 mb-2 p-2  bg-green-100 text-xl">
  
  <?php
  echo $dbreq;
  ?> Details
  </h1>
  <table  class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
                <thead>
                  <tr>
                <th class="th-sm"> No.</th>
 
                    <?php 
                   $result_admin_tbl_head_outpatient_single = mysqli_query($con,"SELECT * FROM `$hosname1`");
                   while($data_admin_tbl_head_outpatient_single = mysqli_fetch_array($result_admin_tbl_head_outpatient_single))
                   {
                      if($data_admin_tbl_head_outpatient_single[$m] != NULL)
                      {
                        ?>
                        <th class="th-sm"><?php echo $data_admin_tbl_head_outpatient_single[$m];?></th>

                        <?php

                      }
                      else{
                        continue;
                    }
                   
                   }
                 
                 ?>

                           <!-- <th class="th-sm">Date</th>
                    
                    <th class="th-sm">
                      Action
                    </th> -->
                   
                    <th class="th-sm">
                      Date
                    </th>
                    <th class="th-sm">
                      Updated Time
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php
   
$qryrun_outpatient_single_admin_tbldata = mysqli_query($con,"SELECT * FROM `{$hosname1}_{$dbreq}`");

$col_outpatient_single_admin = mysqli_num_fields($qryrun_outpatient_single_admin_tbldata);

$result_outpatient_single_admin_check = mysqli_num_rows($qryrun_outpatient_single_admin_tbldata);

if($result_outpatient_single_admin_check == NULL)
{

        echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
        <strong class='font-bold pl-10'>No Users Found!!</strong>
        <span class='block sm:inline '> Please Add users to Get updated!!</span>
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

    for($l=0;$l<=$col_outpatient_single_admin-2;$l++)
    {
    ?>
  
                    <td>
                      
                            <?php echo $result_outpatient_single_admin_tbldata[$l];?>
                         
                    </td>

  <?php

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
}
}
  }
?>
  


            </div>
          </div>
        </div>
      </div>
    </div>
</div>

 <?php
 if($_GET['Hospital_sort'] == 'all')
  {
    ?>

  <div id="viewbar_all" style=" display:inline-block; text-align:center;" class="relative left-72">
    <table  class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
      <thead>
        <h1 class="text-center font-bold text-2xl mb-10">
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
   
    
 <?php

  }
  ?>


<script>
function func1(){
document.getElementById("cont").remove();
}
</script>

<!-- <script>
  $(document).ready(function () {
  class'#dtBasicExample').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script> -->
   

<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js">
    </script>
    <script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap5.min.js"></script>
    <script>
      $(document).ready(function() {
  $('table').DataTable();
  $('.dataTables_length').addClass('bs-select');
  });
</script>


<script>
function category(){
    <?php
if(isset($_GET['Hospital_sort'])  || isset($_GET['search']) || isset($_GET['date_sort']) || isset($_GET['submit_filter']))
{
  if($_GET['Hospital_sort'] == 'all' || isset($_GET['search']) || $_GET['date_sort'] == 'date_range' || $_GET['Hospital_sort'] != 'all' )
  {
    
    ?>
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

    <?php
  }
}
    
    ?>
  }
</script>




</body>

</html>