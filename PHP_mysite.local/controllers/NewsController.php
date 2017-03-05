<?php
	
//include_once ROOT."/models/News.php";
//include_once "../models/News.php";

class NewsController{
	
	public function actionIndex(){
	
		$newsList = array();
		$newsList = News::getNewsList();
		
		require_once (ROOT.'/views/news/index.php');
		//require_once ('../views/news/index.php');
		
		/* echo '<pre>';
		print_r($newsList);
		echo '<pre>'; */
		
		//echo '<br />List news class NewsController   public function actionIndex()';
		return true;
	}
	
	
	public function actionView($id){
	
		if($id){
			$newsItem = News::getNewsItemById($id);
					
			echo '<pre>';
			print_r($newsItem);
			echo '<pre>';
		}
		
		
		
// 		echo "<br>".$category;
// 		echo "<br>".$id;
		//echo '<br>List news';
		
		return true;
		
	}
	
	
	/**
	 * 
	 * 'news/77'=>'news/view',
	 * 'news/15'=>'news/view',
	 * 'news/([0-9]+)'=>'news/view',
	 * 
	 * @return boolean
	 */
	public function One_actionView(){
	
		echo 'Просмотр одной новости';
		return true;
	}
	
	
	
	/* public function actionIndex($params){
		
		echo "<br>".$params[0];
		echo "<br>".$params[1];
		echo 'List news';
		return true;
	} */
	
	/* public function actionIndex($category, $id){
	
		echo "<br>".$category;
		echo "<br>".$id;
		echo 'List news';
		return true;
	}
	*/
	
	/**
	 * 'news/([a-z]+)/([0-9]+)'=>'news/view/$1/$2',
	 * 
	 * @param unknown $params
	 * @return boolean
	 */
	public function Two_actionView($params){
		
		echo "<br>".$params[0];
		echo "<br>".$params[1];
		
		return true;
	} 

	/**
	 * 'news/([a-z]+)/([0-9]+)'=>'news/view/$1/$2',
	 * 
	 * @param unknown $category
	 * @param unknown $id
	 * @return boolean
	 */
	public function Tree_actionView($category, $id){
	
		echo "<br>".$category;
		echo "<br>".$id;
	
		return true;
	}
	
	
				
	}
	
	