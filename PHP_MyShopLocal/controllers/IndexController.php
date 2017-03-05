<?php


// подключение модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


function testAction(){
	echo '<br> IndexController.php > testAction';
}

/**
 * load main page site
 * @param unknown $smarty
 */
function indexAction($smarty){
	
	$rsCategories = getAllMainCatsWithChildren();
	$rsProducts = getLastProducts(16);
	
	$smarty->assign('pageTitle', 'Главная страница сайта');
	$smarty->assign('rsCategories', $rsCategories);
	$smarty->assign('rsProducts', $rsProducts);
	
	loadTemplate($smarty, 'header');
	loadTemplate($smarty, 'index');
	/* loadTemplate($smarty, 'right'); */
	loadTemplate($smarty, 'footer');
}