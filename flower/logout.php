<?php
session_start();
$_SESSION["email"]=null;
//$_SESSION=array();
header("Location: /flower/login.php");
?>