<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-18
 * Time: 下午8:43
 */

namespace MyBlogstwo\Model;


class Perconalmodel
{



    public static $dbh;

    function __construct()
    {

        try {
            self::$dbh = new \PDO("mysql:host=localhost;dbname=MyBlogs;charset=utf8", "root", "716523");
//             self::$dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "数据库连接失败：" . $e->getMessage();
        }
    }



    //修改自己个人信息的方法
    function modificationmy($row) {

        $query = 'update personal set myName=?,qq=?,myWork=?,myExplain=?,myHobby=?';
        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$row['name']);
        $pdostate->bindparam(2,$row['qqnumber']);
        $pdostate->bindparam(3,$row['work']);
        $pdostate->bindparam(4,$row['explain']);
        $pdostate->bindparam(5,$row['hobby']);
        if( $pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }
}