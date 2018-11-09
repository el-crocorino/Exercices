<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 12:02
	 */

	namespace Classes\FrontController;
	use Classes\Router\Router;
	use Classes\Dispatcher\Dispatcher;
	use Classes\Request\RequestInterface;
	use Classes\Response\ResponseInterface;

	class FrontController
	{
		/** @var Router */
		protected $mRouter = null;

		/** @var Dispatcher */
		protected $mDispatcher = null;

		function __construct( Router $pRouter, Dispatcher $pDispatcher)
		{
			$this->mRouter = $pRouter;
			$this->mDispatcher = $pDispatcher;
		}

		public function run( RequestInterface $pRequest, ResponseInterface $pResponse)
		{
			$lRoute = $this->mRouter->route( $pRequest, $pResponse);
			$this->mDispatcher->dispatch( $lRoute, $pRequest, $pResponse);
		}
	}
