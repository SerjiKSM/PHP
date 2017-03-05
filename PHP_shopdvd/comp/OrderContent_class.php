<?php

require_once "Modules_class.php";

class OrderContent extends Modules{
	
	protected $title = "Заказ";
	protected $meta_desc = "Содержимое заказа";
	protected $meta_key = "заказ, содержимое заказа";
	
	protected function getContent() {
		
		$this->template->set("message", $this->message());
		$this->template->set("name", $_SESSION["name"]);
		$this->template->set("phone", $_SESSION["phone"]);
		$this->template->set("email", $_SESSION["email"]);
		$this->template->set("delivery", $_SESSION["delivery"]);
		$this->template->set("address", $_SESSION["address"]);
		$this->template->set("notice", $_SESSION["notice"]);

		return "order";
	}
	
}