<?php
session_start();
$_SESSION["admin_user"]=null;
//$_SESSION=array();
header("Location: /flower/adminlogin.php");
?>