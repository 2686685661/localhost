<?php
/**
 * Created by PhpStorm.
 * User: lishanlei
 * Date: 17-5-19
 * Time: 下午10:20
 */

namespace MyExample\Controller;


class controller
{

    public $data = [];
    public function assage($key,$value) {
        $this->data[$key] = $value;

        return $this;
    }

    public function display($viewname) {
        $viewPath = $_SERVER['DOCUMENT_ROOT'].'/MyExample/View/'.$viewname.'.html';

        if (file_exists($viewPath) && is_file($viewPath)) {

            extract($this->data);

//            ob_start();
            include $viewPath;
//            $content = ob_get_contents();
//            ob_end_clean();
//            $replaceArr =  include '../replace/replace.php';
//            $replaceArr = include $_SERVER['DOCUMENT_ROOT'].'/MyExample/replace/replace.php';
//            foreach ($replaceArr as $key => $value) {
//                $content = str_replace($key,$value,$content);
//            }
//            return $content;
        }else {
            echo '该视图不存在';
        }
    }


}