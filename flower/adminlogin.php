<?php

//include "top.php";
?>

<html>
<head>
    <meta charset="UTF-8">
    <title>admin login</title>
</head>
<body>

<form action="" method="post">
    <div align="center" >
        <table style="border:1px dashed #0066CC;" >
            <tr>
                <td colspan="4">
                    <h3 align="center">鲜花礼品网后台登录</h3>
                </td>
            </tr>
            <tr>
                <td>Email：</td>
                <td colspan="2">
                    <input type="text" name="username">
                </td>
            </tr>
            <tr>
                <td>密码：</td>
                <td colspan="2"><input type="password" name="password"></td>
            </tr>
            <tr>
                <td style="text-align: center;" colspan="3">
                    <input type="submit" name="btnLogin" >
                </td>
            </tr>
        </table>
    </div>
</form>
</body>
</html>

<?php
require 'DAO.php';
$con = DAO::getConnection();

$username = $_POST['username'];
$password = $_POST['password'];

if (empty($username)){
    return;
}else if (empty($password)){
    echo "<script>alert('密码不能为空！');window.location.href='adminlogin.php'</script>";
    return;
}

$sql = sprintf("SELECT * FROM admin WHERE username='%s' and password='%s'",$username,$password);
$rs = $con->query($sql);
if (mysqli_fetch_row($rs)) {
    // store session data
    session_start();
    $_SESSION['admin_user']=$username;
    //$_SESSION['admin_password']=$password;
    header("Location: /flower/adminIndex.php");
}else{
    echo "<script>alert('用户密码不匹配！');window.location.href='adminlogin.php'</script>";
}
?>