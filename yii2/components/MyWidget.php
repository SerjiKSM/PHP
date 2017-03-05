<?php
/**
 * Created by PhpStorm.
 * User: Serhio
 * Date: 24.02.2017
 * Time: 23:39
 */

namespace app\components;

use yii\base\Widget;

class MyWidget extends Widget{
	
	public $name;
	
	public function init()	{
		parent::init();
//		if($this->name === null) {
//			$this->name = 'Гость';
//		}
		
		ob_start();
		
	}
	
	public function run() {
//		return "<h1>{$this->name}, Hello world!</h1>";
//		return $this->render('my', ['name' => $this->name]);
		
		$content = ob_get_clean();
//		$content = mb_strtoupper($content, 'utf-8');
		$content = mb_strtoupper($content);
		return $this->render('my', compact('content'));
	}
	
}