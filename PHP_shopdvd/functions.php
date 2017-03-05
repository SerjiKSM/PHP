<?php

require_once "start.php";
require_once "Manage_class.php";
require_once "Url_class.php";

$manage = new Manage();
$url = new URL();
$func = $_REQUEST["func"];

if($func == "add_cart") {
	$manage->addCart();
} elseif ($func == "delete_cart") {
	$manage->deleteCart();
} elseif ($func == "cart") {
	$manage->upDateCart();
} elseif ($func == "order") {
	$success = $manage->addOrder();
} else {
	exit();
}

if($success) {
	$link = $url->message();
}else {
	$link = ($_SERVER["HTTP_REFERER"] != "") ? $_SERVER["HTTP_REFERER"] : $url->index();
}

header("Location: $link");
exit;

