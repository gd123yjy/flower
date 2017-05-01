<?php
include 'top.php';
require 'DAO.php';
?>
<HTML>
<head></head>
<body>
<form action="floweradd.php" method="post">
    <div align="center">
        <table>
            <tr>
                <td>��ţ�</td>
                <td><input type="text" name="flowerID" style="border: 3px solid"></td>
            </tr>
            <tr>
                <td>���ƣ�</td>
                <td><input type="text" name="fname"></td>
            </tr>
            <tr>
                <td>���</td>
                <td><select name="myclass" size="1">
                        <option value="xianhua">�ʻ�</option>
                        <option value="dangao">����</option>
                        <option value="lilan">����</option>
                        <option value="guolan">����</option>
                        <option value="gongzai">����</option>
                    </select></td>
            </tr>
            <tr>
                <td>��;��</td>
                <td><select name="fclass" size="1">
                        <option value="aiqingxianhua">�����ʻ�</option>
                        <option value="youqingxianhua">�����ʻ�</option>
                        <option value="shengrixianhua">�����ʻ�</option>
                        <option value="wenhouzhangbei">�ʺ򳤱�</option>
                        <option value="huibaolaoshi">�ر���ʦ</option>
                        <option value="zhufuqinghe">ף�����</option>
                        <option value="hunqingxianhua">�����ʻ�</option>
                        <option value="tanbingweiwen">̽��ο��</option>
                        <option value="shengzizhuhe">����ף��</option>
                        <option value="daoqianxianhua">��Ǹ�ʻ�</option>
                        <option value="jiajuxianhua">�Ҿ��ʻ�</option>
                        <option value="sangbingaisi">ɥ����˼</option>
                        <option value="kaiyeqiaoqian">��ҵ��Ǩ</option>
                        <option value="shangwuliyi">��������</option>
                    </select></td>
            </tr>
            <tr>
                <td>�����ϣ�</td>
                <td><select name="fclass1" size="1">
                        <option value="meigui">õ��</option>
                        <option value="kangnaixin">����ܰ</option>
                        <option value="yujinxiang">������</option>
                        <option value="baihe">�ٺ�</option>
                        <option value="fulang">����</option>
                        <option value="matilian">������</option>
                        <option value="xiangrikui">���չ�</option>
                        <option value="lanseyaoji">��ɫ����</option>
                    </select></td>
            </tr>
            <tr>
                <td>���ϣ�</td>
                <td><textarea name="cailiao" style="width: 350px;height:50px"></textarea></td>
            </tr>
            <tr>
                <td>��װ��</td>
                <td><textarea name="baozhuang" style="width: 350px;height:50px"></textarea></td>
            </tr>
            <tr>
                <td>���</td>
                <td><textarea name="huayu" style="width: 350px;height:60px"></textarea></td>
            </tr>
            <tr>
                <td>˵����</td>
                <td><input type="text" name="shuoming" style="width: 350px"></td>
            </tr>
            <tr>
                <td>�г��ۣ�</td>
                <td><input type="text" name="price" ></td>
            </tr>
            <tr>
                <td>�ּۣ�</td>
                <td><input type="text" name="yourprice" ></td>
            </tr>
            <tr>
                <td>��СͼƬ��</td>
                <td><input type="text" name="pictures" >
                    <button value="browse1">���....</button>
                </td>
            </tr>
            <tr>
                <td>ͼƬ��</td>
                <td><input type="text" name="picturem" >
                    <button value="browse2">���....</button>
                </td>
            </tr>
            <tr>
                <td>��ͼƬ��</td>
                <td><input type="text" name="pictureb" >
                    <button value="browse3">���....</button>
                </td>
            </tr>
            <tr>
                <td>��ϸ���ܣ�</td>
                <td><input type="text" name="pictured" >
                    <button value="browse4">���....</button>
                </td>
            </tr>
            <tr>
                <td>����ͼƬ��</td>
                <td><input type="text" name="cailiaopicture" >
                    <button value="browse5">���....</button>
                </td>
            </tr>
            <tr>
                <td>��װͼƬ��</td>
                <td><input type="text" name="bzpicture" >
                    <button value="browse6">���....</button>
                </td>
            </tr>
            <tr>
                <td>�Ƿ��ؼۣ�</td>
                <td><select name="tejia" size="1">
                        <option value="yes">��</option>
                        <option value="no">��</option>
                    </select></td>
            </tr>
        </table>
    </div>
</form>
<?php
?>
</body>
</HTML>