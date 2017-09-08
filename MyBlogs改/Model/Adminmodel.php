<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-18
 * Time: 下午8:47
 */

namespace MyBlogs\Model;


class Adminmodel
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


    //查询自己个人信息和账号密码的方法
    function querymy($a)
    {
//         $row = [];
        $query = "select * from ".$a;
        try {
            $pdostate = self::$dbh->query($query);
        } catch (PDOException $e) {
            echo $e->getMessage();
        }
        $row = $pdostate->fetchAll(\PDO::FETCH_ASSOC);
        return $row;

    }

    function counts($a) {
        $query = '';
        if($a==0) {
            $query = "select * from diary";
        }elseif($a==1) {
            $query = "select * from artical";
        }elseif ($a==2) {
            $query = "select * from picture";
        }elseif ($a==3) {
            $query = "select * from leavingMessage";
        }
        try{
            $pdostate = self::$dbh->query($query);
            return $pdostate->rowCount();
        }catch (PDOException $e) {
            echo $e->getMessage();
        }

    }

    function delete($row) {
        $query = "delete from ".$row['name']." where id=".$row['diaryid'];
        $state = self::$dbh->exec($query);
        if($state)
            return true;
        else
            return false;
    }

    function returnmodify($row) {

        $query = "select * from ".$row['name']." where id=".$row['diaryid'];
//         log($query);
        try{
            $pdostate = self::$dbh->query($query);
        }catch (PDOException $e) {
            echo $e->getMessage();
        }
        $rows = $pdostate->fetchAll(\PDO::FETCH_ASSOC);
        return $rows;
    }


    public function selecthot($name,$limit) {
        if($name=='artical') {
            $query = "select * from ".$name." order by readnumber desc ".$limit;
        }elseif($name=='leavingMessage') {
            $query = "select * from ".$name." order by leavtime desc ".$limit;
        }

        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }
}