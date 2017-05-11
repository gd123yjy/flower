<!-- //删除功能 -->
<?php
require 'DAO.php';
$con = DAO::getConnection();

session_start();
    $flowerID = $_GET['flowerid'];
    $sql = sprintf("delete from cart where email='%s' AND flowerID='%s'",$_SESSION['email'],$flowerID);
    $info = mysqli_query($con, $sql);
    if($info)
        echo "<script>alert('删除成功！');window.location.href='mycart.php'</script>";
    else
        echo "<script>alert('删除失败！');window.location.href='mycart.php'</script>";

?>