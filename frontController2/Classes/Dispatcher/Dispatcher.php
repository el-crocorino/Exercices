<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 11:53
	 */

	namespace Classes\Dispatcher;
	use Classes\Route\RouteInterface;
	use Classes\Request\RequestInterface;
	use Classes\Response\ResponseInterface;


	class Dispatcher
	{
		public function dispatch( RouteInterface $pRoute, RequestInterface $pRequest, ResponseInterface $pResponse)
		{
			$lController = $pRoute->createController();
			$lController->execute( $pRequest, $pResponse);
		}
	}
