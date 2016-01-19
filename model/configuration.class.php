<?php 

/**
* This class manage configuration in order to get parameters 
* from a file config to connect to the database
*/
class Configuration
{
	private static $parameters;

	/**
	 * Return the value of a config parameter
	 */
	public static function get($name, $defaultValue = null)
	{
		if (isset(self::getParameters()[$name])) {
			$value = self::getParameters()[$name];
		} else {
			$value = $defaultValue;
		}

		return $value;
	}

	/**
	 * Return all the parameters of the app to connect to the database
	 * Load the file if necessary
	 */
	private static function getParameters()
	{
		if(self::$parameters == null) {

			$filePath = dirname(__DIR__) . "/configuration/prod.ini";

			if (file_exists($filePath) == false) {
				$filePath = dirname(__DIR__) . "/configuration/dev.ini";
			}

			if (file_exists($filePath) == false) {
				throw new Exception("No configuration file found...");
			} else {
				self::$parameters = parse_ini_file($filePath);
			}

		} 
		
		return self::$parameters;
	}
}