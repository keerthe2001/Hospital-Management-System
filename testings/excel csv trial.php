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
  if($_GET['FileType'] == 'csv')
  {
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



}

?>