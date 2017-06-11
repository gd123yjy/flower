<?php
include "top.php";
include "loginRedirector.php";
require "DAO.php";
$con = DAO::getConnection();

$orderID = $_GET['orderID'];
if (empty($orderID)) {
    header("/flower/showorder.php");
    return;
}
$sql = sprintf("select * from showshoplist WHERE orderID=%d", $orderID);
$rs = $con->query($sql);
$rownum = $rs->num_rows;
if ($rownum == 0) {
    echo "<script>alert('您已经评价过啦，不能再评价咯！');window.location.href='showorder.php'</script>";
    return;
}
?>

<html>
<body>
<div align="center">
    <?php
    foreach ($rs as $row) {
        ?>
        <form action="pingjia_proceed.php" method="post">
            <input name="orderID" value="<?php echo $orderID ?>" hidden="true">
            <input name="flowerID" value="<?php echo $row['flowerID'] ?>" hidden="hidden">
            <table style='border-width:2px; font-size:18px;' cellspacing="2" cellpadding="3" align="center">
                <tr>
                    <td rowspan="2">
                        <img style='height:200px;width:150px;' src="picture/<?php echo $row['pictures'] ?>">
                        <br>
                        <?php echo $row['fname'] ?>
                    </td>
                    <td>
                        <input type="radio" name="star" value="5" checked="checked"/>
                        <img src="image/ico_1.gif">好评&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <input type="radio" name="star" value="3"/>
                        <img src="image/ico_1.gif">中评&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                        <input type="radio" name="star" value="1"/>
                        <img src="image/ico_1.gif">差评&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;

                    </td>
                </tr>
                <tr>
                    <td>
                <textarea style="resize: none;" name="evaluate" rows="10" cols="40">送货很准时，鲜花很漂亮，包装很精美。</textarea>
                    </td>
                </tr>

                <!-- 提交 -->
                <tr>
                    <td colspan="2">
                        <div align="center">
                            <input align="center" type="submit" value="评价">
                        </div>
                    </td>
                </tr>
            </table>
            <br>
            <br>
            <br>
        </form>
        <?php
    }
    ?>
</div>
</body>
</html>