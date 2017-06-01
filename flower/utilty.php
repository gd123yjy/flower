<?php
session_start();
function isLogin(){
    if ($_SESSION['email']==null){
        return false;
    }else {
        return true;
    }
}

?>