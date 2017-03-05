<?php

/**
 * Service function Categories
 */

/**
 *  Get main categories
 */
 function serviceGetAllMainCategories() {
 	
 	$sql = modelGetQueryAllMainCategories();
 	
 	$rs = mysql_query($sql);
 	
 	return createSmartyRsArray($rs);

 }
 
 /**
  * insert new categori
  */
 function insertCat($catName, $catParentId = 0){
 	$sql = modelQueryInsertCategori($catName, $catParentId);
 	
 	mysql_query($sql);
 	
 	return mysql_insert_id();
 	
 }
 
 /**
  * check fill category
  */
 function checkFillCategory($catName){
 	if(empty($catName)){
 		return false;
 	}else{
 		return true;
 	}
 }
 
 /**
  * get all categories
  */
 function getAllCategoies(){
 	$sql = queryGetAllCategories();
 	$rs = mysql_query($sql);
 	
 	return createSmartyRsArray($rs);
 	
 }
 
 /**
  * update category data
  */
 function updateCategoryData($itemId, $parentId = -1, $newName = ''){
 	$set = array();
 	
 	if($newName){
 		$set[] = "`name`= '{$newName}'";
 	}
 	
 	if($parentId > -1){
 		$set[] = "`parent_id`= '{$parentId}'";
 	}
 	
 	$setStr = implode($set, ", ");
 	
 	$sql  = queryUpdateCategory($setStr, $itemId);
 	
 	$rs = mysql_query($sql);
 	
 	return $rs;
 }
 
 
 