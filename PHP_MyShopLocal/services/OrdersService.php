<?php

/**
 * Service function Orders
 */

/**
 *  Get orders and products for orders
 */
function getOrders(){
	$sql = queryGetOrders();
	
	$rs = mysql_query($sql);
	
	$smartyRs = array();
	
	while ($row = mysql_fetch_assoc($rs)){
		
		$rsChildren = getProductsForOrder($row['id']);
		
		if($rsChildren){
			$row['children'] = $rsChildren;
			$smartyRs[] = $row;
		}
		
	}
	
	return $smartyRs;
}

/**
 * get products for order
*/
function getProductsForOrder($id){
	$id =  intval($id);	
	$sql = queryGetProductsForOrder($id);
	
	$rs = mysql_query($sql);
	return createSmartyRsArray($rs);
}

/**
 * update order status
 */
function updateOrderStatus($itemId, $status){
	$itemId = intval($itemId);
	$status = intval($status);

	$sql = queryUpdateSatatus($itemId, $status);
	
	$rs = mysql_query($sql);
	
	return $rs;
		
}

/**
 * update order date payment
 * 
 * @param unknown $itemId
 * @param unknown $dataPayment
 */
function updateOrderDatePayment($itemId, $dataPayment){
	$itemId = intval($itemId);
	$dataPayment = htmlspecialchars(mysql_real_escape_string($dataPayment));
		
	$sql = queryUpdateOrderDatePayment($itemId, $dataPayment);
	
	$rs = mysql_query($sql);
	
	return $rs;
	
}



