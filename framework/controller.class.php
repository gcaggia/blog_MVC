<?php

require_once 'request.class.php';
require_once 'view.class.php';

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
	protected $ctrlRequest;

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

	/**
	 * Generate the view linked to the current controller
	 */
	protected function ctrlGenerateView($dataView = array(), $action = null)
	{	
		$viewAction = $this->ctrlAction;

		if ($viewAction != null) {
			$viewAction = $action;
		}

		// Determination of the filename of the view from current controller name
		$ctrlClassName = get_class($this);
		$viewName = str_replace("Controller", "", $ctrlClassName);

		// Instanciation and creation of the view
		$view = new view($viewAction, $viewName);
		$view->generate($dataView);
	}

	/**
	 * Make a redirection to a specific action / controller
	 */
	protected function ctrlRedirection($controller, $action = null)
	{
		$webRoot = Configuration::get("webRoot", "/");

		//Redirection to URL webRoot/controller/Action
		header("Location : " . $webRoot . $controller . "/" . $action);
	}

}