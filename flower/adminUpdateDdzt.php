<?php
require "DAO.php";
$con =DAO::getConnection();

$orderID = $_GET['orderID'];
$ddzt_new = $_GET['ddzt_new'];

if (empty($orderID) || empty($ddzt_new)){
    return;
}
//开始事务
$con->autocommit(false);
$info = true;
//step1 修改order.ddzt
$sql = sprintf("update myorder set ddzt='%s' WHERE orderID=%d",$ddzt_new,$orderID);
$info &= $con->query($sql);
//step2 添加一条tbddzt记录
$sql=sprintf("insert into tbddzt VALUE (NULL ,%d,'%s',current_date())",$orderID,$ddzt_new);
$info &= $con->query($sql);
//判断事务执行结果
if ($info){
    $con->commit();
    echo "<script>alert('修改成功！');window.location.href='adminOrderList.php'</script>";
}else{
    $con->rollback();
    echo "<script>alert('修改失败！');window.location.href='adminOrderList.php'</script>";
}
//结束事务
$con->autocommit(true);

?>