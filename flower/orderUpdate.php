<?php
include "loginRedirector.php";
require "DAO.php";
$con = DAO::getConnection();
/**
 * 确认收货
 */

$orderID = $_GET['orderID'];
if (empty($orderID)){
    return;
}

//开始事务
$con->autocommit(false);
$info = true;
//step1 修改order.ddzt
$sql = sprintf("update myorder set ddzt='%s' WHERE orderID=%d","已完成",$orderID);
$info &= $con->query($sql);
//step2 添加一条tbddzt记录
$sql=sprintf("insert into tbddzt VALUE (NULL ,%d,'%s',current_date())",$orderID,"已完成");
$info &= $con->query($sql);
//判断事务执行结果
if ($info){
    $con->commit();
    echo "<script>alert('确认成功！');window.location.href='showorder.php'</script>";
}else{
    $con->rollback();
    echo "<script>alert('确认失败！');window.location.href='showorder.php'</script>";
}
//结束事务
$con->autocommit(true);

?>