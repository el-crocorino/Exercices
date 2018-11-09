<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 10:43
	 */

	namespace Classes\Request;

	class Request implements RequestInterface
	{

		protected $mUri = '';
		protected $mParams = [];

		public function __construct( $pUri, $pParams)
		{
			$this->mUri = $pUri;
			$this->mParams = $pParams;
		}

		public function getUri(  ) : string
		{
			return $this->mUri;
		}

		public function setParam( $pKey, $pValue ) : Request
		{
			$this->mParams[$pKey] = $pValue;
			return $this;
		}

		public function getParam( $pKey )
		{
			if( ! isset( $this->mParams[$pKey])) {
				throw new \InvalidArgumentException( 'The request parameter with the key ' . $pKey . ' is invalid');
			}

			return $this->mParams[$pKey];
		}

		public function getParams() : array
		{
			return $this->mParams;
		}
	}
