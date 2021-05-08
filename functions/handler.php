<?php 
session_start();
require "load.php";
$conn= require "db.php";
if($_POST['func2call']==='fetchProblems'){
    Problem::getProblems($conn,$_SESSION['userid']);
}