<?php

class CartController {
	
	/**
	 *  Синхронное добавление
	 */
	public function actionAdd($id) {
		// add product in cart
		Cart::addProduct($id);
		
		// Returns the user to the page
		$referrer = $_SERVER['HTTP_REFERER']; // адрес страницы с которой пришел пользователь
		header("Location: $referrer");
	}
	
	public function actionDelete($id)
	{
		// Удалить товар из корзины
		$cart = new Cart;
		$cart->deleteProductFromSession($id);
		
		// Возвращаем пользователя на страницу
		header("Location: /cart");
	}
	
	// Асинхронное добавление
	public function actionAddAjax($id) {
		echo Cart::addProduct($id);
		return true;
	}
	
	/**
	 * action cart
	 * 
	 * @return boolean
	 */
	public function actionIndex() {
		$categories = array();
		$categories = Category::getCategoriesList();
		
		$productsInCart = false;
		
		// get data from cart
		$productsInCart = Cart::getProducts();
		
		if($productsInCart){
			
			// get full information about products for list
			$productsIds = array_keys($productsInCart);
			$products = Product::getProductsByIds($productsIds);
			
			// get the total cost of the goods
			$totalPrice = Cart::getTotalPrice($products);
			//$cart = new Cart;
			//$totalPrice = $cart->getTotalPrice($products);
			
		}
				
		require_once(ROOT . '/views/cart/index.php');
		
		return true;
	}
	
	
	public function actionCheckout()
	{
	
		// Список категорий для левого меню
		$categories = array();
		$categories = Category::getCategoriesList();
	
	
		// Статус успешного оформления заказа
		$result = false;
	
	
		// Форма отправлена?
		if (isset($_POST['submit'])) {
			// Форма отправлена? - Да
			// Считываем данные формы
			$userName = $_POST['userName'];
			$userPhone = $_POST['userPhone'];
			$userComment = $_POST['userComment'];
	
			// Валидация полей
			$errors = false;
			if (!User::checkName($userName))
				$errors[] = 'Неправильное имя';
				if (!User::checkPhone($userPhone))
					$errors[] = 'Неправильный телефон';
	
					// Форма заполнена корректно?
					if ($errors == false) {
						// Форма заполнена корректно? - Да
						// Сохраняем заказ в базе данных
						// Собираем информацию о заказе
						$productsInCart = Cart::getProducts();
						if (User::isGuest()) {
							$userId = false;
						} else {
							$userId = User::checkLogged();
						}
	
						// Сохраняем заказ в БД
						$result = Order::save($userName, $userPhone, $userComment, $userId, $productsInCart);
	
						if ($result) {
							// Оповещаем администратора о новом заказе
							/* $adminEmail = 'sergiykrohmalniy@gmail.com';
							$message = 'http://digital-mafia.net/admin/orders';
							$subject = 'Новый заказ!';
							mail($adminEmail, $subject, $message); */
							/////////////////////////////////
							$adminEmail = 'sergiykrohmalniy@gmail.com';
							$subject = 'Новый заказ!';
							$message = "http://digital-mafia.net/admin/orders";
							 
							$headers  = 'From: sender@gmail.com' . "\r\n" .
									'Reply-To: sender@gmail.com' . "\r\n" .
									'MIME-Version: 1.0' . "\r\n" .
									'Content-type: text/html; charset=utf-8' . "\r\n" .
									'X-Mailer: PHP/' . phpversion();
							 
							mail($adminEmail, $subject, $message, $headers);
							/////////////////////////////////
							// Очищаем корзину
							Cart::clear();
						}
					} else {
						// Форма заполнена корректно? - Нет
						// Итоги: общая стоимость, количество товаров
						$productsInCart = Cart::getProducts();
						$productsIds = array_keys($productsInCart);
						$products = Product::getProductsByIds($productsIds);
						$totalPrice = Cart::getTotalPrice($products);
						$totalQuantity = Cart::countItems();
					}
		} else {
			// Форма отправлена? - Нет
			// Получием данные из корзины
			$productsInCart = Cart::getProducts();
	
			// В корзине есть товары?
			if ($productsInCart == false) {
				// В корзине есть товары? - Нет
				// Отправляем пользователя на главную искать товары
				header("Location: /");
			} else {
				// В корзине есть товары? - Да
				// Итоги: общая стоимость, количество товаров
				$productsIds = array_keys($productsInCart);
				$products = Product::getProductsByIds($productsIds);
				$totalPrice = Cart::getTotalPrice($products);
				$totalQuantity = Cart::countItems();
	
	
				$userName = false;
				$userPhone = false;
				$userComment = false;
	
				// Пользователь авторизирован?
				if (User::isGuest()) {
					// Нет
					// Значения для формы пустые
				} else {
					// Да, авторизирован
					// Получаем информацию о пользователе из БД по id
					$userId = User::checkLogged();
					$user = User::getUserById($userId);
					// Подставляем в форму
					$userName = $user['name'];
				}
			}
		}
	
		require_once(ROOT . '/views/cart/checkout.php');
	
		return true;
	}	
	
	
	public function actionAddAmountAjax($id, $value) {
		$cart = new Cart;
		echo $cart->addProductAmount($id, $value);
		
		return true;
	}
	
	/**
	 * Change Value In Cart
	 * 
	 * @param unknown $id
	 * @param unknown $value
	 * @return boolean
	 */
	public function actionChangeValueInCart($id, $value){
		
		$cart = new Cart;
		echo $cart->changeProductAmount($id, $value);
		
		return true;
	}
}













