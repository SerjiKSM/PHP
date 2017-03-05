{* Page product *}

<div id="jf-content">

	<div class="gallery" id="image_detail">
	
		<div>
			<!--<h3 id="jg_photo_title" class="jg_imgtitle"> {$rsProduct['name']} </h3>-->
			<h1 id="jg_photo_title" class="jg_imgtitle"> {$rsProduct['name']} </h1>
		</div>
				
		<div id="jg_dtl_photo" class="jg_dtl_photo" style="text-align:center;">
			<img id="jg_photo_big" class="jg_photo" width="675" src="/images/products/{$rsProduct['image']}">
		</div>
		
		<div class="jg_photo_details" style="font-size: 14px; padding-top: 20px;">
			<div class="jg_details">
				<div class="sectiontableentry2">
					<div class="jg_photo_left"> Стоимость: </div>
					<div id="jg_photo_date" class="jg_photo_right"> {$rsProduct['price']} </div>
				</div>
			</div>	
			
			<!--<div class="jg_detailnavi" style="padding-top: 8px;">-->
				<!--<div class="jg_iconbar">-->
					<a id="addCart_{$rsProduct['id']}" {if $itemInCart} class="hideme" {/if} href="#" onClick="addToCart({$rsProduct['id']}); return false;" alt="Добавить в корзину">
						Добавить в корзину
					</a>					
					<a id="removeCart_{$rsProduct['id']}" {if ! $itemInCart} class="hideme" {/if} href="#" onClick="removeFromCart({$rsProduct['id']}); return false;" alt="Удалить из корзины">
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
				<p>{$rsProduct['description']}</p>
			</div>	
		</div>
		
		<div class="sectiontableheader"> &nbsp </div>
		
	</div> <!--<div class="gallery">-->

</div> <!--<div id="jf-content">-->

