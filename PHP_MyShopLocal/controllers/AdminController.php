<?php

/**
 *  controller backend site (/admin/)
 */

// Connect models
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';
include_once '../models/OrdersModel.php';
include_once '../models/PurchaseModel.php';

//+
include_once '../services/CategoriesService.php';
include_once '../services/ProductsService.php';
include_once '../services/OrdersService.php';
//-

$smarty->setTemplateDir(TemplateAdminPrefix);
$smarty->assign('templateWebPath', TemplateAdminWebPath);

function indexAction($smarty){

	$rsCategories = serviceGetAllMainCategories();
	//+	
	//$rsCategories = getAllCategoies();
	//$rsMainCategories = serviceGetAllMainCategories();
	//-
	
	$smarty->assign('pageTitle', 'Управление сайтом');
	$smarty->assign('rsCategories', $rsCategories);
	//+
	//$smarty->assign('rsMainCategories', $rsMainCategories);
	//-
	
	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'admin');
	loadTemplate($smarty, 'adminFooter');
	
}

/**
 * Action add new category
 */
function addnewcatAction(){
	
	$catName = htmlspecialchars(mysql_real_escape_string($_POST['newCategoryName']));	
	//$catName = $_POST['newCategoryName'];
	$catParentId = $_POST['generalCatId'];
	
	if(! checkFillCategory($catName)){
		$resData['success'] = 0;
		$resData['message'] = "Заполните новую категорию!";
	} else {
		$res = insertCat($catName, $catParentId);
		
		if($res){
			$resData['success'] = 1;
			$resData['message'] = "Категория добавлена!";
		} else {
			$resData['success'] = 0;
			$resData['message'] = "Ошибка добавления категории!";
		}	
	}
		
	echo json_encode($resData);
	return; 
	
}

/**
 * 
*/
function categoryAction($smarty){
	
	$rsCategories = getAllCategoies();
	$rsMainCategories = serviceGetAllMainCategories();
	
	$smarty->assign('pageTitle', 'Управление сайтом');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsMainCategories', $rsMainCategories);
	
	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminCategory');
	loadTemplate($smarty, 'adminFooter');
	
}
		 
function updatecategoryAction(){
	//$itemId = $_POST['itemId'];
	//$parentId = $_POST['parentId'];
	//$newName = $_POST['newName'];
	//+
	$newName = htmlspecialchars(mysql_real_escape_string($_POST['newName']));
	$itemId = htmlspecialchars(mysql_real_escape_string($_POST['itemId']));
	$parentId = htmlspecialchars(mysql_real_escape_string($_POST['parentId']));
	//Debug($newName);
	//-
	$res = updateCategoryData($itemId, $parentId, $newName );
	
	if ($res) {
		$resData ['success'] = 1;
		$resData ['message'] = "Категория обновлена!";
	} else {
		$resData ['success'] = 0;
		$resData ['message'] = "Ошибка изменения данных категории!";
	}
	
	echo json_encode($resData);
	return;		
}

/*
 * pages control goods
 */
function productsAction($smarty){
	$rsCategories = getAllCategoies();
	$rsProducts = getProducts();
	
	$smarty->assign('pageTitle', 'Управление сайтом');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);
	
	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminProducts');
	loadTemplate($smarty, 'adminFooter');
}

/**
 * add products
 */
function addproductAction(){
		
	$itemName = $_POST['itemName'];
	$itemPrice = $_POST['itemPrice'];
	$itemDesc = $_POST['itemDesc'];
	$itemCat = $_POST['itemCatId'];
	/*
	$itemName = htmlspecialchars ( mysql_real_escape_string ( $_POST ['itemName'] ) );
	$itemPrice = intval ( $_POST ['itemPrice'] );
	$itemDesc = htmlspecialchars ( mysql_real_escape_string ( $_POST ['itemDesc'] ) );
	$itemCat = intval ( $_POST ['itemCatId'] );
	*/
	$res = insertProduct($itemName, $itemPrice, $itemDesc, $itemCat);
	
	if ($res) {
		$resData ['success'] = 1;
		$resData ['message'] = "Изменения успешно внесены!";
	} else {
		$resData ['success'] = 0;
		$resData ['message'] = "Ошибка изменения данных!";
	}
	
	echo json_encode ( $resData );
	return;

}

