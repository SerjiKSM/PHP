<?php

class Cart {
	public static function addProduct($id) {
		$id = intval($id);
		
		// Empty array for products in cart
		$productsInCart = array();
		
		// If in cart alredy exist products (they are save in session)
		if(isset($_SESSION['products'])){
			// then fill our array to products
			$productsInCart = $_SESSION['products'];
					
		}
		
		// If products exist in cart, but was add one time more  increase count
		if(array_key_exists($id, $productsInCart)){
			$productsInCart[$id] ++;
		} else {
			// add new product in cart
			$productsInCart[$id] = 1;
		}
		
		$_SESSION['products'] = $productsInCart;
		
		 /* echo '<pre>'; print_r($_SESSION['products']); 
		die(); */ 
		
		return self::countItems();
				
	}
	
	/**
	 * count products in cart
	 */
	public static function countItems() {
		if (isset ( $_SESSION ['products'] )) {
			$count = 0;
			foreach ( $_SESSION ['products'] as $id => $quantity ) {
				$count = $count + $quantity;
			}
			return $count;
		} else {
			return 0;
		}
	}
	
	/**
	 * get products
	 */
	public static function getProducts() {
		
		if(isset($_SESSION['products'])){
			return $_SESSION['products'];
		}
		return false;
		
	}
	
	/**
	 *  get Total Price
	 *  
	 * @param unknown $products
	 * @return number
	 */
	//public function getTotalPrice($products){
	public static function getTotalPrice($products){
	
		$productsInCart = self::getProducts();
		
		$total = 0;
		
		if($productsInCart){
			foreach($products as $item){
				$total += $item['price'] * $productsInCart[$item['id']];
			}
		}
		
		return $total;
	}
	
	/**
	 * clear cart
	 */
	public static function clear()
	{
		if (isset($_SESSION['products'])) {
			unset($_SESSION['products'] );
		}
	}
	
	/**
	 * delete product
	 */
	public function deleteProductFromSession($id){
		
		//unset($_SESSION['products'][$id]);
		
		$productsInCart = self::getProducts();
		unset($productsInCart[$id]);
		$_SESSION['products'] = $productsInCart;
		
	}
	
	
	public function addProductAmount($id, $value){
		$id = intval($id);
		$value = intval($value);
		
		// Empty array for products in cart
		$productsInCart = array();
		
		// If in cart alredy exist products (they are save in session)
		if(isset($_SESSION['products'])){
			// then fill our array to products
			$productsInCart = $_SESSION['products'];	
		}
		
		// If products exist in cart, but was add one time more  increase count
		if(array_key_exists($id, $productsInCart)){
			$productsInCart[$id] += $value;
		} else {
			// add new product in cart
			$productsInCart[$id] = $value;
		}						
		
		$_SESSION['products'] = $productsInCart;
		
		/* echo '<pre>'; print_r($_SESSION['products']);
		 die(); */
		
		return self::countItems();
	}
	
	public function changeProductAmount($id, $value){
		$id = intval($id);
		$value = intval($value);
		
		$_SESSION['products'][$id] = $value;
		
		return self::countItems();
	}
	
}





