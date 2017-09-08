<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午3:29
 */

namespace MyBlogs\Controller;


class personal extends Controller
{

    public function proscenium() {
        $model = new \MyBlogs\Model\conModel;
        $row = $model->querymy("personal");
        $this->assgin('my',$row);
        $this->display('proscenium');
    }
}