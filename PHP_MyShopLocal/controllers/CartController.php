<?php

/**
 * cartController.php
 * 
 * controller for work with cart (/cart/)
 * 
 */

// connection model
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

/**
 * add product in cart
 * @param integer id GET 
 * return json information about operation
 */

function addtocartAction(){
	
	$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
	if (!$itemId){
		return false;
	}
	
	$resData = array();
	
	// if value not found then add
	if(isset($_SESSION['cart']) && array_search($itemId, $_SESSION['cart']) === false){
		$_SESSION['cart'][] = $itemId;
		$resData['cntItems'] = count($_SESSION['cart']);
		$resData['success'] = 1;
	} else {
		$resData['success'] = 0;
	}
	
	echo json_encode($resData);
	
}

/**
 * Delete product from cart
 */
function removefromcartAction(){
	$itemId = isset($_GET['id']) ? intval($_GET['id']) : null;
	if (!$itemId){
		exit();
	}
	
	$resData = array();
	
	$key = array_search($itemId, $_SESSION['cart']);
	if($key !== false){
		unset($_SESSION['cart'][$key]);
		$resData['success'] = 1;
		$resData['cntItems'] = count($_SESSION['cart']);
	}else {
		$resData['success'] = 0;
	}
	
	echo json_encode($resData);
	
}

/**
 * Inicialisation pages cart
 * @link /cart/
 */
function indexAction($smarty){
	$itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : array();
	
	$rsCategories = getAllMainCatsWithChildren();
	$rsProducts = getProductsFromArray($itemsIds);

	$smarty->assign('pageTitle', 'Корзина');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);
	
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'cart');
	loadTemplate($smarty, 'footer');
}

/**
 * Initialisation page order
 */
function orderAction($smarty){
	// Get array identificators (ID) products cart
	$itemsIds = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
	
	// if cart is empty redirect in cart
	if(! $itemsIds){
		redirect("/cart/");
	}
	
	// get from array $_POST number products
	$itemsCnt = array();
	foreach ($itemsIds as $item){
		// generate key for array POST
		$postVar = 'itemCnt_' . $item;
		
		// create element array number purchased product
		// key array - ID product, value array - number product
		// $itemsCnt[1] = 3
		$itemsCnt[$item] = isset($_POST[$postVar]) ? $_POST[$postVar] : null; 
				
	}
	
	// get list product 
	$rsProducts = getProductsFromArray($itemsIds);
	
	// add each product additional field
	// "realPrice" - number product * price product
	// "cnt" - the number of purchased goods
	
	// &$item - for when change variable '$item' change and element array $rsProducts 
	$i = 0;
	foreach ($rsProducts as &$item){		
		
		//Debug($item['id']);
		
		$item['cnt'] = isset($itemsCnt[$item['id']]) ? $itemsCnt[$item['id']] : 0;
				
		if($item['cnt']){
			$item['realPrice'] = $item['cnt'] * $item['price'];
		} else {
			// if happen that goods in cart is but number == 0, then delete goods
			unset($rsProducts[$i]);
		}
		
		$i++;
				
	}
	
	if(! $rsProducts){
		echo "Корзина пуста";
		return; 
	}
	
	// полученный массив покупаемых товаров помещаем в сессионную переменную
	$_SESSION['saleCart'] = $rsProducts;
	
	$rsCategories = getAllMainCatsWithChildren();
	
	// hideLoginBox переменная - флаг для того чтобы спрятать блоки логина и регистрации
	if(! isset($_SESSION['user'])){
		$smarty->assign('hideLoginBox', 1);
	}
	
	$smarty->assign('pageTitle', 'Заказ');
	$smarty->assign('rsProducts', $rsProducts);	
	$smarty->assign('rsCategories', $rsCategories);
	
	
	loadTemplate($smarty, 'header');	
	loadTemplate($smarty, 'order');
	loadTemplate($smarty, 'footer');
	
}

/**
 * function save order
 */
function saveorderAction(){
	
	// Get array purchase products
	$cart = isset($_SESSION['saleCart']) ? $_SESSION['saleCart'] : null;
	
	// if cart empty forming answer with error in format 'json'
	if(! $cart){
		$resData['success'] = 0;
		$resData['message'] = "Нет товара для заказа!";
		echo json_encode($resData);
		return; 
	}
		
	$name = htmlspecialchars(mysql_real_escape_string(isset($_POST['name']) ? $_POST['name'] : null));
	$phone = htmlspecialchars(mysql_real_escape_string(isset($_POST['phone']) ? $_POST['phone'] : null));
	$address = htmlspecialchars(mysql_real_escape_string(isset($_POST['address']) ? $_POST['address'] : null));
	
	// create new order and get id this order
	$orderId = makeNewOrder($name, $phone, $address);
	 
	// if order not created, then write error and complete function
	if(! $orderId){
		$resData['success'] = 0;
		$resData['message'] = "Ошибка создания заказа";
		echo json_encode($resData);
		return; 
	}
	
	// save products for created order
	$res = setPurchaseForOrder($orderId, $cart);
	
	// if success, then forming answer, and delete variables cart
	if($res){
		$resData['success'] = 1;
		$resData['message'] = "Заказ сохранен ";
		unset($_SESSION['saleCart']);
		unset($_SESSION['cart']);
	} else {
		$resData['success'] = 0;
		$resData['message'] = 'Ошибка внесения данных для заказа № ' .$orderId;
	}
	
	echo json_encode($resData);
}






















