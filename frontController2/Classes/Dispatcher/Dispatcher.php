<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 11:53
	 */

	namespace Classes\Dispatcher;
	use Classes\Route\Route;
	use Classes\Request\Request;
	use Classes\Response\Response;


	class Dispatcher
	{
		public function dispatch( Route $pRoute, Request $pRequest, Response $pResponse)
		{
			$lController = $pRoute->createController();
			$lController->execute( $pRequest, $pResponse);
		}
	}
