
<h2>Товар</h2>

<input type="button" value="Сохранить в XML" onclick="createXML();" />
<div id="xml-place"></div>

<!--<p id="headerTableAddProduct">Добавить продукт</p>-->
<table border="1" cellpadding="1" cellspacing="1">

	<caption>Добавить продукт</caption>
	<tr>
		<th>Название</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Сохранить</th>
	</tr>

	<tr>
		<td><input type="edit" id="newItemName" value="" /></td>
		<td><input type="edit" id="newItemPrice" value="" /></td>
		<td><select id="newItemCatId">
				<option value="0">Главная категория {foreach $rsCategories
					as $itemCat}
				<option value="{$itemCat['id']}">{$itemCat['name']}
					{/foreach}
		</select></td>
		<td><textarea id="newItemDesc"></textarea></td>
		<td><input type="button" value="Сохранить"
			onclick="addProduct();" /></td>

	</tr>

</table>

<br />
<!--<p id="headerTableEditProduct">Редактировать</p>-->
<table border="1" cellpadding="1" cellspacing="1">
	<caption>Редактировать</caption>
	<tr>
		<th>№</th>
		<th>ID</th>
		<th>Название</th>
		<th>Цена</th>
		<th>Категория</th>
		<th>Описание</th>
		<th>Удалить</th>
		<th>Изображение</th>
		<th>Сохранить</th>
	</tr>

	{foreach $rsProducts as $item name=products}
		<tr>
			<td>{$smarty.foreach.products.iteration}</td>
	
			<td>{$item['id']}</td>
			<td><input type="edit" id="itemName_{$item['id']}" value="{$item['name']}" /></td>
			<td>
				<input id="itemPrice_{$item['id']}" type="edit" value="{$item['price']}" />
			</td>
			<td>
				<!-- <select id="ItemCategory_{$item['id']}">
					<option value="">{$item['category_name']}
					{foreach $rsCategories as $itemCategory}
						<option value="{$itemCategory['id']}">{$itemCategory['name']} 
					{/foreach}
				</select> -->
				
				<select id="itemCategory_{$item['id']}">
					<option value="0">Главная категория
					{foreach $rsCategories as $itemCategory}
						<option value="{$itemCategory['id']}" {if $item['category_id'] == $itemCategory['id']}selected{/if}>{$itemCategory['name']} 
					{/foreach}
				</select>
			</td>
			<td><textarea id="itemDesc_{$item['id']}">{$item['description']}</textarea></td>
			<td>
				<input type="checkbox" id="itemStatus_{$item['id']}" {if $item['status'] == 0}checked="checked" {/if}>
			</td>
			<td>
				{if $item['image']}
					<img src="/images/products/{$item['image']}" width="100" />
				{/if}
				<form action="/admin/upload/" method="post" enctype="multipart/form-data">
					<input type="file" name="filename"><br>
					<input type="hidden" name="itemId" value="{$item['id']}">
					<input type="submit" value="Загрузить" ><br>	
				</form>
			</td>
			<td>
				<input type="button" value="Сохранить" onclick="updateProduct('{$item['id']}');" />
			</td>
		</tr>
	{/foreach}



</table>
