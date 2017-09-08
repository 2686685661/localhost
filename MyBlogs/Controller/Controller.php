<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-4-24
 * Time: 下午8:53
 */

namespace MyBlogs\Controller;


class Controller
{
    public $data = [];

    public function  assgin($key,$value) {
        $this->data[$key] = $value;
        return $this;
    }

    public function display($viewName) {
        if (!empty($viewName)){
            $filePath = APP_PATH.'/View/html/'.$viewName.'.html';
            if (file_exists($filePath)){
                extract($this->data);
                include  $filePath;

            }else{
                exit('视图文件不存在');
            }
        }
    }
}