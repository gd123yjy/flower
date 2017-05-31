<?php
include 'top.php';
require 'DAO.php';
$con = DAO::getConnection();

?>
<html>
<head></head>
<body>
<form action="" method="post">
    <div style="text-align: center">
        <img style='align: center' alt="hua" src="image/cartbg2.jpg">
        <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
            <tr style='background-color: #FFCCCC'>
                <td style="text-align: center">
                    <span style="font-size: large;font-weight: bolder;">选择收货人地址</span>
                    <a href="customerAdd.php" style="font-size: small;font-weight: bolder;">添加收货人地址</a>
                </td>
            </tr>
            <?php
            $str = "select * from customer";
            $rs = mysqli_query($con, $str);
            $rownum = mysqli_num_rows($rs);
            for ($i = 0;$i < $rownum;$i ++):
                $row = mysqli_fetch_assoc($rs);
                if($row['cdefault'] == 0):
            ?>
            <tr style="font-size: smaller">
                <td><input type="radio" name="information" value="<?php echo $i;?>"/><?php echo $row['sname']; ?>，<?php echo $row['mobile']; ?>，<?php echo $row['address']; ?>，<?php echo $row['zip']; ?>
                    <a href="customerUpdate.php?custID=<?php echo $row['custID'];?>">设置为默认地址</a>
                    <a href="customerDelete.php?custID=<?php echo $row['custID'];?>">删除</a>
                </td>
            </tr>
            <?php endif;?>
            <?php if($row['cdefault'] == 1):?>
            <tr style="font-size: smaller">
                <td><input type="radio" name="information" value="<?php echo $i;?>" checked="checked"/><?php echo $row['sname']; ?>，<?php echo $row['mobile']; ?>，<?php echo $row['address']; ?>，<?php echo $row['zip']; ?>  
                    <span style="color: red">默认地址</span>
                    <a href="customerDelete.php?custID=<?php echo $row['custID']?>">删除</a>
                </td>
            </tr>
            <?php endif;?>
            <?php endfor;?>
        </table>
        <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
            <tr style='background-color: #FFCCCC'>
                <td style="text-align: center;font-size:large;font-weight: bolder;">配送费用</td>
            </tr>
            <tr style="font-size: smaller">
                <td>
                    <input type="radio" name="price" value="a1" checked="checked"/>市区送货（<span style="color: red;font-weight: bolder;">免费送货</span>）
                    <input type="radio" name="price" value="a2" />郊区送货（<span style="color: red;font-weight: bolder;">+30元</span>）
                    <input type="radio" name="price" value="a3" />远郊送货（<span style="color: red;font-weight: bolder;">+50元</span>）
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>注：偏远地区请咨询客服确定配送费用，如超过50元需另外补付</td>
            </tr>
        </table>
        <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
            <tr style='background-color: #FFCCCC'>
                <td style="text-align: center;font-size:large;font-weight: bolder;">配送时间</td>
            </tr>
            <tr style="font-size: smaller">
                <td>配送日期：
                <input name="date" type="date" value="2017-06-13"/>
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>时段
                    <input type="radio" name="time" value="a1" checked="checked"/>不限
                    <input type="radio" name="time" value="a2" />上午(8:30 ~ 12:00)
                    <input type="radio" name="time" value="a3" />下午(12:00 ~ 18:00)
                    <input type="radio" name="time" value="a4" />晚上(18:00 ~ 20:30)
                    <input type="radio" name="time" value="a5" />定时 <input type="text" name=correctTime style="width: 60px"/>
                </td>
            </tr>
        </table>
        <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
            <tr style='background-color: #FFCCCC'>
                <td style="text-align: center;font-size:large;font-weight: bolder;">特殊要求</td>
            </tr>
            <tr style="font-size: smaller">
                <td>如果您对配送服务服务有特殊要求，请在此说明，我们尽量满足：
                    <input type="text" name="specialRequire" style="width: 300px"/>
                </td>
            </tr>
        </table>
        <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
            <tr style='background-color: #FFCCCC'>
                <td style="text-align: center;font-weight: bolder;">
                    <span style="font-size:large;">卡片资料</span>
                    <span style="font-size: small">（随货赠送精美留言卡一张，请写下您的留言）</span>
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>给收货人留言：<input type="text" name="message" placeholder="最多支持200汉字或字符" style="width: 450px"/></td>
            </tr>
            <tr style="font-size: smaller">
                <td>购买人署名：
                    <input type="radio" name="signature" value="a1" checked="checked"/>无需另外署名，卡片按留言栏填写就好了
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>
                    <input type="radio" name="signature" value="a2"/>需要署名，我的署名是：
                    <input type="text" name="mysignature" style="width: 250px"/>
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>
                    <input type="radio" name="signature" value="a3" />不需要署名，我想保密！
                </td>
            </tr>
        </table>
        <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
            <tr style='background-color: #FFCCCC'>
                <td style="text-align: center;font-weight: bolder;">
                    <span style="font-size:large;">付款方式</span>
                    <span style="font-size: small">（请选择，确认订单提交后，页面将显示你所选择付款方式的指引）</span>
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>
                    <input type="radio" name="payment" value="a1" checked="checked"/>网上支付
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>
                    <input type="radio" name="payment" value="a2" />银行转账
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>
                    <input type="radio" name="payment" value="a3" />邮局汇款
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>
                    <input type="radio" name="payment" value="a4" />上门收款
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td>注：偏远地区请咨询客服确定配送费用，如超过50元需另外补付</td>
            </tr>
        </table>
        <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
            <tr style='background-color: #FFCCCC'>
                <td colspan="2" style="text-align: center;font-weight: bolder;">
                    <span style="font-size:large;">我要寄发票</span>
                </td>
            </tr>
            <tr style="font-size: smaller">
                <td colspan="2">发票相关说明：</td>
            </tr>
            <tr style="font-size: smaller">
                <td colspan="2">1.发票由由深圳总部寄出：默认使用“邮政平邮”，在订单送达后方开具寄出发票，递达通常需10~15个工作日；如您急需发票，可联系我司客服特殊安排处理。</td>
            </tr>
            <tr style="font-size: smaller">
                <td colspan="2">2.发票内容视客户订购的商品类别不同，填写为：鲜花配送服务费、蛋糕配送服务费、礼品配送服务费。</td>
            </tr>
            <tr style="font-size: smaller">
                <td colspan="2">3.以下4项全部填写完整准确，方开具和寄出发票。</td>
            </tr>
            <tr style="font-size: smaller">
                <td colspan="2">4.万里通积分、关爱积分、V币、礼品卡四种支付方式已开具过发片给合作方，不再开具发票给使用者，如有疑问请联系积分/礼品卡提供方。</td>
            </tr>
            <tr style="font-size: smaller">
                <td>发票抬头：</td>
                <td><input type="text" name="invoiceTitle" placeholder="个人或单位全称"/></td>
            </tr>
            <tr style="font-size: smaller">
                <td>详细地址：</td>
                <td><input type="text" name="address" style="width: 450px"/></td>
            </tr>
            <tr style="font-size: smaller">
                <td>邮政编码：</td>
                <td><input type="text" name="zip"/></td>
            </tr>
            <tr style="font-size: smaller">
                <td>收信人：</td>
                <td><input type="text" name="receiver"/></td>
            </tr>
        </table>
        <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
            <tr style='background-color: #FFCCCC;'>
                <td style="text-align: center">
                    <input type="submit" name="handup" value="提交"/>
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>

