<?php
include '../dbcon/dbcon.php';
error_reporting(0);

?>

<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>


</head>
  <body>

  <div id="viewbar_Hospital" style=" display:inline-block;" class="relative left-40 top-32">
    <table  class="table table-striped table-bordered table-sm" cellspacing="20" width="100%">
      <thead>
        <h1 class="text-center font-bold text-2xl mb-10">
          <?php echo 'Hospital1';?> Report
        </h1>
      </thead>
      <tbody>

 <tr>
<td>   
    <div class="mt-5" id="barchart_material1" style="width: 250px; height: 400px;"></div>
</td>
<td>  
     <div class="mt-5 ml-40" id="barchart_material2" style="width:350px; height: 400px;"></div>
</td>
 </tr>

 <tr>
<td>   
<div class="mt-5" id="barchart_material3" style="width: 375px; height: 400px;"></div>
</td>

<td>   
<div class="mt-5 ml-40" id="barchart_material4" style="width: 350px; height: 400px;"></div>
</td>
 </tr>

 <tr>
   <td>   <div class="mt-5" id="barchart_material5" style="width: 250px; height: 400px;"></div>
   </td>
   <td>   <div class="mt-5 ml-40" id="barchart_material6" style="width: 250px; height: 400px;"></div>
   </td> 
 </tr>

 <tr>
   <td>     <div class="mt-5" id="barchart_material7" style="width: 350px; height: 400px;"></div>
   </td>
   <td>   <div class="mt-5 ml-20" id="barchart_material8" style="width: 400px; height: 500px;"></div>
   </td>

 </tr>

 <tr>
   <td>       <div class="mt-5" id="barchart_material9" style="width: 300px; height: 400px;"></div>
   </td>

 </tr>

      </tbody>
    </table>
  </div>
</div>
  


  </body>
</html>