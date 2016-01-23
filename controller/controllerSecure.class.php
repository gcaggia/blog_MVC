<?php 

require_once 'framework/controller.class.php';

/**
* Parent class of controllers which need authentification process
*/
abstract class ControllerSecure extends Controller
{
    
    public function ctrlExecuteAction($action)
    {
        if ($this->ctrlRequest->requestGetSession()
                ->sessionExistAttribut("idUser")) {
            parent::ctrlExecuteAction($action);
        } else {
            $this->ctrlRedirection("connexion");
        }

    }
}