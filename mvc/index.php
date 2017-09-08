<?php

spl_autoload_register('autoLoad');
define('APP_PATH',__DIR__);

function autoLoad($className){
    $classToPath = str_replace('\\','/',$className);
    $filePath = APP_PATH.'/'.$classToPath.'.php';

    if (is_file($filePath) && file_exists($filePath)){
        include  $filePath;
    }else{
        exit('类'.$className.'不存在！');
    }



}
//判断是否有动作
if (!array_key_exists('PATH_INFO',$_SERVER)){
    exit('input path is error!');
}

$requestUrl  = $_SERVER['PATH_INFO'];
$requestUrl  = trim($requestUrl,'/');
$requestArr  = explode('/',$requestUrl);
//过滤路由是否合法
if (count($requestArr) % 2 == 1 || count($requestArr) == 0){
    exit('404 Not Found!');
}

//提取控制器和方法
$class_ = $requestArr[0];
$method = $requestArr[1];
$prams = [];
//提取参数
$index = 2;
while ($index < count($requestArr)){
    $key = $requestArr[$index++];
    $value = $requestArr[$index++];

    $prams[$key] = $value;
}

//实例化一个控制器对象

$class_ = '\\controller\\'.$class_;
$obj = new  $class_;
$obj->$method($prams);


