<?php

namespace MyWeb\model;


class EssayModel
{
    private $db;

    function __construct() {

        $this->db = Database::getdb();

    }

    /**
     * 添加文章
     * @param $parms
     * @return mixed
     */
    public function addEssay($parms){

        $result = $this->db->database_excute("INSERT INTO `essay` (`title`, `type`, `author`, `cover`,
        `summary` , `content`,  `time`) VALUES (?, ?, ?, ?, ?, ?, ?)",$parms);

        return $result;

    }

    /**
     * 查询文章
     * @return mixed
     */
    public function allEssay(){

        $result = $this->db->database_query("SELECT * FROM `essay`",[]);

        return $result;

    }

    /**
     * 模糊查询
     * @return mixed
     */
//    模糊查询的优化
    public function vagueSearchEssay($parms,$limit = null){
        $result = $this->db->database_query('SELECT * FROM `essay` WHERE `essay`.`title` 
                                              LIKE "%"?"%" OR `essay`.`type` LIKE "%"?"%" '.$limit,$parms);

        return $result;

    }

    /**
     * 分页查询
     * @param $parms
     * @return mixed
     */
    public function searchEssay($parms){

        $result = $this->db->database_query("SELECT * FROM `essay` ".$parms,[]);

        return $result;
    }


    /**
     * 根据ID查询单个文章信息
     * @param $parms
     * @return mixed
     */
    public function searchEssayById($parms){

        $result = $this->db->database_query("SELECT * FROM `essay` WHERE `essay`.`id` = ? ",$parms);

        return $result;
    }


    /**
     * 更新（有封面）
     * @param $parms
     * @return mixed
     */
    public function editEssay1($parms){

        $result = $this->db->database_excute("UPDATE `essay` SET `title` = ?, `type` = ?,
        `author` = ?, `cover` = ?, `summary` = ?,`content` = ?,`time` = ? WHERE `essay`.`id` = ?",$parms);

        return $result;

    }

    /**
     * 更新（无封面）
     * @param $parms
     * @return mixed
     */
    public function editEssay2($parms){

        $result = $this->db->database_excute("UPDATE `essay` SET `title` = ?, `type` = ?,
        `author` = ?, `summary` = ?,`content` = ?,`time` = ? WHERE `essay`.`id` = ?",$parms);

        return $result;

    }


    /**
     * 删除文章
     * @param $parms
     * @return mixed
     */
    public function deleteEssay($parms){

        $result = $this->db->database_excute("DELETE FROM `essay` WHERE `essay`.`id` = ? ",$parms);

        return $result;

    }


    /**
     * 按浏览量降序排序查询文章
     * @param $parms
     * @return mixed
     */
    public function searchEssayOrderByBrowse($parms){

        $result = $this->db->database_query("SELECT * FROM `essay` ORDER BY `essay`.`browse` DESC limit ".$parms,[]);

        return $result;

    }

    /**
     * 按id由大到小排序
     * @param $parms
     * @return mixed
     */
    public function searchEssayOrderById($parms){

        $result = $this->db->database_query("SELECT * FROM `essay` ORDER BY `essay`.`id` DESC limit ".$parms,[]);

        return $result;

    }


    /**
     * 查看并更新浏览量
     * @param $parms
     * @return string
     */
    public function searchEssayByIdAndUpdateBrowse($parms){

        try{
            $this->db->getPdo()->beginTransaction();

            $result = $this->db->database_query("SELECT * FROM `essay` WHERE `essay`.`id` = ? ",$parms);

            if($result == 0)
                throw new \PDOException('select error');

            $result2 = $this->db->database_excute("UPDATE `essay` SET `browse` = `browse`+1 WHERE `essay`.`id` = ?",$parms);

            if($result2 == 0)
                throw new \PDOException('updateBrowse error');

            $this->db->getPdo()->commit();

            return $result;

        }catch (\PDOException $e){

            $this->db->getPdo()->rollBack();
            return null;

        }

    }
    /**
     * 更新浏览量
     * @param $parms
     * @return mixed
     */
    public function updateBrowse($parms){

        $result = $this->db->database_excute("UPDATE `essay` SET `browse` = ? WHERE `essay`.`id` = ?",$parms);

        return $result;

    }

    /**
     * 更新评论量
     * @param $parms
     * @return mixed
     */
    public function updateComment($parms){

        $result = $this->db->database_excute("UPDATE `essay` SET `comment` = ? WHERE `essay`.`id` = ?",$parms);

        return $result;

    }

}