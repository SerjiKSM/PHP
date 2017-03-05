<?php

namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;
use app\models\Posts;

class PostOthers extends Widget{
	
	public $id;
	
	public function run() {
		$posts = Posts::find()->where(['hide' => 0])->limit(3)->where(['not', ['id' => $this->id]])->orderBy("rand()")->all();
					
		$trs = "";
		
		foreach ($posts as $post) {
			
//			$img = Html::tag('img', null, ['src' => $post->img, 'alt' => $post->title]);
//			$td_1 = Html::tag('td', $img);
			
//			$a_span = Html::tag('a', '&laquo;'.$post->title.'&raquo;', ['href' => $post->link]);
//			$a_span .= Html::tag('span', $post->date, ['class' => 'date']);
//			$td_2 = Html::tag('td', $a_span);
//
//			$trs = Html::tag('tr', $td_1.$td_2);
			
			
			/////////////////////////////////////////////
			//
			$img = Html::tag('img', null, ['src' => $post->img, 'alt' => $post->title]);
			$td_1 = Html::tag('td', $img, ['rowspan' => 2]);
			
			$a = Html::tag('a', '&laquo;'.$post->title.'&raquo;', ['href' => $post->link]);
			$td_2 = Html::tag('td', $a);
			
			$tr_1 = Html::tag('tr', $td_1.$td_2);
			//
			
			//
			$span = Html::tag('span', $post->date, ['class' => 'date']);
			$td_3 = Html::tag('td', $span);
			
			$tr_2 = Html::tag('tr', $td_3);
			//
			
			$trs .= $tr_1.$tr_2;
			
		}
		
		//return Html::tag('table', $trs, ['id' => post_others]);
//		return Html::tag('table', $tr_1.$tr_2, ['id' => post_others]);
		return Html::tag('table', $trs, ['id' => post_others]);
		
		
	}
	
}