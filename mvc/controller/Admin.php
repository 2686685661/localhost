<?php
/**
 * Created by PhpStorm.
 * User: feifei
 * Date: 2017/4/21
 * Time: 下午7:40
 */

namespace controller;


class Admin extends Controller
{
    public function save($pram = null)
    {
        $adminModel = new \model\AdminModel();
        $arr = $adminModel->getData();

        $this->assign('data',$arr)->assign('id','fugesha');
        $this->display('admin');

    }
    public function delete($p = null){
        $id = $p['id'];
        $adminModel = new  \model\AdminModel();
        $adminModel->delete($id);
        echo __FUNCTION__;

    }
}