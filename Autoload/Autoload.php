<?php

/*
** Autoloader class based on https://subscription.packtpub.com/book/application_development/9781785883446/1/ch01lvl1sec14/implementing-class-autoloading
** To be used with compiler local dev
*/

namespace Autoload;

class Autoload {

	/*Properties
	**
	**
	**
	*/

	public static $dirs = array();

	public static $singleton;

	/*Methods
	**
	**
	**
	*/
	
	/**
	 * Method __construct
	 *
	 * @param $dirs $dirs [explicite description]
	 *
	 * @return void
	 */
	public function __construct ($dirs) {

		if ($dirs) {
			
			self::init($dirs);

		} else {

			echo 'Error: must provide a directory to search';

			exit;

		}

	}

	/**
	 * Method init
	 *
	 * @param $dirs $dirs [explicite description]
	 *
	 * @return void
	 */
	public static function init ($dirs) {

		// add directories passed in to object $dirs variable

		if ($dirs) {

			self::add_dirs($dirs);

		}

		if (self::$singleton == 0) {
			
			spl_autoload_register(__CLASS__ . '::auto_load');

			self::$singleton ++;

			return TRUE;

		}

	}
	
	/**
	 * Method add_dirs
	 *
	 * @param $dirs $dirs [explicite description]
	 *
	 * @return void
	 */
	public static function add_dirs ($dirs) {

		if (is_array($dirs)) {

			self::$dirs = array_merge(self::$dirs, $dirs);

		} else {

			self::$dirs[] = $dirs;

		}

	}
	
	/**
	 * Method load_file
	 *
	 * @param $file $file [explicite description]
	 *
	 * @return void
	 */
	public static function load_file ($file) {

		if (file_exists($file)) {

			require_once ($file);

			return TRUE;

		}

		return FALSE;

	}
	
	/**
	 * Method auto_load
	 *
	 * @param $class_name $class_name [explicite description]
	 *
	 * @return void
	 */
	public static function auto_load ($class_name) {

		$success = FALSE;

		$new_class_name = str_replace('\\', DIRECTORY_SEPARATOR, $class_name);

		$new_file_name = $new_class_name . '.php';

		foreach (self::$dirs as $dir) {

			$file = $dir . DIRECTORY_SEPARATOR . $new_file_name;

			if (self::load_file($file)) {

				$success = TRUE;

				break;

			}

		}

		if ($success == FALSE) {

			$file = $dir . DIRECTORY_SEPARATOR . $new_file_name;

			if (self::load_file($file) == FALSE) {

				echo 'ERROR: file not found.';

				$success = FALSE;

			}

		}

		return $success;
		
	}

}