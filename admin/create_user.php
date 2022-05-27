<?php
include '../dbcon/dbcon.php';
include 'user_create_register.php';
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
  <title>create user</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css">
  <link rel="stylesheet" href="../css/style1.css">
  <link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">

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
  <div class="pt-14 flex flex-col">
    <div class="md:col-span-1">
      <div class="px-4 sm:px-0">

      </div>
    </div>
    <div class="mt-5 md:mt-0 md:col-span-2 pt-10">
      <form action="user_create_register.php" method="POST">
      
        <div class="shadow-2xl  bg-white overflow-hidden sm:rounded-md">
          <div class="px-4 py-5 bg-white sm:p-6">
            <h1 class="text-lg font-bold leading-6 text-gray-900 ">User Details</h1>
            <p class="mt-1 text-sm text-gray-600  pb-6">
              Use a permanent address where you can receive mail.
            </p>
           
          <?php
   
    if(isset( $_SESSION['fail']))
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
        <input type="hidden" value="<?php echo $id; ?>" name="id" id="id" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">

            <div class="grid grid-cols-6 gap-6">
              <div class="col-span-6 sm:col-span-3">
                <label for="user_name" class="block text-sm font-medium text-gray-700">user Name:</label>
                <input type="text" value="<?php echo $Ename; ?>"  name="user_name" id="user_name" autocomplete="given-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
              </div>

              <!-- <div class="col-span-6 sm:col-span-3">
                <label for="last_name" class="block text-sm font-medium text-gray-700">Last name</label>
                <input type="text" name="last_name" id="last_name" autocomplete="family-name" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div> -->

              <div class="col-span-6 sm:col-span-4">
                <label for="user_email" class="block text-sm font-medium text-gray-700">Email:</label>
                <input type="text" value="<?php echo $Eemail; ?>"  name="user_email" id="user_email" autocomplete="email" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
              </div>

              <div class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="user_id" class="block text-sm font-medium text-gray-700">User Id:</label>
                <input type="text" value="<?php echo $Eid; ?>"  name="user_id" id="user_id" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
              </div>
              <!-- <div class="col-span-6 sm:col-span-3">
                <label for="country" class="block text-sm font-medium text-gray-700">Country / Region</label>
                <input type="text" id="country" name="country" autocomplete="country" class="mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                  
              </div> -->

              <!-- <div class="col-span-6">
                <label for="orgaddress" class="block text-sm font-medium text-gray-700"> Address:</label>
                <input type="text" name="orgaddress" id="orgaddress" autocomplete="street-address" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
              </div> -->
              <div class="col-span-6">
                <label for="Assign_Hospital" class="block text-sm font-medium text-gray-700"> Assign Hospital</label>
                <?php
                        // $qry= "SELECT * FROM Hospital";
                        $qry2=" SELECT user.Assign_Hospital,Hospital.Hospital_name
                                FROM user
                               RIGHT JOIN Hospital ON user.user_id = Hospital.Hospital_id";
              // $s = mysqli_query($con,$qry);
              $s2 = mysqli_query($con,$qry2);
              
            
              // while($row1 = mysqli_fetch_array($s2)){
              //   if($row1[0] != $row1[1]){
              //     // echo $row1[0];
              //     echo $row1[1];
              //   }
              // }



         ?>  
                            <select  required   name="Assign_Hospital" id="" class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="" >--Select Hospital--</option>'
                             <?php while($row1 = mysqli_fetch_array($s2))
                             {
                              if($row1[0] != $row1[1])
                              {

                              ?>
                             
                              <option class="h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" value="<?php echo $row1[1];?>" ><?php echo $row1[1];?></option>
                              <?php }
                              }?>
                            </select>

              </div>

              <div  class="col-span-6 sm:col-span-6 lg:col-span-2">
                <label for="user_mobile" class="block text-sm font-medium text-gray-700">contact no:</label>
                <input type="text" value="<?php echo $Ephone; ?>"  name="user_mobile" id="user_mobile" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
              </div>

              <div class="col-span-6 sm:col-span-3 lg:col-span-2">
                <label for="user_password" class="block text-sm font-medium text-gray-700">password:</label>
                <input type="password" value="<?php echo $Epassword; ?>" name="user_password" id="user_password" class=" h-10 mt-1 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md shadow-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
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
           
            <button type="submit" name="submit_user" class="inline-flex justify-center py-2 px-4 border border-transparent shadow-md text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" onclick="">
              Save
            </button>
<?php
            }
            ?>

          </div>
        </div>
      </form>

    </div>
  </div>
</div>

</body>

</html>