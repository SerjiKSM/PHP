<?php

require_once "Modules_class.php";

class SearchContent extends Modules{
	
	protected function getContent() {
		
		$q = $this->data["q"];
		$this->title = "Поиск: $q";
		$this->meta_desc = "Поиск: $q.";
		$this->meta_key = preg_replace("/\s+/i", ", ", mb_strtolower($q));
		
		$this->template->set("q", $q);
		$this->setLinkSort();
		$this->template->set("table_products_title", "Поиск");
		$this->template->set("products", $this->product->searchText($q, $this->data["sort"], $this->data["up"]));
		
		return "search";
	}
	
}