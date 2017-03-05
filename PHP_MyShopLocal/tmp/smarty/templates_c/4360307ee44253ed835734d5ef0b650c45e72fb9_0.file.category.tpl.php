<?php
/* Smarty version 3.1.30, created on 2016-11-07 10:44:38
  from "C:\xampp\htdocs\myshop.local\views\texturia\category.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_58204d0620fb58_15694139',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '4360307ee44253ed835734d5ef0b650c45e72fb9' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\texturia\\category.tpl',
      1 => 1478511746,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_58204d0620fb58_15694139 (Smarty_Internal_Template $_smarty_tpl) {
?>


<h1>Товары категории <?php echo $_smarty_tpl->tpl_vars['rsCategory']->value['name'];?>
</h1>

<div class="joomcat">
	 
	<div class="joomcat96_row">
		
		<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsProducts']->value, 'item', false, NULL, 'products', array (
  'iteration' => true,
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
$_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']++;
?>
			
			<div style="width:216px !important;margin-right:10px;" class="joomcat96_imgct ">
		
				<div class="joomcat96_img cat_img">
					<a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"> 
					   <img src="/images/products/<?php echo $_smarty_tpl->tpl_vars['item']->value['image'];?>
" />  
					</a>
				</div>	
				
				<div style="padding-bottom:10px;padding-top:0px;" class="joomcat96_txt">
					<ul>
					  <li><a href="/product/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
</a></li>
					</ul>
		        </div>	
				
			</div>	 

			<?php if ((isset($_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration']) ? $_smarty_tpl->tpl_vars['__smarty_foreach_products']->value['iteration'] : null) % 3 == 0) {?>
				<div class="joomcat96_clr"></div>
				
	</div>	
				
				<div class="joomcat96_row">
			<?php }?>
			
		<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>

		
				</div>	
		 	
</div>	

<?php
$_from = $_smarty_tpl->smarty->ext->_foreach->init($_smarty_tpl, $_smarty_tpl->tpl_vars['rsChildCats']->value, 'item', false, NULL, 'childCats', array (
));
if ($_from !== null) {
foreach ($_from as $_smarty_tpl->tpl_vars['item']->value) {
?>
	
	<h2><a href="/category/<?php echo $_smarty_tpl->tpl_vars['item']->value['id'];?>
/"><?php echo $_smarty_tpl->tpl_vars['item']->value['name'];?>
 </a></h2>
	
<?php
}
}
$_smarty_tpl->smarty->ext->_foreach->restore($_smarty_tpl);
?>



<?php }
}
