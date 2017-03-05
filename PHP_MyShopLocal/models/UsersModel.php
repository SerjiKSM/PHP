<?php

/**
 * Model for tables users 
 */

/*
 * Registration new user
 */
 function registerNewUser($email, $pwdMD5, $name, $phone, $address){
 	
 	/* $email = htmlspecialchars(mysqli_real_escape_string($email));
 	$name = htmlspecialchars(mysqli_real_escape_string($name));
 	$phone = htmlspecialchars(mysqli_real_escape_string($phone));
 	$adress = htmlspecialchars(mysqli_real_escape_string($adress)); */
 	
 	$email = htmlspecialchars(mysql_real_escape_string($email));
 	$name = htmlspecialchars(mysql_real_escape_string($name));
 	$phone = htmlspecialchars(mysql_real_escape_string($phone));
 	$address = htmlspecialchars(mysql_real_escape_string($address));
 	
 	$sql = "INSERT INTO
 			users(`email`, `pwd`, `name`, `phone`, `address`)
 			VALUES('{$email}', '{$pwdMD5}', '{$name}', '{$phone}', '{$address}')";
 	
 	/* $rs = mysqli_query($sql); */
 	$rs = mysql_query($sql);
 	
 	if($rs){
 		$sql = "SELECT * FROM users WHERE(`email` = '{$email}' and `pwd` = '{$pwdMD5}') LIMIT 1";
 		
 		$rs = mysql_query($sql);
 		//$rs = mysqli_query($sql);
 		$rs = createSmartyRsArray($rs);
 		
 		if(isset($rs)){
 			$rs['success'] = 1;
 		} else {
 			$rs['success'] = 0;
 		}	
 	} else {
 		$rs['success'] = 0;
 	}
 	
 	return $rs;
 	
 }
 
 /*
  * autorization user
  */
 function loginUser($email, $pwd){
 	$email = htmlspecialchars(mysql_real_escape_string($email));
 	
 	$pwd = md5($pwd);
 	
 	$sql = "SELECT * FROM users WHERE(`email` = '{$email}' and `pwd` = '{$pwd}') LIMIT 1";
 		
 	$rs = mysql_query($sql);

 	$rs = createSmartyRsArray($rs);
 		
 	if(isset($rs[0])){
 		$rs['success'] = 1;
 	} else {
 		$rs['success'] = 0;
 	}
 	
 	return $rs;
 	
 }
 
 /*
  * Change data about user
  */
 function updateUserData($name, $phone, $address, $pwd1, $pwd2, $curPwd){
 	
 	$email = htmlspecialchars(mysql_real_escape_string($_SESSION['user']['email']));
 	$name = htmlspecialchars(mysql_real_escape_string($name));
 	$phone = htmlspecialchars(mysql_real_escape_string($phone));
 	$address = htmlspecialchars(mysql_real_escape_string($address));
 	
 	$pwd1 = trim($pwd1);
 	$pwd2 = trim($pwd2);
 	
 	$newPwd = null;
 	if($pwd1 && ($pwd1 == $pwd2)){
 		$newPwd = md5($pwd1);
 	}
 	
 	$sql = "";
 	$sql .= "UPDATE users SET "; 	
 	
 	if($newPwd){
 		$sql .= " `pwd` = '{$newPwd}', ";
 	}
 	
 	$sql .= " `name` = '{$name}',
 			  `phone` = '{$phone}',
 			  `address` = '{$address}'
 			WHERE 
 				`email` = '{$email}' AND `pwd` = '{$curPwd}'
 			LIMIT 1";	
 	
 	$rs = mysql_query($sql);
 	
 	return $rs;
 }
 
 /**
  * get current user orders
  */
 function getCurUserOrders(){
 
 	$rs = getOrderUser();
 	 	
 	return $rs;
 }
 
 
 
 
 
 
 