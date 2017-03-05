<?php

/**
 * initialization connecting to Database    
*/

$dblocation="127.0.0.1";
$dbname = "myshop";
$dbuser = "root";
$dbpasswd = "";

// connecting to db
$db = mysql_connect($dblocation, $dbuser, $dbpasswd);

if(! $db){
	echo "Ошибка доступа к MySql";
	exit();
}

//sets the encoding for the current connection
mysql_set_charset('utf8');

//error
if(!mysql_select_db($dbname, $db)){
	echo "Ошибка доступа к базе данных: ($dbname)";
	exit();
}







