<!-- 清除购物车功能 -->
<?php
require 'DAO.php';
$con = DAO::getConnection();

session_start();

$sql = sprintf("delete from cart where email='%s' ",$_SESSION['email']);
$info = mysqli_query($con, $sql);
if($info)
    echo "<script>alert('清空购物车成功！');window.location.href='mycart.php'</script>";
else
    echo "<script>alert('清空购物车失败！');window.location.href='mycart.php'</script>";
?>