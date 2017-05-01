<?php
/**
 * Created by PhpStorm.
 * User: yjy
 * Date: 17-4-27
 * Time: 下午10:36
 */
include "top.php";

?>

<table style='width: 700px; border-width: 1px; border-style: dotted;'
	align=center>
	<div
		style='font-weight: bold; font-size: medium; height: 40px; line-height: 40px; color: #000066; text-align: center; border-width: 1px; border-style: solid; border-color: red;'> <?= $rs[fname] ?></div>
	<div style='text-align: left; font-size: medium; color: #000066;'>
		<div style='text-decoration: line-through; margin-top: 8px;'>原价:￥<?php echo $rs[price] ?></div>
		现价：<font size=4 color=red><b>￥<?php echo $rs[yourprice] ?></b></font>
	</div>
</table>