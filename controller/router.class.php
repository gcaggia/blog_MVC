<?php 

require_once 'request.class.php';
require_once 'view/view.class.php';

class router 
{

    /**
     * Route an incoming Request : execute the associated action
     */
    public function routerRequest()
    {
        try {
            $request    = new Request($_Request);
            $controller = $this->routerCreateController($request);
            $action     = $this->routerCreateAction($request);

            //Execution of the action
            $controller->ctrlExecuteAction($action);

        } catch (Exception $e) {
            $this->routerError($e);
        }
    }



    private function routerError(Exception $exception)
    {
        $view = new View("viewError");
        $view->generate(array('msgError' => $exception->getMessage()));
    }

}