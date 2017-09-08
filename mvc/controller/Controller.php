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
    public $data = [];

    /**
     * @param $key 变量名字
     * @param $data 值
     * @return  $this 返回自身
     */
    public function assign($key,$data)
    {

        $this->data[$key] = $data;

        return $this;
    }

    /**
     * @param $viewName 视图名字
     */
    public function display($viewName)
    {
        if (!empty($viewName)){
            $filePath = APP_PATH.'/view/'.$viewName.'.html';
            if (file_exists($filePath)){

                var_dump(extract(array(
                    'id'=>89,
                    'name'=>'zhangliu'
                )));

                extract($this->data);


                ob_start();
                //output buffer
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