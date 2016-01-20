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

    private function routerCreateController(Request $request)
    {
        $controllerName = "Welcome";  //Default Controller

        //Check if inside inside the url there is a controller attribute
        if ($request->requestParamExist('controller')) {
            
            //The controllerName is in fact the class to instance
            $controllerName = $request->requestGetParam('controller');

            //First Letter in Uppercase
            $controllerName = ucfirst($controllerName);

        }

        $controllerClass = "Controller"  . $controllerName
        $controllerFile  = "controller/" . lcfirst($controllerClass) . ".class.php";

        if (file_exists($controllerFile)) {
            //Inclusion of the file related to the controller
            require $controllerFile;

            //Creation of the specific object controller
            $controller = new $controllerClass();
            $controller->ctrlSetRequest($request);
            return $controller;
        } else {
            throw new Exception("File '$controllerFile' does not exist...");
        }
    }

    public function routerCreateAction(Request $request)
    {
        $actionName = "index";

        //Check if inside the url there is an action attribute
        if ($request->requestParamExist('$action')) {
        
            //The controllerName is in fact the class to instance
            $actionName = $request->requestGetParam('action');
        }
        return $actionName;
    }

    private function routerError(Exception $exception)
    {
        $view = new View("viewError");
        $view->generate(array('msgError' => $exception->getMessage()));
    }

}