<?php

require_once "start.php";

require_once "Url_class.php";
//require_once "UrlAdmin_class.php";

//$url = new URLAdmin();
$url = new URL();
//$view = $url->getView();

//$class = "admin".$_GET["view"]."Content";
$class = mb_strtolower("admin".$_GET["view"]."Content");

//echo $_GET["view"];
//echo $class;
//exit;

if($url->fileExists($class."_class.php")) {
	
	//echo "TEST";
	
	require_once $class."_class.php";
	new $class();
}else {
	// page 404 error
	header("Location: ".$url->notFound());
	exit;
}



