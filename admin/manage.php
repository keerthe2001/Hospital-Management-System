<?php
session_start();
include '../dbcon/dbcon.php';

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
  <title>manage</title>
<link rel="shortcut icon" href="../img/logo.jpeg" type="image/x-icon">

<!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
   -->
  <link rel="stylesheet" href="../css/style.css"> 
<link rel="stylesheet" href="../css/style1.css">

<link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">


<style>
  .close_btn{
    display:hidden;
  }
</style>
</head>

<body>
<?php
include 'header.php';
?>

<?php
include 'admin_side_bar.php';
?>
  <?php 
  if(isset($_SESSION['deleted']))
  {
    ?>
  <div id = "cont" class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold pl-10">Success!!</strong>
  <span class="block xs:inline ">Successfully deleted the Hospital</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="func1();">
    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>

    <?php
    unset($_SESSION['deleted']);
  }
  ?>
  <?php 
  if(isset($_SESSION['updated']))
  {
    ?>
  <div id="cont"class="bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative" role="alert">
  <strong class="font-bold pl-10">Success!!</strong>
  <span class="block xs:inline "> Hospital Details Have Been Updated!!</span>
  <span class="absolute top-0 bottom-0 right-0 px-4 py-3" onclick="func1();">
    <svg class="fill-current h-6 w-6 text-green-500" role="button" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><title>Close</title><path d="M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z"/></svg>
  </span>
</div>

    <?php
    unset($_SESSION['updated']);
  }
  ?>

   

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="w-3/4 relative right-16 top-16 float-right flex flex-col">
  <div class="flex">
  <h1 class="text-3xl relative  w-3/4  py-10  text-gray-600" style="font-family: 'Noto Serif', serif;">
        Hospitals Registered
    </h1>
  </div>

  <div class=" overflow-x-auto ">
    <div class=" pb-4 align-middle inline-block max-w-full ">
      <div class="container">
        <table class="max-w-full divide-y divide-gray-200">
          <thead class="bg-gray-200">
            <tr>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Hospital Name</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Hospital Email</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Hospital Address</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Hospital Phone</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Hospital Id</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">
               Action
              </th>
            </tr>
          </thead>
          <tbody class="bg-gray-100 divide-y divide-gray-300">



          <?php

$qry1 = "SELECT * FROM `Hospital`";
$s1 = mysqli_query($con,$qry1);
$result = mysqli_fetch_assoc($s1);
do
{
  if($result != NULL)
{
  ?>
 <tr>

    <td class='px-6 py-4 whitespace-nowrap'>
    <div class='flex items-center'>
      <div class='ml-4'>
        <div class='text-xs font-medium text-gray-900'><?php echo $result['Hospital_name'];?></div>
      </div>
    </div>
  </td>

<td class=' whitespace-nowrap text-center'>
  <div class='text-xs text-gray-900 text-center'><?php echo $result['Hospital_email'];?></div>
</td>
  <td class=' whitespace-nowrap text-center'>
  <div class='text-xs text-gray-900 text-center'><?php echo $result['Hospital_Address'];?></div>
</td>
  <td class=' whitespace-nowrap text-center'>
  <div class='text-xs text-gray-900 text-center'><?php echo $result['Hospital_phone'];?></div>
</td>
  <td class=' whitespace-nowrap text-center'>
  <div class='text-xs text-gray-900 text-center'><?php echo $result['Hospital_id'];?></div>
</td>

<td class=' whitespace-nowrap text-center text-xs font-medium'>
<a href='Add_Hospital.php?edit=<?php echo $result['id'];?>' class='bg-blue-500 hover:bg-blue-700 text-white py-1 px-1 rounded'>Edit</a>
              
<a href='register_Hospital.php?delete=<?php echo $result['id'];?>' class='deleteNotify bg-red-500 hover:bg-red-700 text-white  py-1 px-1 rounded' onclick="deleteNotify()">Delete</a>
              </td>
    </tr>
    <?php
  }
  else{
    echo "<div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
    <strong class='font-bold pl-10'>No Hospitals Found!!</strong>
    <span class='block xs:inline '> Please Add users to Get updated!!</span>
    <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
      <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
    </span>
  </div>";
  }
}
  while($result = mysqli_fetch_assoc($s1))

