<?php

	use Classes\Controller\Front\FrontController;
	require_once __DIR__ . '/vendor/autoload.php';

	$frontControllerOptions = [
		"controller" => "test",
		"action"     => "show",
		"params"     => [ 1 ]
	];

	$frontController = new FrontController( /*$frontControllerOptions*/);
	$frontController->run();
