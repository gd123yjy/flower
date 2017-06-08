<?php
include_once 'utilty.php';
session_start();
if (!isLogin()){
    header("Location: /flower/login.php");
}
?>