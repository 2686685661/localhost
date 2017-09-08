<?php

namespace MyWeb\model;


class PhotoModel
{
    private $db;

    function __construct() {

        $this->db = Database::getdb();

    }

    /**
     * 存入图片
     * @param $parms
     * @return bool
     */
    public function savePhoto($parms){

        $result = $this->db->database_excute("INSERT INTO `photo` (`name`) VALUES (?)",$parms);
        if (count($result) == 0)
            return false;
        return true;

    }

    /**
     * 查询图片
     * @return mixed
     */
    public function selectallPhotos(){

        $result = $this->db->database_query("SELECT * FROM `photo` ",[]);

        return $result;

    }

    /**
     * 分页查询图片
     * @param $parms
     * @return mixed
     */
    public function selectPhotos($parms){

        $result = $this->db->database_query("SELECT * FROM `photo`  ".$parms,[]);

        return $result;

    }

    /**
     * 删除图片
     * @param $parms
     * @return mixed
     */
    public function deimg($parms){

        $result = $this->db->database_excute("DELETE FROM `photo` WHERE `photo`.`id` = ? ",$parms);

        return $result;

    }

    /**
     * 根据id查询图片
     * @param $parms
     * @return mixed
     */
    public function selectPhotoById($parms){

        $result = $this->db->database_query("SELECT * FROM `photo` WHERE `photo`.`id` = ? ",$parms);

        return $result;

    }

}