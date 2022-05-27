<?php  
//export.php  
error_reporting(0);
session_start();
include '../dbcon/dbcon.php';

$output = '';
if(isset($_GET["export-all"]))
{

  if(isset($_GET['FileType']))
{
  if($_GET['FileType'] == 'xls')
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
                $output .='<th>Date</th><th>updated date</th></tr><tbody>';
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
                          $output .='<th>Date</th><th>updated date</th></tr><tbody>';
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
  if($_GET['FileType'] == 'csv')
  {
    if(isset($_SESSION['Hos']))
    {
      if($_SESSION['Hos'] == 'all')
      {
    $queryhos = mysqli_query($con,"SELECT * FROM `Hospital`");
while($queryhosdata = mysqli_fetch_array($queryhos)) 
{
   $hospit =  $queryhosdata[1];
   $hospitaldata = mysqli_query($con,"SELECT * FROM `$hospit`");
   $i=0;
   while($hospitaldatacolum = mysqli_fetch_array($hospitaldata)){
     $hosdatacol = $hospitaldatacolum[10];
	 ?>
<?php echo $hosdatacol; ?>

<?php
     
$query1 = "SELECT * FROM `{$hospit}_$hosdatacol`";
$result = mysqli_query($con, $query1) or die("database error:". mysqli_error($con));
$records = array();
while( $rows = mysqli_fetch_assoc($result) ) {
	$records[] = $rows;
}
  

	$csv_file = "hopsital_data_csv_export_".date('Ymd') . ".csv";			
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=\"$csv_file\"");	
	$fh = fopen( 'php://output', 'w' );
	$is_coloumn = true;
	if(!empty($records)) {
	  foreach($records as $record) {
		if($is_coloumn) {		  	  
		  fputcsv($fh, array_keys($record));
		  $is_coloumn = false;
		}		
		fputcsv($fh, array_values($record));
	  }
	   fclose($fh);
	}
	 

   }
  }


}

if($_SESSION['Hos']!= 'all')
{
  $hospitals[1]  =  $_SESSION['Hos'];
                
	$num_of_hospital_headings = mysqli_query($con,"SELECT * FROM `$hospitals[1]`");
  
   while($hospitaldatacolum = mysqli_fetch_array($num_of_hospital_headings)){
     $hosdatacol = $hospitaldatacolum[10];
	 ?>
<?php echo $hosdatacol; ?>

<?php
     
$query1 = "SELECT * FROM `{$hospitals[1]}_$hosdatacol`";
$result = mysqli_query($con, $query1) or die("database error:". mysqli_error($con));
$records = array();
while( $rows = mysqli_fetch_assoc($result) ) {
	$records[] = $rows;
}
  

	$csv_file = "hopsital_data_csv_export_".date('Ymd') . ".csv";			
	header("Content-Type: text/csv");
	header("Content-Disposition: attachment; filename=\"$csv_file\"");	
	$fh = fopen( 'php://output', 'w' );
	$is_coloumn = true;
	if(!empty($records)) {
	  foreach($records as $record) {
		if($is_coloumn) {		  	  
		  fputcsv($fh, array_keys($record));
		  $is_coloumn = false;
		}		
		fputcsv($fh, array_values($record));
	  }
	   fclose($fh);
	}
	 

   }
}
}

  }
  }//FileType
}//Export-all

?>