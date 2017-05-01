
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>please login</title>
</head>
<body>

<?php include "top.php"; ?>

<form action="" method="post">
    <div align="center">
        <h2>请登录鲜花礼品网</h2>
        <table>
            <tr>
                <td>Email：</td>
                <td colspan="2">
                    <input type="text" name="email">&nbsp;@
                    <select name="mailbox">
                        <option value="163.com">163.com</option>
                        <option value="126.com">126.com</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>密码：</td>
                <td colspan="2"><input type="password" name="password"></td>
            </tr>
            <tr>
                <td>验证码：</td>
                <td>
                    <input type="text" name="code">
                </td>
                <td>
                    <img src="checks.php" width="65" height="28">
                </td>
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

//session_start();

$email = $_POST['email'] ."@". $_POST['mailbox'];
$password = $_POST['password'];

if ($email==null || $email=='' || $password==null || $password==''){
    //echo "email:" . $email;
    //echo "password:" .$password;
    echo "please input email & password";
}elseif ($_POST["code"]==null || $_SESSION["check_checks"]!=$_POST["code"]){
    echo "please check your code";
}else {
    //check exsit
    $sql = sprintf("SELECT * FROM member WHERE email='%s' and password='%s'",$email,$password);
    $rs = DAO::getResultSet(DAO::getConnection(), $sql);
    if (mysqli_fetch_row($rs)) {
        // store session data
        $_SESSION['email']=$email;
        $_SESSION['password']=$password;
        header("Location: /flower/member.php");
    }else{
        echo "<script>alert('用户密码不匹配！');window.location.href='login.php'</script>";
    }
}
?>