<?php

require_once "ComplexMessage_class.php";

class PageMessage extends ComplexMessage {
	
	public function __construct() {
		parent::__construct("page_messages");
	}
	
}