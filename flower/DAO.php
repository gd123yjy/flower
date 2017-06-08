<?php
class DAO{
    
    private static $con;
    
    static function  getConnection()
    {
        if (self::$con==null){
            $con = new mysqli("localhost", "yjy", "111111", "flower") or die("flower failed");
            $con->query("SET NAMES utf8");
        }
        return $con;
    }
    
    static function getResultSet($con, $str)
    {
        $rs = mysqli_query($con, $str);
        return $rs;
    }
}