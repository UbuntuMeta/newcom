<?php /* Smarty version Smarty-3.1.14, created on 2016-01-14 17:18:29
         compiled from "D:\www\company\view\front\templates\02.html" */ ?>
<?php /*%%SmartyHeaderCode:10833569766183a7d29-08897673%%*/if(!defined('SMARTY_DIR')) exit('no direct access allowed');
$_valid = $_smarty_tpl->decodeProperties(array (
  'file_dependency' => 
  array (
    '3c277cc05ee64656b314f9afc9a76f9232b13b3c' => 
    array (
      0 => 'D:\\www\\company\\view\\front\\templates\\02.html',
      1 => 1452763103,
      2 => 'file',
    ),
  ),
  'nocache_hash' => '10833569766183a7d29-08897673',
  'function' => 
  array (
  ),
  'cache_lifetime' => 3600,
  'version' => 'Smarty-3.1.14',
  'unifunc' => 'content_5697661841aa17_28917633',
  'variables' => 
  array (
    'adlist' => 0,
    'ad' => 0,
  ),
  'has_nocache_code' => false,
),false); /*/%%SmartyHeaderCode%%*/?>
<?php if ($_valid && !is_callable('content_5697661841aa17_28917633')) {function content_5697661841aa17_28917633($_smarty_tpl) {?><?php  $_smarty_tpl->tpl_vars['ad'] = new Smarty_Variable; $_smarty_tpl->tpl_vars['ad']->_loop = false;
 $_from = $_smarty_tpl->tpl_vars['adlist']->value; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array');}
foreach ($_from as $_smarty_tpl->tpl_vars['ad']->key => $_smarty_tpl->tpl_vars['ad']->value){
$_smarty_tpl->tpl_vars['ad']->_loop = true;
?>
<?php echo $_smarty_tpl->tpl_vars['ad']->value['ori_img'];?>

<?php } ?><?php }} ?>