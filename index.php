<?php 

require 'header.php';
require "functions/load.php";
$conn= require "functions/db.php";

session_start();
 $errors=[];
 if($_SERVER['REQUEST_METHOD']==="POST")
  {
    $id = CheckUser::authenticate($conn,$_POST['username'],$_POST['password']);
    if($id)
    {
        Auth::logIn();
        $_SESSION['userid']=$id;
        $_SESSION['password']=$_POST['password'];
        Url::redirect('/home.php');
    }
    else
    {
        $_SESSION['is_logged_in']=false;
        $errors[]="Invalid Credentials";
    }
  } 
?>
  <header class="text-gray-600 body-font head">
    <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
      <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
          <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
        </svg>
        <span class="ml-3 text-xl">Student Grievances</span>
      </a>
      <nav class="md:ml-auto md:mr-auto flex flex-wrap items-center text-base justify-center">
        <a class="mr-5 hover:text-gray-900" href="index.html">Home</a>
        <a class="mr-5 hover:text-gray-900">About</a>
        <a class="mr-5 hover:text-gray-900" href="admin.html">Admin Login</a>
        <a class="mr-5 hover:text-gray-900" href="contact.html">Contact Us</a>
      </nav>
    </div>
  </header>

  <section class="text-gray-600 body-font mid">
    <div class="container px-5 py-24 mx-auto flex flex-wrap items-center">
      <div class="lg:w-3/5 md:w-1/2 md:pr-16 lg:pr-0 pr-0 backgrnd grid-cols-8">
        <br>
        <br>
        <h1 class="title-font midhead">Student Greivances Redressal Portal</h1>
        <br>
        <br>
        <p class="leading-relaxed mt-4 midpara">The function of the cell is to look into the complaints lodged by any student and judge its merit. The Grievance Cell is also empowered to look into matters of harassment. Anyone with a genuine grievance may approach the School Principal or address his/her grievances to the Students' Grievance Cell.</p>
      </div>
        <div class="lg:w-2/6 md:w-1/2 bg-gray-100 rounded-lg p-8 flex flex-col md:ml-auto w-full mt-10 md:mt-0 grid-cols-4 login">
        <ul>
        <?php foreach($errors as $error): ?>
        <li><p><?=$error ?></p></li>
        <?php endforeach;?>
        </ul>
          <form method="post">
              <h2 class="text-gray-900 text-lg font-medium title-font mb-5">Sign Up</h2>
              <div class="relative mb-4">
                <label for="full-name" class="leading-7 text-sm text-gray-600">Username</label>
                <input type="text" id="full-name" name="username" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              <div class="relative mb-4">
                <label for="password" class="leading-7 text-sm text-gray-600">Password</label>
                <input type="password" id="password" name="password" class="w-full bg-white rounded border border-gray-300 focus:border-indigo-500 focus:ring-2 focus:ring-indigo-200 text-base outline-none text-gray-700 py-1 px-3 leading-8 transition-colors duration-200 ease-in-out">
              </div>
              <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Login</button>
              <br>
              <button class="text-white bg-indigo-500 border-0 py-2 px-8 focus:outline-none hover:bg-indigo-600 rounded text-lg">Sign-Up</button>
          </form>
        </div>
    </div>
  </section>
</div>
<hr>

  <footer class="text-gray-600 body-font">
    <div class="container px-5 py-24 mx-auto flex md:items-center lg:items-start md:flex-row md:flex-nowrap flex-wrap flex-col">
      <div class="w-64 flex-shrink-0 md:mx-0 mx-auto text-center md:text-left md:mt-0 mt-10">
        <a class="flex title-font font-medium items-center md:justify-start justify-center text-gray-900">
          <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" aria-hidden="true" focusable="false" width="1.67em" height="1em" style="-ms-transform: rotate(360deg); -webkit-transform: rotate(360deg); transform: rotate(360deg);" preserveAspectRatio="xMidYMid meet" viewBox="0 0 256 154"><defs><linearGradient x1="-2.778%" y1="32%" x2="100%" y2="67.556%" id="IconifyId-1794a3f0449-c6dbf0-7"><stop stop-color="#2298BD" offset="0%"/><stop stop-color="#0ED7B5" offset="100%"/></linearGradient></defs><path d="M128 0C93.867 0 72.533 17.067 64 51.2C76.8 34.133 91.733 27.733 108.8 32c9.737 2.434 16.697 9.499 24.401 17.318C145.751 62.057 160.275 76.8 192 76.8c34.133 0 55.467-17.067 64-51.2c-12.8 17.067-27.733 23.467-44.8 19.2c-9.737-2.434-16.697-9.499-24.401-17.318C174.249 14.743 159.725 0 128 0zM64 76.8C29.867 76.8 8.533 93.867 0 128c12.8-17.067 27.733-23.467 44.8-19.2c9.737 2.434 16.697 9.499 24.401 17.318C81.751 138.857 96.275 153.6 128 153.6c34.133 0 55.467-17.067 64-51.2c-12.8 17.067-27.733 23.467-44.8 19.2c-9.737-2.434-16.697-9.499-24.401-17.318C110.249 91.543 95.725 76.8 64 76.8z" fill="url(#IconifyId-1794a3f0449-c6dbf0-7)"/></svg>
          <span class="ml-3 text-xl">TailwindCSS</span>
        </a>
        
      </div>
      <div class="flex-grow flex flex-wrap md:pr-20 -mb-10 md:text-left text-center order-first">
        
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
         <a href="index.html"> <h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">HOME</h2></a>
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <a href="about.html"><h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">ABOUT</h2></a>
          
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <a href="admin.html"><h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">ADMIN LOGIN</h2></a>
          
        </div>
        <div class="lg:w-1/4 md:w-1/2 w-full px-4">
          <a href="contact.html"><h2 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3">CONTACT US</h2></a>
          
        </div>
      </div>
    </div>
    <div class="bg-gray-100">
      <div class="container mx-auto py-4 px-5 flex flex-wrap flex-col sm:flex-row">
        <p class="text-gray-500 text-sm text-center sm:text-left">© 2020 Team Code Breakers —
          
        </p>
        <span class="inline-flex sm:ml-auto sm:mt-0 mt-2 justify-center sm:justify-start">
          <a class="text-gray-500">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M18 2h-3a5 5 0 00-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 011-1h3z"></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg fill="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <path d="M23 3a10.9 10.9 0 01-3.14 1.53 4.48 4.48 0 00-7.86 3v1A10.66 10.66 0 013 4s-4 9 5 13a11.64 11.64 0 01-7 2c9 5 20 0 20-11.5a4.5 4.5 0 00-.08-.83A7.72 7.72 0 0023 3z"></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-5 h-5" viewBox="0 0 24 24">
              <rect width="20" height="20" x="2" y="2" rx="5" ry="5"></rect>
              <path d="M16 11.37A4 4 0 1112.63 8 4 4 0 0116 11.37zm1.5-4.87h.01"></path>
            </svg>
          </a>
          <a class="ml-3 text-gray-500">
            <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
              <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
              <circle cx="4" cy="4" r="2" stroke="none"></circle>
            </svg>
          </a>
        </span>
      </div>
    </div>
  </footer>
</body>
</html>