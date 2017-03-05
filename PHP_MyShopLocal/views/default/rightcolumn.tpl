
<div id="rightColumn">

	{if isset($arUser)}
		
		<div id="userBox">
			<a href="/user/" id="userLink">{$arUser['displayName']}</a><br />
			<a href="/user/logout/"onclick="logout();">Выход</a>
		</div>
	{else}
			
		<div id="userBox" class="hideme">
			<a href="#" id="userLink"></a><br />
			
			<a href="/user/logout/"onclick="logout();">Выход</a>	
			
			<!--<a href="#" onclick="logout();">Выход</a>-->	
			
		</div>
	
		{if ! isset($hideLoginBox)}	
	
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
		
		{/if}
		
	{/if}
	
</div>
