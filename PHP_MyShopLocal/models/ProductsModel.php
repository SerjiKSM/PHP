<?php

/**
 * Model for table products  
 */

function getLastProducts($limit = null){
	
	//$sql = "SELECT * FROM `products` ORDER BY `id` DESC";
	
	$sql = "SELECT * FROM `products` WHERE status > '0' ORDER BY `id` DESC";
	
	if($limit){
		$sql .= " LIMIT {$limit}";
	}
	
	$rs = mysql_query($sql);
	
	return createSmartyRsArray($rs);
	
}
 
/**
 * get products for categori $itemId
 */
function getProductsByCat($itemId){
	$itemId = intval($itemId);
	
	$sql = "SELECT * FROM `products` WHERE category_id = '{$itemId}'";
	
	$rs = mysql_query($sql);
	
	return createSmartyRsArray($rs);
}

function getProductById($itemId){
	$itemId = intval($itemId);

	$sql = "SELECT * FROM `products` WHERE id = '{$itemId}'";

	$rs = mysql_query($sql);

	return mysql_fetch_assoc($rs);
}

/**
 * Get list products from array 
 * @param array $itemsIds array products
 * @return array products
 */
function getProductsFromArray($itemsIds){
	
	$strIds = implode($itemsIds, ', ');
	
	$sql = "SELECT * FROM `products` WHERE id in ({$strIds})";
	
	$rs = mysql_query($sql);
	
	return createSmartyRsArray($rs);
	
}

/**
 * get products 
 */
function queryGetProducts(){
	
	return  "SELECT * FROM `products` ORDER BY category_id";

}

/**
 * get products with category
 */
function queryGetProductsWithCategory(){
	return  "SELECT `products`.*, `category`.`name` as category_name 
				FROM `products` as `products` 
				JOIN categories as `category` 
					ON `products`.`category_id` = `category`.`id` ";
}

/**
 * insert product
 */
function queryInsertProduct($itemName, $itemPrice, $itemDesc, $itemCat){
	return "INSERT INTO products
			SET
				`name` = '{$itemName}',
				`price` = '{$itemPrice}',
				`description` = '{$itemDesc}',
				`category_id` = '{$itemCat}' ";
}

/**
 * update product
 */
function queryUpdateProduct($setStr, $itemId){
	return "UPDATE products
			SET {$setStr}
			WHERE id = '{$itemId}'";
}







