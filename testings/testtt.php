<?php

include '../dbcon/dbcon.php';

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


