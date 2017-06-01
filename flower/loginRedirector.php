<?php
require 'utilty.php';

if (!isLogin()){
    header("Location: /flower/login.php");
}
?>