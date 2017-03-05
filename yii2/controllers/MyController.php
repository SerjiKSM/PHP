<?php
/**
 * Created by PhpStorm.
 * User: Serhio
 * Date: 02.02.2017
 * Time: 14:58
 */

namespace app\controllers;


//use yii\web\Controller;

class MyController extends AppController{
	
	public function actionIndex($id = null){
//		return 'Hello test !!!!!!!!!';
		
		if(!$id){
			$id = "Параметр не указан!";
		}
		
		$hi = 'Hello serji!';
		$names = ['Mike', 'Stiv', 'Carmem'];
		$cars = ['Mazda', 'Opel', 'BMW'];
		
//		return $this->render('index', ['hello' => $hi, 'names' => $names, 'cars' => $cars, 'id' => $id]);
		return $this->render('index', compact('hi', 'names', 'cars', 'id'));

	}
	
	
	public function actionBlogPost(){
		//my/blog-post
		return 'Action blog post';
	}

}