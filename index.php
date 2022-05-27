<?php

session_start();

?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  <!-- <link rel="stylesheet" href="../task1/css/style1.css"> -->
  <!-- <link rel="stylesheet" href="../task1/css/style.css"> -->
  <link rel="stylesheet" type="text/css" href="css/yourStyles.css?<?php echo time(); ?>" />
  <link rel="shortcut icon" href="../task1/img/logo.jpeg" type="image/x-icon">
  <style>
    body{
	font-family: sans-serif;
	margin:0;
	line-height: 1.5;
}

*{
	box-sizing: border-box;
	margin:0;
}

.login-page{
	/* min-height: 100vh; */
	padding:15px;
	background-color: #eeeeee;
	display: flex;
	flex-wrap: wrap;
	align-items: center;
	justify-content: center;
}
.login-page .box{
	background-image: url('../task1/img/bg3.jpg');
	background-size: cover;
	background-position: -160px center;
	background-repeat: repeat-x;
	flex:0 0 700px;
	max-width: 700px;
	min-height: 480px;
	box-shadow: 0 0 10px #dddddd;
	display: flex;
	flex-wrap: wrap;
	position: relative;
	z-index: 1;
	transition: all 0.5s ease-in-out;
}
.login-page .box.slide-active{
	background-position:160px center;
}

.login-page .box::before{
	content: '';
	position: absolute;
	left:0;
	top:0;
	width: 100%;
	height:100%;
	z-index: -1;
	background-color: rgba(0,0,0,0.4);
}
.login-page .box .left,
.login-page .box .right{
  flex:0 0 50%;
  max-width: 50%;
  display: flex;
  justify-content: center;
  align-items: center;
  flex-direction: column;
  padding:40px 0;
}

.login-page .box .left h3,
.login-page .box .right h3{
	font-size: 20px;
	color:#ffffff;
	margin:0 0 15px;
}

.login-page .box .left .register-btn,
.login-page .box .right .login-btn{
  background-color: transparent;
  padding: 10px 35px;
  color:#ffffff;
  border:1px solid #ffffff;
  font-size: 16px;
  cursor: pointer;
  border-radius: 25px;
}

.login-page .box .left .register-btn:focus,
.login-page .box .right .login-btn:focus{
  outline: none;
}
.login-page .box .form{
	position: absolute;
	background-color: #ffffff;
	height: 100%;
	width: 50%;
	right:0;
	top:0;
	padding:30px;
	display: flex;
	flex-direction: column;
	justify-content: center;
	transition: all 0.5s ease-in-out;
}
.login-page .box.slide-active .form{
	right: 50%;
}


.login-page .box .form h3{
	font-size: 20px;
	color:#000000;
	margin:0 0 30px;
}

.login-page .box .form .form-group{
	margin-bottom: 20px;
}

.login-page .box .form .lost-password-form,
.login-page .box .form .login-form,
.login-page .box .form .register-form{
  transition: all 0.5s ease-in-out;
} 

.login-page .box .form .form-control{
	width: 100%;
	height: 45px;
	font-size: 16px;
	color:#000000;
	border:none;
	border-bottom:1px solid #cccccc;
	padding:0;
}
.login-page .box .form .form-control:focus{
	outline: none;
}
.login-page .box .form label{
	font-size: 16px;
	color:#555555;
}
.login-page .box .form .submit-btn{
	width: 100%;
	height: 40px;
	background-color: #E91E63;
	border:none;
	border-radius: 20px;
	color:#ffffff;
	text-transform: uppercase;
	margin-top:10px;
	font-size: 16px;
	cursor: pointer;
}
.login-page .box .form .submit-btn:focus{
	outline: none;
}
.login-page .box .form p{
  margin-top:20px;
  text-align: center;
}
.login-page .box .form h5{
	font-size: 16px;
	color:#555555;
	margin:0 0 30px;
	font-weight: normal;
}

.login-page .box .form p a{
	font-size: 16px;
	text-decoration: none;
	display: inline-block;
	color:#3f51b5;
}

.login-page .box .form .form-hidden{
	max-height: 0;
	visibility: hidden;
	opacity:0;
	overflow:hidden;
}


/*responsive*/

@media(max-width: 767px){
   .login-page .box{
   	 flex:0 0 100%;
   	 max-width: 100%;
   }
}
@media(max-width: 575px){
	.login-page .box .form{
		width: 100%;
		position: relative;
		right: auto;
		top:auto;
		height: auto;
	}
	.login-page .box,
	.login-page .box.slide-active{
        background-position: center;
	}
	.login-page .box .left h3, .login-page .box .right h3{
		font-size: 16px;
	}
	.login-page .box.slide-active .form{
		right:auto;
	}
}

  </style>

</head>

