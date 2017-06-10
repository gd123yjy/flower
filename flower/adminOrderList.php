<?php
include "adminIndex.php";

function parseDDZT2Int($ddzt)
{
    switch ($ddzt) {
        case "未付款":
            return 0;
        case "待发货":
            return 1;
        case "已发货":
            return 2;
        case "已完成":
            return 3;
        default:
            break;
    }
}

function parseInt2DDZT($ddzt_i)
{
    switch ($ddzt_i) {
        case 0:
            return "未付款";
        case 1:
            return "待发货";
        case 2:
            return "已发货";
        case 3:
            return "已完成";
        default:
            break;
    }
}

?>

<html>
<head>
    <script>
        function updateDdzt(
        var orderID
        )
        {
            var obj = document.getElementByIdx_x("ddztSelection"+orderID); //定位id

            var index = obj.selectedIndex; // 选中索引

            var text = obj.options[index].text; // 选中文本

            var value_m = obj.options[index].value; // 选中值

            window.location.href="adminUpdateDdzt.php?orderID="+orderID+"$ddzt_new="+value_m;
        }
    </script>
</head>
<body>
<table>
    <thead>
    <tr>
        <td colspan="6" style="background-color: #ffffa5;border-radius:2px;height: 30px;width: 90px">序号</td>
        <td colspan="6" style="background-color: #ffffa5;border-radius:2px;height: 30px;width: 90px">订单编号</td>
        <td colspan="6" style="background-color: #ffffa5;border-radius:2px;height: 30px;width: 90px">订货人</td>
        <td colspan="6" style="background-color: #ffffa5;border-radius:2px;height: 30px;width: 90px">收货人</td>
        <td colspan="6" style="background-color: #ffffa5;border-radius:2px;height: 30px;width: 90px">下单时间</td>
        <td colspan="6" style="background-color: #ffffa5;border-radius:2px;height: 30px;width: 90px">实付</td>
        <td colspan="6" style="background-color: #ffffa5;border-radius:2px;height: 30px;width: 90px">订单状态</td>
    </tr>
    </thead>

    <tbody>
    <?php
    require "DAO.php";
    $con = DAO::getConnection();

    if (!empty($_SESSION['admin_user'])) {
        $str_order = "select * from showorder";
        $result_order = mysqli_query($con, $str_order);

        $i = 0;
        while ($rs1 = mysqli_fetch_array($result_order)) {
            $i++;
            $orderID = $rs1['orderID'];
            $email = $rs1['email'];
            $sname = $rs1['sname'];
            $peisongday = $rs1['peisongday'];
            $shifu = $rs1['shifu'];
            $ddzt = $rs1['ddzt'];
            ?>
            <tr>
                <td colspan="6" style="background-color: #CCFFFF;border-radius:2px;height: 50px;width: 90px">
                    <?php echo $i; ?>
                </td>
                <td colspan="6" style="background-color: #CCFFFF;border-radius:2px;height: 50px;width: 150px">
                    <?php echo $orderID; ?>
                </td>
                <td colspan="6" style="background-color: #CCFFFF;border-radius:2px;height: 50px;width: 150px">
                    <?php echo $email; ?>
                </td>
                <td colspan="6" style="background-color: #CCFFFF;border-radius:2px;height: 50px;width: 150px">
                    <?php echo $sname; ?>
                </td>
                <td colspan="6" style="background-color: #CCFFFF;border-radius:2px;height: 50px;width: 150px">
                    <?php echo $peisongday; ?>
                </td>
                <td colspan="6" style="background-color: #CCFFFF;border-radius:2px;height: 50px;width: 150px">
                    <?php echo $shifu; ?>
                </td>
                <td colspan="6" style="background-color: #CCFFFF;border-radius:2px;height: 50px;width: 150px">
                    <select name="ddzt" id="ddztSelection<?php echo $orderID?>">
                        <option value="未付款" <?php if ($ddzt=="未付款") echo 'selected="selected"'?>>未付款</option>
                        <option value="待发货" <?php if ($ddzt=="待发货") echo 'selected="selected"'?>>待发货</option>
                        <option value="已发货" <?php if ($ddzt=="已发货") echo 'selected="selected"'?>>已发货</option>
                        <option value="已完成" <?php if ($ddzt=="已完成") echo 'selected="selected"'?>>已完成</option>
                    </select>
                    <!-- TODO -->
                    <a href="javascript:void(0);" onclick="updateDdzt()">修改</a>
                </td>
            </tr>

            <?php
        }
    }
    ?>
    <tr>
        <td></td>
    </tr>
    </tbody>
</table>
</body>
</html>
