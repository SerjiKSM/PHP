<?php

//define('__ROOT__', dirname(dirname(__FILE__)));
//require_once(__ROOT__.'/www/core/validatorexception_class.php');
//
//$error = "Hello!!!!";
//echo $error;
//echo "\n";
//
//$validatorException = new ValidatorException($error);
//print_r($validatorException->getErrors());


$a = 0;
$b = null;
$c = "0";

$res_ab = $a == $b;
$res_ac = $a == $c;
$res_bc = $b == $c;
echo "$res_ab"." - "."$res_ac"." - "."$res_bc\n";
print("$res_ab"." - "."$res_ac"." - "."$res_bc");
