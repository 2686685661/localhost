<?php

//开启session
include "Vcode.php";
session_start();
//构造方法
$vcode = new Vcode(100, 30, 4);
//将验证码放到服务器自己的空间保存一份
$_SESSION['code'] = $vcode->getcode();
//echo $_SESSION['code'];
//echo print_r($_SESSION);
//将验证码图片输出
//echo "aaaaaaaa";
echo $vcode->outimg();


