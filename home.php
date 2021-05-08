<?php 

session_start();

require "functions/load.php";
$conn= require "functions/db.php";
require 'header.php';
?>
<ul>
<ul><button class='btn'> Academics</button>
<li><a href="complaintForm.php?category=academics && sub=grade">Grade Problems</a></li>
<li><a href="complaintForm.php?category=academics && sub=reeaval">ReEvaluation Of Papers</a></li>
<li><a href="complaintForm.php?category=academics && sub=reschedule">Rescheduling Of Classes</a></li>
<li><a href="complaintForm.php?category=academics && sub=extra">Extra Class</a></li>
<li><a href="complaintForm.?category=academics && sub=lab">Lab Doubts</li>
<li><a href="complaintForm.php?category=academics && sub=soft">Additional Software Issues</a></li>
<li><a href="complaintForm.php?category=academics && sub=assign">Assignments</a></li>
</ul>
<ul><button class='btn'> Fees</button>
<li><a href="complaintForm.php?category=fees&& sub=fee-issue">Fees Payment Problems</a></li>
<li><a href="complaintForm.php?category=fees&& sub=partial">Partial Fees Request</a></li>
<li><a href="complaintForm.php?category=fees&& sub=extensiom">Extension oF Fee Payment</a></li>
</ul>
<ul><button class='btn'> Faculty </button>
<li><a href="complaintForm.php?category=faculty && sub=conduct">Faculty Conduct</a></li>
<li><a href="complaintForm.php?category=faculty && sub=one-to-one">One To One Interaction</a></li>
</ul>
<ul><button class='btn'> Mental And Physical Well Being </a></button>
<li><a href="complaintForm.php?category=well-being && sub=mental health">Mental Tensions And Health</a></li>
<li><a href="complaintForm.php?category=well-being && sub=exhaustion">OverExhaustion</a></li>
<li><a href="complaintForm.php?category=well-being && sub=bullying">Bullying</a></li>
<li><a href="complaintForm.php?category=well-being && sub=ragging">Ragging</a></li>
<li><a href="complaintForm.php?category=well-being && sub=harassment">Harrassment</a></li>
<li><a href="complaintForm.php?category=well-being && sub=physical health">Physical Problems</a></li>
</ul>
<li><button class='btn'><a href="complaintForm.php"> Miscellanous</a></button></li>
</ul>

<h2>Complaints Made</h2>
<table>
<thead>
              <tr>
                <th scope="col">Problem Title</th>
                <th scope="col">Complaint</th>
                <th scope="col">Status</th>
              </tr>
            </thead>
            <tbody id='tbody'></tbody>
</table>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
$.ajax({
      type:"POST",
      data:{
            func2call:'fetchProblems',
      },
      url:"/functions/handler.php",
      success:function(response){
            data= JSON.parse(response);
            console.log(data);
            let tel;
            const tbody = document.getElementById('tbody');
               for(let i=0;i<data.length;i++)
               {
                tel = document.createElement('tr');
                data[i].solved==="0"?
                tel.innerHTML = `<td>${data[i].title}</td>
                <td>${data[i].content}</td>
                <td>Pending</td>`:
                tel.innerHTML = `<td>${data[i].title}</td>
                <td>${data[i].content}</td>
                <td>Solved</td>`
               tbody.append(tel);

               }
      }
})
</script>
</body>
</html>