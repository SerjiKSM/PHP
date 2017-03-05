<?php
/* Smarty version 3.1.30, created on 2016-11-07 20:14:42
  from "C:\xampp\htdocs\myshop.local\views\default\rightcolumn.tpl" */

/* @var Smarty_Internal_Template $_smarty_tpl */
if ($_smarty_tpl->_decodeProperties($_smarty_tpl, array (
  'version' => '3.1.30',
  'unifunc' => 'content_5820d2a2ce2c47_49016106',
  'has_nocache_code' => false,
  'file_dependency' => 
  array (
    'a1618fb7a8baab10025f3e6f21f264f1df3729dd' => 
    array (
      0 => 'C:\\xampp\\htdocs\\myshop.local\\views\\default\\rightcolumn.tpl',
      1 => 1478546077,
      2 => 'file',
    ),
  ),
  'includes' => 
  array (
  ),
),false)) {
function content_5820d2a2ce2c47_49016106 (Smarty_Internal_Template $_smarty_tpl) {
?>

<div id="rightColumn">

	<?php if (isset($_smarty_tpl->tpl_vars['arUser']->value)) {?>
		
		<div id="userBox">
			<a href="/user/" id="userLink"><?php echo $_smarty_tpl->tpl_vars['arUser']->value['displayName'];?>
</a><br />
			<a href="/user/logout/"onclick="logout();">Выход</a>
		</div>
	<?php } else { ?>
			
		<div id="userBox" class="hideme">
			<a href="#" id="userLink"></a><br />
			
			<a href="/user/logout/"onclick="logout();">Выход</a>	
			
			<!--<a href="#" onclick="logout();">Выход</a>-->	
			
		</div>
	
		<?php if (!isset($_smarty_tpl->tpl_vars['hideLoginBox']->value)) {?>	
	
			<div id="loginBox">
				<div class="menuCaption ">
					Авторизация:
				</div>
				<input type="text" id="loginEmail" name="loginEmail" value="" /><br />
				<input type="password" id="loginPwd" name="loginPwd" value="" /><br />
				<input type="button" onclick="login();" value="Войти" />
			</div>
		
			<div id="registerBox">
				<div class="menuCaption showHidden" onclick="showRegisterBox();">
					Регистрация:
					<!--<a href="#" id="registration" >Регистрация:</a>-->
				</div>
				<div id="registerBoxHidden">
					email:<br />
					<input type="text" id="email" name="email" value="" /><br />
					пароль:<br />
					<input type="password" id="pwd1" name="pwd1" value="" /><br />
					повтрить пароль:<br />
					<input type="password" id="pwd2" name="pwd2" value="" /><br />
					<input type="button" onclick="registerNewUser();" value="Зарегистрироваться" />	
				</div>
			</div>
		
		<?php }?>
		
	<?php }?>
	
</div>
<?php }
}
