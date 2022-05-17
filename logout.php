<?php 
require_once "connection.php"; 
$_SESSION['username']=NULL;
$_SESSION['email']=NULL;
unset($_SESSION['username']);
unset($_SESSION['email']);

header("location: index.php");
die();
?>