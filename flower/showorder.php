<?php
include "loginRedirector.php";
include "top.php";

require "DAO.php";

$con = DAO::getConnection();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>查看订单记录</title>

</head>
<body>
<div align="center">
    <table style='width:900px;border-width:2px; font-size:18px;' cellspacing="2" cellpadding="3">
        <tr><td colspan="6"  style="text-align: center;background-color: lightgreen;border-radius:5px"><b style="font-size: 20px">我的订单记录</b></td></tr>

        <tr>
            <td style="width: 300px"><b>宝贝</b></td>
            <td><b>单价</b></td>
            <td><b>数量</b></td>
            <td><b>实付款</b></td>
            <td><b>交易状态</b></td>
            <td><b>操作</b></td>
        </tr>

        <?php
        if ($email = $_SESSION['email']) {
            $str_order = "select * from showorder where email = '$email'";
            $result_order = mysqli_query($con, $str_order);

            while ($rs1 = mysqli_fetch_array($result_order)) {
                $sum = 0;
                $orderID = $rs1['orderID'];
                ?>
                <tr>
                    <td colspan="6" style="background-color: #CCFFFF;border-radius:2px;height: 50px">
                        <?php echo '&nbsp;&nbsp;订单编号：'.$orderID.'&nbsp;&nbsp;&nbsp;&nbsp;配送日期：'.$rs1['peisongday'].'&nbsp;&nbsp;&nbsp;&nbsp;收货人：'.$rs1['sname']; ?>
                    </td>
                </tr>


                <?php
                $str_shoplist = "select * from showshoplist where orderID = '$orderID'";
                $result_shoplist = mysqli_query($con, $str_shoplist);
                $rownum = mysqli_num_rows($result_shoplist);
                while ($rs2 = mysqli_fetch_array($result_shoplist)) {
                    ?>

                    <tr style="border-top:#CC66CC solid 1px;">
                    <!-- 宝贝，如果有图片则显示-->
                    <td style="width: 300px;height: 150px;">
                        <?php

                        if ($rs2['pictures']) {
                            ?>
                            <img src="<?php echo " 'picture/$rs2[pictures]' " ?>">
                        <?php }
                        echo $rs2['fname'];
                        ?>
                    </td>

                    <!-- 单价，划掉原价显示现价-->
                    <td>
                        <div style='text-decoration:line-through'><?php echo $rs2['price']; ?></div>
                        <div style="color: blue"><?php echo $rs2['yourprice']; ?></div>
                    </td>

                    <!-- 数量-->
                    <td><?php
                    echo $rs2['num'];
                    //订单的总价
                    $sum += $rs2['yourprice'] * $rs2['num'];
                }?>
                </td>

                <!-- 实付款 -->
                <td align="central"><?php echo $sum; ?></td>

                <!-- 交易状态-->
                <td><?php echo $rs1['ddzt'];?></td>

                <td><a href="orderDetail.php?orderID=<?php echo $orderID;?>">查看</a>
                    <a href="orderWithdraw.php?orderID=<?php echo $orderID;?>">取消</a>
                    <a href="">付款</a></td>
                </tr>


                <?php

            }
        }

        ?>
    </table>
</div>

</body>
</html>