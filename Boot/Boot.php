<?php

namespace Boot;

use Autoload\Autoload as Autoload;

class Boot {

	/*Properties
	**
	**
	**
	*/

	/*Methods
	**
	**
	**
	*/

	public function construct () {


	}
	
	/**
	 * Method boot
	 *
	 * @return void
	 */
	public function boot () {

		require_once('Autoload/Autoload.php');

		$config = require_once('Config.php');

		$dirs = $config['dirs']['dirs'];

		return Autoload::init($dirs);

	}

}
