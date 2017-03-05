<?php

namespace app\controllers;

use Yii;
use app\models\TestForm;
use app\models\Category;
use yii\base\Model;

class PostController extends AppController {
	
	public $layout = 'basic';
	
//	public function beforeAction($action) {
//		debug($action);
		
//		if($action->id == 'index'){
//			$this->enableCsrfValidation = false;
//		}
//		return parent::beforeAction($action);
//	}
	
	
	public function actionIndex() {
		
//		$cars = ['Mazda', 'Opel', 'BMW'];
		
//		print_r($cars);
//		echo "<br>";
//		var_dump($cars);
//		echo "<br>";
//		var_dump(Yii::$app);
		
//		$this->debug(Yii::$app);
		
//		$this->debug($cars );
		
		
		if(Yii::$app->request->isAjax){
//			debug($_POST);
			debug(Yii::$app->request->post());
			return 'test';
		}
		
//		$post = TestForm::findOne(7);
//		$post->email = 'mail@mail2.ua';
//		$post->save();
		
//		$post->delete();
		
//		TestForm::deleteAll(['>', 'id', 4]);
		
		$model = new TestForm();
//		$model->name = 'Автор';
//		$model->email = 'mail@mail.com';
//		$model->save();
		
		if($model->load(Yii::$app->request->post())){
			
//			debug($model);
//			die();
			
//			if($model->validate()){
			if($model->save()){
				Yii::$app->session->setFlash('success', 'Данные приняты');
				return $this->refresh();
			}else{
				Yii::$app->session->setFlash('error', 'Ошибка');
			}
		}
		
		$this->view->title = 'Все статьи';
		return $this->render('test', compact('model'));
	}
	
	public function actionShow() {
//		$this->layout = 'basic';
		
		$this->view->title = 'Одна статья';
		$this->view->registerMetaTag(['name' => 'keywords', 'content' => 'ключевики......']);
		$this->view->registerMetaTag(['name' => 'description', 'content' => 'описание......']);
		
//		$cats = Category::find()->all();
//		$cats = Category::find()->orderBy(['id' => SORT_DESC])->all();
//		$cats = Category::find()->asArray()->all();
//		$cats = Category::find()->asArray()->where('id=7')->all();
//		$cats = Category::find()->asArray()->where(['id'=>7])->all();
//		$cats = Category::find()->asArray()->where(['like', 'name', 'да'])->all();
//		$cats = Category::find()->asArray()->where(['<=', 'id', '4'])->all();
//		$cats = Category::find()->asArray()->where(['<=', 'id', '4'])->count();
//		$cats = Category::findOne(['sort_order' => 9]);
//		$cats = Category::findAll(['sort_order' => 9]);
		/*
		$query = "SELECT * FROM category WHERE name LIKE :search";
		$cats = Category::findBySql($query, [':search' => '%да%'])->all();
		*/
		
		
//		$cats = Category::findOne(4);
		
		
//		$cats = Category::find()->with('product')->where('id=4')->all();
		
		// linivaz ili otlozenaya zagruzca
		//$cats = Category::find()->->all();
		
		// zadnaya zagruzca
		$cats = Category::find()->with('product')->all();
		
		return $this->render('show', compact('cats'));
	}
	
}