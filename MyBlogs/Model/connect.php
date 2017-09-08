<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-4-21
 * Time: 上午11:29
 */

namespace MyBlogs\Model;


class connect
{
    public static $conn;
    static function connectLi() {
        try {
            self::$dbh=new PDO('mysql:dbname=MyBlogs;host=localhost','root','716523');
            self::$dbh->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        }catch (PDOException $e){
            "数据库连接失败：".$e->getMessage();
        }
    }
    static function getconn() {
        self::connectLi();
        return self::$conn;
    }
}