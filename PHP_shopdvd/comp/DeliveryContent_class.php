<?php

require_once "Modules_class.php";

class DeliveryContent extends Modules {
	
	protected $title = "Оплата и доставка";
	protected $meta_desc = "Оплата и доставка в интернет-магазине.";
	protected $meta_key = "оплата, доставка, оплата доставка магазин";
	
	public function getContent() {
		return "delivery";
	}
	
}