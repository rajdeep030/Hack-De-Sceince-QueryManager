<?php 
require "../functions/load.php";
$conn= require "../functions/db.php";
session_start();
Auth::requireLogIn();
if($_GET['id']!==$_SESSION['adminid']);
$admin = AdminManage::getAdmin($conn,$_GET['id']);
$problems=$admin->getProblems($conn);
require 'header.php';
?>

<button><a href="../logout.php">LogOut</a></button>
<h2>Complaints</h2>
<table>
<thead>
              <tr>
                <th scope="col">Problem Title</th>
                <th scope="col">Complaint</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id='tbody'>
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
            <td><button onclick="changeStatus(<?=$problem['id']?>,2)">Add In Queue</button></td>
            <td><button onclick="changeStatus(<?=$problem['id']?>,1)">Mark Complete</button></td>
            <td><button onclick="readdress(<?=$problem['id']?>)" >Send To Another Faculty</button></td>
            </tr>
            <?php endforeach;?>
            
            </tbody>
</table>
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