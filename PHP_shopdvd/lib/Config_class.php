<?php

class Config {
	
	public $secret = "DFSJLFAHSHJKJL";
	public $sitename = "ShopDVD.local";
	public $address = "http://shopdvd.local/";
	public $address_admin = "http://shopdvd.local/admin/";
	public $db_host = "localhost";
	public $db_user = "root";
	public $db_password = "";
	public $db_name = "shopdvd-local";
	public $db_prefix = "sdvd_";
	public $sym_query = "{?}";
	
	public $count_on_page = 8;
	public $count_others = 4;

	public $pagination_count = 6;
	
	public $admname = "Serji";
	public $admemail = "sksm@mail.ua";
	public $adm_login = "Admin";
	public $adm_password = "0d19c92f71dc9f541ba13b8781f6015f";
	
	public $dir_text = "lib/text/";
	public $dir_tmpl = "tmpl/";
	public $dir_tmpl_admin = "admin/tmpl/";
	public $dir_img_products = "images/products/";

	public $max_name = 255;
	public $max_title = 255;
	public $max_text = 65535;
	
	public $max_size_img = 102400;
}