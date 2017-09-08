<?php

define("ROOT",str_replace("\\","/",dirname(__FILE__)).'/');



require ROOT.'libs/Smarty.class.php';

$smarty = new Smarty();


$smarty->setTemplateDir(ROOT.'templates/')
    ->setCompileDir(ROOT.'templates_c/')
    ->setCacheDir(ROOT.'cdche/')
    ->setConfigDir(ROOT.'configs')
    ->addPluginsDir(ROOT."plugines");


$smarty->caching = true;


$smarty->cache_lifetime = 60;

$smarty->left_delimiter = '{{';

$smarty->right_delimiter = '}}';





