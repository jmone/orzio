<?php
define('ROOT_DIR', dirname(__FILE__) . '/');
include ROOT_DIR . 'libs/framework/Application.php';
include ROOT_DIR . 'action/DefaultAction.php';

$app = new Application();
$app->run(); 
?>
