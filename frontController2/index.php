<?php

	use Classes\Dispatcher\Dispatcher;
	use Classes\FrontController\FrontController;
	use Classes\Request\Request;
	use Classes\Response\Response;
	use Classes\Route\Route;
	use Classes\Router\Router;

	$lRequest = new Request( 'http://example.com/test/');
	$lResponse = new Response();

	$lRoute1 = new Route( 'http://example.com/test/', 'Classes\Controller\TestController');
	$lRoute2 = new Route( 'http://example.com/error/', 'Classes\Controller\ErrorController');

	$lRouter = new Router( [$lRoute1, $lRoute2]);

	$lDispatcher = new Dispatcher();
	$lFrontController = new FrontController( $lRouter, $lDispatcher);

	$lFrontController->run( $lRequest, $lResponse);


