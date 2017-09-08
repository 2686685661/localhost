<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午9:47
 */

namespace MyExample\Model;


class personal
{

    private $db;

    public function __construct() {
        $this->db = db::getdb();
    }


    public function personal_query($get) {

        $row = $this->db->database_query("select * from mypersonal",$get);

        return $row;
    }


    public function personal_modify($get) {

        $row = $this->db->database_excute("update personal set name=?,hobby=?,qq=?",$get);

        return $row;
    }

}