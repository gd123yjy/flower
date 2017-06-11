<?php
function printStar($star){
    for ($i=0;$i<5;$i++){
        if ($i<$star){
            echo sprintf("<img src='image/review_star_fen.gif'>");
        }else{
            echo sprintf("<img src='image/review_star_fen_gray.gif'>");
        }
    }
}

include "top.php";
require "DAO.php";
$con = DAO::getConnection();

$flowerID = $_GET['flowerID'];
if (empty($flowerID)) {
    header("Location: /flower/showflower.php");
    return;
}
$sql = sprintf("select * from flower WHERE flower.flowerID=%d", $flowerID);
$rs = $con->query($sql);
$row = $rs->fetch_assoc();
?>

<html>
<head>

</head>

<body>

<table style='width:900px;border-width:2px;border-style:dotted; ' align=center cellspacing="2" cellpadding="3">

    <!-- 放入购物车 -->
    <tr>
        <td style='width: 35%'><?php echo "<img style='height:400px;width:350px;border=1px;' src='picture/" . $row['pictureb'] . "'>"; ?></td>
        <td style='width: 70%'>
            <div style='font-weight:bold;font-size:medium;height:40px;line-height:40px;color:#000066;text-align:center;border-width:1px;  border-style:solid;border-color:red;'> <?= $row['fname'] ?>
            </div>
            <div style='text-align: left;font-size:x-small;color: #000000;'>
                <table cellspacing="6" cellpadding="10">
                    <tr>
                        <td style="word-break: keep-all;">材料：</td>
                        <td><?php echo $row['cailiao'] ?></td>
                    </tr>
                    <tr>
                        <td style="word-break: keep-all;">包装：</td>
                        <td><?php echo $row['baozhuang'] ?></td>
                    </tr>
                    <tr>
                        <td style="word-break: keep-all;">花语：</td>
                        <td><?php echo $row['huayu'] ?></td>
                    </tr>
                    <tr>
                        <td style="word-break: keep-all;">说明：</td>
                        <td><?php echo $row['shuoming'] ?></td>
                    </tr>
                </table>
            </div>
            <div style='text-align:left;font-size: medium; color: #000066;'>
                <div style='text-decoration:line-through;margin-top:8px;'>原价:￥<?php echo $row['price'] ?></div>
                现价：<font size=4 color=red><b>￥<?php echo $row['yourprice'] ?></b></font></div>
            <div style='text-align: left;'>
                <a href="<?php echo "addgwch.php?flowerid=" . $row['flowerID']; ?>">
                    <img alt="buy" src="image/ingwc_ico.jpg"/>
                </a>
            </div>
        </td>
    </tr>

    <!-- 图片1 -->
    <tr>
        <td colspan="2">
            <img style='height:500px;width:800px;border: 1px;' src="<?php echo sprintf("picture/%s", $row['pictured']) ?>">
        </td>
    </tr>

    <!-- 包装图片 -->
    <tr>
        <td colspan="2">
            <img style='height:500px;width:800px;border: 1px;' src="<?php echo sprintf("picture/%s", $row['bzpicture']) ?>">
        </td>
    </tr>

    <!-- 材料图片 -->
    <tr>
        <td colspan="2">
            <img style='height:500px;width:800px;border: 1px;' src="<?php echo sprintf("picture/%s", $row['cailiaopicture']) ?>">
        </td>
    </tr>
</table>

<!-- 用户评价 -->
<table style='width:900px;border-width:2px;border-style:dotted; ' align=center cellspacing="2" cellpadding="3">
    <tr>
        <td colspan="2"><b>用户评价</b></td>
    </tr>
</table>

<?php
$sql2 = sprintf("select * from shoplist WHERE flowerID=%d", $row['flowerID']);
$rs2 = $con->query($sql2);
foreach ($rs2 as $row2) {
    ?>
    <table style='width:900px;border-width:2px;border-style:dotted; ' align=center cellspacing="2" cellpadding="3">
        <tr>
            <td width="200px" rowspan="2">
                <div>
                    <img src="picture/<?php echo $row['pictures']?>">
                    <br>
                    <?php echo $row2['email']?>
                </div>
            </td>
            <td>
                整体评价：<?php printStar($row2['star'])?>
            </td>
            <td>
                评价时间：<?php echo "2016-06-14"?>
            </td>
            <td>
                IP:<?php echo ":::1"?>
            </td>
        </tr>

        <tr>
            <td width="200px">
                评价内容：<?php echo $row2['evaluate'];?>
            </td>
            <td></td>
            <td></td>
        </tr>
    </table>
    <?php
}
?>


</table>

</body>
</html>
