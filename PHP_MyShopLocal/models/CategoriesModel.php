<?php

/**
 * Получить дочерние категории
 * 
 */
function getChildrenForCat($catId){
	$catId = intval($catId);
	
	$sql = "SELECT * FROM categories WHERE parent_id = '{$catId}'";
	
	$rs = mysql_query($sql);
	
	return createSmartyRsArray($rs);
}


/**
 * Модель для таблицы категорий (categories)
 */
function getAllMainCatsWithChildren(){
	//echo 'test';
	$sql = "SELECT * FROM categories WHERE parent_id = 0";
	
	$rs = mysql_query($sql);
	
	$smartyRs = array();
	while ($row = mysql_fetch_assoc($rs)){
		
		$rsChildren = getChildrenForCat($row['id']);
		if ($rsChildren){
			$row['children'] = $rsChildren;
		}
		
		$smartyRs[] = $row;
	}
	
	return $smartyRs;
}

/**
 * get category by id 
 */

function getCatById($catId){
	$catId = intval($catId);
	
	$sql = "SELECT * FROM `categories` WHERE id = {$catId}";
	
	$rs = mysql_query($sql);
	
	return mysql_fetch_assoc($rs);
}


/**
 * Get all main categories
 */
function modelGetQueryAllMainCategories(){
	return 'SELECT * FROM categories WHERE parent_id = 0';
}

/**
 * Add new categori
 */
function modelQueryInsertCategori($catName, $catParentId){
	return "INSERT INTO	categories (`parent_id`, `name`) VALUES ('{$catParentId}', '{$catName}')";
}

/**
 * get all categories
 */
function queryGetAllCategories(){
	return 'SELECT * FROM categories ORDER BY parent_id ASC';
}

function queryUpdateCategory($setStr, $itemId){
	return "UPDATE categories SET {$setStr} WHERE id = '{$itemId}'";
}