?>
<script>
function deleteNotify(){
alert();
function myFunction() {
  let text = "Are you sure to Delete The Hospital? Data Loss may occur!!";
  if (confirm(text) == true) {
    continue;
  } else {
    break;
  }
  
}
}
</script>
            <!-- <tr>
              
            
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">Admin</td>
             
            </tr> -->

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>



    <h1 class="text-3xl relative right-20 top-2 py-10 pl-20 text-gray-600" style="font-family: 'Noto Serif', serif;">
        Users Registered
    </h1>

<!-- This example requires Tailwind CSS v2.0+ -->
<div class="w-full mx-auto relative top-20  flex flex-col">
  
  <div class="-my-2 relative bottom-20  overflow-x-auto xs:-mx-6 lg:-mx-8">
    <div class="pb-20 align-middle inline-block max-w-full xs:px-6 lg:px-8">
      <div class="containter">
        <table class="max-w-full divide-y divide-gray-200">
          <thead class="bg-gray-300">
            <tr>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">User Name</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">User Email</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">Assigned Hospital</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">User Phone</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">User Id</th>
              <th scope="col" class="px-6 py-3 text-center text-xs font-medium text-gray-700 uppercase tracking-wider">
                Action
              </th>
             
            </tr>
          </thead>
          <tbody class="bg-gray-100 divide-y divide-gray-300">



          <?php
$qry= "SELECT * FROM `user`";
$s = mysqli_query($con,$qry);
$result = mysqli_fetch_assoc($s);

  do
  {
    if($result != NULL)
{
  ?>
  <tr>

    <td class='px-6 py-4 whitespace-nowrap text-center'>
    <div class='flex items-center text-center'>
      <div class='ml-4 text-center'>
        <div class='text-xs font-medium text-gray-900 text-center'><?php echo $result['user_name'];?></div>
      </div>
    </div>
  </td>

  <td class=' whitespace-nowrap text-center'>
  <div class='text-xs  text-gray-900 text-center'><?php echo $result['user_email'];?></div>
</td>
  <td class=' whitespace-nowrap text-center'>
  <div class='text-xs text-gray-900 text-center'><?php echo $result['Assign_Hospital'];?></div>
</td>
  <td class=' whitespace-nowrap text-center'>
  <div class='text-xs text-gray-900 text-center'><?php echo $result['user_mobile'];?></div>
</td>
  <td class=' whitespace-nowrap text-center'>
  <div class='text-xs text-gray-900 text-center'><?php echo $result['user_id'];?></div>
</td>
<td class=' whitespace-nowrap text-center text-xs font-medium'>
<a href='create_user.php?edit=<?php echo $result['id'];?>' class='bg-blue-500 hover:bg-blue-700 text-white py-1 px-1 rounded'>Edit</a>
              
<a href='user_create_register.php?delete=<?php echo $result['id'];?>' class='bg-red-500 hover:bg-red-700 text-white  py-1 px-1 rounded'>Delete</a>
              </td>
    </tr>
<?php
  }
  else{
    echo " <div id='cont' class=' bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative' role='alert'>
    <strong class='font-bold pl-10'>No Users Found!!</strong>
    <span class='block xs:inline '> Please Add users to Get updated!!</span>
    <span  id='cont2' class=' absolute top-0 bottom-0 right-0 px-4 py-3' onclick='func1();'>
      <svg class='fill-current h-6 w-6 text-red-500' role='button' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'><title>Close</title><path d='M14.348 14.849a1.2 1.2 0 0 1-1.697 0L10 11.819l-2.651 3.029a1.2 1.2 0 1 1-1.697-1.697l2.758-3.15-2.759-3.152a1.2 1.2 0 1 1 1.697-1.697L10 8.183l2.651-3.031a1.2 1.2 0 1 1 1.697 1.697l-2.758 3.152 2.758 3.15a1.2 1.2 0 0 1 0 1.698z'/></svg>
    </span>
  </div>";
  }
}
  while($result = mysqli_fetch_assoc($s))



?>
<script>
function func1(){
document.getElementById("cont").remove();

}
</script>
            <!-- <tr>
              
            
              <td class="px-6 py-4 whitespace-nowrap">
                <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800"> Active </span>
              </td>
              <td class="px-6 py-4 whitespace-nowrap text-xs text-gray-500">Admin</td>
             
            </tr> -->

            <!-- More people... -->
          </tbody>
        </table>
      </div>
    </div>
  </div>




  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script> -->

</body>

</html>
