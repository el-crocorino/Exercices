<?php
	/**
	 * Created by PhpStorm.
	 * User: wenzek
	 * Date: 09.11.18
	 * Time: 12:38
	 */

	namespace Classes\Controller;

	class ErrorController implements ControllerInterface
	{
		public function execute()
		{
			echo 'This is an error controller';
		}
	}
