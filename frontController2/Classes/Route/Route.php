<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 11:03
	 */

	namespace Classes\Route;
	use Classes\Request\RequestInterface;
	use Classes\Controller\ControllerInterface;


	class Route
	{
		protected $mPath = '';
		protected $mControllerClass = '';
		protected $mRoutes = [];

		public function __construct( $pPath, $pControllerClass )
		{
			$this->mPath = $pPath;
			$this->mControllerClass = $pControllerClass;
			return $this;
		}

		public function match( RequestInterface $pRequest ) : bool
		{
			return $this->mPath === $pRequest->getUri();
		}

		public function createController() : ControllerInterface
		{
			return new $this->mControllerClass;
		}
	}
