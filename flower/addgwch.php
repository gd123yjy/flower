<!-- 添加购物车功能 -->
<?php
require 'DAO.php';
$con = DAO::getConnection();

    session_start();
    $email = $_SESSION['email'];
    if ($email==null){
        header("Location: /flower/login.php");
    }
    $flowerID = $_GET['flowerid'];

    $cart = sprintf("select * from cart where email='%s' AND flowerID='%s'",$email,$flowerID);
    $rs = mysqli_query($con, $cart);
    $rownum = mysqli_num_rows($rs);
    if ($rownum != 0){
        for ($i = 0;$i < $rownum;$i ++){
            $rowcart = mysqli_fetch_assoc($rs);
            $newNum = $rowcart['num'] + 1;
            $sql = sprintf("update cart set num=%d where email='%s' AND flowerID='%s'",$newnum,$email,$flowerID);
            $info = mysqli_query($con, $sql);
            if($info)
                echo "<script>alert('添加成功！');window.location.href='mycart.php'</script>";
            else
                echo "<script>alert('添加失败！');window.location.href='mycart.php'</script>";
        }
    }
    else {
        $sql = "insert into cart(cartID,email,flowerID,num)values(NULL,'".$email."','".$flowerID."',1)";
        
        $info = mysqli_query($con, $sql);
        if($info)
            echo "<script>alert('添加成功！');window.location.href='mycart.php'</script>";
        else
            echo "<script>alert('添加失败！');window.location.href='mycart.php'</script>";
    }
?>