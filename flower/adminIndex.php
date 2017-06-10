<?php
session_start();
include_once 'utilty.php';
?>
<meta charset="utf-8">
<center>
    <table width=999px border=0>
        <tr>
            <td rowspan=2><img src="image\logo.jpg"
                               style="width: 216px; height: 68px"></td>
            <td style="font-size: x-small;">

            </td>
            <td style="background: url('image/topxmenubg.jpg'); font-size: x-small; text-align: center;">
                <a href="adminlogin.php" style="text-decoration: none;">后台登录</a>
                |
                <a href="adminexit.php" style="text-decoration: none;">退出</a>
            </td>
        </tr>
        <tr>
            <td>

            </td>
            <td style="text-align: right;"><img src="image\ttel.jpg"></td>
        </tr>
        <tr>
            <td colspan=3
                style="background: url('image/bg-navbox.png'); font-size: small; text-align: center; width: 999px; height: 40px">
                <span style="color: White;"> |</span> &nbsp; &nbsp; &nbsp;&nbsp;&nbsp;&nbsp;
                <a href="index.php" style="text-decoration: none;">
                    <span style="color: White; font-weight: bold; font-size: medium; font-family: 宋体">
						前台主页</span>
                </a> &nbsp;&nbsp;&nbsp;

                <span style="color: White;"> |</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="" style="text-decoration: none;">
                    <span style="color: White; font-weight: bold; font-size: medium; font-family: 宋体">后台主页</span>
                </a>&nbsp; &nbsp; &nbsp;

                <span style="color: White;"> |</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <!-- TODO -->
                <a href="adminFlowerList.php" style="text-decoration: none;">
                    <span style="color: White; font-weight: bold; font-size: medium; font-family: 宋体">鲜花管理</span>
                </a>&nbsp; &nbsp; &nbsp;

                <span style="color: White;"> |</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="adminOrderList.php" style="text-decoration: none;">
                    <span style="color: White; font-weight: bold; font-size: medium; font-family: 宋体">订单管理</span>
                </a>&nbsp; &nbsp; &nbsp;

                <span style="color: White;"> |</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                <a href="showflower.php" style="text-decoration: none;">
                    <span style="color: White; font-weight: bold; font-size: medium; font-family: 宋体">评价管理</span>
                </a>&nbsp; &nbsp; &nbsp;

                <span style="color: White;"> |</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
            </td>
        </tr>
        <tr>
            <td colspan=3
                style="background: url('image/search_bg.jpg'); font-size: small; text-align: center; width: 999px; height: 35px">
				<span style="font-weight: bold; font-size: x-small; font-family: 宋体">
			</span>
            </td>
        </tr>
    </table>
</center>