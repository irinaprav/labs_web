<?php
include './config/db.php';
include "./view/index.php";
require './controller/AuthorizationController.php';
require './controller/LogoutController.php';
require './controller/RegistrationController.php';

	if ($_GET['controller'] == 'auth') {
		$c = new Controller();
		$c->auth(); 
	}
	elseif ($_GET['controller'] == 'register') {
		$c = new RegController();
		$c->register();
	}
	elseif($_GET['controller'] == 'logout'){
		$c = new LogController();
		$c->logout();
	}

?>






