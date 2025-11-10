<?php
require 'vendor/autoload.php';
use Smarty\Smarty;
$smarty = new Smarty();

$smarty->setTemplateDir('./smarty/templates');
$smarty->setConfigDir('/.smarty/config');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');

$smarty->display('index.tpl');
