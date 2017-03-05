<?php

function loadPage($smarty, $controllerName, $actionName){
	include_once PathPrefix .$controllerName. PathPostfix;

	$function = $actionName.'Action';
	//+
	//Debug_2($function);
	//-
	$function($smarty);

}

function loadTemplate($smarty, $templateName){
	
	$smarty->display($templateName.TemplatePostfix);
	
}

/**
 * function Debug_1 
 * 
 * @param unknown $value
 * @param number $die
 */
function Debug_1($value = null, $die = 1){

	echo "<br><pre> Debug:";
	//print_r($value);
	var_dump($value);
	echo "</pre>";

	if($die) $die;
}

/**
 * function Debug_2 
 * 
 * @param unknown $value
 * @param number $die
 */
function Debug_2($value = null, $die = 1){

	function DebugOut($a){
		
		echo '<br /><br>'. basename( $a['file'] ). '</b>'
				. "&nbsp;<font color='red'>({$a['line']})</font>"
				. "&nbsp;<font color='green'>{$a['function']}()</font>"		
				. "&nbsp; -- ". dirname( $a['file'] );
				
		}
	
	echo "<pre>";
		$traceArray = debug_backtrace();
		array_walk($traceArray, 'DebugOut');
		echo "\n\n";
		var_dump($value);
	echo "</pre>";

	if($die) $die;
}

/**
 * Преобразование результата работы функции выборки в ассоциативный массив
 * @param unknown $rs
 */
function createSmartyRsArray($rs){
	if(!$rs){
		return false;
	}
	
	$smartyRs = array();
	while ($row = mysql_fetch_assoc($rs)){
	
		$smartyRs[] = $row;
	}
	
	return $smartyRs;
}

/*
 * redirect
 */
function redirect($url){
	
	if(! $url){
		$url = '/';	
	}
	
	header("Location: {$url}");
	exit;
	
}

