<?php

return array(
		
		//'news/77'=>'news/view',
		//'news/15'=>'news/view',
		//'news/([0-9]+)'=>'news/view',
		//'news/([a-z]+)/([0-9]+)'=>'news/view/$1/$2',
		//'news/([0-9]+)'=>'news/view/$1',
			
		//'news'=>'news/index',    // actionIndex in NewsController
		//'products'=>'product/list', // // actionList in ProductController
				
		//'tutorial/index.php'=>'tutorial/index'
		//'tutorial/index.php'=>'tutorial/index/$1/$2'
		
		'product/([0-9]+)'=>'product/view/$1', 			// actionList in ProductController
		
		'catalog'=>'catalog/index',    					// actionIndex in CatalogController
		
		'category/([0-9]+)/page-([0-9]+)'=>'catalog/category/$1/$2',		// actionCategory in CatalogController
		
		'category/([0-9]+)'=>'catalog/category/$1',		// actionCategory in CatalogController
		
		'cart/checkout' => 'cart/checkout', // actionCheckOut в CartController
		'cart/delete/([0-9]+)' => 'cart/delete/$1', // actionDelete в CartController
		'cart/add/([0-9]+)'=>'cart/add/$1',		// actionAdd in CartController'
		'cart/addAjax/([0-9]+)'=>'cart/addAjax/$1',		// actionAdd in CartController
				
		'cart/addAmountAjax/([0-9]+)/([0-9]+)'=>'cart/addAmountAjax/$1/$2',		// actionAddAmount in CartController
		
		'cart/changeValueInCart/([0-9]+)/([0-9]+)'=>'cart/changeValueInCart/$1/$2',
		
		'cart'=>'cart/index',		// actionIndex in CartController'
		
		'user/register' => 'user/register',
		'user/login' => 'user/login',
		'user/logout' => 'user/logout',
		
		'cabinet/edit' => 'cabinet/edit',
		'cabinet' => 'cabinet/index',
		
		// Управление товарами:
		'admin/product/create' => 'adminProduct/create',
		'admin/product/update/([0-9]+)' => 'adminProduct/update/$1',
		'admin/product/delete/([0-9]+)' => 'adminProduct/delete/$1',
		'admin/product' => 'adminProduct/index',
		// Управление категориями:
		'admin/category/create' => 'adminCategory/create',
		'admin/category/update/([0-9]+)' => 'adminCategory/update/$1',
		'admin/category/delete/([0-9]+)' => 'adminCategory/delete/$1',
		'admin/category' => 'adminCategory/index',
		// Управление заказами:
		'admin/order/update/([0-9]+)' => 'adminOrder/update/$1',
		'admin/order/delete/([0-9]+)' => 'adminOrder/delete/$1',
		'admin/order/view/([0-9]+)' => 'adminOrder/view/$1',
		'admin/order' => 'adminOrder/index',
		
		// admin panel:
		'admin' => 'admin/index',
			
		'blog' => 'blog/index',
		
		// about shop:
		'contacts' => 'site/contact',
		
		'about' => 'site/about',
		
		// Главная страница
		//'index.php' => 'site/index', 					// actionIndex в SiteController
		''=>'site/index',    							// actionIndex in SiteController
	);