<body style="background-color:#eeeeee;">

  <div class="header-2">

    <nav class="bg-white py-2 md:py-4">
      <div class="container px-4 mx-auto md:flex md:items-center">

        <div class="flex justify-between items-center">
          <img src="../task1/img/logo.jpeg" class="logo w-16" alt="">
          <a href="#" class="font-bold text-xl text-indigo-600 pl-4">Indira Gandhi Eye Hospital Reporting Portal</a>
          <button
            class="border border-solid border-gray-600 px-3 py-1 rounded text-gray-600 opacity-50 hover:opacity-75 md:hidden "
            id="navbar-toggle">
            <i class="fas fa-bars"></i>
          </button>
        </div>

        <div class="hidden md:flex flex-col md:flex-row md:ml-auto mt-3 md:mt-0" id="navbar-collapse">
          <a href="#" class="p-2 lg:px-4 md:mx-2 text-white rounded bg-indigo-600">Home</a>
          <!-- <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Create
            Organization</a> -->
          <!-- <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">View
            Report</a> -->
          <!-- <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Create
            User</a> -->
          <!-- <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">About us
            </a>
          <a href="#"
            class="p-2 lg:px-4 md:mx-2 text-gray-600 rounded hover:bg-gray-200 hover:text-gray-700 transition-colors duration-300">Contact
            us</a> -->
          <!-- <a href="#" id="show_login"
            class="p-2 lg:px-4 md:mx-2 text-indigo-600 text-center border border-transparent rounded hover:bg-indigo-100 hover:text-indigo-700 transition-colors duration-300">Login</a> -->

        </div>
      </div>
    </nav>

  <!-- login start -->
 

  <!-- The Modal -->

  <div class="login-page">
    <div class="box">
        <div class="left">
            <h3>User Login</h3>
            <button type="button" class="register-btn">Login</button>
        </div>
        <div class="right">
            <h3>Admin Login</h3>
            <button type="button" class="login-btn">Login</button>
        </div>
        <div class="form">
             <!-- Login form Start -->
             <div class="login-form">
               <form action="./admin/validation.php" method="post">
                 <h3> Admin LogIn</h3>
                 <div class="form-group">
                     <input type="text" name="name" placeholder="Email Address*" class="form-control">
                 </div>
                 <div class="form-group">
                     <input type="password" name="password" placeholder="Password*" class="form-control">
                 </div>
                 <div class="form-group">
                     <label>
                         <input type="checkbox"> Remember Me
                     </label>
                 </div>
                 <button type="submit" name="submit" class="submit-btn">Login</button>
                
                 <p><a href="#" class="register-btn">User Login</a> | <a href="#" class="lost-pass-btn">Lost Your Password ?</a></p>
                 </form>
             </div>
             <!-- Login form End -->

            <!-- Register form Start -->
             <div class="register-form form-hidden">
               <form action="./user/validation user.php" method="post">
                 <h3>User LogIn</h3>
                 <div class="form-group">
                     <input type="text"  name="user_name" placeholder="Enter Username*" class="form-control">
                 </div>
                 <div class="form-group">
                     <input type="password" name="user_password" placeholder="Enter Password*" class="form-control">
                 </div>
                 <div class="form-group">
                     <label>
                         <input type="checkbox"> Remember Me
                     </label>
                 </div>
                 <button type="submit" name="submit" class="submit-btn">Login</button>
                 <p><a href="#" class="login-btn">Admin Login</a> | <a href="#" class="lost-pass-btn">Lost Your Password ?</a></p>
                 </form>
             </div>
             <!-- Register form End -->

             <!-- Lost Password form Start -->
             <div class="lost-password-form form-hidden">
                 <h3>Lost Your Password ?</h3>
                 <h5>You will receive a link to create a new password via email.</h5>
                 
                 <div class="form-group">
                     <input type="text" placeholder="Email Address*" class="form-control">
                 </div>
                 
                 
                 <button type="button" class="submit-btn">Reset Password</button>
                 <p><a href="#" class="login-btn">Login</a> | <a href="#" class="register-btn">Register</a></p>
             </div>
             <!-- Lost Password form End -->

        </div>
    </div>
</div>

 <script>
   
  
  const  loginBtn = document.querySelectorAll(".login-btn"),
         registerBtn = document.querySelectorAll(".register-btn"),
         lostPassBtn = document.querySelectorAll(".lost-pass-btn"),
         box = document.querySelector(".box"),
         loginForm = document.querySelector(".login-form"),
         registerForm = document.querySelector(".register-form"),
         lostPasswordForm = document.querySelector(".lost-password-form");
 
  registerBtn.forEach((btn) =>{
  	btn.addEventListener("click",() =>{
      box.classList.add("slide-active");
      registerForm.classList.remove("form-hidden");
      loginForm.classList.add("form-hidden");
      lostPasswordForm.classList.add("form-hidden");
  	});
  });

  loginBtn.forEach((btn) =>{
  	btn.addEventListener("click",() =>{
      box.classList.remove("slide-active");
      registerForm.classList.add("form-hidden");
      loginForm.classList.remove("form-hidden");
      lostPasswordForm.classList.add("form-hidden");
  	});
  });

lostPassBtn.forEach((btn) =>{
  	btn.addEventListener("click",() =>{
      registerForm.classList.add("form-hidden");
      loginForm.classList.add("form-hidden");
      lostPasswordForm.classList.remove("form-hidden");
  	});
  });


 </script>
 
</body>

</html>