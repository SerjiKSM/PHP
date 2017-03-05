<?php

require_once "ComplexMessage_class.php";

class Email extends ComplexMessage {
	
	public function __construct() {
		parent::__construct("emails");
	}
	
}