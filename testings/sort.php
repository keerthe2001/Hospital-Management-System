<?php
session_start();
error_reporting(0);

include '../dbcon/dbcon.php';

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
			

			$r1 = mysqli_query($con,"SELECT * FROM `Hospital`");

			while($d = mysqli_fetch_array($r1))
			{
				$hos = $d['Hospital_name'];
				echo '<br>';

				?>

					<h1 class="mt-10 mb-10 p-5 font-bold text-2xl bg-indigo-400 text-center">
					<?php echo $hos;?> sorted Details
					</h1>


				<?php

				$r2 = mysqli_query($con,"SELECT * FROM `$hos`");

					while($d1 = mysqli_fetch_array($r2))
					{
						echo $hname = $d1[10];
						echo '<br>';

						?>

						<div class="container overflow-x-auto">
							<h1 class="mt-2 mb-2 p-2 bg-green-100 font-bold text-2xl">
							<?php echo $hname;?> sorted Details
							</h1>
							<table class="max-w-full divide-y divide-gray-200 bg-gray-300 mb-10">
								<thead class="bg-gray-100">
									<tr>
										<th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
											No.
										</th>		

						<?php
						$r3 = mysqli_query($con,"SELECT $hname FROM `$hos`");

						while($d2 = mysqli_fetch_array($r3))
						{
							?>
							
							<th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
								
								<?php 
								
								echo $d2[$hname];
								
								?>
							
							</th>

							<?php
						}

						?>
									
										<th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">date</th>
										<th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">updated time</th>
									</tr>
								</thead>
								<tbody class="bg-white divide-y divide-gray-200">

										<tr>
									<td class='px-6 py-4 whitespace-nowrap'>
														<div class='flex justify-center items-center'>
															<div class='ml-4'>
															<div class='text-xs text-center font-medium text-gray-900'>
																<?php echo $d2[$n];?>
															</div>
															</div>
														</div>
													</td>

									</tr>
						
								<?php

						 
	
					}
			
			}								

		}

	}
}

?>