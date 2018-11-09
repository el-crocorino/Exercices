<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 11:08
	 */

	namespace Classes\Request;


	interface RequestInterface
	{

		public function getUri() : string;
		public function setParam( $pKey, $pValue ) : Request;
		public function getParam( $pKey );
	}
