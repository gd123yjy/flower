<?php
include 'top.php';
require 'DAO.php';
?>
<html>
<head></head>
<body>
<?php
$con = DAO::getConnection();
$str = "select * from flower";
$rs = mysqli_query($con, $str);
$rownum = mysqli_num_rows($rs);

for ($i = 0;$i < $rownum;$i ++):
    $row = mysqli_fetch_assoc($rs);
    ?>

    <table style='width:700px;border-width:1px;border-style:dotted;' align=center>
        <tr>
            <td style='width: 30%'><?php echo "<img style='height:250px;width:200px;' src='picture/".$row['pictures']."'.'_b' />"; ?></td>
            <td style='width: 70%'>
                <div style='font-weight:bold;font-size:medium;height:40px;line-height:40px;color:#000066;text-align:center;border-width:1px;  border-style:solid;border-color:red;'> <?=$row['fname']?>
                </div>
                <div style='text-align: left;font-size:x-small;color: #000000;'>
                    <table>
                        <tr><td style="word-break: keep-all;">材料：</td><td><?php echo $row['cailiao']?></td></tr>
                        <tr><td style="word-break: keep-all;">包装：</td><td><?php echo $row['baozhuang']?></td></tr>
                        <tr><td style="word-break: keep-all;">花语：</td><td><?php echo $row['huayu']?></td></tr>
                        <tr><td style="word-break: keep-all;">说明：</td><td><?php echo $row['shuoming']?></td></tr>
                    </table>
                </div>
                <div style='text-align:left;font-size: medium; color: #000066;'>
                    <div style='text-decoration:line-through;margin-top:8px;'>原价:￥<?php echo $row['price']?></div>
                    现价：<font size=4 color=red><b>￥<?php echo $row['yourprice']?></b></font></div>
                <div style='text-align: left;'>
                    <a href="<?php echo "addgwch.php?flowerid=".$row['flowerID'] ;?>">
                        <img alt="buy" src="image/ingwc_ico.jpg" />
                    </a>
                </div>

            </td>
        </tr>
    </table>
<?php endfor; ?>
</body>
</html>