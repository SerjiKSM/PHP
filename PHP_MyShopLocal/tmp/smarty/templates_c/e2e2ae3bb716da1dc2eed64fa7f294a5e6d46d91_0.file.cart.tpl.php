<?php
/* Smarty version 3.1.30, created on 2016-10-20 09:10:26
  from "C:\xampp\htdocs\myshop.local\views\default\cart.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58086de29411d4_95092804',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'e2e2ae3bb716da1dc2eed64fa7f294a5e6d46d91' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\cart.tpl',
      1 => 1476946326,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58086de29411d4_95092804 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h1>Корзина</h1>

<?php if (!$_smarty_tpl->tpl_vars['rsProducts']->value) {?>
	В корзине пусто.
<?php } else { ?>

	<form action="/cart/order/" method="POST">
	
		<h2>Данные заказа</h2>
		<table>
			<tr>
				<td>№</td>
				<td>Наименование</td>
				<td>Количество</td>
				<td>Цена за еденицу</td>
				<td>Цена</td>
				<td>Действие</td>
			</tr>
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
				<tr>
				<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
				<td>
					<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
<a> <br / 	>
				</td>
				<td>
					<input name="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" id="itemCnt_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" type="text" value="1" onchange="conversionPrice(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
);" />
				</td>
				<td>
					<span id="itemPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" value="<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

					</span>
				</td>
				<td>
					<span id="itemRealPrice_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
						<?php echo $_smarty_tpl->tpl_vars['item']->value['price'];?>

					</span>
				</td>
				<td>
					<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" title="Удалить из корзины">
						Удалить
					</a>
					<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
" class="hideme" href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
); return false;" alt="Восстановить елемент">
						Восстановить
					</a>
				</td>
			</tr>
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		</table>
		
		<input type="submit" value="Оформить заказ" />
	</form>	
			
<?php }
}
}
