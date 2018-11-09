<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 12:38
	 */

	namespace Classes\Controller;


	class TestController implements ControllerInterface
	{
		public function execute()
		{
			echo 'This is a test controller';
		}
	}
