<?php

namespace MyWeb\model;


class CommentModel
{

    private $db;

    function __construct() {

        $this->db = Database::getdb();

    }

    /**
     * 根据文章的id查评论
     * @param $parms
     * @return mixed
     */
    public function selectCommentByEssayId($parms){

        $result = $this->db->database_query("SELECT * FROM `comment` WHERE `comment`.`essayid` = ? ",$parms);

        return $result;

    }

    /**
     * 添加评论
     * @param $parms
     * @return mixed
     */
    public function addComment($parms){

        $result = $this->db->database_excute("INSERT INTO `comment` (`essayid`, `visitorname`, 
                                            `content`, `date`) VALUES (?, ?, ?, ?)",$parms);

        return $result;

    }

    /**
     * 删除评论
     * @param $parms
     * @return mixed
     */
    public function delComment($parms){

        $result = $this->db->database_excute("DELETE FROM `comment` WHERE `comment`.`essayid` = ? ",$parms);

        return $result;

    }

}