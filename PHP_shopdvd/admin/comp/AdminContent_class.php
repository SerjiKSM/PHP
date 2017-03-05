<?php

require_once "AdminModules_class.php";

class AdminContent extends AdminModules{
	
	protected $title = "Аккаунт администратора";
	protected $meta_desc = "Аккаунт администратора Интернет-магазин!";
	protected $meta_key = "администратор, аккаунт администратор, аккаунт администратора интернет-магазин";
	
	protected function getContent() {
		$start = $this->format->getTime("", true);
		$end = $this->format->getTime("", false);
		$result = $this->statistics->getDataForAdmin($start, $end);
		$this->template->set("result", $result);
		
		return "index";
	}
	
	// for test pagination
//	protected function getPageCount() {
//		return ceil(25 / $this->config->pagination_count);
//	}
}