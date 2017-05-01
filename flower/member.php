<?php
require 'DAO.php';

session_start();
//retrieve session data
if ($_SESSION['email']!=null){
    echo "hello " . $_SESSION['email'];
}else {
    header("Location: /flower/login.php");
}
?>

<html>

<body>
<a href="/flower/showflower.php">exit</a>
</body>

</html>