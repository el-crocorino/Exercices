<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 08.11.18
	 * Time: 10:09
	 */

	namespace Classes\Controller;
	use Classes\Controller\ControllerInterface;


	class TestController
	{

		protected $mParams = [];

		public function __construct()
		{
		}

		public function setParams( array $pParams )
		{
			$this->mParams = $pParams;
		}

		public function run()
		{
		}

		public function show( $pParams = []) {

			if( ! empty( $pParams)) {

				if( is_array( $pParams)) {

					foreach( $pParams as $lKey => $lParam) {
						echo 'Param #' . $lKey . ': ' . $lParam . '. <br/>';
					}

				} else {
					echo 'Param : ' . $pParams . '. <br/>';
				}

			}
		}

	}
