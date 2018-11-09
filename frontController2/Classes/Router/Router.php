<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 11:27
	 */

	namespace Classes\Router;
	use Classes\Route\RouteInterface;
	use Classes\Route\Route;
	use Classes\Request\RequestInterface;
	use Classes\Response\ResponseInterface;

	class Router
	{
		protected $mRoutes = [];

		public function __construct( $pRoutes)
		{
			$this->addRoutes( $pRoutes);
		}

		public function addRoute( RouteInterface $pRoute ) : Router
		{
			$this->mRoutes[] = $pRoute;
			return $this;
		}

		public function addRoutes( array $pRoutes ) : Router
		{
			foreach( $pRoutes as $lRoute ) {
				$this->addRoute( $lRoute);
			}
			return $this;
		}

		public function getRoutes() : array
		{
			return $this->mRoutes;
		}

		public function route( RequestInterface $pRequest, ResponseInterface $pResponse ) : Route
		{

			foreach( $this->mRoutes as $lRoute ) {
				/** @var $lRoute Route */
				if( $lRoute->match( $pRequest)) {
					return $lRoute;
				}
			}

			$pResponse->addHeader( "404 Page Not Found")->send();
			throw new \OutOfRangeException('no route matched the given URI: ' . $pRequest->getUri());

		}
	}
