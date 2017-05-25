<!-- 数量修改功能 -->
<?php
require 'DAO.php';
$con = DAO::getConnection();

session_start();

    $flowerID = $_GET['flowerid'];
    $newnum = $_GET['number'];
    
    $str = sprintf("select * from cart where email='%s' AND flowerID='%s'",$_SESSION['email'],$flowerID);
    $rs = mysqli_query($con, $str);
    if (mysqli_fetch_row($rs)){
        if ($newnum==0){
            $sql = sprintf("delete from cart where email='%s' AND flowerID='%s'",$_SESSION['email'],$flowerID);
            $info = mysqli_query($con, $sql);
        }else{
            $sql = sprintf("update cart set num=%d where email='%s' AND flowerID='%s'",$newnum,$_SESSION['email'],$flowerID);
            $info = mysqli_query($con, $sql);
        }

        if($info)
            echo "<script>alert('更新成功！');</script>";
        else
            echo "<script>alert('更新失败！');</script>";
    }
    $str = sprintf("select * from vcart WHERE email='%s'",$_SESSION["email"]);
    $rs = mysqli_query($con, $str);
    $rownum = mysqli_num_rows($rs);
    $totalmoney = 0;
    for ($i = 0;$i < $rownum;$i ++){
        $row = mysqli_fetch_assoc($rs);
        $totalmoney = $totalmoney + $row['yourprice'] * $row['num'];
    }
    echo "合计：￥".$totalmoney."元";

?>