<?php
/* Smarty version 3.1.30, created on 2016-10-15 22:59:07
  from "C:\xampp\htdocs\myshop.local\views\default\header.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5802989bf0bd14_77317943',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a10b9a43657bd32053c552373343ec0a4244e099' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\header.tpl',
      1 => 1476565139,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
    'file:leftcolumn.tpl' => 1,
  ),
),false)) {
function content_5802989bf0bd14_77317943 (Smarty_Internal_Template $_smarty_tpl) {
?>
<html>
	<head>
		<title><?php echo $_smarty_tpl->tpl_vars['pageTitle']->value;?>
</title>
		<link rel="stylesheet" href="<?php echo $_smarty_tpl->tpl_vars['templateWebPath']->value;?>
css/main.css" type="text/css" />
		<?php echo '<script'; ?>
 type="text/javascript" src="/js/jquery-1.7.1.min.js"><?php echo '</script'; ?>
>
		<?php echo '<script'; ?>
 type="text/javascript" src="/js/main.js"><?php echo '</script'; ?>
>
	</head>
	<body>
	<div id="header">
		<h1>my shop - интернет магазин</h1>
	</div>
	
	<?php $_smarty_tpl->_subTemplateRender("file:leftcolumn.tpl", $_smarty_tpl->cache_id, $_smarty_tpl->compile_id, 0, $_smarty_tpl->cache_lifetime, array(), 0, false);
?>


	
	
	<div id="centerColumn">
		<?php }
}
