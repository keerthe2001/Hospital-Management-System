<?php
   include '../dbcon/dbcon.php';               
                
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
                    $select_db_single9 = $data_db9['Hospital_name'];
                    $result_db_single10 = mysqli_query($con, "SELECT * FROM `$select_db_single9`");
                    $n=0;
                    while($data_db_single9 = mysqli_fetch_array($result_db_single10))
                    {
                     echo $hname = $data_db_single9[10];
                     $m=1;
                      while($data_db_single11 = mysqli_fetch_array($result_db_single10))
                      {
                        if($data_db_single11["$hname"] != NULL)
                        {
                        echo $col_name9[$n] = $data_db_single11["$hname"];
                        $result_db_each9 = mysqli_query($con, "SELECT SUM($col_name9[$n]) as $col_name9[$n] FROM `{$select_db_single9}_$hname`");
                    
                        $result_db_each_one9 = mysqli_fetch_array($result_db_each9);
                        
                        echo $result_db_each_one9["$col_name9[$n]"];
                          
                        }
                       
                      }
                      
                    }
                    $i++;
                  }
                  
                ?>