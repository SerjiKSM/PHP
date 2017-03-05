<?php

/**
 * Model for tables "order"
 */


/**
 * Create order
 * 
*/
 function makeNewOrder($name, $phone, $address){
 	// initialisation variebles
 	$userId = $_SESSION['user']['id'];
 	$comment = "id пользователя: {$userId}<br />
 				Имя: {$name} <br />
 				Телефон: {$phone}<br />
 				Адрес: {$address}"; 
 	$dateCreated = date('Y.m.d H:i:s');
 	$userIp = $_SERVER['REMOTE_ADDR'];
 	
 	// forming sql query to data base
 	$sql = "INSERT INTO
 			orders (`user_id`, `date_created`, `date_payment`, 
 					`status`, `comment`, `user_ip`)
 			VALUES('{$userId}', '{$dateCreated}', null,
 			'0', '{$comment}', '{$userIp}')";
 	
 	
 	$rs = mysql_query($sql);
 	
 	
 	
 	// is more better methods to get id then this need read in feacher
 	// get id greated order
 	/* if($rs){
 		$sql = "SELECT id
 				FROM orders
 				ORDER BY id DESC
 				LIMIT 1";
 		
 		$rs = mysql_query($sql);
 		$rs = createSmartyRsArray($rs);
 		
 		// return id created order
 		if(isset($rs[0])){
 			return $rs[0]['id'];
 		} 		
 		
 	} */
 	
	// +
 	if ($rs){
 		
 		return mysql_insert_id(); 
 	}
 	// -
 	
 	return false;
 	
 }
 
 /*
  * get orders user
  */
 function getOrdersWithProductsByUser($userId){
 	
 	$userId = intval($userId);
 	$sql = "SELECT * FROM orders WHERE user_id = '{$userId}'
 			ORDER BY id DESC";
 	
 	$rs = mysql_query($sql);
 	
 	$smartyRs = array();
	while ($row = mysql_fetch_assoc($rs)){
		$rsChildren = getPurchaseForOrder($row['id']);
		if($rsChildren){
			$row['children'] = $rsChildren;
			$smartyRs[] = $row;
		}
		
	}
	
	return $smartyRs;
 }
 
 /*
  * get orders with products
  */
 function queryGetOrders(){
 	
 	return 	"SELECT o.*, u.name, u.email, u.phone, u.address
 			FROM orders AS `o`
 			LEFT JOIN users AS `u` 
 				ON o.user_id = u.id
 			ORDER BY id DESC";
 	
 }

 /*
  * get products for order
  */
 function queryGetProductsForOrder($orderId){
 	return 	"SELECT *
	 			FROM purchase AS `pe`
	 			LEFT JOIN products AS `ps`
	 				ON pe.product_id = ps.id
	 			WHERE (`order_id` = '{$orderId}')";
 }
 

 /**
  * update status
  * 
  * @param unknown $itemId
  * @param unknown $status
  */
function queryUpdateSatatus($itemId, $status){
 	
	return "UPDATE orders SET `status` = '{$status}' WHERE id = '{$itemId}'";
	
}

/**
 * update order date payment
 * 
 * @param unknown $itemId
 * @param unknown $dataPayment
 * @return string
 */
function queryUpdateOrderDatePayment($itemId, $dataPayment){
	return "UPDATE orders SET `date_payment` = '{$dataPayment}' WHERE id = '{$itemId}'";
}
 
 
 
 
 
 