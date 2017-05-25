<?php 
include 'top.php';
?>
<html>
<head></head>
<body>
<div style="text-align: center">
    <form action="" method="post">
    <table style='width:900px;border-width:1px;border-style:dotted;' align=center>
        <tr style='background-color: #FFCCCC'>
            <td colspan="2" style="text-align: center">
               <span style="font-size: large;font-weight: bolder">添加收货人地址</span>
               <a href="order.php" style="font-size: samll;font-weight: bolder">返回</a>
            </td>
        </tr>
        <tr style="font-size:samll;">
            <td style="text-align: right">收货人姓名：</td>
            <td><input type="text" name="name" /></td>
        </tr>
        <tr style="font-size:samll;">
            <td style="text-align: right">收货人性别：</td>
            <td><select name="gender" size="1">
                <option value="male">男</option>
                <option value="female">女</option>
            </select></td>
        </tr>
        <tr style="font-size:samll;">
            <td style="text-align: right">移动电话：</td>
            <td><input type="text" name="mobile" /></td>
        </tr>
        <tr style="font-size:samll;">
            <td style="text-align: right">邮政编码：</td>
            <td><input type="text" name="zip" /></td>
        </tr>
        <tr>
            <td style="text-align: right">详细地址：</td>
            <td><input type="text" name="address" style="width: 450px"/></td>
        </tr>
        <tr style='background-color: #FFCCCC'>
            <td colspan="2" style="text-align: center">
                <input type="submit" value="提交" name="handup" />
            </td>
        </tr>
    </table>
    </form>
</div>
</body>
</html>
<?php
include 'conn/conn.php'; 
session_start();

$email = $_SESSION['email'];
$sname = $_POST['name'];
if($_POST['gender'] == "male"){
    $sex = '男';
}
else{
    $sex = '女';
}
$mobile = $_POST['mobile'];
$zip = $_POST['zip'];
$address = $_POST['address'];

if($_POST['handup']){
    if ($sname == null){
         
        echo "<script>alert('姓名不能为空！');window.location.href='customerAdd.php'</script>";
    
    }else if ($mobile == null){
        echo "<script>alert('电话号码不能为空！');window.location.href='customerAdd.php'</script>";
    }else if ($zip == null){
        echo "<script>alert('邮政编码不能为空！');window.location.href='customerAdd.php'</script>";
    }else if ($address == null){
        echo "<script>alert('地址不能为空！');window.location.href='customerAdd.php'</script>";
    }else {
        $sql = "insert into customer(custID,email,sname,sex,mobile,address,zip)values(NULL,'".$email."','".$sname."','".$sex."','".$mobile."','".$address."','".$zip."')";
        $info = mysqli_query($con, $sql);
        if($info)
            echo "<script>alert('添加成功！');window.location.href='order.php'</script>";
        else
            echo "<script>alert('添加失败！');window.location.href='customerAdd.php'</script>";
    }
}

?>