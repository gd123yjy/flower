<?php
include "top.php";
require 'DAO.php';

function getConnection()
{
    //$con = new mysqli("localhost", "root", "12345678", "flower") or die("flower连接失败");
    //$con->query("SET NAMES utf8");
    return DAO::getConnection();
}

function getResultSet($con, $str)
{
    //$rs = mysqli_query($con, $str);
    return DAO::getResultSet($con, $str);
}

?>


    <form method="post">
        <!-- enctype="multipart/form-data" -->
        <div align="center">
            <table>

                <tr>
                    <td>
                        用户名
                    </td>
                    <td colspan="2">
                        <input type="text" value="必填字段" name="pre_username"> @ <select
                            name="pos_username">
                            <option>163.com</option>
                            <option>126.com</option>
                        </select><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        密码
                    </td>
                    <td colspan="2">
                        <input type="password" name="password"><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        确认密码
                    </td>
                    <td colspan="2">
                        <input type="password" name="password_confirm"><br>
                    </td>
                </tr>

                <tr>
                    <td>
                        性别
                    </td>
                    <td colspan="2">
                        <input type="radio" name="gender" value="男">男<input type="radio" name="gender" value="女">女<br>
                    </td>
                </tr>

                <tr>
                    <td>
                        联系电话
                    </td>
                    <td colspan="2">
                        <input type="text" name="phonenum">
                    </td>
                </tr>

                <tr>
                    <td>
                        地址
                    </td>
                    <td colspan="2">
                        <input type="text" name="address">
                    </td>
                </tr>

                <tr>
                    <td colspan="3" align="center">
                        <input type="submit" value="注册"><br>
                    </td>
                </tr>

            </table>
        </div>
    </form>

<?php
if ($_POST["pre_username"] == null) {
    return;
}
if (strlen($_POST["pre_username"]) == 0 || $_POST["password"] != $_POST["password_confirm"]) {
    echo "<script>alert('输入错误！');window.location.href='register.php'</script>";
    return;
} else {
    $username = $_POST["pre_username"] . "@" . $_POST["pos_username"];
    $password = $_POST["password"];
    $sex = $_POST["gender"];
    $phonenum = $_POST["phonenum"];
    $address = $_POST["address"];

    $con = getConnection();
    $rs = getResultSet($con, "select * from member where email='" . $username . "'");

    if (mysqli_fetch_row($rs)) {
        echo "<script>alert('您输入的用户名已经存在！');window.location.href='register.php'</script>";
    }

    $str = sprintf("insert into member values ('%s','%s','defalut_name','%s','%s','%s',%d,%f)", $username, $password, $sex, $phonenum, $address, 0, 0.0);
    $info = getResultSet($con, $str);

    if ($info)
        echo "<script>alert('注册成功！');window.location.href='login.php'</script>";
    else
        echo "<script>alert('注册失败！');window.location.href='1.php'</script>";

}

?>