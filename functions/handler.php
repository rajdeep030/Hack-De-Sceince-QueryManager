<?php 
session_start();
require "load.php";
$conn= require "db.php";

if($_POST['func2call']==='fetchProblems'){
    Problem::getProblems($conn,$_SESSION['userid']);
}

if($_POST['func2call']==='setStatus'){
    AdminManage::setStatus($conn,$_POST['id'],$_POST['code']);
}

if($_POST['func2call']==='readdress'){
    AdminManage::readdress($conn,$_POST['id'],$_POST['code']);
}