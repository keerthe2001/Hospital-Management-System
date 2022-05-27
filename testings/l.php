<?php
$con = mysqli_connect("localhost","root","","task");



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