<?php


if ($_POST['handup']!=null){
    $email = $_SESSION['email'];
    $information = $_POST['information'];
    $str = "select * from customer";
    $rs = mysqli_query($con, $str);
    $rownum = mysqli_num_rows($rs);
    for ($i = 0;$i < $rownum;$i ++){
        $row = mysqli_fetch_assoc($rs);
        if ($i == $information){
            $custID = $row['custID'];
        }
    }
    $peisong = $_POST['price'];
    if ($peisong == 'a1'){
        $peisong= 0;
    }elseif($peisong == 'a2'){
        $peisong = 30;
    }elseif ($peisong == 'a3'){
        $peisong = 50;
    }
    $inputtime = date("Y/m/d") ;
    $peisongday = $_POST['date'];
    $peisongtime = $_POST['time'];
    if($peisongtime == 'a1'){
        $peisongtime = "不限";
    }elseif ($peisongtime == 'a2'){
        $peisongtime = "上午(8:30 ~ 12:00)";
    }elseif($peisongtime == 'a3'){
        $peisongtime = "下午(12:00 ~ 18:00)";
    }elseif ($peisongtime == 'a4'){
        $peisong = "晚上(18:00 ~ 20:30)";
    }elseif ($peisongtime == 'a5'){
        $peisongtime = $_POST['correctTime'];
    }
    $psyq = $_POST['specialRequire'];
    $liuyan = $_POST['message'];
    $signature = $_POST['signature'];
    if (strcmp($signature,'a2') == 0){
        $shuming = $_POST['mysignature'];
    }else{
        $shuming = "";
    }
    $fkfs = $_POST['payment'];
    if($fkfs == 'a1'){
        $fkfs = "网上支付";
    }elseif ($fkfs == 'a2'){
        $fkfs = "银行转账";
    }elseif ($fkfs == 'a3'){
        $fkfs = "邮局汇款";
    }elseif ($fkfs == 'a4'){
        $fkfs = "上门收款";
    }
    $fpaddress = $_POST['address'];
    $zip = $_POST['zip'];
    $fpsname = $_POST['invoiceTitle'];
    $receiver = $_POST['receiver'];

    //开始事务
    $con->autocommit(false);
    $info = true;
    //step1 添加订单信息到myorder表
    $sql = sprintf("insert into myorder(email,custID,inputtime,peisongday,peisongtime,peisong,psyq,liuyan,shuming,fkfs,fp,fpaddress,zip,fpsname) 
            values('%s',%d,'%s','%s','%s',%d,'%s','%s','%s','%s','%s','%s','%s','%s')",
            $email,$custID,$inputtime,$peisongday,$peisongtime,$peisong,$psyq,$liuyan,$shuming,$fkfs,$fpsname,$fpaddress,$zip,$receiver);
    $info &= $con->query($sql);

    $str = sprintf("select * from vcart WHERE email='%s'", $email);
    $rs = $con->query($str);
    $rownum = mysqli_num_rows($rs);
    for ($i = 0;$i < $rownum;$i ++){
        $row = mysqli_fetch_assoc($rs);
        $flowerID = $row['flowerID'];
        $num = $row['num'];
        //step2 将购买的商品列表添加到shoplist表中
        $sql = sprintf("insert into shoplist(orderID,flowerID,email,num,title,star,evaluate) 
            SELECT max(orderID),'%s','%s',%d ,'%s',%d ,'%s' from myorder", $flowerID,$email,$num,"",0,"");
        $info &= $con->query( $sql);
        //step3 修改flower表中的selledNum字段。修改鲜花的销售数量
        $sql = sprintf("update flower set SelledNum=(SELECT SelledNum+%d ) WHERE flowerID='%s'",$num,$flowerID);
        $info &= $con->query( $sql);
        //step4 删除购物车表中已购买的商品
        $sql = sprintf("delete from cart where email='%s' AND flowerID='%s'",$email,$flowerID);
        $info &= $con->query( $sql);
    }

    if($info){
        $con->commit();
        echo "<script>alert('提交成功！');window.location.href='index.php'</script>";
    }
    else{
        $con->rollback();
        echo "<script>alert('提交失败！');window.location.href='mycart.php'</script>";
    }
    $con->autocommit(true);
    //结束事务

}
?>
