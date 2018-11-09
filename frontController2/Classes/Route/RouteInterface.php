<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 11:13
	 */

	namespace Classes\Route;
	use Classes\Request\RequestInterface;
	use Classes\Controller\ControllerInterface;

	interface RouteInterface
	{

		public function match( RequestInterface $pRequest ) : bool;
		public function createController() : ControllerInterface;
	}
