<aside class="w-56 h-full fixed mt-20 bg-indigo-300 shadow-2xl dark:bg-gray-900 flex  h-full" aria-label="Sidebar">
    <div class="px-3 py-4 overflow-y-auto rounded ">
      <ul class="space-y-2">
        <li>
          <a href="../admin/admin_home.php?date_sort=none&from_date=&to_date=&Hospital_sort=all&submit_filter="
            class="flex items-center p-2 text-base font-normal text-indigo-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg class="w-6 h-6 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-gray"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
           <span class="ml-3" onclick="location.href='../task1/admin_home.php'"> Dashboard </span>
          </a>
        </li>
      <?php

      if(isset($_SESSION['name']))
      {
        
      
      ?>
        <li>
          <a href="../admin/manage.php"
            class="flex items-center p-2 text-base font-normal text-indigo-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg
              class="flex-shrink-0 w-6 h-6 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
              </path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Manage</span>
          </a>
        </li>
        <li>
          <a href="../admin/Add_Hospital.php"
            class="flex items-center p-2 text-base font-normal text-indigo-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg
              class="flex-shrink-0 w-6 h-6 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M5 3a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2V5a2 2 0 00-2-2H5zM5 11a2 2 0 00-2 2v2a2 2 0 002 2h2a2 2 0 002-2v-2a2 2 0 00-2-2H5zM11 5a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2V5zM11 13a2 2 0 012-2h2a2 2 0 012 2v2a2 2 0 01-2 2h-2a2 2 0 01-2-2v-2z">
              </path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Add Hospital</span>
          </a>
        </li>
        <li>
          <a href="../admin/create_user.php"
            class="flex items-center p-2 text-base font-normal text-indigo-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg
              class="flex-shrink-0 w-6 h-6 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path
                d="M8.707 7.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l2-2a1 1 0 00-1.414-1.414L11 7.586V3a1 1 0 10-2 0v4.586l-.293-.293z">
              </path>
              <path
                d="M3 5a2 2 0 012-2h1a1 1 0 010 2H5v7h2l1 2h4l1-2h2V5h-1a1 1 0 110-2h1a2 2 0 012 2v10a2 2 0 01-2 2H5a2 2 0 01-2-2V5z">
              </path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Create User</span>

          </a>
        </li>
        <!-- <li>
          <a href=""
          class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
          <svg
          class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
          fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
          <path fill-rule="evenodd"
          d="M3 3a1 1 0 00-1 1v12a1 1 0 102 0V4a1 1 0 00-1-1zm10.293 9.293a1 1 0 001.414 1.414l3-3a1 1 0 000-1.414l-3-3a1 1 0 10-1.414 1.414L14.586 9H7a1 1 0 100 2h7.586l-1.293 1.293z"
          clip-rule="evenodd"></path>
        </svg>
        <span class="flex-1 ml-3 whitespace-nowrap">Download Report </span>
      </a>
    </li> -->

    <?php
      }
      ?>
  <li>
    <a href="../admin/admin_update_report.php"
      class="flex items-center p-2 text-base font-normal text-indigo-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg
        class="flex-shrink-0 w-6 h-6 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
        </path>
      </svg>
      <span class="flex-1 ml-3 whitespace-nowrap">Update Report</span>
    </a>
  </li>
  
        <li>
          <a href="../admin/logout_admin.php"
            class="flex items-center p-2 text-base font-normal text-indigo-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg
              class="flex-shrink-0 w-6 h-6 text-gray-900 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                clip-rule="evenodd"></path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Log out</span>
          </a>
        </li>


       




        <?php
  if(isset($_GET['Hospital_sort']))
{
  if($_GET['Hospital_sort'] == 'all')
  {
    $_SESSION['Hos'] = $_GET['Hospital_sort'];
  ?>
   <li class="p-4 ml-4 bg-gray-100 shadow-2xl">
<!-- <div class="flex justify-center ml-4 pl-72" style="position:relative;right:455px; top:320px;"> -->
<form method="GET" action="excel csv.php">
  <label class="block text-sm font-medium text-gray-700"  for="">Choose Excel Formal:</label>
  <select class="mr-2 h-9 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="FileType" id="">
    <option value="xls">xls</option>
    <option value="csv">csv</option>
  </select>
     <input type="submit" name="export-all" class="flex items-center mt-2 p-2 w-full justify-center text-center text-sm font-bold text-gray-50 rounded-lg dark:text-white bg-blue-500 hover:bg-blue-400 dark:hover:bg-blue-600" value="Export to Excel" >
</form>
</li>
<!-- </div> -->
            <?php
}

?>

<?php

if($_GET['Hospital_sort'] != 'all')
{
  $_SESSION['Hos'] = $_GET['Hospital_sort'];

  ?>
   <li class="p-4 ml-4 bg-gray-100 shadow-2xl">
<form method="GET" action="excel csv.php">
<label class="block text-sm font-medium text-gray-700"  for="">Choose Excel Formal:</label>
<select class="mr-2 h-9 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="FileType" id="">
    <option value="xls">xls</option>
    <option value="csv">csv</option>
  </select>

     <input type="submit" name="export-all"class="flex items-center mt-2 p-2 w-full justify-center text-center text-sm font-bold text-gray-50 rounded-lg dark:text-white bg-blue-500 hover:bg-blue-400 dark:hover:bg-blue-600" value="Export to Excel">
</form>
</li>
            <?php
}
}
?> 




      </ul>
    </div>
  </aside>

</body>
</html>
 