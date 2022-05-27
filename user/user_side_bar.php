<aside class="w-56 h-full fixed mt-20 bg-gray-200 dark:bg-gray-900 flex  h-full" aria-label="Sidebar">
    <div class="px-3 py-4 overflow-y-auto rounded ">
      <ul class="space-y-2">
        <li>
          <a href="#"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg
              class="w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path d="M2 10a8 8 0 018-8v8h8a8 8 0 11-16 0z"></path>
              <path d="M12 2.252A8.014 8.014 0 0117.748 8H12V2.252z"></path>
            </svg>
           <span class="ml-3" onclick="location.href='../user/user_home.php'"> Dashboard </span>
          </a>
        </li>
  
  <li>
    <a href="../user/update_report.php"
      class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
      <svg
        class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
        fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
        <path fill-rule="evenodd" d="M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z" clip-rule="evenodd">
        </path>
      </svg>
      <span class="flex-1 ml-3 whitespace-nowrap">Update Report</span>
    </a>
  </li>

        <li>
          <a href="../user/logout_user.php"
            class="flex items-center p-2 text-base font-normal text-gray-900 rounded-lg dark:text-white hover:bg-gray-100 dark:hover:bg-gray-700">
            <svg
              class="flex-shrink-0 w-6 h-6 text-gray-500 transition duration-75 dark:text-gray-400 group-hover:text-gray-900 dark:group-hover:text-white"
              fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd"
                d="M5 4a3 3 0 00-3 3v6a3 3 0 003 3h10a3 3 0 003-3V7a3 3 0 00-3-3H5zm-1 9v-1h5v2H5a1 1 0 01-1-1zm7 1h4a1 1 0 001-1v-1h-5v2zm0-4h5V8h-5v2zM9 8H4v2h5V8z"
                clip-rule="evenodd"></path>
            </svg>
            <span class="flex-1 ml-3 whitespace-nowrap">Log out</span>
          </a>
        </li>

        <li class="p-4 ml-4 bg-gray-100 shadow-2xl">





<!-- <div class="flex justify-center ml-4 pl-72" style="position:relative;right:455px; top:320px;"> -->
<form method="GET" action="b copy.php">
<label class="block text-sm font-medium text-gray-700"  for="">Choose Excel Formal:</label>
<select class="mr-2 h-9 block w-full py-2 px-3 border border-gray-300 bg-white rounded-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" name="FileType" id="">
<option value="xls">xls</option>
<option value="csv">csv</option>
</select>
<input type="submit" name="Export" class="flex items-center mt-2 p-2 w-full justify-center text-center text-sm font-bold text-gray-50 rounded-lg dark:text-white bg-blue-500 hover:bg-blue-400 dark:hover:bg-blue-600" value="Export to Excel" >
</form>
<!-- </div> -->




</li>

      </ul>
    </div>
  </aside>
