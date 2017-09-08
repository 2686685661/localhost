<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-18
 * Time: 下午2:01
 */

namespace MyBlogstwo\Model;


class Articalmodel
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



    function modifyArtical($row) {

        $artyid='';
        $articaltype = $row['articletype'];
        $query = "select * from articleType where arTy='$articaltype'";
        $pdo = self::$dbh->query($query);
        foreach ($pdo as $pdoarr) {
            $artyid = $pdoarr['id'];
        }
        $headline = $row['headline'];
        $articalcontent = $row['articalcontent'];
        $id = $row['id'];
        $querytwo = "update artical set headline='$headline',articalcontent='$articalcontent',artyid=$artyid where id=$id";

        $state = self::$dbh->exec($querytwo);
        if($state) {
            return true;
        }else {
            return false;
        }
    }


    function newArticle($row) {
        $artyid='';
        $person = '李闪磊';
        $time = date("Y-m-d H:i:s",strtotime("now"));
        $articaltype = $row['articletype'];
        $query = "select * from articleType where arTy='$articaltype'";

        try{
            $pdo = self::$dbh->query($query);
            foreach ($pdo as $pdoarr) {
                $artyid = $pdoarr['id'];
            }
        }catch (\PDOException $e) {
            echo $e->getMessage();
        }

        $querytwo = "insert into artical (artyid,headline,publishtime,publishperson,articalcontent,readnumber,picture) values ($artyid,?,?,'$person',?,0,?)";

        $pdostate = self::$dbh->prepare($querytwo);
        $pdostate->bindparam(1,$row['headline']);
        $pdostate->bindparam(2,$time);
        $pdostate->bindparam(3,$row['articalcontent']);
        $pdostate->bindparam(4,$row['imgurl']);
        $pdostate->execute();
//        if() {
//            return true;
//        }else {
//            return false;
//        }
    }


    public function selectartical($scope = "LIMIT 0,15") {
        $query = "select * from artical ";
        $query.="order by publishtime desc ";
        $query.=$scope;
        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }

    public function vagueselect($vague) {

        $artyid = '';
        $query = "select * from articleType where arTy like '%".$vague."%'";

        $state = self::$dbh->query($query);
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        if(count($row)>0) {
            foreach ($row as $get) {
                $artyid = $get['id'];
            }
            $querytwo = "select * from artical where artyid=".$artyid;
            $statetwo = self::$dbh->query($querytwo);
            $rowtwo = $statetwo->fetchAll(\PDO::FETCH_ASSOC);
            return $rowtwo;

        }else {
            return 0;
        }

    }
}