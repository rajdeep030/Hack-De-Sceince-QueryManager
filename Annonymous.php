<?php 

require "functions/load.php";
$conn= require "functions/db.php";

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
<br>
<br>
<br>
  <div class="dropdown">
<ul><button onclick="myFunction1()" class="dropbtn" style="margin-left: 25%;"> Academics</button>
  <div id="myDropdown1" class="dropdown-content">
  <li><a href="annonymouscomplaint.php?category=academics&&sub=grade">Grade Problems</a></li>
<li><a href="annonymouscomplaint.php?category=academics&&sub=reeaval">ReEvaluation Of Papers</a></li>
<li><a href="annonymouscomplaint.php?category=academics&&sub=reschedule">Rescheduling Of Classes</a></li>
<li><a href="annonymouscomplaint.php?category=academics&&sub=extra">Extra Class</a></li>
<li><a href="annonymouscomplaint.?category=academics&&sub=lab">Lab Doubts</li>
<li><a href="annonymouscomplaint.php?category=academics&&sub=soft">Additional Software Issues</a></li>
<li><a href="annonymouscomplaint.php?category=academics&&sub=assign">Assignments</a></li>
</ul>
</div>


<div class="dropdown">
  <ul><button onclick="myFunction2()" class="dropbtn"> Fees</button>
    <div id="myDropdown2" class="dropdown-content">
<li><a href="annonymouscomplaint.php?category=fees&& sub=fee-issue">Fees Payment Problems</a></li>
<li><a href="annonymouscomplaint.php?category=fees&& sub=partial">Partial Fees Request</a></li>
<li><a href="annonymouscomplaint.php?category=fees&& sub=extensiom">Extension oF Fee Payment</a></li>
</ul>
</div>
</div>

<div class="dropdown">
  <ul><button onclick="myFunction3()" class="dropbtn"> Faculty </button>
    <div id="myDropdown3" class="dropdown-content">
<li><a href="annonymouscomplaint.php?category=faculty && sub=conduct">Faculty Conduct</a></li>
<li><a href="annonymouscomplaint.php?category=faculty && sub=one-to-one">One To One Interaction</a></li>
</ul>
</div>
</div>

<div class="dropdown">
  <ul><button onclick="myFunction4()" class="dropbtn"> Mental And Physical Well Being </a></button>
    <div id="myDropdown4" class="dropdown-content">
    <li><a href="annonymouscomplaint.php?category=well-being && sub=mental health">Mental Tensions And Health</a></li>
<li><a href="annonymouscomplaint.php?category=well-being && sub=exhaustion">OverExhaustion</a></li>
<li><a href="annonymouscomplaint.php?category=well-being && sub=bullying">Bullying</a></li>
<li><a href="annonymouscomplaint.php?category=well-being && sub=ragging">Ragging</a></li>
<li><a href="annonymouscomplaint.php?category=well-being && sub=harassment">Harrassment</a></li>
<li><a href="annonymouscomplaint.php?category=well-being && sub=physical health">Physical Problems</a></li>
</ul>
</div>
  </div>

<div class="dropdown">
<ul>
<li><button class="dropbtn"><a href="complaintForm.php"> Miscellanous</a></button></li>

</ul>
</div>
<footer class="text-gray-600 body-font" style="position: absolute; bottom: 0;width: 100%;">
        
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
          <svg fill="currentColor" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="0" class="w-5 h-5" viewBox="0 0 24 24">
            <path stroke="none" d="M16 8a6 6 0 016 6v7h-4v-7a2 2 0 00-2-2 2 2 0 00-2 2v7h-4v-7a6 6 0 016-6zM2 9h4v12H2z"></path>
            <circle cx="4" cy="4" r="2" stroke="none"></circle>
          </svg>
        </a>
      </span>
    </div>
  </div>
</footer>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
      var head  = document.getElementsByTagName('head')[0];
            var link  = document.createElement('link');
            link.rel  = 'stylesheet';
            link.type = 'text/css';
            link.href = 'css/hcss.css';
            link.media = 'all';
            head.appendChild(link);
  function myFunction1() {
  document.getElementById("myDropdown1").classList.toggle("show");
}
function myFunction2() {
  document.getElementById("myDropdown2").classList.toggle("show");
}
function myFunction3() {
  document.getElementById("myDropdown3").classList.toggle("show");
}
function myFunction4() {
  document.getElementById("myDropdown4").classList.toggle("show");
}
window.onclick = function(event) {
  if (!event.target.matches('.dropbtn')) {
    var dropdowns = document.getElementsByClassName("dropdown-content");
    var i;
    for (i = 0; i < dropdowns.length; i++) {
      var openDropdown = dropdowns[i];
      if (openDropdown.classList.contains('show')) {
        openDropdown.classList.remove('show');
      }
    }
  }
}
</script>
</body>
</html>