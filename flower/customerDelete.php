<?php
include 'DAO.php';
$con = DAO::getConnection();

$custID = $_GET['custID'];
//开始事务
$con->autocommit(false);
$info = true;
//step1 插入到customer1，以防收货人被删后查看订单信息显示不出收货人
$sql = sprintf("insert into customer1 SELECT custID,email,sname,sex,mobile,address,zip FROM customer WHERE custID=%d", $custID);
$info &= mysqli_query($con, $sql);
//step2 删除customer的记录
$sql = "delete from customer where custID='" . $custID . "'";
$info &= mysqli_query($con, $sql);
if ($info) {
    $con->commit();
    echo "<script>alert('删除成功！');window.location.href='order.php'</script>";
} else {
    $con->rollback();
    echo "<script>alert('删除失败！');window.location.href='order.php'</script>";
}
//结束事务
$con->autocommit(true);
?>