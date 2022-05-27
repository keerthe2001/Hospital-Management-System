<header class="header-2 fixed bg-gray-100 shadow-md z-50 w-full px-5 py-2 flex justify-between items-center">

    <div class="container px-4 mx-auto md:flex md:items-center">

      <div class="flex justify-between items-center">
        <img src="../img/logo.jpeg" class="logo w-16" alt="">
        <a href="#" class="font-bold text-xl text-indigo-600 pl-4">Indira Gandhi Eye Hospital Reporting Portal</a>
        <button
          class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden "
          id="navbar-toggle">
          <i class="fas fa-bars"></i>
        </button>
      </div>

      <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
        <a href="../user/user_home.php"
          class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Home</a>

        
        <!-- <a href="../admin/manage.php"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Manage
          </a> -->

        <!-- <span class="flex flex-row justify-center content-center ">
          <a href="#" 
            class= " flex flex-row p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">
            <h2 class="flex flex-row">
              
              
              </h2> <img src="../img/dp.gif" alt="" class="dp w-10"> </a>
            </span> -->

        <div class="">

          <div class="dropdown inline-block relative">
            <button class="bg-indigo-300 text-gray-100 font-semibold py-2 px-4 rounded inline-flex items-center">
              <span class="mr-1 text-black">
        
                <?php
            if(isset($_SESSION['user_name']))
            {
              echo $_SESSION['user_name'];
            }
              ?>
              </span>
              <img src="../img/dp.gif" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg"
                viewBox="0 0 20 20">
              <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /> </svg>
            </button>
            <ul class="dropdown-menu absolute hidden text-gray-100 pt-1">
             
              <!-- <li>
                <a href="logout_admin.php"
                  class="rounded-b text-black bg-indigo-300 hover:bg-indigo-400 py-2 px-4 block whitespace-no-wrap">Log
                  out</a>
              </li> -->
         

            </ul>
          </div>

        </div>
      </div>



    </div>

    </nav>

  </header>
