<?php

class Router {
	
	private $routes;
		
	public function __construct(){
				
		$routesPath = ROOT.'/config/routes.php';
		//$routesPath = '../config/routes.php';
		$this->routes = include($routesPath);
		
	}
	
// 	public function run(){
		
// 		//print_r($this->routes);
// 		//echo '<br />Class Router, method run';
		
// 		// Get the query string
// 		$uri = $this->getURI();
// 		//echo $uri;
		
// 		// Check this query in routes.php
// 		foreach ($this->routes as $uriPattern => $path){
// 			//echo "<br> $uriPattern -> $path";
				
// 			if(preg_match("~$uriPattern~", $uri)){
// 				//echo $path;
			
// 				// To determine which controller, and action processes the request
// 				$segments = explode('/', $path);
// 				/* echo '<pre>';
// 				print_r($segments);
// 				echo '<pre>'; */
				
// 				$controllerName = array_shift($segments).'Controller';
				
// 				$controllerName = ucfirst($controllerName);
				
// 				$actionName = 'action'.ucfirst(array_shift($segments));
				
// 				echo "<br> Class: ".$controllerName;
// 				echo "<br> Method: ".$actionName;
				
// 				// Connect the controller class file
// 				$controlleFile = ROOT.'/controllers/'.$controllerName.'.php';
// 				if(file_exists($controlleFile)){
// 					include_once($controlleFile);
// 					//echo 'Файл подключен';
// 				}
				
// 				// Create an object, calls the method
// 				$controllerObject = new $controllerName;
// 				$result = $controllerObject->$actionName();
								
// 				if($result != null){
// 					break;
// 				}
				
				
// 			}
			
			
// 		}
		
// 	}
	
	
	/*
	public function run(){
		
		// Get the query string
		$uri = $this->getURI();
		//echo $uri;
		
		// Check this query in routes.php
		foreach ($this->routes as $uriPattern => $path){
			//echo "<br> $uriPattern -> $path";
			
			if(preg_match("~$uriPattern~", $uri)){
				//echo $path;
				
				// get the inner path of the external according to the rules
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				
				// To determine which controller, and action processes the request
				$segments = explode('/', $internalRoute);
				
				$controllerName = array_shift($segments).'Controller';
				
				$controllerName = ucfirst($controllerName);
				
				$actionName = 'action'.ucfirst(array_shift($segments));
				
 				//echo "<br> class: ".$controllerName;
 				//echo "<br> method: ".$actionName;
				
				$parameters = $segments;
				//echo '<br><pre>';
				//print_r($parameters);
				
				// Connect the controller class file
				$controlleFile = ROOT.'/controllers/'.$controllerName.'.php';
				if(file_exists($controlleFile)){
					include_once($controlleFile);
					//echo 'Файл подключен';
				}
				
 				// Create an object, calls the method
 				$controllerObject = new $controllerName;
 				//$result = $controllerObject->$actionName($parameters);
 				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
				
				if($result != null){
					break;
				}
			}
		}
		
	}
	*/
	
	public function run(){
	
		// Get the query string
		$uri = $this->getURI();
		//echo $uri;
		
		// Check this query in routes.php
		foreach ($this->routes as $uriPattern => $path){
			//echo "<br> $uriPattern -> $path";
			
			if(preg_match("~$uriPattern~", $uri)){
				//echo $path;
				
				// get the inner path of the external according to the rules
				$internalRoute = preg_replace("~$uriPattern~", $path, $uri);
				//echo $internalRoute;
				
				// To determine which controller, and action processes the request
				$segments = explode('/', $internalRoute);
				//print_r($segments);
				
				$controllerName = array_shift($segments).'Controller';
				
				$controllerName = ucfirst($controllerName);
				
				$actionName = 'action'.ucfirst(array_shift($segments));
				
				// array parameters
				$parameters = $segments;
				
				//echo "<br> class: ".$controllerName;
				//echo "<br> method: ".$actionName;
				
				// Connect the controller class file
 				$controlleFile = ROOT.'/controllers/'.$controllerName.'.php';
				//$controlleFile = '../controllers/'.$controllerName.'.php';
 				if(file_exists($controlleFile)){
 					include_once($controlleFile);
					//echo 'Файл подключен';
 				}
				
 				// Create object, calls the method
 				$controllerObject = new $controllerName;
 				
 				//$result = $controllerObject->$actionName();
 				//$result = $controllerObject->$actionName($parameters);
 				$result = call_user_func_array(array($controllerObject, $actionName), $parameters);
 				
 				if($result != null){
 					break;
 				}
				
			}
			
			
		}	
	
	}
		
	/**
	 * Returns request string
	 * @return string
	 */
	private function getURI(){
	
		if(!empty($_SERVER['REQUEST_URI'])){
			return trim($_SERVER['REQUEST_URI'], '/');
		}
	
	}
	
}


