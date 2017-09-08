<?php
/**
 * Created by PhpStorm.
 * User: feifei
 * Date: 2017/4/21
 * Time: 下午8:25
 */

namespace model;


class UserModel
{
    function select($usrname = null){
        include "link.php";
        $query="SELECT password FROM administrator where accountnumber = ?";
        $stmt=$dbh->prepare($query);
        $stmt->bindParam(1,$usrname);
        $stmt->execute();
        while(list($password)=$stmt->fetch($dbh::FETCH_NUM)){
            return $password;
        }
        
    }
}