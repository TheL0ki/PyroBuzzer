<?php
require 'vendor/autoload.php';
require 'teams.php';

use Smarty\Smarty;

$smarty = new Smarty();
$smarty->setTemplateDir('./smarty/templates');
$smarty->setConfigDir('/.smarty/config');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');
$smarty->assign('teams', get_all_teams());
$smarty->display('settings.tpl');
