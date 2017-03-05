<?php

require_once "Modules_class.php";

class ContactsContent extends Modules{
	
	protected $title = "Контакты";
	protected $meta_desc = "Контакты магазина.";
	protected $meta_key = "контакты, обратная связь, администрация";
	
	public function getContent() {
		return "contacts";
	}
	
}