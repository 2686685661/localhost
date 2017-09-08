<?php

namespace MyWeb\model;


class Database{

    /**
     * 数据库链接
     */
    private $pdo = null;
    static public $db = null;

    public function __construct() {
            $this->init();
    }

    public function getPdo(){
        return $this->pdo;
    }

    static public function getdb(){
        if (self::$db == null) {
            self::$db = new Database();
        }

        return self::$db;
    }

    public function init(){

        try{

            $this->pdo = new \PDO('mysql:dbname=myweb;host=localhost','root','mysql');

        }catch (PDOException $e){

            echo '数据库连接失败：'.$e->getMessage();

        }

        $this->pdo->query("set names utf8");
    }


    /**
     * 数据库查询方法
     */
    public function database_query($sql,$valueArray){

        $stmt = $this->pdo->prepare($sql);

        $index = 1;

        foreach ($valueArray as $value){

            $stmt->bindValue($index, $value);

            $index++;

        }

        $stmt->execute();

        $towArrRes = $stmt->fetchAll(\PDO::FETCH_ASSOC);

        return $towArrRes;

    }

    /**
     * 数据库操作方法
     */
    public function database_excute($sql,$valueArray){

        $stmt = $this->pdo->prepare($sql);

        $index = 1;

        foreach ($valueArray as $value){

            $stmt->bindValue($index, $value);

            $index++;

        }

        $result = $stmt->execute();

        return $result;

    }

}