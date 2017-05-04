<?php
/**
 * Created by PhpStorm.
 * User: yjy
 * Date: 17-4-27
 * Time: 下午10:36
 */
include "top.php";
require "DAO.php";
?>


<?php
$sql = sprintf("SELECT * FROM flower.flower ");
$res = DAO::getResultSet(DAO::getConnection(), $sql);

foreach ($res as $rs) {

    try {
        $name = sprintf("<div style='font-weight: bold; font-size: medium; height: 40px; line-height: 40px; color: #000066; text-align: center; border-width: 1px; border-style: solid; border-color: red;'> %s</div>", $rs['fname']);

        $picture = sprintf("<image src='flowerpicture/%s' width='150px'></image>", $rs['pictures']);

        $detail = sprintf("%s<br><div style='text-align: left; font-size: medium; color: #000066;'>
        <div style='text-decoration: line-through; margin-top: 8px;'>原价:￥ %s</div>
        现价：<font size=4 color=red><b>￥ %s</b></font>
    </div>", $rs['shuoming'], $rs['price'], $rs['yourprice']);

        $cart = sprintf("<button type='button' style='width: 100px; height: 30px; background-image: url(image/box_title28.jpg)'>place to my cart</button>");

        $table = sprintf("<table style='width: 700px; border-width: 1px; border-style: dotted;'
       align=center><tr><td width='150px'></td><td colspan='3'>%s</td></tr><tr><td width='150px'>%s</td><td colspan='3'>%s</td></tr><tr><td width='150px'></td><td colspan='3'>%s</td></tr>", $name, $picture, $detail, $cart);

        echo $table;
    } catch (Exception $e) {
        continue;
    }

}
?>

</table>