<?php

//include_once ROOT . '/models/Category.php';
//include_once ROOT . '/models/Product.php';

class SiteController {
	
	public function actionIndex() {
				
		//$categories = array();
		$categories = Category::getCategoriesList(); 
		
		//$latestProducts = array();
		$latestProducts = Product::getLatestProducts(6); 
		
		//$sliderProducts = array();
		$sliderProducts = Product::getRecommendedProducts();
	
		require_once(ROOT . '/views/site/index.php');
		
		return true;
		
	}
	
	
	public function actionContact() {
		//$mail = 'sergiy_krohmalniy@ukr.net';
		/* $mail = 'sergiykrohmalniy@gmail.com';
		$subject = 'Тема письма';
		$message = 'Содержания письма, HELLO SERJI!!!!!!!!!!11111  ';
		
		$headers  = 'From: sender@gmail.com' . "\r\n" .
				'Reply-To: sender@gmail.com' . "\r\n" .
				'MIME-Version: 1.0' . "\r\n" .
				'Content-type: text/html; charset=utf-8' . "\r\n" .
				'X-Mailer: PHP/' . phpversion(); 
		
		 $result = mail($mail, $subject, $message, $headers); */ 
		
		//$result = mail($mail, $subject, $message);
		
		//var_dump($result);
		
		//die();
		//return true;
		 
		 ///////////////////////////////////////////////////
 		 $userEmail = '';
		 $userText = '';
		 $result = false;
		 
		 if(isset($_POST['submit'])){
		 	$userEmail = $_POST['userEmail'];
		 	$userText = $_POST['userText'];
		 	
		 	$errors = false;
		 	
		 	if(!User::checkEmail($userEmail)){
		 		$errors[] = 'Неправильный email';
		 	}
		 	
		 	if($errors == false){
		 		$adminEmail = 'sergiykrohmalniy@gmail.com';
		 		$subject = 'Тема письма';
		 		$message = "Текст: {$userText} . От {$userEmail}";
		 		
		 		$headers  = 'From: sender@gmail.com' . "\r\n" .
		 				'Reply-To: sender@gmail.com' . "\r\n" .
		 				'MIME-Version: 1.0' . "\r\n" .
		 				'Content-type: text/html; charset=utf-8' . "\r\n" .
		 				'X-Mailer: PHP/' . phpversion();
		 		
		 		$result = mail($adminEmail, $subject, $message, $headers);
		 		
		 		$result = true;
		 	}
		 }
		 
		 require_once(ROOT . '/views/site/contact.php');
		 
		 return true;
		 
	}
	
	/**
	 * Action для страницы "О магазине"
	 */
	public function actionAbout()
	{
		// Подключаем вид
		require_once(ROOT . '/views/site/about.php');
		return true;
	}
	
}