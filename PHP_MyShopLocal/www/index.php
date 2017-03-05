<?php

session_start();  // start session

// if in this session not have array cart then need create him
if(!isset($_SESSION['cart'])){
	$_SESSION['cart'] = array();
}

include_once '../config/config.php';			// initialization settings
include_once '../config/db.php';    		    // initialization db
include_once '../library/mainFunctions.php';	// main functions

$controllerName = isset($_GET['controller']) ? ucfirst($_GET['controller']) : 'Index';
//echo $controllerName;

$actionName = isset($_GET['action']) ? $_GET['action'] : 'index';
//echo '<br>'.$actionName;

// Если в сесии есть данные об авторизованом пользователе, то передаем их в шаблон
if(isset($_SESSION['user'])){
	$smarty->assign('arUser', $_SESSION['user']);
}

//Initialization variable templates count elements in cart
$smarty->assign('cartCntItems', count($_SESSION['cart']));

loadPage($smarty, $controllerName, $actionName);