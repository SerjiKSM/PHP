<?php

/**
 * get products
 */
function getProducts() {
	// $sql = queryGetProducts();
	$sql = queryGetProductsWithCategory ();
	
	$rs = mysql_query ( $sql );
	
	return createSmartyRsArray ( $rs );
}

/**
 * insert product
 */
function insertProduct($itemName, $itemPrice, $itemDesc, $itemCat) {
	$sql = queryInsertProduct ( $itemName, $itemPrice, $itemDesc, $itemCat );
	
	$rs = mysql_query ( $sql );
	
	return $rs;
}

/**
 * update product
 */
function updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat, $newFileName = NULL) {
	$set = array ();
	
	if ($itemName) {
		$set [] = "`name` = '{$itemName}'";
	}
	
	if ($itemPrice > 0) {
		$set [] = "`price` = '{$itemPrice}'";
	}
	
	if ($itemStatus !== null) {
		$set [] = "`status` = '{$itemStatus}'";
	}
	
	if ($itemDesc) {
		$set [] = "`description` = '{$itemDesc}'";
	}
	
	if ($itemCat) {
		$set [] = "`category_id` = '{$itemCat}'";
	}
	
	if ($newFileName) {
		$set [] = "`image` = '{$newFileName}'";
	}
	
	$setStr = implode ( $set, ", " );
	
	$sql = queryUpdateProduct($setStr, $itemId);
	
	$rs = mysql_query ( $sql );
	
	return $rs;
}

/**
 * upload image
 */
function updateProductImage($itemId, $newFileName){
	$rs = updateProduct($itemId, NULL, NULL, NULL, NULL, NULL, $newFileName);
	return $rs;
}





