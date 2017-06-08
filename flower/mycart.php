<!-- 显示购物车功能 -->
<?php
include 'top.php';
require 'DAO.php';
$con = DAO::getConnection();
if ($_SESSION['email'] == null) {
    header("Location: /flower/login.php");
}
?>

<html>
<head></head>
<body>
<div style='text-align: center'>
    <img style='align: center' alt="花" src="image/cartbg1.jpg">
    <table style='width:900px;border-width:1px;border-style:dotted;text-align:center' align=center>
        <tr style='background-color: #FFCCCC'>
            <td>编号</td>
            <td>商品名称</td>
            <td>市场价</td>
            <td>现价</td>
            <td>数量</td>
            <td>删除商品</td>
        </tr>
        <?php
        $str = sprintf("select * from vcart WHERE email='%s'", $_SESSION['email']);
        $rs = mysqli_query($con, $str);
        $rownum = mysqli_num_rows($rs);
        $totalmoney = 0;
        for ($i = 0; $i < $rownum; $i++):
            $row = mysqli_fetch_assoc($rs);
            ?>
            <tr>

                <td><?php echo $row['flowerID']; ?></td>
                <td><?php echo "<img src='flowerpicture/" . $row['pictures'] . "' />";
                    echo $row['fname']; ?></td>
                <td><?php echo $row['price']; ?></td>
                <td><?php echo $row['yourprice']; ?></td>

                <td>

                    <input type="text" id="newNum<?php echo $i; ?>" name="number" style="width: 30px "
                           value="<?php echo $row['num']; ?>">
                    <input type="text" id="flowerID<?php echo $i; ?>" name="flowerid"
                           value="<?php echo $row['flowerID']; ?>" style="display: none">

                    <button name="update" onclick="update(<?php echo $i; ?>)">更新</button>

                    <script type="text/javascript">
                        var xmlHttp = false;
                        function createXMLHttpRequest() {
                            if (window.ActiveXObject) {
                                try {
                                    xmlHttp = new ActiveXObject("Msxml2.XMLHTTP");
                                } catch (e) {
                                    try {
                                        xmlHttp = new ActiveXObject("Microsoft.XMLHTTP");
                                    } catch (ee) {
                                        xmlHttp = false;
                                    }
                                }
                            }

                            else if (window.XMLHttpRequest) {
                                try {
                                    xmlHttp = new XMLHttpRequest();
                                }
                                catch (e) {
                                    xmlHttp = false;
                                }
                            }
                        }
                        function update(i) {
                            createXMLHttpRequest();
                            xmlHttp.onreadystatechange = callback;
                            var flowerid = document.getElementById("flowerID" + i).value;
                            var number = document.getElementById("newNum" + i).value;

                            xmlHttp.open("get", "cart_update.php?flowerid=" + flowerid + "&number=" + number, true);
                            xmlHttp.send(null);
                            function callback() {
                                if (xmlHttp.readyState == 4) {
                                    if (xmlHttp.status == 200) {
                                        var data = xmlHttp.responseText;
                                        var pNode = document.getElementById("P");
                                        pNode.innerHTML = data;
                                    }
                                }
                            }

                            window.location.href = "mycart.php";

                        }
                    </script>
                </td>

                <td>
                    <a href="<?php echo "cart_delete.php?flowerid=" . $row['flowerID'] ?>">
                        <button name="delete">删除</button>
                    </a>
                </td>
            </tr>
            <?php
            $totalmoney = $totalmoney + $row['yourprice'] * $row['num'];
        endfor;
        $_SESSION['totalmoney'] = $totalmoney;
        ?>
    </table>

    <table style='width:900px;text-align:center' align=center>
        <tr>
            <td colspan="6">
                <div style="text-align: right">
                    <div id="P"><?= "合计：￥" . $totalmoney . "元" ?></div>
                </div>
            </td>
        </tr>
    </table>

    <table style='width:900px;text-align:center' align=center>
        <tr>
            <td colspan="6">
                <div style="text-align: right">
                    <a href="showflower.php">
                        <img alt="buy" src="image/continue.jpg"/>
                    </a>
                    <a href="<?php echo "cart_clear.php"; ?>">
                        <img alt="buy" src="image/clearCart.jpg"/>
                    </a>
                    <a href="order.php">
                        <img alt="buy" src="image/submitOrder.jpg"/>
                    </a>
                </div>
            </td>
        </tr>
    </table>

</div>
</body>
</html>