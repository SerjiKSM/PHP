<?php

require_once "Config_class.php";
require_once "Email_class.php";

class Mail {
	
	private $config;
	private $emai;
	
	public function __construct() {
		$this->config = new Config();
		$this->emai = new Email();
	}
	
	public function send($to, $data, $template, $from = "") {
		$data["sitename"] = $this->config->sitename;
		if($from == "") $from = $this->config->admemail;
		$subject = $this->emai->getTitle($template);
		$message = $this->emai->getText($template);
		$headers = "From: $from\r\nReply-To: $from\r\nContent-type: text/html; charset=utf-8\r\n";
		foreach ($data as $key => $value) {
			$subject = str_replace("%$key%", $value, $subject);
			$message = str_replace("%$key%", $value, $message);
		}
		$subject = '=?utf-8?B?'.base64_encode($subject).'?=';
		return mail($to, $subject, $message, $headers);
	}
	
	
}