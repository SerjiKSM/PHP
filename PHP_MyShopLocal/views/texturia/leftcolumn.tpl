
<div id="jf-right">
	
	<div id="Mod88" class="jfmod module">
		<div class="jfmod-top"></div>
		<div class="jfmod-mid">
			<h3>Меню:</h3>
			<div class="jfmod-content">
				<ul class="menu">
					{foreach $rsCategories as $item}	
						<li class="item44">
							<a href="/category/{$item['id']}/"><span>{$item['name']}</span></a>
						</li>
						{if isset($item['children'])}
							<ul class="menu" style="padding:0px 0px 10px 20px;">
								{foreach $item['children'] as $itemChild}
									<li class="item44">
										<a href="/category/{$itemChild['id']}/"><span>{$itemChild['name']}</span></a>
									</li>		
								{/foreach}
							</ul>	
						{/if}	
					{/foreach}	
				</ul>
			</div>
		</div>
		<div class="jfmod-bot"></div>
	</div>

	<div id="Mod97" class="jfmod module_blue">
		<div class="jfmod-top"></div>
			<div class="jfmod-mid">
				<h3>Корзина</h3>
				<div class="jfmod-content">
					<div class="joomimg97_main">
  						<div class="joomimg_row" style="font-size: 16px;">
    						<a href="/cart/" title="Перейти в корзину">В корзине</a>
    						<span id="cartCntItems">
    							{if $cartCntItems > 0} {$cartCntItems} {else}Пусто{/if}
    						</span>
  						</div>
  						<div class="joomimg_clr"></div>
					</div>
				</div>
			</div>
	
			<div class="jfmod-bot"></div>
	</div>
	
	
	<div id="Mod89" class="jfmod module_orangebold">
		<div class="jfmod-top"></div>
		<div class="jfmod-mid">
		
			<div class="jfmod-content">
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
							<div id="form-login">
								Введите логин и пароль
								<!--  <fieldset class="input"> -->
									<p id="form-login-username">
										<input id="loginEmail" class="inputbox" type="text" onfocus="if(this.value=='Username') this.value='';" onblur="if(this.value=='') this.value='Username';" value="Username" size="18" name="username">
									</p>
									<p id="form-login-password">
										<input type="password" alt="password" onfocus="if(this.value=='Password') this.value='';" onblur="if(this.value=='') this.value='Password';" value="Password" size="18" class="inputbox" name="passwd" id="loginPwd">
									</p>
									<p style="text-align:right">
										<input type="button" value="Войти" class="buttonLogin" onclick="login();">
									</p>							
								<!-- </fieldset> -->
							</div>	
						</div>
					
						<div id="registerBox">
							
							<div class="re-link menuCaption showHidden" onclick="showRegisterBox();">
								Регистрация:
								<!--<a href="#" id="registration" >Регистрация:</a>-->
							</div>
							<div id="form-login">
								<!-- <fieldset class="input"> -->
									<div id="registerBoxHidden" class="hideme">
										<p>									
											email:<br />
											<input type="text" id="email" name="email" value="" /><br />
											пароль:<br />
											<input type="password" id="pwd1" name="pwd1" value="" /><br />
											повтрить пароль:<br />
											<input type="password" id="pwd2" name="pwd2" value="" /><br />									
										</p>
										<input type="button" class="buttonLogin" onclick="registerNewUser();" value="Зарегистрироваться" />	
									</div>
								<!-- </fieldset> -->
							</div>
							
							<p></p>
							
						</div>
				
					{/if}
		
				{/if}
			</div>	
		
		</div>
		<div class="jfmod-bot"></div>
	</div>	

</div>

















