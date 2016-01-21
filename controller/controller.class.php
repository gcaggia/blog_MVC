<?php

require_once 'request.class.php';
require_once 'view/view.class.php';

/**
* This class is used to provide commun services for all descendants controllers 
*/
abstract class Controller
{
	
	/**
	 * Action to make representing the method of the object to execute
	 */
	private $ctrlAction;

	/**
	 * Incoming Request
	 */
	private $ctrlRequest;

	/**
	 * Define the incoming request
	 */
	public function ctrlSetRequest(Request $request)
	{
		$this->ctrlRequest = $request;
	}

	/**
	 * Abstract method which is default action of a controller
	 * all the child classe must implement this method
	 */
	public abstract function index();

	/**
	 * This method execute an action passed as a parameter
	 * An action represents a method of the currect controller to execute
	 */
	public function ctrlExecuteAction($action)
	{
		if (method_exists($this, $action)) {
			$this->ctrlAction = $action;
			$this->{$this->ctrlAction}();
		} else {
			$ctrlClassName = get_class($this);
			throw new Exception("Action '$action' undefined in 
				'$ctrlClassName' class");
			
		}
	}

}