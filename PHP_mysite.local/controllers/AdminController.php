<?php

/**
 * AdminController
 * 
 * @author Serhio
 *
 */
class AdminController extends AdminBase
{
	/**
	 * Action for start page "Panel admin"
	 */
	public function actionIndex()
	{
		// check acces
		self::checkAdmin();
		
		
		require_once(ROOT . '/views/admin/index.php');
		return true;
	}
	
}