<?php

/**
 * ProductController.php
 * 
 * Controller page goods (/product/1)
 */

// connection model
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';

// formation page goods
function indexAction($smarty){

	$itemId = isset($_GET['id']) ? $_GET['id'] : null;
	if($itemId == null){
		exit();
	}

	$rsProduct = getProductById($itemId);

	$rsCategories = getAllMainCatsWithChildren();

	$smarty->assign('itemInCart', 0);
	if(in_array($itemId, $_SESSION['cart'])){
		$smarty->assign('itemInCart', 1);
	}
	
	
	$smarty->assign('pageTitle', '');

	$smarty->assign('rsProduct', $rsProduct);

	$smarty->assign('rsCategories', $rsCategories);


	loadTemplate($smarty, 'header');

	loadTemplate($smarty, 'product');

	loadTemplate($smarty, 'footer');

}