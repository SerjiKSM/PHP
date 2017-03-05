<?php

require_once "GlobalClass_class.php";

class Section extends GlobalClass {
	
	public function __construct()
	{
		parent::__construct("sections");
	}
	
	public function getAllData() {
		return $this->transform($this->getAll("id"));
	}
	
	public function getTableData($count, $offset) {
		return $this->transform($this->getAll("id", true, $count, $offset));
	}
	
	public function get($id) {
		return $this->transform(parent::get($id));
	}
	
	protected function transformElement($section){
		$section["link"] = $this->url->section($section["id"]);
		$section["link_admin_edit"] = $this->url->adminEditSection($section["id"]);
		$section["link_admin_delete"] = $this->url->adminDeleteSection($section["id"]);
		return $section;
	}
	
	public function checkData($data){
		if(!$this->check->title($data["title"])){
			return "ERROR_TITLE";
		}
		return true;
	}
	
}