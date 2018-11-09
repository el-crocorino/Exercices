<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 11:14
	 */

	namespace Classes\Response;


	interface ResponseInterface
	{

		public function getVersion() : string;
		public function addHeader( $pHeader) : Response;
		public function send();

	}
