<?php

/**
 * Model for tables prodaction (purchase)
 */

/**
 * registered in the database products with reference to the order 
 * 
*/
 function setPurchaseForOrder($orderId, $cart){
 	$sql = "INSERT INTO purchase
 			(order_id, product_id, price, amount)
 			VALUES ";
 	
 	$values = array();
 	
 	// forming array string for query for each product
 	foreach ($cart as $item){
 		$values[] = "('{$orderId}', '{$item['id']}', '{$item['price']}', '{$item['cnt']}')"; 		
 	}
 	
 	// conversion array in string
 	$sql .= implode($values, ', ');
 	$rs = mysql_query($sql);
 	
 	return $rs;
 	
 }
 
 /**
  * get purchase for order
  */
 function getPurchaseForOrder($orderId){
 	$sql = "SELECT `pe`.*, `ps`.`name` 
 			FROM purchase as `pe` 
 			JOIN products as `ps` ON `pe`.product_id = `ps`.id 
 			WHERE `pe`.order_id = {$orderId}";
 	
 	$rs = mysql_query($sql);
 	return createSmartyRsArray($rs);
 }
 