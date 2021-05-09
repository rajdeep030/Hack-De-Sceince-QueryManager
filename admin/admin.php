<?php
require "../functions/load.php";
$conn= require "../functions/db.php";

session_start();
 $errors=[];
 if($_SERVER['REQUEST_METHOD']==="POST")
  {
    $id = CheckAdmin::adminCheck($conn,$_POST['username'],$_POST['password'],$_POST['branch']);
    if($id)
    {
        AdAuth::logIn();
        $_SESSION['adminid']=$id;
        Url::redirect('/admin/adminhome.php?id='.$id);
    }
    else
    {
        $_SESSION['is_logged_in']=false;
        $errors[]="Invalid Credentials";
    }
  } 
require '../header.php';
?>
<body> 
    <header class="text-gray-600 body-font head">
      <div class="container mx-auto flex flex-wrap p-5 flex-col md:flex-row items-center">
        <a class="flex title-font font-medium items-center text-gray-900 mb-4 md:mb-0">
          <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" class="w-10 h-10 text-white p-2 bg-indigo-500 rounded-full" viewBox="0 0 24 24">
            <path d="M12 2L2 7l10 5 10-5-10-5zM2 17l10 5 10-5M2 12l10 5 10-5"></path>
          </svg>
          <span class="ml-3 text-xl">Student Grievances</span>
        </a>
       <?php require 'nav.php'?>
      </div>
    </header>

  
  <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
    <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
      <h1 class="text-2xl font-bold mb-8">Admin Login</h1>
      <ul>
        <?php foreach($errors as $error): ?>
        <li><p><?=$error ?></p></li>
        <?php endforeach;?>
        </ul>
      <form id="form" novalidate method='post'>
        <div class="relative z-0 w-full mb-5">
          <input
            autocomplete='off'
            type="text"
            name="username"
            placeholder="UserName"
            required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
        </div>
  
        <div class="relative z-0 w-full mb-5">
          <input
            type="password"
            name="password"
            placeholder="Password"
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
        </div>
        <label for="branch">Enter Branch</label>
        <div class="relative z-0 w-full mb-5">
          <select
            name="branch"
            id='branch'
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          >
          <option value="maths">Maths</option>
          <option value="chemistry">Chemistry</option>
          <option value="mech">Mechanics</option>
          <option value="eco">Ecology</option>
          <option value="Dean">Dean</option>
          </select>
        </div>
        <button
          id="button"
          type="submit"
          class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none"
        >
          Login
        </button>
      </form>
    </div>
  </div>
</body>
</html>