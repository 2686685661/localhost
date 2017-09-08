<?php
/**
 * Created by PhpStorm.
 * User: feifei
 * Date: 2017/4/21
 * Time: 下午8:29
 */

namespace controller;

class Controller
{

    /**
     * @param $viewName 视图名字
     */



    public function display($viewName)
    {
        if (!empty($viewName)){
            $filePath = APP_PATH.'/view/html/'.$viewName.'.html';
            if (file_exists($filePath)){
                
                include  $filePath;
                $content = ob_get_contents();
                ob_end_clean();
                $replaceArr =  include './replace/Replace.php';
                foreach ($replaceArr as $key => $value){
                    $content = str_replace($key,$value,$content);
                }
                echo  $content;
                               
            }else{
                exit('视图文件不存在');
            }

        }
    }
}