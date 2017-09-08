<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-18
 * Time: 下午8:33
 */

namespace MyBlogs\Model;


class ArticalCommentmondel
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

    function newlycom($row) {

        $time = date("Y-m-d H:i:s",strtotime("now"));
//        if($row['pitchid']!=0) {
        $query = "insert into articalcomment (commentname,commentmailbox,commenttext,articalid,comid,commenttime) values (?,?,?,?,?,?)";
        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$row['namevalue']);
        $pdostate->bindparam(2,$row['mailboxvalue']);
        $pdostate->bindparam(3,$row['votextvalue']);
        $pdostate->bindparam(4,$row['articalid']);
        $pdostate->bindparam(5,$row['pitchid']);
        $pdostate->bindparam(6,$time);

        if($pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }


    public function selectcomments($articalid) {
        $query = "select * from articalcomment where articalid=".$articalid." order by comid asc";

        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }





}