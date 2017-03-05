{* pattern main pages *}


<div class="joomcat">
	 
	<div class="joomcat96_row">
		
		{foreach $rsProducts as $item name=products}
			
			<div style="width:216px !important;margin-right:10px;" class="joomcat96_imgct ">
		
				<div class="joomcat96_img cat_img">
					<a href="/product/{$item['id']}/"> 
					   <img src="/images/products/{$item['image']}" />  
					</a>
				</div>	{* div class="joomcat96_img cat_img" *}
				
				<div style="padding-bottom:10px;padding-top:0px;" class="joomcat96_txt">
					<ul>
					  <li><a href="/product/{$item['id']}">{$item['name']}</a></li>
					</ul>
		        </div>	{* div class="joomcat96_txt" *}
				
			</div>	{* div class="joomcat96_imgct" *} 

			{if $smarty.foreach.products.iteration mod 3 == 0}
				<div class="joomcat96_clr"></div>
				
	</div>	{* div class="joomcat96_row" *}
				
				<div class="joomcat96_row">
			{/if}
			
		{/foreach}
		
				</div>	{* div class="joomcat96_row" *}
		 	
</div>	{* div class="joomcat" *}

 



