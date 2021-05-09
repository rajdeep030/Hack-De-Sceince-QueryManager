<?php
require "functions/load.php";
$conn = require "functions/db.php";
$errors = [];
$user = new ManageUser();
$user->name = '';
$user->roll = '';
$user->email = '';
$user->branch = '';
$user->password = '';
$user->cpassword = '';
if ($_SERVER['REQUEST_METHOD'] === "POST")
{
    $user->name = $_POST['name'];
    $user->email = $_POST['email'];
    $user->password = $_POST['password'];
    $user->cpassword = $_POST['cpassword'];
    if ($user->name === '')
    {
        $errors[] = "Please Enter A Valid Name";
    }
    if ($user->email === '')
    {
        $errors[] = "Please Enter A Valid Email";
    }
    if ($user->password === '')
    {
        $errors[] = "Please Enter A Valid Password";
    }
    if ($user->password != $user->cpassword)
    {
        $errors[] = "Passwords Do Not Match";
    }
    if (count($errors) === 0)
    {
        if (!ManageUser::isExisting($conn, $user->email))
        {
            $id = $user->AddUser($conn, $user->name, $user->roll, $user->email, $user->branch, $user->password);
            if ($id)
            {
                Url::redirect("/");
            }
        }
        else
        {
            $errors[] = "Email Id Taken";
        }
    }
}
?>


<?php require 'header.php' ?>
    
  <div class='session'>
          <form method="post" action="" class="log-in" autocomplete="off">
          <h4><span>Attendence Tracker</span></h4>
          <p>Welcome! <br><br>Create an account to mark your attendence</p>
          <p>
          <ul>
        <?php foreach ($errors as $error): ?>
          <li><?=$error
?></li>
          <?php endforeach; ?>
          </ul> 
          <p>
            <div class="floating-label"><span class="mb-3-addon"><i class="fa fa-user"></i></span>
              <label for="name">Name</label>
              <input
               
                type="text"
                placeholder="Enter Your Name"
                name="name"
                id="name"
                value="<?=htmlspecialchars($user->name) ?>" 
               required/> 
               
            </div>
            <div class="floating-label"><span class="mb-3-addon"><i class="fa fa-paper-plane"></i></span>
              <label for="email">Email</label>
              <input
               
                type="email"
                name="email"
                id="email"
                placeholder="Enter Your College Email"
                  value=" <?=htmlspecialchars($user->email) ?>" 
               required/> 
            </div>
            <div class="floating-label"> <span class="mb-3-addon"><i class="fa fa-lock"></i></span>
              <label for="password" 
                >Password</label
              >
              <input
                
                type="password"
                name="password"
                id="password"
                placeholder="Enter Your Password"
                 value="<?=htmlspecialchars($user->password) ?>" 
              required /> 
            </div>
            <div class="floating-label"><span class="mb-3-addon">
                            <i class="fa fa-lock"></i>
                            <i class="fa fa-check"></i>
                        </span>
              <label for="cpassword"
                >Confirm Password</label
              >
              <input
                type="password"
                name="cpassword"
                id="cpassword"
               
                placeholder="Confirm Password"
                 value= "<?=htmlspecialchars($user->cpassword) ?>" 
              required/> 
            </div>
            <button type='submit'>Signup</button>
          </form>
    </div>