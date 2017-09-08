<?php
/* Smarty version 3.1.30, created on 2017-08-11 21:48:57
  from "/var/www/html/mySmartyTest/templates/test.html" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_598db5c9b2bf75_18324140',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '94f9d5f6f614e206cf93217229b42ae0407963da' => 
    array (
      0 => '/var/www/html/mySmartyTest/templates/test.html',
      1 => 1502459335,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_598db5c9b2bf75_18324140 (Smarty_Internal_Template $_smarty_tpl) {
if (!is_callable('smarty_modifier_index')) require_once '/var/www/html/mySmartyTest/plugines/modifier.index.php';
if (!is_callable('smarty_function_date')) require_once '/var/www/html/mySmartyTest/plugines/function.date.php';
$_smarty_tpl->compiled->nocache_hash = '798222602598db5c9b00c56_69413083';
?>
<!DOCTYPE html>
<?php
$_smarty_tpl->smarty->ext->configLoad->_loadConfigFile($_smarty_tpl, "../configs/foo.conf", "Customer", 0);
?>

<html lang="en">
<head>
    <meta charset="UTF-8" http-equiv="Content-Type" content="text/html">
    <title><?php echo $_smarty_tpl->tpl_vars['title']->value;?>
</title>
</head>
<body bgcolor="<?php echo $_smarty_tpl->smarty->ext->configload->_getConfigVariable($_smarty_tpl, 'bodyBgColor');?>
">

<?php echo smarty_modifier_index($_smarty_tpl->tpl_vars['content']->value,"red",50);?>


<p><?php echo $_SESSION['username'];?>
</p>
<p><?php echo @constant('ROOT');?>
</p>
<p><?php echo Smarty::SMARTY_VERSION;?>
</p>

<p><?php echo smarty_function_date(array(),$_smarty_tpl);?>
</p>
</body>
</html><?php }
}
