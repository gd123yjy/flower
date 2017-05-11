<?php 
include 'top.php';
?>
<HTML>
<head></head>
<body>
<form action="floweradd.php" method="post">
 <div align="center">
 <table>
     <tr>
            <td>编号：</td>
            <td><input type="text" name="flowerID" style="border: 3px solid"></td>
     </tr>
     <tr>
            <td>名称：</td>
            <td><input type="text" name="fname"></td>
     </tr>
     <tr>
            <td>类别：</td>
            <td><select name="myclass" size="1">
                <option value="xianhua">鲜花</option>
                <option value="dangao">蛋糕</option>
                <option value="lilan">礼篮</option>
                <option value="guolan">果篮</option>
                <option value="gongzai">公仔</option>
            </select></td>
     </tr>
     <tr>
        <td>用途：</td>
        <td><select name="fclass" size="1">
            <option value="aiqingxianhua">爱情鲜花</option>
            <option value="youqingxianhua">友情鲜花</option>
            <option value="shengrixianhua">生日鲜花</option>
            <option value="wenhouzhangbei">问候长辈</option>
            <option value="huibaolaoshi">回报老师</option>
            <option value="zhufuqinghe">祝福庆贺</option>
            <option value="hunqingxianhua">婚庆鲜花</option>
            <option value="tanbingweiwen">探病慰问</option>
            <option value="shengzizhuhe">生子祝贺</option>
            <option value="daoqianxianhua">道歉鲜花</option>
            <option value="jiajuxianhua">家居鲜花</option>
            <option value="sangbingaisi">丧病哀思</option>
            <option value="kaiyeqiaoqian">开业乔迁</option>
            <option value="shangwuliyi">商务礼仪</option>
        </select></td>
     </tr>
     <tr>
        <td>主材料：</td>
        <td><select name="fclass1" size="1">
            <option value="meigui">玫瑰</option>
            <option value="kangnaixin">康乃馨</option>
            <option value="yujinxiang">郁金香</option>
            <option value="baihe">百合</option>
            <option value="fulang">扶郎</option>
            <option value="matilian">马蹄莲</option>
            <option value="xiangrikui">向日癸</option>
            <option value="lanseyaoji">蓝色妖姬</option>
        </select></td>
     </tr>
     <tr>
        <td>材料：</td>
        <td><textarea name="cailiao" style="width: 350px;height:50px"></textarea></td>
     </tr>
     <tr>
        <td>包装：</td>
        <td><textarea name="baozhuang" style="width: 350px;height:50px"></textarea></td>
     </tr>
     <tr>
        <td>花语：</td>
        <td><textarea name="huayu" style="width: 350px;height:60px"></textarea></td>
     </tr>
     <tr>
        <td>说明：</td>
        <td><input type="text" name="shuoming" style="width: 350px"></td>
     </tr>
     <tr>
        <td>市场价：</td>
        <td><input type="text" name="price" ></td>
     </tr>
     <tr>
        <td>现价：</td>
        <td><input type="text" name="yourprice" ></td>
     </tr>
     <tr>
        <td>最小图片：</td>
        <td><input type="text" name="pictures" >
            <button value="browse1">浏览....</button>
        </td>
     </tr>
     <tr>
        <td>图片：</td>
        <td><input type="text" name="picturem" >
            <button value="browse2">浏览....</button>
        </td>
     </tr>
     <tr>
        <td>大图片：</td>
        <td><input type="text" name="pictureb" >
            <button value="browse3">浏览....</button>
        </td>
     </tr>
     <tr>
        <td>详细介绍：</td>
        <td><input type="text" name="pictured" >
            <button value="browse4">浏览....</button>
        </td>
     </tr>
     <tr>
        <td>材料图片：</td>
        <td><input type="text" name="cailiaopicture" >
            <button value="browse5">浏览....</button>
        </td>
     </tr>
     <tr>
        <td>包装图片：</td>
        <td><input type="text" name="bzpicture" >
            <button value="browse6">浏览....</button>
        </td>
     </tr>
     <tr>
        <td>是否特价：</td>
        <td><select name="tejia" size="1">
                <option value="yes">是</option>
                <option value="no">否</option>
        </select></td>
     </tr>
  </table>
  </div>
</form>
<?php
?>
</body>
</HTML>