<?php

require_once 'request.class.php';
require_once 'view/view.class.php';

/**
* This class is used to provide commun services for all descendants controllers 
*/
abstract class Controller
{
	
	/**
	 * Action to make
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
	
}