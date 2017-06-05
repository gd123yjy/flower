<?php
include_once 'utilty.php';

if (!isLogin()){
    header("Location: /flower/login.php");
}
?>