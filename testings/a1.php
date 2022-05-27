<?php
$con=mysqli_connect('localhost','root','','task');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-9">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

 

</head>
<body>
<div id="viewtable" class="viewtable1">
      <!-- This example requires Tailwind CSS v2.0+ -->
      <div class="w-11/12 mx-auto  flex flex-col">

        <div class="-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8">
          <div class=" pb-20 align-middle inline-block min-w-full sm:px-6 lg:px-8">
            <div class="overflow-hidden sm:rounded-lg">

              
              <?php
    if(isset($_GET['search']))
    {
      $filterdata = $_GET['search'];
      $r = mysqli_query($con,"SELECT * FROM hospital");
      $i=0;
      while($d = mysqli_fetch_array($r))
      {
        $hos[$i] = $d['Hospital_name'];
        
        ?>

<h1 class="mt-10 mb-10 p-5 font-bold text-2xl bg-indigo-400 text-center">
  <?php echo $hos[$i];?> Details
</h1>


<?php
        $r0 = mysqli_query($con,"SELECT * FROM $hos[$i]");
        $j=1;
        while($d0 = mysqli_fetch_array($r0))
        {
          $hname = $d0[10];
          ?>

<table class="shadow-2xl min-w-full divide-y divide-gray-200 bg-gray-300">
<thead class="bg-gray-50">
  <tr>
<th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>
      <?php
          $r1 = mysqli_query($con,"SELECT * FROM $hos[$i]");
          
          while($d1 = mysqli_fetch_array($r1))
          {
          
              if($d1[$j] != NULL)
              {
                ?>
                <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"><?php echo $d1[$j];?></th>

                <?php

              }
              else
              {
                continue;
              }
              
          }
          
      ?>
     <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">period</th>
     <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">date</th>
     <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">updated time</th>
</tr>
    </thead>
    <tbody>
      <?php
    
          $r2 = mysqli_query($con,"SELECT * FROM `$hos[$i]_$hname` WHERE updated_time LIKE '%$filterdata%' ");
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
                if($d2[$n] != NULL)
                {
              ?>
               <td class='px-6 py-4 whitespace-nowrap'>
                      <div class='flex justify-center items-center'>
                        <div class='ml-4'>
                          <div class='text-sm text-center font-medium text-gray-900'>
                            <?php echo $d2[$n];?>
                          </div>
                        </div>
                      </div>
                </td>

              <?php
                }
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

          <?php
        }
        $i++;
      }
      
    }
      ?>
</div>
          </div>
        </div>
      </div>
</div>


</body>
</html>