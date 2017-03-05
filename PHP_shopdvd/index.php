<?php

require_once "start.php";

require_once "Url_class.php";

$url = new URL();
$view = $url->getView();

//$class = $view."Content";
$class = mb_strtolower($view."Content");

if($url->fileExists($class."_class.php")) {
	require_once $class."_class.php";
	new $class();
}else {
	//page 404 error
//	require_once "comp/NotFoundContent_class.php";
//	new NotFoundContent();
	
	header("Location: ".$url->notFound());
	exit;
}
