<?php
class Application{
	public function run(){
		$action = isset($_GET['act']) ? strtolower(trim($_GET['act'])) : 'default';
		$action = ucfirst($action) . 'Action';

		call_user_func(array($action, 'run'));
	}
}
?>
