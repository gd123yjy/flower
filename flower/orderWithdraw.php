<?php
include "loginRedirector.php";
require "DAO.php";

$con = DAO::getConnection();
$orderID = $_GET['orderID'];
$str = "delete from myorder where orderID = '$orderID'";
$result = mysqli_query($con, $str);
if ($result){
    echo "<script>alert('删除成功！');window.location.href='showorder.php'</script>";
}else{
    echo "<script>alert('删除失败！');window.location.href='showorder.php'</script>";
}
?>