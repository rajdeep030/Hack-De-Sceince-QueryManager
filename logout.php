<?php 
session_start();

require "functions/load.php";
AdAuth::logOut();
Url::redirect('/admin/admin.php');