/**
 * update product 
*/
function updateproductAction(){
	$itemId = intval ( $_POST['itemId']);
	$itemName = htmlspecialchars ( mysql_real_escape_string ( $_POST ['itemName'] ) );
	$itemPrice = intval ( $_POST['itemPrice']);	
	$itemStatus = intval ( $_POST['itemStatus']); 
	$itemDesc = htmlspecialchars ( mysql_real_escape_string ( $_POST ['itemDesc'] ) );
	$itemCat = intval ( $_POST ['itemCatId'] );
	
	$res = updateProduct($itemId, $itemName, $itemPrice, $itemStatus, $itemDesc, $itemCat);
	
	if ($res) {
		$resData ['success'] = 1;
		$resData ['message'] = "Изменения успешно внесены!";
	} else {
		$resData ['success'] = 0;
		$resData ['message'] = "Ошибка изменения данных!";
	}
	
	echo json_encode ( $resData );
	return;
}

/**
 * upload file
 */
function uploadAction(){
	$maxSize = 2 * 1024 * 1024; // 2Mb
	
	$itemId = intval ( $_POST['itemId']);
	
	// get uploaded file extension
	$ext = pathinfo($_FILES['filename']['name'], PATHINFO_EXTENSION);
	
	// creat new file
	$newFileName = $itemId.'.'.$ext;
	
	if($_FILES['filename']['size'] > $maxSize){
		echo "Size load file more then 2Mb!";
		return; 
	}	
	
	// check whether a file sent correctly
	if(is_uploaded_file($_FILES['filename']['tmp_name'])){
		// if the file is loaded then move it from a temporary directory in the end directory
		$res = move_uploaded_file($_FILES['filename']['tmp_name'], $_SERVER['DOCUMENT_ROOT'].'/images/products/' . $newFileName);
		if ($res){
			$res = updateProductImage($itemId, $newFileName);
			if ($res){
				redirect('/admin/products/');
			}
		}
	}else {
		echo "Error load file!";
	}
}

/**
 * orders action
 */
function ordersAction($smarty){
	$rsOrders = getOrders();
	
	$smarty->assign('pageTitle', 'Заказы');
	$smarty->assign('rsOrders', $rsOrders);
	
	loadTemplate($smarty, 'adminHeader');
	loadTemplate($smarty, 'adminOrders');
	loadTemplate($smarty, 'adminFooter');
}

/**
 * set order status
 */
function setorderstatusAction(){
	$itemId = $_POST['itemId'];
	$status =  $_POST['itemStatus'];
	
	$res = updateOrderStatus($itemId, $status);
	
	if ($res) {
		$resData ['success'] = 1;
	} else {
		$resData ['success'] = 0;
		$resData ['message'] = "Ошибка установки статуса!";
	}
	
	echo json_encode ( $resData );
	return;
		
}

/**
 * update order date payment
 */
function setOrderDatePaymentAction(){
	$itemId = $_POST['itemId'];
	$dataPayment = $_POST['datePayment'];
	
	$res = updateOrderDatePayment($itemId, $dataPayment);
	
	if ($res) {
		$resData ['success'] = 1;
	} else {
		$resData ['success'] = 0;
		$resData ['message'] = "Ошибка установки даты платежа!";
	}
	
	echo json_encode ( $resData );
	return;
	
	
}

/**
 * create xml
 */
function createxmlAction(){
	
	$rsProducts = getProducts();
	
	$xml = new DOMDocument('1.0', 'utf-8');
	$xmpProducts = $xml->appendChild($xml->createElement('products'));
	
	foreach ($rsProducts as $product){
		$xmpProduct = $xmpProducts->appendChild($xml->createElement('product'));
		
		foreach ($product as $key => $val){
			$xmlName = $xmpProduct->appendChild($xml->createElement($key));
			$xmlName->appendChild($xml->createTextNode($val));
		
		}	
	}
	
	$xml->save($_SERVER["DOCUMENT_ROOT"] . '/xml/products.xml');
	echo 'ok';
	
}






