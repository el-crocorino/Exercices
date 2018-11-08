<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 29.10.18
	 * Time: 12:33
	 */

	namespace Classes\Controller\Front;


	interface FrontControllerInterface
	{

		public function setController( $pController );
		public function setAction( $pAction );
		public function setParams( array $pParams );
		public function run(  );

	}
