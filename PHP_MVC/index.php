
<?php

	// FRONT CONTROLLER
	

	// 1. ����� ���������
	// Display errors
	ini_set('display_errors', 1);
	error_reporting(E_ALL);
	
	// 2. ����������� ������ �������
	define('ROOT', dirname(__FILE__));
	
	require_once (ROOT.'/components/Router.php');
	require_once (ROOT.'/components/Db.php');
	
	// 3. ��������� ���������� � ��
	

	// 4. ����� Router
	$rout = new Router();
	$rout->run();

	//testFormatData();
	//////////////////////////////////////////////
	
	function testFormatData(){
		// format: dd-mm-yyyy
		$string = '20-10-2016';
		
		// ��� 2016, ����� 10, ���� 21
		$pattern = '/([0-9]{2})-([0-9]{2})-([0-9]{4})/';
		
		$replacement = '<br> Year $3, month $2, day $1';
		
		echo preg_replace($pattern, $replacement, $string);
		
		// Month: 10, Day: 20, Year: 2016!  
		$replacement2 = '<br> Month: $2, Day: $1, Year: $3';
		
		echo preg_replace($pattern, $replacement2, $string);
	}




