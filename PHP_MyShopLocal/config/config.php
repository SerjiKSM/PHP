<?php
// Constants
define('PathPrefix', '../controllers/');
define('PathPostfix', 'Controller.php');

// The use of templates
//$template = 'default';
$template = 'texturia';
$templateAdmin = 'admin';

// The path to the template files
define('TemplatePrefix', "../views/{$template}/");
define('TemplateAdminPrefix', "../views/{$templateAdmin}/");
define('TemplatePostfix', '.tpl');

// The path to the template files in the web space
define('TemplateWebPath', "/templates/{$template}/");
define('TemplateAdminWebPath', "/templates/{$templateAdmin}/");

// initialize the Smarty template
// put full path to Smarty.class.php
require ('../library/Smarty/smarty-3.1.30/libs/Smarty.class.php');
$smarty = new Smarty();

$smarty->setTemplateDir(TemplatePrefix);
$smarty->setCompileDir('../tmp/smarty/templates_c');
$smarty->setCacheDir('../tmp/smarty/cache');
$smarty->setConfigDir('../library/Smarty/smarty-3.1.30/demo/configs');

$smarty->assign('templateWebPath', TemplateWebPath);