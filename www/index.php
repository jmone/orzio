<?php
define('ROOT_DIR', dirname(__FILE__) . '/');
include ROOT_DIR . 'libs/framework/Application.php';
include ROOT_DIR . 'model/DB.php';
include ROOT_DIR . 'model/MessageModel.php';
include ROOT_DIR . 'model/ChannelModel.php';
include ROOT_DIR . 'action/DefaultAction.php';
include ROOT_DIR . 'action/ChannelAction.php';
include ROOT_DIR . 'action/SendAction.php';
include ROOT_DIR . 'action/ViewAction.php';

$app = new Application();
$app->run(); 
?>
