<?php
require 'DAO.php';

session_start();
//retrieve session data
if ($_SESSION['email']!=null){
    header("Location: /flower/showflower.php");
}else {
    header("Location: /flower/login.php");
}
?>

<html>

<body>

</body>

</html>