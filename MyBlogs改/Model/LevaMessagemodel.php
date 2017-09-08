<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-18
 * Time: 下午8:36
 */

namespace MyBlogstwo\Model;


class LevaMessagemodel
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

    public function replymessage($row) {
        $query = "update leavingMessage set replytime=?,replytext=? where id=".$row['id'];
        $time = date("Y-m-d H:i:s",strtotime("now"));
        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$time);
        $pdostate->bindparam(2,$row['replytext']);

        if($pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }


    function newleaving($row) {

        $query = "insert into leavingMessage (leavname,leavmailbox,leavtime,leavtext) values (?,?,?,?)";
        $time = date("Y-m-d H:i:s",strtotime("now"));

        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$row['leavname']);
        $pdostate->bindparam(2,$row['mailbox']);
        $pdostate->bindparam(3,$time);
        $pdostate->bindparam(4,$row['messagecontent']);

        if($pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }


    public function selectleaving($scope = "LIMIT 0,5") {
        $query = "select * from leavingMessage ";
        $query.="order by leavtime desc ";
        $query.=$scope;
        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }
}