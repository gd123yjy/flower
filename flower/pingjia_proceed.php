<?php
require "DAO.php";
$con = DAO::getConnection();

$flowerID = $_POST['flowerID'];
$orderID = $_POST['orderID'];
if (empty($flowerID) || empty($orderID)){
    header("/flower/showorder.php");
    return;
}

$star = $_POST['star'];
$evaluate = $_POST['evaluate'];

$sql = sprintf("update shoplist set star=%d ,evaluate='%s' WHERE flowerID=%d AND orderID=%d",$star,$evaluate,$flowerID,$orderID);
$info = $con->query($sql);
if ($info){
    echo "<script>alert('评价成功！');window.location.href='showorder.php'</script>";
}else{
    echo "<script>alert('评价失败！');window.location.href='pingjia.php?orderID=$orderID'</script>";
}
?>