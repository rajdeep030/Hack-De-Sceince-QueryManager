<?php

session_start();
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
        $_POST['branch'] = '';
    }
    $problem = new Problem();
    if($problem->addProblem($conn,$_POST['title'],$_POST['content'],$_GET['category'],$_GET['sub'],$_POST['branch'],$_SESSION['userid'])){
        Url::redirect('/home.php');
    }
}
}


require 'header.php';
?>
<form  method="post" class=form-control>
<ul>
        <?php foreach($errors as $error): ?>
        <li><p><?=$error ?></p></li>
        <?php endforeach;?>
        </ul>
<label for="title">Subject</label><br>
<input type="text" name='title' placeholder="Enter The Subject"id="title" ><br>
<label for="content">Content</label><br>
<textarea name="content" id="content" cols="30" rows="10" placeholder="Enter the complaint"></textarea><br>
<?php if(($_GET['category']==='academics')||(($_GET['category']==='faculty'))): ?>
<label for="branch">Select Branch</label><br>
<select name="branch" id="branch">
<option value="maths">Maths</option>
<option value="chemistry">Chemistry</option>
<option value="mech">Mechanics</option>
<option value="eco">Ecology</option>

</select>
<?php endif?><br>
<button type='submit' >Submit</button>

</form>

</body>
</html>