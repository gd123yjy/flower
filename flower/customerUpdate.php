<?php
include 'conn/conn.php';

$custID = $_GET['custID'];
$con->autocommit(false);

$str = "select * from customer where cdefault=1";
$rs = mysqli_query($con, $str);
if (mysqli_fetch_row($rs)){
    $sql = "update customer set cdefault=0";
    $info = mysqli_query($con, $sql);
}
$sql = 'select * from customer where custID="'.$custID.'"';
$rs1 = mysqli_query($con, $sql);
if (mysqli_fetch_row($rs1)){
    $sql2 ='update customer set cdefault=1 where custID="'.$custID.'"';
    $info = mysqli_query($con, $sql2);
    if($info)
        echo "<script>alert('更改成功！');window.location.href='order.php'</script>";
    else
        echo "<script>alert('更改失败！');window.location.href='order.php'</script>";
}
$con->autocommit(true);


?>