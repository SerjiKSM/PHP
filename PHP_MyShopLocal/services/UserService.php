<?php

/**
 * Service function user
 */

/*
 * Check parameters for registration user 
 */
 function checkRegisterParams($email, $pwd1, $pwd2) {
 	$res = null;
 	
 	if(!$email){
 		$res['success'] = false;
 		$res['message'] = 'Введите email';
 		//$res['message_email'] = "Введите email !";
 	}
 	
 	if(!$pwd1){
 		$res['success'] = false;
 		$res['message'] = 'Введите пароль';
 		//$res['message_pwd1'] = "Введите пароль !";
 	}
 	
 	if(!$pwd2){
 		$res['success'] = false;
 		$res['message'] = 'Введите повтор пароля';
 		//$res['message_pwd2'] = "Введите повтор пароля !";
 	}
 	
 	if($pwd1 != $pwd2){
 		$res['success'] = false;
 		$res['message'] = 'Пароли не совпадают';
 		//$res['message_pwd3'] = + " Пароли не совпадают !";
 	}
 	
 	return $res;
 	
 }

 /*
  * Check email 
  */
 function checkUserEmail($email){
 	
 	//$email = mysqli_real_escape_string($email);
 	$email = mysql_real_escape_string($email);
 	$sql = "SELECT id FROM users WHERE email = '{$email}'";
 	
 	//$rs = mysqli_query($sql);
 	$rs = mysql_query($sql);
 	$rs = createSmartyRsArray($rs);
 	
 	return $rs;
 	
 }
 
 /**
  * 
  */
 function getOrderUser(){
 	$userId = isset($_SESSION['user']['id']) ? $_SESSION['user']['id'] : 0;
 	
 	return getOrdersWithProductsByUser($userId);
 }
 
 
 
 
 