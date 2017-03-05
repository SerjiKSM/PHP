<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';
//include_once ROOT . '/components/Pagination.php';

class CatalogController {

	public function actionIndex() {

		$categories = array();
		$categories = Category::getCategoriesList();

		$products = array();
		$products = Product::getLatestProducts(6);

		require_once(ROOT . '/views/catalog/index.php');

		return true;

	}

	/* public function actionCategory($idCategory){
		
		$categories = array();
		$categories = Category::getCategoriesList();
		
		$categoryProducts = array();
		$categoryProducts = Product::getProductsListByCategory($idCategory);
		
		require_once(ROOT . '/views/catalog/category.php');
		
		return true;
		
	} */
	
	
	/**
	 * @param unknown $categoryId
	 * @param number $page
	 * @return boolean
	 */
	public function actionCategory($categoryId, $page = 1){
	
// 		echo 'Category: '.$categoryId;
// 		echo '<br>Page: '.$page;
		
		$categories = array();
		$categories = Category::getCategoriesList();
	
		$categoryProducts = array();
		//$categoryProducts = Product::getProductsListByCategory($categoryId);
		$categoryProducts = Product::getProductsListByCategory($categoryId, $page); 
		
		// +
		//$categoryCount = Product::getCountCategory($categoryId);
		// -
		
		$total = Product::getTotalProductsInCategory($categoryId);
		
		// Создаем объект Pagination - постраничная навигация
		$pagination = new Pagination($total, $page, Product::SHOW_BY_DEFAULT, 'page-');
		
		require_once(ROOT . '/views/catalog/category.php');
	
		return true;
	
	}
}