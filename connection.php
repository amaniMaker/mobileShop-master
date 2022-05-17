<?php
ob_start();
if(!isset($_SESSION)){
    session_start();
}

$conn = new mysqli("localhost", "root", "", "mobileshop");
$GLOBALS['connection'] = $conn;
?>
