<?php


require "init.inc.php";

//class Person
//{
//
//    public function say() {
//
//        echo 'my name is aaa';
//    }
//}
//$person  = new Person();

$_SESSION["username"] = "admin";



$smarty->assign("title",'我的碧欧克');

$smarty->assign("content","ni shuo shi wo men xiang jian hen wan");


$smarty->display("test.html");





