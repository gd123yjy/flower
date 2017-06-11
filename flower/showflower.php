<?php
include 'top.php';
require 'DAO.php';
?>

<html>
<head></head>
<body>

<?php
$con = DAO::getConnection();

//分页
$str = "select count(*) totalNum from flower";
$rs = mysqli_query($con, $str);
$totalNum = mysqli_fetch_assoc($rs)['totalNum'];
$pageSize = 5;
?>

<div align="center">
<?php
//顶端超链接
for ($i=0;$i<$totalNum/$pageSize;$i++):
?>
<a href="?pageNum=<?php echo $i?>"><?php echo $i+1?></a>&nbsp;&nbsp;
<?php endfor; ?>
</div>

<?php
if (($pageNum=$_GET['pageNum'])==null){
    $pageNum = 0;
}
$start = ($pageNum)*$pageSize;
$end = $start+$pageSize;

$str = "select * from flower limit $start,$pageSize";
$rs = mysqli_query($con, $str);

$rownum = mysqli_num_rows($rs);
for ($i = 0;$i < $rownum;$i ++):
    $row = mysqli_fetch_assoc($rs);
?>
    <table style='width:700px;border-width:1px;border-style:dotted;' align=center>
        <tr>
            <td style='width: 30%'>
                <?php echo sprintf("<a href='flowerDetail.php?flowerID=%d'><img title='点击查看评价' alt='图片加载不出来:(' style='height:300px;width:250px;' src='picture/%s'></a>",$row['flowerID'],$row['pictureb']); ?>
            </td>
            <td style='width: 70%'>
                <div style='font-weight:bold;font-size:medium;height:40px;line-height:40px;color:#000066;text-align:center;border-width:1px;  border-style:solid;border-color:red;'> <?=$row['fname']?>
                </div>
                <div style='text-align: left;font-size:x-small;color: #000000;'>
                    <table cellspacing="3" cellpadding="5">
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