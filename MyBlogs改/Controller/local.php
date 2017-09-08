<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:23
 */

namespace MyBlogs\Controller;


class local extends Controller
{

    public function local() {
        $this->display('informationMy');
    }

    public function recheader() {
        $this->display('recheader');
    }
}