<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:30
 */

namespace MyBlogs\Controller;


class homepage extends Controller
{

    public function rechomepage() {
        $this->display('recHomepage');
    }
}