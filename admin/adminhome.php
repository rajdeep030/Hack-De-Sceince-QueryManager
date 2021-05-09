<?php 
require "../functions/load.php";
$conn= require "../functions/db.php";
session_start();
Auth::requireLogIn();
if($_GET['id']!==$_SESSION['adminid'])
{
  echo $_SESSION['adminid'];
  die("Unauthorized");
}
$id=$_SESSION['adminid'];
$admin = AdminManage::getAdmin($conn,$_GET['id']);
$problems=$admin->getProblems($conn);
require 'header.php';
require '../nav.php';
?>
<button><a href="../logout.php">LogOut</a></button>
<div class="lg:w-1/4 md:w-1/2 w-full px-4">
  <br>
  <br>

         <a href="index.php"> <h2 title-font font-medium text-gray-900 tracking-widest text-lg mb-3 style="font-size: 5vh;font-weight: 500;">Complaints Made</h2></a>
        </div>
        <br>
        <br>
      </div>
<table style="width:100%;">
<thead>
              <tr>
                <th scope="col">Problem Title</th>
               <th scope="col">Complaint</th></div>
               <th scope="col">Status</th></div>
              </tr>
            </thead>
            <tbody style="text-align:center;" >
            <?php foreach($problems as $problem):?>
            <tr>
            <td><?=$problem['title']?></td>
            <td><?=$problem['content']?></td>
            <?php if($problem['solved']==='0'):?>
            <td>Unsolved</td>
            <?php endif;?>
            <?php if($problem['solved']==='1'):?>
            <td>Solved</td>
            <?php endif;?>
            <?php if($problem['solved']==='2'):?>
            <td>In Queue</td>
            <?php endif;?>
            <td><button onclick="changeStatus(<?=$problem['id']?>,2)"><a href="/admin/adminhome.php?id=<?=$id?>">Add In Queue</a></button></td>
            <td><button onclick="changeStatus(<?=$problem['id']?>,1)"><a href="/admin/adminhome.php?id=<?=$id?>">Mark Complete</a></button></td>
            <td><button onclick="readdress(<?=$problem['id']?>)" ><a href="/admin/adminhome.php?id=<?=$id?>">Send To Another Faculty</a></button></td>
            </tr>
            <?php endforeach;?>
          
            </tbody>
</table>
</div>
<br>
<br>
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
function changeStatus(id,code){
    $.ajax({
        type:"POST",
        data:{
                func2call:'setStatus',
                id:id,
                code:code,
        },
        url:"/functions/handler.php",
        success: function(response){
            console.log(response);
        }
    })
}

function readdress(id){
  const sel = document.createElement('SELECT');
  sel.setAttribute('id','branch');
  sel.setAttribute('name','branch');
  document.body.appendChild(sel);
  const op1 = document.createElement('option');
  op1.setAttribute('value','Maths');
  let txt = document.createTextNode('Maths');
  op1.appendChild(txt);
  document.getElementById("branch").appendChild(op1);
  const op2 = document.createElement('option');
  op2.setAttribute('value','chemistry');
  txt = document.createTextNode('Chemistry');
  op2.appendChild(txt);
  document.getElementById("branch").appendChild(op2);
  const op3 = document.createElement('option');
  op3.setAttribute('value','mech');
  txt = document.createTextNode('Mechanics');
  op3.appendChild(txt);
  document.getElementById("branch").appendChild(op3);
  const op4 = document.createElement('option');
  op4.setAttribute('value','eco');
  txt = document.createTextNode('Ecology');
  op4.appendChild(txt);
  document.getElementById("branch").appendChild(op4);
  const op5 = document.createElement('option');
  op5.setAttribute('value','Dean');
  txt = document.createTextNode('Dean');
  op5.appendChild(txt);
  document.getElementById("branch").appendChild(op5);
  const submit = document.createElement('BUTTON');
  submit.setAttribute('onclick',`submit(${id})`);
  submit.textContent='Submit';
  document.body.appendChild(submit);
}

function submit(id){
  $.ajax({
        type:"POST",
        data:{
                func2call:'readdress',
                id:id,
                code:document.getElementById('branch').value,
        },
        url:"/functions/handler.php",
        success: function(response){
            console.log(response);
        }
    })
}

</script>
</body>
</html>