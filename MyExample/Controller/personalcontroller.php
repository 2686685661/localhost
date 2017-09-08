<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午10:32
 */

namespace MyExample\Controller;


class personalcontroller extends controller
{

    private $articalmodel = null;
    public function __construct() {
        $this->articalmodel = new \MyExample\Model\personal();
    }



    public function personal() {
        $row = [];
        $get = $this->articalmodel->personal_query($row);
        $this->assage('my',$get);
        $this->display('personal');
    }


    public function modifypersonal() {

    }





}