<?php
session_start();
	require_once '../inc/database.php';
	
	include_once 'modelAdmin/ModelAdmin.php';
	include_once 'modelAdmin/ModelCategory.php';
	include_once 'modelAdmin/ModelProducts.php';
	include_once 'modelAdmin/ModelUsers.php';

	include_once 'controllerAdmin/ControllerAdmin.php';
	include_once 'controllerAdmin/ControllerProducts.php';
	include_once 'ControllerAdmin/ControllerCategory.php';
	include_once 'ControllerAdmin/ControllerUsers.php';

	include'routeAdmin/routing.php';
	echo $response;
?>
