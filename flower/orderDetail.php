<?php
include "loginRedirector.php";
include "top.php";

require "DAO.php";

$con = DAO::getConnection();
$orderID = $_GET['orderID'];
$str = "select * from myorder where orderID = '$orderID'";
$result = mysqli_query($con, $str);
$sum = 0;
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>我的订单记录</title>
</head>
<body>

<form action="" method="post">
    <table style='width:900px;border-width:0px;border-style:dotted; ' align=center cellspacing="2" cellpadding="3">
        <?php
        $rs = mysqli_fetch_array($result);
        $custID = $rs[custID];
        $str_cust = "select * from customer where custID = '$custID'";
        $result_cust = mysqli_query($con, $str_cust);
        $rs_cust = mysqli_fetch_array($result_cust);
        ?>
        <tr><td style="text-align: center;background-color: lightgrey;border-radius:5px"><b style="font-size: 20px">订单处理信息</b></td></tr>
        <tr><td>订单编号：<div style="color: red"><?php echo $orderID;?></div></td></tr>
        <tr><td>订单状态：<div style="color: red"><?php echo $rs[ddzt];?></div>&nbsp;<a href="orderWithdraw.php?orderID=<?php echo $orderID;?>">取消</a>&nbsp;&nbsp;<a href="">付款</a></td></tr>

        <tr><td style="text-align: center;background-color: lightgrey;border-radius:5px"><b style="font-size: 20px">订单基本信息</b></td></tr>
        <tr><td><b style="color: red">订货人信息</b></td></tr>
        <tr><td>姓名：<?php echo $rs_cust[sname];?></td></tr>
        <tr><td>手机：<?php echo $rs_cust[mobile];?></td></tr>
        <tr><td>地址：<?php echo $rs_cust[address];?></td></tr>
        <tr><td>邮编：<?php echo $rs_cust[zip];?></td></tr>


        <tr><td><b style="color: red">收货人信息</b></td></tr>
        <tr><td>姓名：<?php echo $rs[fpsname];?></td></tr>
        <tr><td>地址：<?php echo $rs[fpaddress];?></td></tr>
        <tr><td>邮编：<?php echo $rs[zip];?></td></tr>

        <tr><td><b style="color: red">其他信息</b></td></tr>
        <tr><td>配送日期：<?php echo $rs[peisongday];?>&nbsp;&nbsp;时段：<?php echo $rs[peisongtime];?></td></tr>
        <tr><td>订购时间：<?php echo $rs[inputtime];?></td></tr>
        <tr><td>付款方式：<?php echo $rs[fkfs];?></td></tr>
        <tr><td>配送要求：<?php echo $rs[psyq];?></td></tr>
        <tr><td>给收货人留言：<?php echo $rs[liuyan];?></td></tr>

        <!--从视图showshoplist中循环读出该orderID的商品信息-->
        <tr><td style="text-align: center;background-color: lightgrey;border-radius:5px"><b style="font-size: 20px">商品信息</b></td></tr>
        <tr>
            <td>
                <table style='width:850px;border-width:0px;border-style:dotted; ' align=center cellspacing="2" cellpadding="2">
                    <tr>
                        <td style="width: 350px"><b>商品名称</b></td>
                        <td><b>价格</b></td>
                        <td><b>数量</b></td>
                        <td><b>小计</b></td>
                    </tr>


                    <?php
                    $str_list = "select * from showshoplist where orderID = '$orderID'";
                    $result_list = mysqli_query($con, $str_list);
                    while ($rs_list = mysqli_fetch_array($result_list)) {?>
                        <tr>
                            <td>
                                <?php if ($rs_list[pictures]) { ?>
                                    <img src="<?php echo " 'picture/$rs2[pictures]' " ?>"  style="width: 120px;height: 150px" />
                                <?php }
                                echo $rs_list[fname]; ?>
                            </td>
                            <td><?php echo $rs_list[yourprice];?></td>
                            <td><?php echo $rs_list[num];?></td>
                            <td><?php echo $rs_list[yourprice] * $rs_list[num];?></td>
                        </tr>
                        <?php $sum += $rs_list[yourprice] * $rs_list[num];} ?>
                </table>
            </td>
        </tr>

        <tr>
            <td><p style="float: right">订单合计金额：<?php echo $sum;?></p></td>
        </tr>

        <tr><td><a href="showorder.php" style="float: right">返回</a></td></tr>

    </table>
</form>


</body>
</html>