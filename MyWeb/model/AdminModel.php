<?php

namespace MyWeb\model;

include "Database.php";

class AdminModel{

    private $db;

    function __construct() {

       $this->db = Database::getdb();

    }

}