<html>
<head>
    <link href="css/styles.css" rel="stylesheet" type="text/css">
    <link href="css/admincss.css" rel="stylesheet" type="text/css">
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
  
   
</head>
<body> 
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

  
  <div class="min-h-screen bg-gray-100 p-0 sm:p-12">
    <div class="mx-auto max-w-md px-6 py-12 bg-white border-0 shadow-lg sm:rounded-3xl">
      <h1 class="text-2xl font-bold mb-8">Admin Login</h1>
      <form id="form" novalidate>
        <div class="relative z-0 w-full mb-5">
          <input
            type="text"
            name="name"
            placeholder=" "
            required
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
          <label for="name" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Username</label>
          <span class="text-sm text-red-600 hidden" id="error">Name is required</span>
        </div>
  
        <div class="relative z-0 w-full mb-5">
          <input
            type="email"
            name="email"
            placeholder=" "
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
          <label for="email" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Enter email address</label>
          <span class="text-sm text-red-600 hidden" id="error">Email address is required</span>
        </div>
  
        <div class="relative z-0 w-full mb-5">
          <input
            type="password"
            name="password"
            placeholder=" "
            class="pt-3 pb-2 block w-full px-0 mt-0 bg-transparent border-0 border-b-2 appearance-none focus:outline-none focus:ring-0 focus:border-black border-gray-200"
          />
          <label for="password" class="absolute duration-300 top-3 -z-1 origin-0 text-gray-500">Enter password</label>
          <span class="text-sm text-red-600 hidden" id="error">Password is required</span>
        </div>
  
        
  
  
  
        <button
          id="button"
          type="button"
          class="w-full px-6 py-3 mt-3 text-lg text-white transition-all duration-150 ease-linear rounded-lg shadow outline-none bg-pink-500 hover:bg-pink-600 hover:shadow-lg focus:outline-none"
        >
          Login
        </button>
      </form>
    </div>
  </div>
  
  <script>
    'use strict'
  
    document.getElementById('button').addEventListener('click', toggleError)
    const errMessages = document.querySelectorAll('#error')
  
    function toggleError() {
      errMessages.forEach((el) => {
        el.classList.toggle('hidden')
      })
  
      const allBorders = document.querySelectorAll('.border-gray-200')
      const allTexts = document.querySelectorAll('.text-gray-500')
      allBorders.forEach((el) => {
        el.classList.toggle('border-red-600')
      })
      allTexts.forEach((el) => {
        el.classList.toggle('text-red-600')
      })
    }
  </script>
</body>
</html>