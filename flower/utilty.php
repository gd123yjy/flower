<?php
function isLogin(){
    if ($_SESSION['email']==null){
        return false;
    }else {
        return true;
    }
}

function calculateTotalAmount($cartID){
    require "DAO.php";
    $con = DAO::getConnection();
    $str = sprintf("select * from vcart WHERE email='%s'", $_SESSION['email']);
    $rs = mysqli_query($con, $str);
    $rownum = mysqli_num_rows($rs);
    $totalmoney = 0;
    for ($i = 0;$i < $rownum;$i ++){
        $row = mysqli_fetch_assoc($rs);
        $totalmoney = $totalmoney + $row['yourprice'] * $row['num'];
    }
    return $totalmoney;
}
?>