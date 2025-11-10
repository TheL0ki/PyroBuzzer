<?php
require 'vendor/autoload.php';
use Smarty\Smarty;
$smarty = new Smarty();

$smarty->setTemplateDir('./smarty/templates');
$smarty->setConfigDir('/.smarty/config');
$smarty->setCompileDir('./smarty/templates_c');
$smarty->setCacheDir('./smarty/cache');

$dir = array_diff(scandir('history'), array('..', '.'));

$history = [];

foreach($dir as $filename) {
	$file = fopen('history/' . $filename, 'r');
	while(!feof($file)) {
        $line = json_decode(fgets($file), true);
        if($line) {
		    $history[$filename][] = $line;
        }
	}
    fclose($file);
}

$smarty->assign('history', $history);
$smarty->display('history.tpl');