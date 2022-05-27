
<header class="header-2 fixed bg-indigo-900 shadow-md z-50 w-full px-5 py-2 flex justify-between items-center">

<div class="container px-4 mx-auto md:flex md:items-center">

  <div class="flex justify-between items-center">
    <img src="../img/logo.jpeg" class="logo w-16" alt="">
    <a href="#" class="font-medium text-xl text-gray-100 pl-4">Indira Gandhi Eye Hospital Reporting Portal</a>
    <button class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden"
      id="navbar-toggle">
      <i class="fas fa-bars"></i>
    </button>
  </div>

  <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
    
    <div class="">
      <div class="dropdown inline-block relative">
        <button class="bg-indigo-300 text-gray-100 font-semibold py-2 px-4 rounded inline-flex items-center">
          <span class="mr-1 text-black">
            <?php
        if(isset($_SESSION['name']))
        {
          echo $_SESSION['name'];
        }
          ?>
       
          </span>
          <img src="../img/dp.gif" class="fill-current h-8 w-8" xmlns="http://www.w3.org/2000/svg"
            viewBox="0 0 20 20">
          <path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z" /> </svg>
        </button>
        <ul class="dropdown-menu absolute hidden text-gray-100 pt-1">

        
       
     
   

        </ul>
      </div>

    </div>
  </div>



</div>

</nav>

</header>

