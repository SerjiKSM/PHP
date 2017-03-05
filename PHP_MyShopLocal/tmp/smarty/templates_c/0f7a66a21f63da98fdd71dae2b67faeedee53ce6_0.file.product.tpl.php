<?php
/* Smarty version 3.1.30, created on 2016-11-07 22:01:57
  from "C:\xampp\htdocs\myshop.local\views\texturia\product.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5820ebc55748d7_78492757',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    '0f7a66a21f63da98fdd71dae2b67faeedee53ce6' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\texturia\\product.tpl',
      1 => 1478552513,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5820ebc55748d7_78492757 (Smarty_Internal_Template $_smarty_tpl) {
?>


<div id="jf-content">

	<div class="gallery" id="image_detail">
	
		<div>
			<!--<h3 id="jg_photo_title" class="jg_imgtitle"> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
 </h3>-->
			<h1 id="jg_photo_title" class="jg_imgtitle"> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['name'];?>
 </h1>
		</div>
				
		<div id="jg_dtl_photo" class="jg_dtl_photo" style="text-align:center;">
			<img id="jg_photo_big" class="jg_photo" width="675" src="/images/products/<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['image'];?>
">
		</div>
		
		<div class="jg_photo_details" style="font-size: 14px; padding-top: 20px;">
			<div class="jg_details">
				<div class="sectiontableentry2">
					<div class="jg_photo_left"> Стоимость: </div>
					<div id="jg_photo_date" class="jg_photo_right"> <?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['price'];?>
 </div>
				</div>
			</div>	
			
			<!--<div class="jg_detailnavi" style="padding-top: 8px;">-->
				<!--<div class="jg_iconbar">-->
					<a id="addCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if ($_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?> href="#" onClick="addToCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Добавить в корзину">
						Добавить в корзину
					</a>					
					<a id="removeCart_<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
" <?php if (!$_smarty_tpl->tpl_vars['itemInCart']->value) {?> class="hideme" <?php }?> href="#" onClick="removeFromCart(<?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['id'];?>
); return false;" alt="Удалить из корзины">
						Удалить из корзины
					</a>						
				<!--</div>-->
			<!--</div>-->
			
			<div style="clear: both;"></div>
				
		</div>
		
		<div id="jg_photo_description">
			<div id="jg_photo_description_label">
				Описание:
			</div>
			<div id="jg_photo_des">
				<p><?php echo $_smarty_tpl->tpl_vars['rsProduct']->value['description'];?>
</p>
			</div>	
		</div>
		
		<div class="sectiontableheader"> &nbsp </div>
		
	</div> <!--<div class="gallery">-->

</div> <!--<div id="jf-content">-->

<?php }
}
