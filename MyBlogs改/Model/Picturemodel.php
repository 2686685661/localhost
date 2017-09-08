<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-18
 * Time: 下午2:01
 */

namespace MyBlogstwo\Model;


class Picturemodel
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

    function newpicture($picname) {

        $query = "insert into picture (picturename) values (?)";
        $pdostate = self::$dbh->prepare($query);
        $pdostate->bindparam(1,$picname);
        $pdostate->execute();
    }

    public function selectpicture($scope = "LIMIT 0,5") {
        $query = "select * from picture ";
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