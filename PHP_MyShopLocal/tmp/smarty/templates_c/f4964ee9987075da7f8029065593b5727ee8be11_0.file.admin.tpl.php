<?php
/* Smarty version 3.1.30, created on 2016-10-28 08:33:30
  from "C:\xampp\htdocs\myshop.local\views\admin\admin.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5812f13a242069_71656331',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'f4964ee9987075da7f8029065593b5727ee8be11' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\admin\\admin.tpl',
      1 => 1477636401,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5812f13a242069_71656331 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="blockNewCategory">
	Новая категория:
	<input name="newCategoryName" id="newCategoryName" type="text" value="" />
	<br />
	
	является подкатегорией для 
	<select name="generalCatId">
		<option value="0">Главная категория
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsCategories']->value, 'item');
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
			<option value="<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>

		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

	</select>
	<br />
	<input type="button" onclick="newCategory();" value="Добавить категорию"/>		
	
	
</div>

<?php }
}
