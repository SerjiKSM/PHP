<?php
/**
 * Created by PhpStorm.
 * User: Serhio
 * Date: 02.02.2017
 * Time: 20:23
 */

namespace app\controllers;

use yii\web\Controller;

class AppController extends Controller {
	
	public function debug($arr) {
		echo '<pre>' . print_r($arr, true) . '</pre>';
	}
	
}

