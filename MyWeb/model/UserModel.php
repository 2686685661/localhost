<?php
/**
 * Created by PhpStorm.
 * User: weiyalin
 * Date: 17-4-27
 * Time: 下午11:18
 */

namespace MyWeb\model;

include "Database.php";

class UserModel
{

    private $db;

    function __construct() {

        $this->db = Database::getdb();

    }

    /**
     * 根据name判断用户是否登录成功
     * @param $parms
     * @return bool
     */
    public function find($parms)
    {
        $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`name` = ? 
        and `user`.`password` = ?',$parms);
        if (count($towArrRes) == 0)
            return false;
        return true;
    }

    /**
     * 根据ID判断用户是否登录成功
     * @param $parms
     * @return bool
     */
    public function findById($parms)
    {
        $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`id` = ? 
        and `user`.`password` = ?',$parms);

        return $towArrRes;
    }

    /**
     * 根据名字查用户资料
     */
    public function searchUserDataByName($parms){

        $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`name` = ?',$parms);
        return $towArrRes;

    }

    /**
     * 根据id查用户资料
     */
    public function searchUserDataById($parms){

        $towArrRes = $this->db->database_query('SELECT * FROM `user` WHERE `user`.`id` = ?',$parms);
        return $towArrRes;

    }

    /**
     * 根据id设置用户资料
     */
    public function setUserData($parms){

        $result = $this->db->database_excute("UPDATE `user` SET `name` = ?, `sex` = ?, 
        `birthday` = ?, `occupation` = ?, `hometown` = ?, `location` = ?,
        `company` = ?, `phonenum` = ?, `postbox` = ?, `signature` = ?,
         `description` = ? WHERE `user`.`id` = ".$_SESSION['myid'],$parms);

        return $result;

    }

    /**
     * 根据id设置用户资料
     */
    public function setUserhead($parms){

        $result = $this->db->database_excute("UPDATE `user` SET `head` = ? WHERE `user`.`id` = ".$_SESSION['myid'],$parms);

        return $result;

    }

    /**
     * 更新用户密保等安全信息
     * @param $parms
     * @return mixed
     */
    public function replaceSecurityData($parms){

        $result = $this->db->database_excute("UPDATE `user` SET `question` = ?, `answer` = ?, 
        `password` = ? WHERE `user`.`id` = ".$_SESSION['myid'],$parms);

        return $result;

    }

}