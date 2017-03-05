<?php

require_once "Config_class.php";
require_once "Format_class.php";
require_once "Product_class.php";
require_once "Discount_class.php";
require_once "Order_class.php";
require_once "SystemMessage_class.php";
require_once "Mail_class.php";

class Manage {
	
	protected $config;
	protected $format;
	protected $product;
	protected $discount;
	protected $order;
	
	public function __construct() {
		session_start();
		$this->config = new Config();
		$this->format = new Format();
		$this->product = new Product();
		$this->order = new Order();
		$this->discount = new Discount();
		$this->mail = new Mail();
		$this->sm = new SystemMessage();
		$this->data = $this->format->xss($_REQUEST);
		$this->saveData();
		
	}
	
	private function saveData() {
				
		foreach ($this->data as $key => $value) {
			$_SESSION[key] = $value;
			
			// ksm+
			//echo "$key => $value" ;
			//echo "<br>";
			// ksm-
		}
	}
	
	public function addCart($id = false) {
		if(!$id){
			$id = $this->data["id"];
		}
		
		if(!$this->product->existID($id)) {
			return false;
		}
		if($_SESSION["cart"]){
			$_SESSION["cart"] .= ",$id";
		} else {
			$_SESSION["cart"] = $id;
		}
 		
	}

	public function deleteCart() {
		$id = $this->data["id"];
		$ids = explode(",", $_SESSION["cart"]);
		$_SESSION["cart"] = "";
		for($i = 0; $i < count($ids); $i++) {
			if($ids[$i] != $id) {
				$this->addCart($ids[$i]);
			}
		}
	}
	
	public function upDateCart(){
		$_SESSION["cart"] = "";
		foreach($this->data as $k => $v) {
			if(strpos($k, "count_") !== false) {
				$id = substr($k, strlen("count_"));
				for($i = 0; $i < $v; $i++) {
					$this->addCart($id);
				}
			}
		}
		
		$_SESSION["discount"] = $this->data["discount"];
		
	}
	
	public function addOrder() {
		
		$temp_data = array();
		$temp_data["delivery"] = $this->data["delivery"];
		$temp_data["product_ids"] = $_SESSION[cart];
		$temp_data["name"] = $this->data["name"];
		$temp_data["price"] = $this->getPrice();
		$temp_data["phone"] = $this->data["phone"];
		$temp_data["email"] = $this->data["email"];
		$temp_data["address"] = $this->data["address"];
		$temp_data["notice"] = $this->data["notice"];
		$temp_data["date_order"] = $this->format->ts();
		$temp_data["date_send"] = 0;
		$temp_data["date_pay"] = 0;
		if($this->order->add($temp_data)) {
			//echo "111111";
			// ksm+ set session order
			$_SESSION["name"] = $this->data["name"];
			$_SESSION["phone"] = $this->data["phone"];
			$_SESSION["email"] = $this->data["email"];
			$_SESSION["delivery"] = $this->data["delivery"];
			$_SESSION["address"] = $this->data["address"];
			$_SESSION["notice"] = $this->data["notice"];
			
			$_SESSION["cart"] = "";
			// ksm-
			
			$send_data = array();
			$send_data["products"] = $this->getProducts();
			$send_data["name"] = $temp_data["name"];
			$send_data["phone"] = $temp_data["phone"];
			$send_data["email"] = $temp_data["email"];
			$send_data["address"] = $temp_data["address"];
			$send_data["notice"] = $temp_data["notice"];
			$send_data["price"] = $temp_data["price"];

			$this->mail->send($temp_data["email"], $send_data, "ORDER");
			
			return $this->sm->pageMessage("ADD_ORDER");
		}
		
		// ksm+ set session  order
		$_SESSION["name"] = $this->data["name"];
		$_SESSION["phone"] = $this->data["phone"];
		$_SESSION["email"] = $this->data["email"];
		$_SESSION["delivery"] = $this->data["delivery"];
		$_SESSION["address"] = $this->data["address"];
		$_SESSION["notice"] = $this->data["notice"];
		// ksm-
		//echo "222222";
		
		return false;
	}
	
	private function getProducts() {
		$ids = explode(",", $_SESSION["cart"]);
		$products = $this->product->getAllOnIDs($ids);
				
		$result = array();
		for($i = 0; $i < count($products); $i++) {
			$result[$products[$i]["id"]] = $products[$i]["title"];
		}
				
		$products = array();
		for($i = 0; $i < count($ids); $i++) {
			$products[$ids[$i]][0]++;
			$products[$ids[$i]][1] = $result[$ids[$i]];
		}
		
		$str = "";
		foreach ($products as $value) {
			$str .= $value[1]." x " .$value[0].", ";
		}
		$str = substr($str, 0, -2);

//		print_r($products);
//		echo $str;
//		exit();
		
		return $str;
	}
	
	private function getPrice() {
		$ids = explode(",", $_SESSION["cart"]);
		$summa = $this->product->getPriceOnIDs($ids);
		$values = $this->discount->getValueOnCode($_SESSION["discount"]);
		if($values) {
			$summa *= (1 - $values);
		}
		return $summa;
	}
	
}