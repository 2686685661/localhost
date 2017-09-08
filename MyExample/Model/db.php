<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午9:32
 */

namespace MyExample\Model;


class db
{

    private $pdo;
    private static $db;

    public function __construct() {
        $this->init();
    }

    public function init() {
        try{
            $this->pdo = new \PDO('mysql:dbname=MyExample;host=localhost','root','716523');
        }catch (\PDOException $e) {
            echo '数据库错误：'.$e->getMessage();
        }
        $this->pdo->query("set names utf8");
    }


    public static function getdb() {
        if(self::$db==null) {
            self::$db = new db();
        }

        return self::$db;
    }


    /**
     * @param $sql 查询的sql语句
     * @param $get查询的内容
     * @return mixed返回查询的数据
     */
    public function database_query($sql,$get) {

        $stmt = $this->pdo->prepare($sql);

        $index = 1;

        foreach ($get as $vaule) {

            $stmt->bindValue($index,$vaule);

            $index++;

        }

        $stmt->execute();

        $row = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $row;
    }

    /**
     * @param $sql执行的语句
     * @param $get查询的内容
     * @return mixed 返回查询的数据
     */
    public function database_excute($sql,$get) {

        $stmt = $this->pdo->prepare($sql);

        $index = 1;

        foreach ($get as $vaule) {

            $stmt->bindValue($index,$vaule);

            $index++;

        }

        $result = $stmt->execute();

        return $result;
    }


}