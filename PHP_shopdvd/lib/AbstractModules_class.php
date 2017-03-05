<?php

require_once "Config_class.php";
require_once "Url_class.php";
require_once "Format_class.php";
require_once "Template_class.php";
require_once "Section_class.php";
require_once "Product_class.php";
require_once "Discount_class.php";
require_once "Message_class.php";
require_once "Order_class.php";

abstract class AbstractModules {
	
	protected $config;
	protected $data;
	protected $url;
	protected $format;
	protected $section;
	protected $product;
	protected $discount;
	protected $message;
	protected $order;
	
	public function __construct() {
		session_start();
		$this->config = new Config();
		$this->url = new URL();
		$this->format = new Format();
						
		$this->data = $this->format->xss($_REQUEST);
		
//		print_r($this->data);
//	    exit();
		
		$this->template = new Template($this->getDirTmpl());
		$this->section = new Section();
		$this->product = new Product();
		$this->discount = new Discount();
		$this->message = new Message();
		$this->order = new Order();
	}
		
	abstract protected function getContent();
		
	protected function notFound(){
		$this->redirect($this->url->notFound());
	}
	
	protected function message() {
		if(!$_SESSION["message"]) {
			return "";
		} else {
			$text = $this->message->get($_SESSION["message"]);
			unset($_SESSION["message"]);
			return $text;
		}
	}
	
	protected function redirect($link) {
		header("Location: $link");
		exit;
	}
	
	abstract protected function getDirTmpl();
	
	protected function getCountInArray($v, $array) {
		$count = 0;
		for($i = 0; $i < count($array); $i++) {
			if($array[$i] == $v) {
				$count ++;
			}
		}
		return $count;
	}
	
}