<?php
require_once('libs/Smarty.class.php');
$smarty = new Smarty();
$smarty->setTemplateDir('templates');
$smarty->setCompileDir('templates_c');
$smarty->setCacheDir('cache');

include "../db_connect.php";
include "../festival_class.php";

$festival = new Festival($conn);
$resultaten = $festival->getallfestivals();

$smarty->assign('festivals', $resultaten);

$smarty->display('festival.tpl');
?>
