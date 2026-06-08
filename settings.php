<?php
require 'vendor/autoload.php';
use Smarty\Smarty;

$teams = [];
for ($i = 1; $i <= 16; $i++) {
    $id = str_pad($i, 2, '0', STR_PAD_LEFT);
    $teams[] = [
        'id' => $id,
        'configured' => file_exists('sounds/team_' . $id . '.mp3'),
    ];
}

$smarty = new Smarty();
$smarty->setTemplateDir('./smarty/templates');
$smarty->setConfigDir('/.smarty/config');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');
$smarty->assign('teams', $teams);
$smarty->display('settings.tpl');
