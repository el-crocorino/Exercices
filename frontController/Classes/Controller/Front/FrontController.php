<?php
namespace Classes\Controller\Front;

	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 29.10.18
	 * Time: 12:12
	 */
	class FrontController implements FrontControllerInterface
	{

		const DEFAULT_CONTROLLER = 'IndexController';
		const DEFAULT_ACTION = 'Index';

		protected $mController 	= self::DEFAULT_CONTROLLER;
		protected $mAction		= self::DEFAULT_ACTION;
		protected $mParams		= array();
		protected $mBasePath	= '/php/frontController/';

		public function __construct( array $pOptions = array())
		{

			if( empty( $pOptions)) {
				$this->parseUri();
			} else {

				foreach( array( 'controller', 'action', 'params') as $property) {

					if( isset( $pOptions[$property])) {

						$methodName = 'set' . ucfirst( $property);
						if( method_exists( $this, $methodName)) {
							$this->$methodName( $pOptions[$property]);
						}
					}
				}
			}
		}

		protected function parseUri( $pUri = '')
		{

			$lPath = parse_url( $_SERVER['REQUEST_URI']);

			$lPath = trim( $lPath['path']);
			$lPath = preg_replace( '/[^a-zA-Z0-9]\//', '', $lPath);

			if( strpos( $lPath, $this->mBasePath) === 0) {
				$lPath = substr( $lPath, strlen( $this->mBasePath));
			}

			@list( $lController, $lAction, $lParams) = explode("/", $lPath, 3);

			if( isset( $lController)) {
				$this->setController( $lController);
			}

			if( isset( $lAction)) {
				$this->setAction( $lAction);
			}

			if( isset( $lParams)) {
				$this->setParams( explode( '/', $lParams));
			}
		}

		public function setController( $pController )
		{

			// $lController = ucfirst( strtolower( $pController)) . 'Controller';
			if( strpos( $pController, '_') !== false) {
				str_replace( '_', '\\', $pController);
			}

			$lController = '\Classes\Controller\\' . ucfirst( strtolower( $pController)) . 'Controller';

			if( ! class_exists( $lController)) {
				throw new \InvalidArgumentException( 'The controller ' . $lController . ' has not been defined.');
			}

			$this->mController = $lController;

			return $this;
		}

		public function setAction( $pAction )
		{
			$reflector = new \ReflectionClass( $this->mController);

			if( ! $reflector->hasMethod( $pAction)) {
				throw new \InvalidArgumentException( 'The controller action ' . $pAction. ' has not been defined.' );
			}

			$this->mAction = $pAction;

			return $this;
		}

		public function setParams( array $pParams )
		{
			$this->mParams = $pParams;
			return $this;
		}

		public function run(){
error_log( __METHOD__ . ' : ' . __LINE__ . "\n\t" . var_export( $this->mParams, true));


			call_user_func_array( [new $this->mController, $this->mAction], [$this->mParams]);
		}

	}
