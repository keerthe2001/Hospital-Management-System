<?php

// include '../dbcon.php';
include 'register_Hospital.php';
if(!isset($_SESSION['name'])){
  header('location:../index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Add Hospital</title>
  
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style1.css">
  <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">

</head>

<body class="bg-gray-100">

<!-- header -->

<?php
include 'header.php';
?>


<?php
include 'admin_side_bar.php';
?>

 <div class="flex justify-center mt-10 sm:mt-0">
  <div class="pt-20 pb-20 flex flex-col">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">

      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2 pt-10">
      <form action="register_Hospital.php" method="POST">
      
        <div class="shadow-2xl  bg-white overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <h1 class="text-lg font-bold leading-6 text-gray-900 ">Hospital Details</h1>
            <p class="mt-1 text-sm text-gray-600  pb-6">
              Use a permanent address where you can receive mail.
            </p>
           
          <?php
   
    if(isset($_SESSION['fail']))
          {
            ?>

           <p class='mt-1 text-sm text-red-600 pb-6'>
            <?php
            echo  $_SESSION['fail'];
            unset($_SESSION['fail'])
            ?> 
            </p>
            <?php
          }
          ?>
          <?php
   
    if(isset( $_SESSION['success']))
          {
            ?>

           <p class='mt-1 text-sm text-green-600 pb-6'>
            <?php
            echo  $_SESSION['success'];
            unset( $_SESSION['success'])
            ?> 
            </p>
            <?php
          }
          ?>
              
          
                <input type="hidden" value="<?php echo $id; ?>" name="id" id="Hospital_name" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
           
            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="Hospital_name" class="block text-sm font-medium text-gray-700">Hospital Name:</label>
                <input type="text" value="<?php echo $Ename; ?>" name="Hospital_name" id="Hospital_name" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <!-- <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" name="last_name" id="last_name" autocomplete="family-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div> -->

              <div class="col-span-6 sm:col-span-4">
                <label for="Hospital_email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="text"  value="<?php 
                if(isset($_GET['edit'])){
                  echo $row['Hospital_email'];
                }?>" name="Hospital_email" id="Hospital_email" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="Hospital_id" class="block text-sm font-medium text-gray-700">Hospital Id:</label>
                <input type="text"  value="<?php if(isset($_GET['edit'])){ echo $row['Hospital_id'];}?>" name="Hospital_id" id="Hospital_id" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              <!-- <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                <input type="text" id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  
              </div> -->

              <div class="col-span-6">
                <label for="Hospital_address" class="block text-sm font-medium text-gray-700"> Address:</label>
                <input type="text"  value="<?php if(isset($_GET['edit'])){ echo $row['Hospital_Address'];} ?>" name="Hospital_address" id="Hospital_address" autocomplete="street-address" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
              
              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="Hospital_phone" class="block text-sm font-medium text-gray-700">contact no:</label>
                <input type="text"  value="<?php if(isset($_GET['edit'])){ echo $row['Hospital_phone'];}?>" name="Hospital_phone" id="Hospital_phone" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="Hospital_password" class="block text-sm font-medium text-gray-700">password:</label>
                <input type="password"  value="<?php if(isset($_GET['edit'])){ echo $row['Hospital_password'];}?>" name="Hospital_password" id="Hospital_password" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div>
<!-- 
              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="postal_code" class="block text-sm font-medium text-gray-700">ZIP / Postal</label>
                <input type="text" name="postal_code" id="postal_code" autocomplete="postal-code" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div> -->
            </div>
          </div>
          <div class="px-4 py-3 bg-gray-50 text-center sm:px-6">
            <?php
            if($update == true)
            {
?>
            <button type="submit" name="update" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="">
              Update
            </button>
            <?php
            }
            else
            {
              ?>

         <button type="submit" name="submit_Hospital" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="" >
              Save
            </button>

            <?php
            }
?>
<?php




?>


          </div>
        </div>
      </form>
    </div>
  </div>
</div>

</body>

</html>