<?php
ini_set('display_errors','on');            //错误信息

defined('CACHE_PATH') or define('CACHE_PATH',__DIR__.'/cache');

session_start();
spl_autoload_register('autoLoad');

//自动加载
function autoLoad($className){
    $className = str_replace('\\','/',$className);
    $fileName = $_SERVER['DOCUMENT_ROOT'].'/'.$className.'.php';
    include $fileName;
}

$requestScript = $_SERVER['SCRIPT_NAME'];
if($requestScript != '/MyWeb/index.php'){
    exit();
}

/*$obj = null;
$method = null;
$class_ = null;
$out_put_content = null;

$requset_url = $_SERVER['REQUEST_URI'];
$out_put_content = \MyWeb\common\Cache::get($requset_url);

if (empty($out_put_content)){*/
    // 获取请求url
    $requsetURL = $_SERVER['PATH_INFO'];
    $requsetURL = trim($requsetURL,'/');
    $requsetArr = explode('/',$requsetURL);

    if(  count($requsetArr) % 2 != 0){
        echo  '404 not found';
        exit();
    }
//获取控制器 和 方法
    $class_ = $requsetArr[0];
    $method = $requsetArr[1];
//默认
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
    $class_ =  'MyWeb\\controller\\'.$class_;
    $obj = new $class_;


    if(!empty($_REQUEST)) {
        $params = array_merge($params,$_REQUEST);
    }
//    $out_put_content = $obj->$method($params);
//    \MyWeb\common\Cache::set($requset_url,$out_put_content);
/*}
echo  $out_put_content;*/
echo $obj->$method($params);
