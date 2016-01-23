<?php 

/**
* The aim of this class is to model an HTTP request
*/
class Request
{
	/**
	 * Parammeters of the request
	 */
	private $requestParams;

	function __construct($params)
	{
		$this->requestParams = $params;
	}

	/**
	 * return true if the parameter exists in the HTTP request
	 */
	public function requestParamExist($name)
	{
		return (isset($this->requestParams[$name]) 
			    && $this->requestParams[$name] != "");
	}

	/**
	 * return the value of the parameter asked
	 * throw an exception if the parameter $name is not found
	 */
	public function requestGetParam($name)
	{
		if($this->requestParamExist($name)) {
			return $this->requestParams[$name];
		} else {
			throw new Exception("'$name' parameter does not exist in the request...");
		}
	}
}
