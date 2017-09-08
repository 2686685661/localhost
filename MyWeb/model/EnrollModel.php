<?php

namespace MyWeb\model;

class EnrollModel
{
    private $db;

    function __construct() {

        $this->db = Database::getdb();

    }

    /**
     * 添加注册用户
     * @param $parms
     * @return mixed
     */
    public function enroll($parms){

        $result = $this->db->database_excute("INSERT INTO `enroll` (`name`, `password`, `date`) VALUES (?, ?, ?)",$parms);

        return $result;

    }

    /**
     * 删除某注册用户
     * @param $parms
     * @return mixed
     */
    public function delEnroll($parms){

        $result = $this->db->database_excute("DELETE FROM `enroll` WHERE `enroll`.`id` = ? ",$parms);

        return $result;

    }

    /**
     * 分页查询
     * @param $parms
     * @return mixed
     */
    public function searchEnroll($parms = null){

        $result = $this->db->database_query("SELECT * FROM `enroll` ".$parms,[]);

        return $result;

    }

    /**
     * 根据name查询单个注册用户信息
     * @param $parms
     * @return mixed
     */
    public function searchEnrollByName($parms){

        $result = $this->db->database_query("SELECT * FROM `enroll` WHERE `enroll`.`name` = ? ",$parms);

        return $result;

    }

    /**
     * 根据name 和 password查询单个注册用户信息
     * @param $parms
     * @return mixed
     */
    public function find($parms){

        $result = $this->db->database_query("SELECT * FROM `enroll` WHERE `enroll`.`name` = ? AND `enroll`.`password` = ?",$parms);

        return $result;

    }

}