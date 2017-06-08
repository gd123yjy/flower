<?php
include 'DAO.php';
$con = DAO::getConnection();

$custID = $_GET['custID'];

$sql = "delete from customer where custID='".$custID."'";
$info = mysqli_query($con, $sql);
if($info)
    echo "<script>alert('删除成功！');window.location.href='order.php'</script>";
 else
    echo "<script>alert('删除失败！');window.location.href='order.php'</script>";

?>