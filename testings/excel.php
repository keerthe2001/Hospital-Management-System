<?php  
//export.php  
error_reporting(0);
session_start();
include '../dbcon/dbcon.php';

$output = '';
if(isset($_POST["export-all"]))
{

if(isset($_SESSION['Hos']))
{
  if($_SESSION['Hos'] == 'all')
  {
  $num_of_hospitals = mysqli_query($con,"SELECT * FROM Hospital");
  while($hospitals = mysqli_fetch_array($num_of_hospitals))
  {
    $num_of_hospital_headings = mysqli_query($con,"SELECT * FROM `$hospitals[1]`");
    $i=1;
      while($hospitals_headings = mysqli_fetch_array($num_of_hospital_headings))
        {
          $output = '<h1>'.$hospitals[1].' '.$hospitals_headings[10].'</h1>
          <table class="table" border="2">
          <thead>  
                            <tr>
                            <th>No.</th>';
          $query = "SELECT * FROM `$hospitals[1]_$hospitals_headings[10]`";

          $result = mysqli_query($con, $query);
          if(mysqli_num_rows($result) > 0)
          {
            $table_topics = mysqli_query($con,"SELECT * FROM `$hospitals[1]`");
            
            while($topics = mysqli_fetch_array($table_topics)){
              if($topics[$i] != NULL)
                {
                  $output .='<th>'.$topics[$i].'</th>';
                  
                }
              }
            $output .='<th>select period</th><th>Date</th><th>updated date</th></tr><tbody>';
            $col_h = mysqli_num_fields($result);
            while($row = mysqli_fetch_array($result))
            {
              if(mysqli_num_rows($result) > 0)
                {
              $output .='<tr>';
              for($n=0;$n<=$col_h-1;$n++)
              {
                // if($row[$n] != NULL)
                // {
                $output .= ' <td>'.$row[$n].'</td>';
                // }
              }
              $output .='</tr>';
            }
            else{
              echo "Alert!!!No data found in this table";
            }
            }
            $output .= '</tbody></tr></table>';
          }
            header('Content-Type: application/xls');
            header('Content-Disposition: attachment; filename=download.xls');
            echo $output;
            $i++;
        }
            }


          }


          if($_SESSION['Hos']!= 'all')
          {
            $hospitals[1]  =  $_SESSION['Hos'];
            ;
              $num_of_hospital_headings = mysqli_query($con,"SELECT * FROM `$hospitals[1]`");
              $i=1;
                while($hospitals_headings = mysqli_fetch_array($num_of_hospital_headings))
                  {
                    $output = '<h1>'.$hospitals[1].' '.$hospitals_headings[10].'</h1>
                    <table class="table" border="2">
                    <thead>  
                                      <tr>
                                      <th>No.</th>';
                    $query = "SELECT * FROM `$hospitals[1]_$hospitals_headings[10]`";
          
                    $result = mysqli_query($con, $query);
                    if(mysqli_num_rows($result) > 0)
                    {
                      $table_topics = mysqli_query($con,"SELECT * FROM `$hospitals[1]`");
                      
                      while($topics = mysqli_fetch_array($table_topics)){
                        if($topics[$i] != NULL)
                          {
                            $output .='<th>'.$topics[$i].'</th>';
                            
                          }
                        }
                      $output .='<th>select period</th><th>Date</th><th>updated date</th></tr><tbody>';
                      $col_h = mysqli_num_fields($result);
                      while($row = mysqli_fetch_array($result))
                      {
                        if(mysqli_num_rows($result) > 0)
                          {
                        $output .='<tr>';
                        for($n=0;$n<=$col_h-1;$n++)
                        {
                          // if($row[$n] != NULL)
                          // {
                          $output .= ' <td>'.$row[$n].'</td>';
                          // }
                        }
                        $output .='</tr>';
                      }
                      else{
                        echo "Alert!!!No data found in this table";
                      }
                      }
                      $output .= '</tbody></tr></table>';
                    }
                      header('Content-Type: application/csv');
                      header('Content-Disposition: attachment; filename=download.csv');
                      echo $output;
                      $i++;
                  }
                      
          
          
                    }
                  
                

        }
}

?>