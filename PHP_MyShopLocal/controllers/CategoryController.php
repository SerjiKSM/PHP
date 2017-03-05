<?php

/**
 * Controller page categori (/category/1)
 */

// подключение модели
include_once '../models/CategoriesModel.php';
include_once '../models/ProductsModel.php';


function indexAction($smarty){
	
	$catId = isset($_GET['id']) ? $_GET['id'] : null;
	if($catId == null){
		exit();
	}
	
	$rsProducts = null;
	$rsChildCats = null;
	
	$rsCategory = getCatById($catId);
	
	// Если главная категория то показываем дочернее категориию, иначе показываем товар
	if($rsCategory['parent_id'] == 0 ){
		$rsChildCats = getChildrenForCat($catId);
	}else{
		$rsProducts = getProductsByCat($catId);		
	}

	$rsCategories = getAllMainCatsWithChildren();
	
	// ksm +
	if (!$rsCategory['parent_id']==0 && empty($rsProducts)){
		echo "Нет товара!";
	}
	// ksm -
	
	$smarty->assign('pageTitle', 'Товары категории' .$rsCategory['name']);
	
	$smarty->assign('rsCategory', $rsCategory);
	 
	$smarty->assign('rsProducts', $rsProducts);
	$smarty->assign('rsChildCats', $rsChildCats);
	
	$smarty->assign('rsCategories', $rsCategories); 
	
	
	loadTemplate($smarty, 'header');
	
	loadTemplate($smarty, 'category');
	
	loadTemplate($smarty, 'footer');  
	
}




