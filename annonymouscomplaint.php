<?php
require "functions/load.php";
$conn= require "functions/db.php";
$errors = [];
if($_SERVER["REQUEST_METHOD"]==="POST")
{
if($_POST['title']==='')
$errors[]='Please Enter A Title';
if($_POST['content']==='')
$errors[]='Please Enter The Content';
if($_GET['category']==='')
$errors[]='Please Go Back To Homepage And Try Again';
if($_GET['sub']==='')
$errors[]='Please Go Back To Homepage And Try Again';
if(count($errors)===0)
{
    if(!isset($_POST['branch']))
    {
        $_POST['branch'] = 'Dean';
    }
    $problem = new Problem();
    if($problem->addProblem($conn,$_POST['title'],$_POST['content'],$_GET['category'],$_GET['sub'],$_POST['branch'],0)){
        Url::redirect('/Annonymous.php');
    }
}
}


require 'header.php';
?>
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




    <div class="main">
    <ul>
        <?php foreach($errors as $error): ?>
        <li><p><?=$error ?></p></li>
        <?php endforeach;?>
        </ul>
    <form method="post"  id="login-form" class="login-form" autocomplete="off" role="main">
      <br>
      <h1 class="title-font font-medium text-gray-900 tracking-widest text-lg mb-3" style="font-size: 5vh;">We are here to assist you!</h1>
   <br>
      <p style="color: grey; font-weight: 500;">Please complete the form below for your complaints.</p>
      <hr>
      <br>
      <br>
      <br>
      <div class="w-full md:w-1/2 px-3" style="margin-left: 0px;">
      <h1 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3" style="font-size: large;">Date of complaint</h1>
      <input id="today" type="date" style="width: fit-content;border: 1px;border-color: black;" value='date'>
    </div>
      <br>
      <br>
      <br>
      <div class="w-full md:w-1/2 px-3" style="margin-left: 0px;">
      <h1 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3" style="font-size: large;">Complaint's Suject</h1>
      <input class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-password" type="text" name='title' >
    </div>
    <br>
    <br>
    <br>
    <div class="w-full md:w-1/2 px-3" style="margin-left: 0px;">
      <h1 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3" style="font-size: large;">The specific details of the complaint:</h1>
      <textarea class="appearance-none block w-full bg-white-200 text-gray-700 border border-gray-200 rounded py-3 px-4 mb-3 leading-tight focus:outline-none focus:border-gray-500" name="content" ></textarea>
    </div>
    <br>
    <br>
    <br>
      <div class="w-full md:w-1/2 px-3 relative" style="margin-left: 0px;">
          <h1 class="title-font font-medium text-gray-900 tracking-widest text-sm mb-3" style="font-size: large;">Branch Related To Complaint</h1>
          <select class="block appearance-none w-full bg-gray-200 border border-gray-200 text-gray-700 py-3 px-4 pr-8 rounded leading-tight focus:outline-none focus:bg-white focus:border-gray-500" id="grid-state" name='branch'>
            <option value="maths">Maths</option>
            <option value="chemistry">Chemistry</option>
            <option value="mech">Mechanics</option>
            <option value="eco">Ecology</option>
            <option value="Dean">Dean</option>
          </select>
          <div class="pointer-events-none absolute inset-y-0 right-2 top-8 flex items-center px-2 text-gray-700" style="vertical-align: middle;">
            <svg class="fill-current h-4 w-4" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>
          </div>
          <br>
          <br>
          <br>
          </div>
      
    <button class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
      Submit
    </button>
    <div class="w-full md:w-1/2 px-3" style="margin-left: 0px;">  
  </form>

  </div>
  

  <script>
            var head  = document.getElementsByTagName('head')[0];
            var link  = document.createElement('link');
            link.rel  = 'stylesheet';
            link.type = 'text/css';
            link.href = 'css/complaintcss.css';
            link.media = 'all';
            head.appendChild(link);
        let today = new Date().toISOString().substr(0, 10);
        document.querySelector("#today").value = today;

        document.querySelector("#today2").valueAsDate = new Date();
    </script>
    </body>
    </html>