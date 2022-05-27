<?php

$con = mysqli_connect("localhost","root","","task");
$row = 9;
$r2 = mysqli_query($con,"SELECT * FROM `Hospital3`");
// $d = mysqli_fetch_row($r2);

while($d = mysqli_fetch_array($r2))
{
echo $hname = $d[10];

$r3 = mysqli_query($con,"SELECT * FROM `Hospital3`");
?>




<table class="max-w-full divide-y divide-gray-200 bg-gray-300 mb-10">
  				<thead class="bg-gray-100">
   					 <tr>
 						 <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">No.</th>



<?php
while($d = mysqli_fetch_array($r3))
{
	if($d[$hname] != NULL)
	{
			 $subhname = $d[$hname];
			echo '</br>';
?>




<th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider"> Total <?php echo $subhname;?></th>




<?php
	}
}

?>



	</tr>
    </thead>
    <tbody class="bg-white divide-y divide-gray-200">




<?php
while($d2 = mysqli_fetch_array($r3))
{
?>

<tr>

<?php

if($d2[$hname] != NULL)
	{
			echo $subhname = $d2[$hname];
			echo '</br>';

$r4 = mysqli_query($con,"SELECT SUM($subhname) as summ FROM `Hospital3_$hname`");
$d4 = mysqli_fetch_array($r4);

?>
	
			 <td class='px-6 py-4 whitespace-nowrap'>
                      <div class='flex justify-center items-center'>
                        <div class='ml-4'>
                          <div class='text-xs text-center font-medium text-gray-900'>
                            <?php echo $d4['summ'];?>
                          </div>
                        </div>
                      </div>
                </td>


<?php

}

}
?>


</tr>
</tbody>
</table>
<?php


}	


?>