<?php
/* Smarty version 3.1.30, created on 2016-11-07 22:55:51
  from "C:\xampp\htdocs\myshop.local\views\texturia\user.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5820f867082c17_80908466',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '3280aa63466c43b02bd7425b27872397c153e002' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\texturia\\user.tpl',
      1 => 1478554737,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5820f867082c17_80908466 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h1>Ваши регистрационные даные:</h1>

<table border="3">
	<tr>
		<td>Логин (email)</td>
		<td><?php echo $_smarty_tpl->tpl_vars['arUser']->value['email'];?>
</td>
	</tr>
	<tr>
		<td>Имя</td>
		<td>
			<input type="text" id="newName" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['name'];?>
" />
		</td>
	</tr>
	<tr>
		<td>Телефон</td>
		<td>
			<input type="text" id="newPhone" value="<?php echo $_smarty_tpl->tpl_vars['arUser']->value['phone'];?>
" />
		</td>
	</tr>
	<tr>
		<td>Адрес</td>
		<td>
			<textarea id="newAddress"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['address'];?>
</textarea>
		</td>
	</tr>
	<tr>
		<td>Новый пароль</td>
		<td>
			<input type="password" id="newPwd1" value="" />
		</td>
	</tr>
	<tr>
		<td>Повтор пароля</td>
		<td>
			<input type="password" id="newPwd2" value="" />
		</td>
	</tr>
	<tr>
		<td>Для того чтобы сохранить данные введите текущий пароль</td>
		<td>
			<input type="password" id="curPwd" value="" />
		</td>
	</tr>
	<tr>
		<td>&nbsp;</td>
		<td>
			<input type="button" value="Сохранить изменения" onclick="updateUserData();" />
		</td>
	</tr>
</table>

<hr>

<h2>Заказы:</h2>

<?php if (!$_smarty_tpl->tpl_vars['rsUserOrders']->value) {?>
	Нет заказов!
<?php } else { ?>	
	<table border="1" cellpadding="4" cellspacing="3">
			<tr>
				<th>№</th>
				<th>Действие</th>
				<th>ID заказа</th>
				<th>Статус</th>
				<th>Дата создания</th>
				<th>Дата оплаты</th>
				<th>Дополнительная информация</th>
			</tr>
			
			<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsUserOrders']->value, 'item', false, NULL, 'userOrders', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_userOrders']->value['iteration']++;
?>
				<tr>
					<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_userOrders']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_userOrders']->value['iteration'] : null);?>
</td>
				
					<td>
						<a href="#" onclick="showProducts('<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
'); return false;">Показать товар заказа</a>
					</td>
					
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
</td>
					<!--<td><?php echo $_smarty_tpl->tpl_vars['item']->value['status'];?>
</td>-->
					<?php ob_start();
echo $_smarty_tpl->tpl_vars['item']->value['status'];
$_prefixVariable1=ob_get_clean();
if ($_prefixVariable1 == 0) {?>
						<td>Заказ не оплачен!</td>
					<?php } else { ?>
						<td>Заказ оплачен!</td>
					<?php }?>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_created'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['date_payment'];?>
</td>
					<td><?php echo $_smarty_tpl->tpl_vars['item']->value['comment'];?>
</td>
				</tr>	
				
				<tr class="hideme" id="purchasesForOrderId_<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
">
					<td colspan="7">
						<?php if ($_smarty_tpl->tpl_vars['item']->value['children']) {?>
							<table border="1" cellpadding="1" cellspacing="1" width="100%">
								<tr>	
									<th>№</th>
									<th>ID</th>
									<th>Название</th>
									<th>Цена</th>
									<th>Количество</th>
								</tr>
								
								<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['item']->value['children'], 'itemChild', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['itemChild']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
									<tr>
										<td><?php echo (isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null);?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
</td>
										<td>
											<a href="/product/<?php echo $_smarty_tpl->tpl_vars['itemChild']->value['product_id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['name'];?>
</a>
										</td>																				
										<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['price'];?>
</td>
										<td><?php echo $_smarty_tpl->tpl_vars['itemChild']->value['amount'];?>
</td>											
									</tr>
								<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

							</table>
						<?php }?>
					</td>
				</tr>
										
			<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>
		
	</table>	
<?php }?>	



<?php }
}
