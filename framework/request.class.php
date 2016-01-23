<?php 

require_once 'session.class.php';

/**
* The aim of this class is to model an HTTP request
*/
class Request
{
	/**
	 * Parameters of the request
	 */
	private $requestParams;

	/**
	 * session object linked with the request
	 */
	private $session;	

	function __construct($params)
	{
		$this->requestParams = $params;
		$this->session = new Session();
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

	/**
	 * Return session object linked with the request
	 * @return Session Objet session
	 */
	 public function requestGetSession() {
	 	return $this->session;
	 }
}
