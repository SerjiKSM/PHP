<?php

require_once "GlobalMessage_class.php";

abstract class ComplexMessage extends GlobalMessage {
	
	public function getTitle($name) {
		return $this->get($name."_TITLE");
	}
	
	public function getText($name) {
		return $this->get($name."_TEXT");
	}
	
}