<?php

session_start();
spl_autoload_register('autoLoad');
define('APP_PATH',__DIR__);
// 解析路由url
spl_autoload_register('autoLoad');
function autoLoad($className){
    $className = str_replace('\\','/',$className);
    $fileName = $_SERVER['DOCUMENT_ROOT'].'/'.$className.'.php';
    include $fileName;
}

$requestScript = $_SERVER['SCRIPT_NAME'];
if($requestScript != '/MyBlogs/index.php'){
    exit();
}

// 获取请求url
$requsetURL = $_SERVER['PATH_INFO'];
$requsetURL = trim($requsetURL,'/');
$requsetArr = explode('/',$requsetURL);
//
if(count($requsetArr) % 2 != 0){
    echo  '404 not found!';
    exit();
}

//获取控制器 和 方法
$class_ = $requsetArr[0];
$method = $requsetArr[1];

//路由解析
$params = [];
if(count($requsetArr) > 2){
    $index = 2;
    while(true){
        $key = $requsetArr[$index++];
        $value = $requsetArr[$index++];

        $params[$key] = $value;
        if($index >= count($requsetArr)){
            break;
        }
    }

}

$class_ =  'MyBlogs\\Controller\\'.$class_;
$obj = new $class_;
if (!empty($_REQUEST)){
    $params = array_merge($_REQUEST,$params);
}
$obj->$method($params);













