<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 10:54
	 */

	namespace Classes\Response;


	class Response
	{

		protected $mVersion = '';
		protected $mHeaders = [];

		public function __construct( $pVersion = '')
		{
			$this->mVersion = $pVersion;
		}

		public function getVersion() : string
		{
			return $this->mVersion;
		}

		public function addHeader( $pHeader ) : Response
		{
			$this->mHeaders[] = $pHeader;
			return $this;
		}

		public function addHeaders( array $pHeaders ) : Response
		{
			foreach( $pHeaders as $lHeader) {
				$this->addHeader( $lHeader);
			}
			return $this;
		}

		public function send()
		{
			if( ! headers_sent()) {
				foreach( $this->mHeaders as $lHeader ) {
					header($this->mVersion . ' ' . $lHeader, true);
				}
			}
		}
	}
