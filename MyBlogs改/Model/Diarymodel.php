<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-18
 * Time: 下午2:01
 */

namespace MyBlogstwo\Model;


class Diarymodel
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


    function modifyDiary($row) {
        $time = date("Y-m-d",strtotime($row['modifytime']));

        $query = "update diary set diarytime=?,diarycontent=? where id=".$row['id'];
        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$time);
        $pdostate->bindparam(2,$row['modifysub']);
        if($pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }



    function newDiary($row) {

        $query = "insert into diary (diarytime,diarycontent) values (?,?)";
        $pdostate = self::$dbh->prepare($query);

        $date= date("Y-m-d",strtotime($row["diarydate"]));

        $pdostate->bindparam(1,$date);
        $pdostate->bindparam(2,$row['diarysubject']);
        $pdostate->execute();
        if($pdostate->execute()) {
            return true;
        }else {
            return false;
        }
    }


    public function selectdiary($scope = "LIMIT 0,15") {
        $query = "select * from diary ";
        $query.="order by diarytime desc ";
        $query.=$scope;
        echo $query;
        try{
            $state = self::$dbh->query($query);
        }catch (\PDOException $e) {
            $e->getMessage();
        }
        $row = $state->fetchAll(\PDO::FETCH_ASSOC);
        return $row;
    }
}